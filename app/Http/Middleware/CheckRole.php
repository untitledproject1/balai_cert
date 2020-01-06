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
        $getUser = $request->user();
        if ($getUser == null) {
            return redirect('login');
        }

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($getUser->hasAnyRoles($roles) || !$roles) {
            if (empty($_POST)) {

                $role = $getUser->role()->first()->role;

                $url = explode('/', url()->current());
                // if (count($url) <= 5) {
                //     $getUri = $role != 'client' && $url[2] == 'cert_list' ? $url[2].'/'.$url[3] : $url[2];
                // } elseif (count($url) > 5) {
                //     $getUri = $role != 'client' && $url[5] == 'cert_list' ? $url[5].'/'.$url[6] : $url[5];
                // }
                $getUri = '';
                if ($role != 'client' && $role != 'super_admin' && isset($url[6])) {
                    $idProduk = intval($url[6]);
                    $sert_doc = \DB::table('sert_doc')->where('produk_id', $idProduk)->first();
                    \View::share('sert_doc', $sert_doc);
                }

                \View::share('userAuth', $getUser);
                \View::share('role', $role);

                if ($role == 'super_admin') {
                    \View::share('breadcrumbs', \AppHelper::instance()->breadcrumbs($request->segments()));
                }

                if ( 
                    ( $role !== 'super_admin' ) || 
                    ($role == 'super_admin' && ($url[5] == 'cert_list' || $url[5] == 'dashboard')) 
                ) {
                    $tahapan = \DB::table('master_tahap as mt')
                        ->leftJoin('users as u', 'u.role_id', '=', 'mt.role_id')
                        ->select('mt.kode_tahap', 'mt.tahapan', 'u.id as receiver_id', 'u.name as receiver', 'mt.role_id')
                        ->get();
                    if ($role == 'client' && $request->getRequestUri() !== '/dashboard') {
                        $subagId = explode(',', $tahapan->where('kode_tahap', 23)->first()->role_id)[1];
                        $subag = $getUser->where('role_id', $subagId)->first();
                        foreach ($tahapan as $key => $value) {
                            if ($value->kode_tahap == '23' || $value->kode_tahap == '24') {
                                $tahapan[$key]->receiver_id = $value->receiver_id.','.$subag->id;
                                $tahapan[$key]->receiver = $value->receiver.','.$subag->name;
                            }
                        }
                    }
                    // dd($tahapan);
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
