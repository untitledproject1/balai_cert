<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertController extends Controller
{
    public function index() {
    	$client = \DB::table('users')
            ->leftJoin('produk', 'produk.user_id', '=', 'users.id')
            ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
            ->where('produk', '!=', null)
            ->select('users.id', 'users.nama_perusahaan', 'users.negeri', 'users.pimpinan_perusahaan', 'users.provinsi', 'users.kota', 'users.alamat_perusahaan', 'users.email_perusahaan', 'users.no_telp', 'master_tahap.tahapan', 'master_tahap.kode_tahap', 'produk.produk', 'produk.jenis_produk', 'produk.id as produk_id', 'produk.updated_at', 'produk.created_at')->limit(5)->get();
        
        // filter data unique
        $unique = collect([]);
        foreach ($client as $key => $value) {
            $double = 0;
            foreach ($unique as $key2 => $item) {
                if ($value->id == $item->id && $value->kode_tahap == 24) {
                    $double += 1;
                }
            }
            if ( $double == 0 ) {
                $unique->push($value);
            }
        }

        $result = $unique->sortByDesc('created_at');

    	return view('superAdmin.cert_list', ['result' => $result]);
    }
}
