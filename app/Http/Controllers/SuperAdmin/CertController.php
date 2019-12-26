<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;
use App\User;

class CertController extends Controller
{
    public function index() {
    	// $client = \DB::table('users')
     //        ->leftJoin('produk', 'produk.user_id', '=', 'users.id')
     //        ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
     //        ->where('produk', '!=', null)
     //        ->select('users.id', 'users.nama_perusahaan', 'users.negeri', 'users.pimpinan_perusahaan', 'users.provinsi', 'users.kota', 'users.alamat_perusahaan', 'users.email_perusahaan', 'users.no_telp', 'master_tahap.tahapan', 'master_tahap.kode_tahap', 'produk.produk', 'produk.jenis_produk', 'produk.id as produk_id', 'produk.updated_at', 'produk.created_at')->get();

    	$client = \DB::table('users')
    		->where('negeri', '!=', null)
            ->select('users.id', 'users.nama_perusahaan', 'users.negeri', 'users.pimpinan_perusahaan', 'users.provinsi', 'users.kota', 'users.alamat_perusahaan', 'users.email_perusahaan', 'users.no_telp')->get();
        
        // filter data unik
        // $unique = collect([]);
        // foreach ($client as $key => $value) {
        //     $double = 0;
        //     foreach ($unique as $key2 => $item) {
        //         if ($value->id == $item->id && $value->kode_tahap == 24) {
        //             $double += 1;
        //         }
        //     }
        //     if ( $double == 0 ) {
        //         $unique->push($value);
        //     }
        // }

        $result = $client->sortByDesc('created_at');

    	return view('superAdmin.list_sert.cert_list', ['result' => $result]);
    }

    public function detail_produk($company_id) {
        $user = User::find($company_id);
        if (is_null($user)) {
            abort(404);
        }
        $produk = Produk::select('id', 'produk', 'kode_tahap', 'jenis_produk', 'created_at')->where('user_id', $company_id)->get()->sortByDesc('created_at');

        return view('superAdmin.list_sert.list_produk', ['list_produk' => $produk, 'user' => $user]);
    }
}
