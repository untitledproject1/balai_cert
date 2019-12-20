<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if ($request->user() == null) {
            return redirect('login');
        }

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($request->user()->hasAnyRoles($roles) || !$roles) {
            if (empty($_POST)) {

                $getUser = \Auth::user();
                $role = $getUser->role()->first()->role;

                $url = explode('/', url()->current());
                // if (count($url) <= 5) {
                //     $getUri = $role != 'client' && $url[2] == 'cert_list' ? $url[2].'/'.$url[3] : $url[2];
                // } elseif (count($url) > 5) {
                //     $getUri = $role != 'client' && $url[5] == 'cert_list' ? $url[5].'/'.$url[6] : $url[5];
                // }
                $getUri = '';
                if ($role != 'client' && isset($url[6])) {
                    $idProduk = intval($url[6]);
                    $sert_doc = \DB::table('sert_doc')->where('produk_id', $idProduk)->first();
                    \View::share('sert_doc', $sert_doc);
                }

                \View::share('userAuth', $getUser);
                \View::share('role', $role);

                if ($role !== 'super_admin') {
                    $tahapan = \DB::table('master_tahap as mt')->leftJoin('users as u', 'u.role_id', '=', 'mt.role_id')
                        ->select('mt.kode_tahap', 'mt.tahapan', 'u.id as receiver_id', 'u.name as receiver')->get();
                    \View::share('tahap_sert', $tahapan);
                }

                \View::share('uri', $url);
            }

            return $next($request);
        }

        //dd($request->user()->hasAnyRoles($roles));
        // return $next($request);
        return abort(401,"Bukan Hak Anda");
    }
}
