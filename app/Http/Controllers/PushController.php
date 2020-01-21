<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\PushSubscriptions;

class PushController extends Controller
{
    use ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update user's subscription.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, ['user_fcm_token' => 'required']);
        
        $auth = \Auth::user();

        $push = PushSubscriptions::where('user_id', $auth->id)->where('user_fcm_token', $request->user_fcm_token)->first();
        if (!is_null($push)) {
            $push->user_fcm_token = $request->user_fcm_token;
        } else {
            $push = new PushSubscriptions;
            $push->user_fcm_token = $request->user_fcm_token;
            $push->user_id = $auth->id;
        }
        $push->save();

        return response()->json(null, 204);
    }

    /**
     * Delete the specified subscription.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->validate($request, ['endpoint' => 'required']);

        $request->user()->deletePushSubscription($request->endpoint);

        return response()->json(null, 204);
    }
}
