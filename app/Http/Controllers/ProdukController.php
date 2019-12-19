<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Persyaratan_dalam_negeri;
use App\Pesan;

class ProdukController extends Controller
{
    public function dashboard() {
        $user = \Auth::user();
        $produk = $user->currentProduct();
        $page = function($kode_tahap) {
            if ($kode_tahap <= 11) {
                $name = 'sa';
            } elseif ($kode_tahap <= 13) {
                $name = 'mou';
            } elseif ($kode_tahap <= 14) {
                $name = 'form_bayar';
            } elseif ($kode_tahap <= 16) {
                $name = 'bukti_bayar';
            } elseif ($kode_tahap <= 18) {
                $name = 'verify_dokSert';
            } elseif ($kode_tahap <= 20) {
                $name = 'apprv_draftSert';
            } elseif ($kode_tahap <= 22) {
                $name = 'req_sert';
            } elseif ($kode_tahap <= 24) {
                $name = 'verify_terimaSert';
            }
            return $name;
        };

        $currentProduct = null;
        $certifiedProduct = null;
        if (count($produk) > 0) {
            $currentProduct = $produk->where('kode_tahap', '!=', 24);
            $certifiedProduct = $produk->where('kode_tahap', 24);
        }
        $jml_produk_berjalan = $user->total_available_cert();
        
        $flashInfo = [];
        
        // flash msg verifikasi email
        if (is_null($user->verified)) {
            array_push($flashInfo, $user->flashMsg_emailVerify($user));
        }

        if (!$currentProduct->isEmpty()) {
            foreach ($currentProduct as $key => $prdk) {
                // flash msg verifikasi apply sa
                if (!is_null($prdk) && $prdk->kode_tahap < 11) {
                    $model = new Persyaratan_dalam_negeri;
                    array_push($flashInfo, $model->flashMsg_applySA($prdk->id));
                }

                // flash msg laporan audit
                if (!is_null($prdk) && $prdk->kode_tahap >= 17 && $prdk->kode_tahap < 19) {
                    $laporanAudit = new LaporanAudit;
                    array_push($flashInfo, $laporanAudit->flashMsg_laporanAudit($prdk->id));
                }
            }
        }

        return view('dashboard.dashboard-user', compact('produk', 'page', 'currentProduct', 'certifiedProduct', 'flashInfo', 'jml_produk_berjalan'));
    }

    public function history() {
    	$user = \Auth::user();
        $produk = $user->produk_client()->where('kode_tahap', 24);

    	return view('dashboard.history', ['produk' => $produk]);
    }

    public function send_message_client(Request $request, $idProduk, $admin_id) {
        $d = \Validator::make($request->all(), [
            'pesan' => 'required|string|max:255',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $produk = Produk::find($idProduk);

        $pesan = new Pesan;
        $pesan->admin = $admin_id;
        $pesan->produk_id = $produk->id;
        $pesan->kode_tahap = $produk->kode_tahap;
        $pesan->pesan = $request->pesan;
        $pesan->save();

        return redirect('messages');
    }
}
