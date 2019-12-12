<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mou;
use App\User;
use App\Produk;
use App\Persyaratan_dalam_negeri;
use App\Persyaratan_luar_negeri;
use App\BidPrice;
use App\TahapSert;
use App\NoSurat;
use App\Invoice;

class MOUController extends Controller
{
    public function cmou($id, $idProduk) {
        $user = User::find($id);
        $produk = \DB::table('produk')->select('id','produk', 'kode_tahap')->where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        $dok = $user->negeri == '1' ? Persyaratan_dalam_negeri::where('produk_id', $idProduk)->first() : Persyaratan_luar_negeri::where('produk_id', $idProduk)->first();
        $mou = Mou::where('produk_id', $idProduk)->first();
        $no_surat_mou = NoSurat::where('jenis', 'mou')->select('no')->orderBy('id', 'desc')->first();
        $defPrice = \DB::table('defaultHarga')->where('jenis', 'sertifikasi produk')->select('harga')->first();

        return view('mou.mou', ['idProduk' => $idProduk, 'user' => $user, 'user_id' => $id, 'produk' => $produk, 'dok' => $dok, 'mou' => $mou, 'kode_tahap' => $kode_tahap, 'no_surat_mou' => $no_surat_mou, 'defaultHarga' => $defPrice]);
    }

    public function create(Request $request, $idProduk, $user_id) {
        $sVal = explode(',', $request->b_sert);
        $val = '';
        foreach ($sVal as $key => $value) {
            $val.=$value;
        }
        $defPrice = \DB::table('defaultHarga')->where('jenis', 'sertifikasi produk')->select('harga')->first();
        $b_sert = intval($val) === 0 ? $defPrice->harga : intval($val);

        $date = \Carbon\Carbon::now();
        $user = User::find($user_id);
    	$pdf = \PDF::loadView('dok.dok_mou', ['user' => $user, 'date' => $date, 'biaya_sert' => $b_sert, 'tgl_pembuatan' => $date->parse($request->d_kontrak), 'no_surat' => $request->no_mou]);
        $output = $pdf->output();
        $fileName = uniqid().''.date('YmdHis').'.pdf';
        \Storage::put('dok/mou/'.$fileName, $output);

        $mou = new Mou;
        $mou->produk_id = $idProduk;
        $mou->mou = $fileName;
        $mou->tgl_kontrak = date('Y-m-d', strtotime($request->d_kontrak));
        $mou->doc_maker = \Auth::user()->id;
        $mou->status = 3;
        $mou->save();

        $no_surat = new NoSurat;
        $no_surat->jenis = 'mou';
        $no_surat->dok = $mou->mou;
        $no_surat->no = $request->no_mou;
        $no_surat->save();

    	return redirect()->back();
    }

    public function uploadMou(Request $request, $idProduk) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'mou' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $user = \Auth::user();
        $produk = Produk::find($idProduk);
        $mou = Mou::where('produk_id', $idProduk)->first();

        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('mou');
        $fileName = 'mou-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        if (\Storage::exists('dok/mou/'.$mou->mou)) {
            \Storage::delete('dok/mou/'.$mou->mou);
        }
        $file->storeAs('dok/mou', $fileName);

        $no_surat = NoSurat::where('dok', $mou->mou)->first();
        $no_surat->dok = $fileName;
        $no_surat->save();

        $mou->mou = $fileName;
        $mou->tgl_exp = date('Y-m-d', strtotime('+3 day', strtotime($mou->tgl_kontrak)));
        $mou->status = 1;
        $mou->save();

        $produk->kode_tahap = 12;
        $produk->save();

        return redirect()->back();
    }

    public function mou($idProduk) {
        $produk = \DB::table('produk')->select('kode_tahap', 'produk', 'jenis_produk')->where('id', $idProduk)->first();
        $kode_tahap = $produk->kode_tahap;
        $bidPrice = BidPrice::where('produk_id', $idProduk)->first();
        $mou = Mou::where('produk_id', $idProduk)->first();
        $seksi_kerjasama = User::find($mou->doc_maker);

    	return view('mou.signMou', ['mou' => $mou, 'bidPrice' => $bidPrice, 'idProduk' => $idProduk, 'kode_tahap' => $kode_tahap, 'produk' => $produk, 'seksi_kerjasama' => $seksi_kerjasama]);
    }

    public function mou_signed(Request $request, $id) {
        // validasi extensi file upload        
        $d = \Validator::make($request->file(), [
            'mou' => 'required|max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

    	$file = $request->mou;
        $mou = MOU::find($id);
    	$fileName = date('YmdHis').''.uniqid().'.'.$file->extension();
    	if (!is_null($mou->mou)) {
            \Storage::delete('dok/mou/'.$mou->mou);
    	}
        $file->storeAs('dok/mou', $fileName);

        $no_surat = NoSurat::where('dok', $mou->mou)->first();
        $no_surat->dok = $fileName;
        $no_surat->save();

    	$dok = $mou;
    	$dok->mou = $fileName;
        $dok->status = 2;
    	$dok->save();

        $produk = Produk::find($dok->produk_id);
        $produk->kode_tahap = 13;
        $produk->save();

    	return redirect()->back();
    }

    public function unlock_mou(Request $request, $id) {
        $dok = Mou::where('produk_id', $id)->first();
        $dok->tgl_exp = date('Y-m-d H:i:s', strtotime('+3 day', strtotime(date('Y-m-d H:i:s'))));
        $dok->save();

        return redirect()->back();
    }
}