<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\PushSubscriptions;
use App\Produk;
use App\PushSubscriptionsGroup;

class PushController extends Controller
{
    use ValidatesRequests;

    protected $headers;
    protected $url;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // set firebase request headers
        $this->headers = [
            "Authorization: key=AAAA_JbzqLE:APA91bHUmLyyElawC1fjhnMWkXIhCzoOHQ8Mj5gch9nM3zsc4DUGR3UaLpsYiXegzwNzErezTJevwMu1lfXq16SjBryFcBjPjmk0uBmgAxeX3hUhgkQU2JbeIASbk16UB64ceHQgTENU",
            "Content-Type: application/json"
        ];
    }

    public function firebaseRequest($requestMethod, $data) {
        // Open connection
        $ch = curl_init();

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $this->url);
        
        if ($requestMethod == 'post') {
            // set request method
            curl_setopt($ch, CURLOPT_POST, true);
            // set POST data
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute
        $result = curl_exec($ch);
        
        // Close connection
        curl_close($ch);

        return $result;
    }

    public function push_test($user_fcm_token = false) {
        // $url = 'https://fcm.googleapis.com/fcm/notification';
        $url = 'https://fcm.googleapis.com/fcm/notification?notification_key_name=penawaranHarga_success_vas_bunga1';
        $this->url = $url;
        
        $headers = [
            "Authorization: key=AAAA_JbzqLE:APA91bHUmLyyElawC1fjhnMWkXIhCzoOHQ8Mj5gch9nM3zsc4DUGR3UaLpsYiXegzwNzErezTJevwMu1lfXq16SjBryFcBjPjmk0uBmgAxeX3hUhgkQU2JbeIASbk16UB64ceHQgTENU",
            "Content-Type: application/json",
            "project_id: 1084864309425"
        ];
        $this->headers = $headers;

        // $data = [
        //     "operation" => "remove",
        //     "notification_key_name" => 'penawaranHarga_success_vas_bunga1',
        //     "notification_key" => "APA91bE7OHP9W2UleBTo1kdSQr5dZpgffuY4EL68aZopEBiGAYFr0ukTlv8qvNu8Z05pJdzVPE74RM2pkSNYuHp6uPZykmfrNt0x7osa22siRCYvVAx9isS8MtlaDNEti2I0Qm-2LSsChIDnEvECNV7g1W8YGZ4PKg",
        //     "registration_ids" => [$user_fcm_token]
        // ];
        // $response = $this->firebaseRequest('post', $data);
        $response = $this->firebaseRequest('get', []);

        return $response;
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
        // $role = $auth->role()->first()->role;
        $push = PushSubscriptions::where('user_id', $auth->id)->first();
        
        // if (!is_null($request->produk_id)) {
        //     $get_produk = Produk::select('produk')->find($request->produk_id);
        //     $produk = implode('_', explode(' ', $get_produk->produk));
        //     if ($role == 'pemasaran' || $role == 'client') {
        //         $notification_key_name = 'penawaranHarga_success_'.$produk;
        //         $get_subsGroup = PushSubscriptionsGroup::where('notification_key_name', $notification_key_name)->first();
        //         // set firebase request url
        //         $this->url = 'https://fcm.googleapis.com/fcm/notification';
        //         // update firebase request headers
        //         array_push($this->headers, "project_id: 1084864309425");
    
        //         // check if the group doesn't exists
        //         if (is_null($get_subsGroup)) {
        //             // then create the group
        //             // set the request data
        //             $data = [
        //                 "operation" => "create",
        //                 "notification_key_name" => $notification_key_name,
        //                 "registration_ids" => [$push->user_fcm_token]
        //             ];
        //             // send request
        //             $response = $this->firebaseRequest('post', $data);
    
        //             // insert response to db
        //             $groupNotif_key = json_decode($response, true);
        //             if (isset($groupNotif_key['notification_key'])) {
        //                 $subsGroup = new PushSubscriptionsGroup;
        //                 $subsGroup->notification_key_name = $notification_key_name;
        //                 $subsGroup->notification_key = $groupNotif_key['notification_key'];
        //                 $subsGroup->registration_ids = json_encode([$push->id]);
        //                 $subsGroup->save();
        //             }
        //         } else {
        //             $get_registrationIds = json_decode($get_subsGroup->registration_ids, true);
        //             // check if the user hasn't registered to group
        //             if (!in_array($push->id, $get_registrationIds)) {
        //                 // dd();
        //                 array_push($get_registrationIds, $push->id);
        //                 // set the request data
        //                 $data = [
        //                     "operation" => "add",
        //                     "notification_key_name" => $get_subsGroup->notification_key_name,
        //                     "notification_key" => $get_subsGroup->notification_key,
        //                     "registration_ids" => [$push->user_fcm_token]
        //                 ];
        //                 // send request
        //                 $response = $this->firebaseRequest('post', $data);
        
        //                 // update notifications group
        //                 $groupNotif_key = json_decode($response, true);
        //                 if (isset($groupNotif_key['notification_key'])) {
        //                     $get_subsGroup->registration_ids = json_encode($get_registrationIds);
        //                     $get_subsGroup->save();
        //                 }
        //             }
        //         }
        //     }
        // }
        
        // $response = $this->push_test($push->user_fcm_token);
        // $response = $this->push_test();

        // $url = 'https://fcm.googleapis.com/fcm/send';
        // $this->url = $url;
        
        // $headers = [
        //     "Authorization: key=AAAA_JbzqLE:APA91bHUmLyyElawC1fjhnMWkXIhCzoOHQ8Mj5gch9nM3zsc4DUGR3UaLpsYiXegzwNzErezTJevwMu1lfXq16SjBryFcBjPjmk0uBmgAxeX3hUhgkQU2JbeIASbk16UB64ceHQgTENU",
        //     "Content-Type: application/json",
        //     "project_id: 1084864309425"
        // ];
        // $this->headers = $headers;

        // $data = [
        //     "to" => 'APA91bE7OHP9W2UleBTo1kdSQr5dZpgffuY4EL68aZopEBiGAYFr0ukTlv8qvNu8Z05pJdzVPE74RM2pkSNYuHp6uPZykmfrNt0x7osa22siRCYvVAx9isS8MtlaDNEti2I0Qm-2LSsChIDnEvECNV7g1W8YGZ4PKg',
        //     "data" => [
        //         'title' => 'Test Push Notif Group',
        //         'subtitle' => 'test',
        //         'data' => 'test',
        //         'toast_msg' => 'test'
        //     ]
        // ];

        // $response = $this->firebaseRequest('post', $data);

        // $result = isset($response) ? json_decode($response, true) : null;

        if (!is_null($push)) {
            $push->user_fcm_token = $request->user_fcm_token;
        } else {
            $push = new PushSubscriptions;
            $push->user_fcm_token = $request->user_fcm_token;
            $push->user_id = $auth->id;
        }
        $push->save();

        return response()->json(['subscribed']);
        // return response()->json([$result]);
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
