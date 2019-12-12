<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Produk;
use App\LaporanSert;
use App\User;
use App\TahapSert;
use Illuminate\Support\Arr;
use App\Sert;
use \Carbon\Carbon;

class SertController extends Controller
{
    public function index($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
    	$dok = LaporanSert::where('produk_id', $idProduk)->first();
        $data_sert = Sert::where('produk_id', $idProduk)->first();

    	return view('draftSert.draftSert', ['user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'dok' => $dok, 'kode_tahap' => $kode_tahap, 'data_sert' => $data_sert]);
    }
    public function create(Request $request, $idProduk, $user_id) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'sert' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $user = User::find($user_id);
		$produk = Produk::find($idProduk);
        $draft = $produk->draft_sert;
        $date = Carbon::now();
        $tgl_exp = Carbon::now()->add(4, 'year')->isoFormat('LL');
    	// $pdf = \PDF::loadView('dok.draftSertDok', ['user' => $user, 'produk' => $produk, 'date' => $date, 'tgl_exp' => $tgl_exp]);
    	// $pdf->setPaper('A4','landscape');
    	// $output = $pdf->output();
    	// $fileName = 'Draft_Sertifikat_'.$produk->produk.'('.$request->user.')'.'-'.uniqid().''.date('YmdHis').'.pdf';
     //    \Storage::put('dok/draftSert/'.$fileName, $output);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $fileName = 'Sertifikat_Produk-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.pdf';

        $request->sert->storeAs('dok/draftSert', $fileName);        
		$produk->draft_sert = $fileName;
        $produk->status_sert_jadi = null;
		$produk->save();
        
        if (\Storage::exists('dok/draftSert/'.$draft)) {
            \Storage::delete('dok/draftSert/'.$draft);
        }

		return redirect()->back();
    }
    public function getApprv($idProduk) {
    	$produk = Produk::find($idProduk);
        $kode_tahap = $produk->kode_tahap;
    	return view('draftSert.apprvSert', ['produk' => $produk, 'kode_tahap' => $kode_tahap, 'idProduk' => $idProduk]);
    }

    public function postApprv(Request $request, $idProduk) {
    	$produk = Produk::find($idProduk);
    	if ($request->apprv == '1') {
	    	$produk->status_sert_jadi = 1;
            $produk->kode_tahap = 21;
            $msg = 'Draft Sertifikat telah disetujui!';
    	} else {
            $produk->status_sert_jadi = 4;
    		$produk->pesan_sert = $request->pesanT;
            $msg = 'Permintaan pembuatan ulang draft sertifikat telah dikirim';
    	}
    	$produk->save();
    	return redirect()->back()->with('msg', $msg);
    }
    
    public function req_sert($idProduk) {
        $produk = Produk::find($idProduk);
        $kode_tahap = $produk->kode_tahap;
        return view('draftSert.reqSertJadi', ['produk' => $produk, 'idProduk' => $idProduk, 'kode_tahap' => $kode_tahap]);
    }
    public function postReq_sert(Request $request, $idProduk) {
    	$produk = Produk::find($idProduk);
    	$produk->request_sert = $request->req == '1' ? 'ambil' : 'kirim';
        $produk->alamat_kirim = !is_null($request->alm) ? $request->alm : null;
    	$produk->save();
    	return redirect()->back();
    }
    public function cetak_sert(Request $request, $idProduk) {
    	$dok = Produk::where('id', $idProduk)->first();
    	$dok->status_sert_jadi = 2;
    	$dok->save();
        $produk = Produk::find($idProduk);
        $produk->kode_tahap = 22;
        $produk->save();
    	return redirect()->back();
    }
    public function postSert_jadi(Request $request, $idProduk) {
    	$dok = Produk::where('id', $idProduk)->first();
    	$dok->status_sert_jadi = 3;
    	$dok->save();
    	return redirect()->back();
    }
    public function jadwalSert($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        $produk = Produk::where('id', $idProduk)->first();
        return view('draftSert.jadwalSert', ['produk' => $produk, 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'kode_tahap' => $kode_tahap]);
    }
    public function postJadwalSert(Request $request, $idProduk) {
    	$dok = Produk::where('id', $idProduk)->first();
    	$dok->tgl_request_sert = $request->tgl;

        if ($dok->request_sert == 'ambil') {
            $dok->kode_tahap = 23;
        }
    	$dok->save();

    	return redirect()->back();
    }
    public function pengirimanSert($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        return view('draftSert.pengirimanSert', ['produk' => $produk, 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'kode_tahap' => $kode_tahap]);
    }

    public function konfirmasiSert_dok(Request $request, $idProduk, $user_id) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'kon_sert_file' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'  => 'Extensi file yang diperbolehkan: pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $user = User::find($user_id);
        $date = new Carbon;
        $produk = Produk::find($idProduk);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('kon_sert_file');
        $fileName = 'Lembar_Konfirmasi_Penerbitan_Sertifikat_SPPT_SNI-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('dok/konfirmasiSert', $fileName);
        // $data = Arr::except($request->all(), ['_token']);
        // $data['tgl_permohonan'] = \AppHelper::instance()->parseDate($data['tgl_permohonan']);
        // $data['tgl_penerbitan'] = \AppHelper::instance()->parseDate($data['tgl_penerbitan']);
        // $data['tgl_penerbitan_shu'] = \AppHelper::instance()->parseDate($data['tgl_penerbitan_shu']);
        // $data['no_npwp'] = $data['no_npwp'];
        // $data['bapc'] = !is_null($data['bapc']) ? $data['bapc'] : null;
        // $data['lapSert'] = !is_null($data['lapSert']) ? $data['lapSert'] : null;
        // $data['copy_sert'] = !is_null($data['copy_sert']) ? $data['copy_sert'] : null;
        // $data['shu'] = !is_null($data['shu']) ? $data['shu'] : null;

        // $lapSert = LaporanSert::where('produk_id', $idProduk)->first();

        // $fileName = 'Lembar_Konfirmasi_Penerbitan_Sertifikat_SPPT_SNI-'.uniqid().''.date('Ymd').'.pdf';
        // $pdf = \PDF::loadView('dok.dok_konfirmasi_sert', ['user' => $user, 'produk' => $produk, 'lapSert' => $lapSert, 'data' => $data]);
        // return $pdf->stream();
        // $output = $pdf->output();
        // \Storage::put('dok/konfirmasiSert/'.$fileName, $output);

        $produk->lembar_konSert = $fileName;
        $produk->save();

        return redirect()->back();
    }

