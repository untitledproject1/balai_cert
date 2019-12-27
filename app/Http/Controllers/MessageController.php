<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pesan;

class MessageController extends Controller
{
	public function index() {
		$user = \Auth::user();
		$produk = Produk::where('user_id', $user->id)->where('kode_tahap', '!=', 24)->get();

        return view('pesan/messages', ['produk' => $produk]);
    }

    public function send_message_client(Request $request, $idProduk, $admin_id, $client_id = null) {
        $d = \Validator::make($request->all(), [
            'pesan' => 'required|string|max:255',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $produk = Produk::find($idProduk);

        $pesan = new Pesan;
        $pesan->ket_pesan = 'client';
        if (!is_null($client_id)) {
            $pesan->client = intval($client_id);
            $pesan->ket_pesan = 'admin';
        }
        $pesan->admin = intval($admin_id);
        $pesan->produk_id = $produk->id;
        $pesan->kode_tahap = $produk->kode_tahap;
        $pesan->pesan = $request->pesan;
        $pesan->save();

        return redirect('messages');
    }

    public function search_produk(Request $request) {
    	$produk = Produk::where('user_id', $request->user_id)->where('produk', 'like', '%'.$request->produk.'%')->where('kode_tahap', '!=', 24)->select('id', 'produk')->get();

    	return response()->json(['data' => $produk]);
    }
}
