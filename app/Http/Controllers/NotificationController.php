<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SomeEvent;
use App\Events\NotificationReadAll;
use App\Notifications\HelloNotification;
use NotificationChannels\WebPush\PushSubscription;
use App\User;
use App\Notifications;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('last', 'dismiss');
    }

    /**
     * Get user's notifications.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Limit the number of returned notifications, or return all
        $query = $user->unreadNotifications();
        $limit = (int) $request->input('limit', 0);
        if ($limit) {
            $query = $query->limit($limit);
        }

        $notifications = $query->get()->each(function ($n) {
            $n->created = $n->created_at->toIso8601String();
        });

        $total = $user->unreadNotifications->count();

        return compact('notifications', 'total');
    }

    /**
     * Create a new notification.
     *
     */
    public function store(Request $request) {
        $user_ids = $request->user_token;
        $datas = $request->datas;
        $id_penerima = $request->id_penerima;

        // call push func
        \AppHelper::instance()->push_notif($user_ids, $datas, $id_penerima);
    }

    /**
     * Mark user's notification as read.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function markAsRead(Request $request, $id)
    {
        $notification = $request->user()
                                ->unreadNotifications()
                                ->where('id', $id)
                                ->first();

        if (is_null($notification)) {
            return response()->json('Notification not found.', 404);
        }

        $notification->markAsRead();

        event(new SomeEvent($request->user()->id, $id));
    }

    /**
     * Mark all user's notifications as read.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function markAllRead(Request $request)
    {
        $request->user()
                ->unreadNotifications()
                ->get()->each(function ($n) {
                    $n->markAsRead();
                });

        event(new NotificationReadAll($request->user()->id));
    }

    /**
     * Mark the notification as read and dismiss it from other devices.
     *
     * This method will be accessed by the service worker
     * so the user is not authenticated and it requires an endpoint.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function dismiss(Request $request, $id)
    {
        if (empty($request->endpoint)) {
            return response()->json('Endpoint missing.', 403);
        }

        $subscription = PushSubscription::findByEndpoint($request->endpoint);
        if (is_null($subscription)) {
            return response()->json('Subscription not found.', 404);
        }

        $notification = $subscription->user->notifications()->where('id', $id)->first();
        if (is_null($notification)) {
            return response()->json('Notification not found.', 404);
        }

        $notification->markAsRead();

        event(new NotificationRead($subscription->user->id, $id));
    }

    public function log() {
        $auth = \Auth::user();
        $notif_user = Notifications::where('user_id', $auth->id)->get();

        return view('notif_log', ['notif_user' => $notif_user]);
    }

    public function read(Request $request) {
        $notif = Notifications::where('user_id', intval($request->user_id))->where('read_at', null)
                ->update(['read_at' => date('Y-m-d H:i:s')]);

        return response()->json(['data' => $notif]);
    }
}