    public function verify_lembarKonSert($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;

        return view('draftSert.verify_konSert', ['produk' => $produk, 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'kode_tahap' => $kode_tahap]);
    }

    public function post_verify_lembarKonSert(Request $request, $idProduk, $user_id) {
        $produk = Produk::find($idProduk);
        if ($request->pilih == '1') {
            $produk->verify_konSert = 1;
            $msg = 'Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI Client telah disetujui';
        } else {
            $msg = 'Permintaan untuk buat ulang Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI Client sudah dikirim ke Staff Sertifikasi';
            if (\Storage::exists('dok/konfirmasiSert/'.$produk->lembar_konSert)) {
                \Storage::delete('dok/konfirmasiSert/'.$produk->lembar_konSert);
            }
            $produk->lembar_konSert = null;
            $produk->verify_msg = $request->isiPesan;
        }
        $produk->save();

        return redirect()->back()->with('msg', $msg);
    }

    public function upload_resi(Request $request, $idProduk, $user_id) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'resi' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'  => 'Extensi file yang diperbolehkan: pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $dok = Produk::where('id', $idProduk)->first();
        $tgl = \AppHelper::instance()->parseDate($request->tgl);
        $dok->tgl_request_sert = date('Y-m-d', strtotime($tgl));
        if (!is_null($request->file('resi'))) {
            $fileName = 'Resi_Pengiriman_'.$dok->produk.'('.$request->user.')'.uniqid().'.'.$request->resi->extension();
            $request->resi->storeAs('dok/resi', $fileName);
            $dok->resi_pengiriman = $fileName; 
        }
        $dok->save();

        return redirect()->back()->with('successMsg', 'Resi Pengiriman berhasil diupload!');
    }

    public function verify_terimaSert($idProduk) {
        $produk = Produk::find($idProduk);
        $kode_tahap = $produk->kode_tahap;
        return view('draftSert.verify_terimaSert', ['produk' => $produk, 'idProduk' => $idProduk, 'kode_tahap' => $kode_tahap]);
    }

    public function verify_terimaSert_post(Request $request, $idProduk) {
        $produk = Produk::find($idProduk);
        $produk->terima_sert = 1;
        $produk->tgl_terima_sert = date('Y-m-d');
        $produk->kode_tahap = 24;
        $produk->save();

        return redirect()->back()->with('msg', 'Verifikasi Penerimaan Sertifikat telah dilakukan');
    }

    public function konfirmasiSert(Request $request_sert, $idProduk) {
        $produk = Produk::find($idProduk);
        $produk->kode_tahap = 23;
        $produk->kon_resi = 1;
        $produk->save();

        return redirect()->back();
    }
}