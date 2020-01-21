<?php

namespace App\Http\Middleware;

use Closure;
use App\Notifications;

class GetAdditionalData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = $request->user();   // get authenticated user data
        $notif = Notifications::where('user_id', $auth->id)->where('read_at', '=', null)->get();

        // amount of notifications
        $notif_amount = count($notif);

        // send data to all view
        \View::share('new_notif', $notif);
        \View::share('notif_amount', $notif_amount);

        return $next($request);
    }
}