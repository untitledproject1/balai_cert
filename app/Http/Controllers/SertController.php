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
use App\PushSubscriptions;

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

        // ---- Push notif -----
        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user->id];
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Pembuatan Draft Sertifikat',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Sertifikasi telah membuat Draft Sertifikat',
            'toast_msg' => 'Seksi Sertifikasi telah membuat Draft Sertifikat',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

		return redirect()->back();
    }

    public function getApprv($idProduk) {
    	$produk = Produk::find($idProduk);
        $kode_tahap = $produk->kode_tahap;
    	return view('draftSert.apprvSert', ['produk' => $produk, 'kode_tahap' => $kode_tahap, 'idProduk' => $idProduk]);
    }

    public function postApprv(Request $request, $idProduk) {
        $produk = Produk::find($idProduk);
        $choice = '';
        // get sertifikasi and client data
        $userData = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'sertifikasi')->orWhere('users.id', $produk->user_id)->select('users.id', 'users.name', 'users.nama_perusahaan', 'role.role_name')->get();
        // dd($produk, $userData);
        $client = $userData[1];
    	if ($request->apprv == '1') {
	    	$produk->status_sert_jadi = 1;
            $produk->kode_tahap = 21;
            $msg = 'Draft Sertifikat telah disetujui!';
            $choice = $client->nama_perusahaan.' telah menyetujui Draft Sertifikat';
    	} else {
            $produk->status_sert_jadi = 4;
    		$produk->pesan_sert = $request->pesanT;
            $msg = 'Permintaan pembuatan ulang draft sertifikat telah dikirim';
            $choice = 'Draft Sertifikat telah ditolak oleh '.$client->nama_perusahaan;
    	}
        $produk->save();
        
        // ---- Push notif -----
        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$userData[0]->id];
        $tokens = PushSubscriptions::where('user_id', $userData[0]->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Pembuatan Draft Sertifikat',
            'subtitle' => $produk->produk,
            'data' => $choice,
            'toast_msg' => $choice,
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

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
        
        // ---- Push notif -----
        // get receiver data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->select('users.id', 'users.name', 'role.role_name');
        if ($request->req == '1') {
            $choice = 'Ambil';
            $user_receiver = $user_receiver->where('role', 'pemasaran')->first();
        } else {
            $choice = 'Kirim';
            $user_receiver = $user_receiver->where('role', 'subag_umum')->first();
        }

        // get client data
        $client = User::select('id', 'nama_perusahaan')->find($produk->user_id);

        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver->id];
        $tokens = PushSubscriptions::where('user_id', $user_receiver->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Ambil/Kirim Sertifikat Produk Client',
            'subtitle' => $produk->produk,
            'data' => $client->nama_perusahaan.' memilih request '.$choice.' Sertifikat Produk',
            'toast_msg' => $client->nama_perusahaan.' memilih request '.$choice.' Sertifikat Produk',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

    	return redirect()->back();
    }

    public function cetak_sert(Request $request, $idProduk) {
        $produk = Produk::find($idProduk);
    	$produk->status_sert_jadi = 2;
        $produk->kode_tahap = 22;
        $produk->save();

        // ---- Push notif -----
        // get client and pemasaran data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'pemasaran')->orWhere('users.id', $produk->user_id)->select('users.id', 'users.name', 'users.nama_perusahaan', 'role.role_name')->get();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver[0]->id, $user_receiver[1]->id];
        $tokens = PushSubscriptions::where('user_id', $user_receiver[0]->id)->orWhere('user_id', $user_receiver[1]->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Cetak Draft Sertifikat',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Sertifikasi telah mencetak sertifikat',
            'toast_msg' => 'Seksi Sertifikasi telah mencetak sertifikat',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

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
    	$produk = Produk::where('id', $idProduk)->first();
    	$produk->tgl_request_sert = $request->tgl;

        if ($produk->request_sert == 'ambil') {
            $produk->kode_tahap = 23;
        }
        $produk->save();
        
        // ---- Push notif -----
        // get client data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'subag_umum')->orWhere('users.id', $produk->user_id)->select('users.id', 'users.name', 'role.role_name')->get();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver[0]->id, $user_receiver[1]->id];
        $tokens = PushSubscriptions::where('user_id', $user_receiver[0]->id)->orWhere('user_id', $user_receiver[1]->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Penjadwalan Ambil Sertifikat Client',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Pemasaran telah mengisi Jadwal Ambil Sertifikat',
            'toast_msg' => 'Seksi Pemasaran telah mengisi Jadwal ambil Sertifikat',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

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
        // $pdf = \PDF::loadView('dok.dok_konfirmasi_sert', ['user' => $user, 'produkirimk' => $produk, 'lapSert' => $lapSert, 'data' => $data]);
        // return $pdf->stream();
        // $output = $pdf->output();
        // \Storage::put('dok/konfirmasiSert/'.$fileName, $output);

        $produk->lembar_konSert = $fileName;
        $produk->save();

        // ---- Push notif -----
        // get keuangan data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'ketua_sertifikasi')->select('users.id', 'users.name', 'role.role_name')->first();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver->id];
        $tokens = PushSubscriptions::where('user_id', $user_receiver->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Sertifikasi telah membuat Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI',
            'toast_msg' => 'Seksi Sertifikasi telah membuat Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

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
        $choice = '';
        if ($request->pilih == '1') {
            $produk->verify_konSert = 1;
            $msg = 'Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI Client telah disetujui';
            $choice = 'Ketua Seksi Sertifikasi telah menyetujui Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI';
        } else {
            $msg = 'Permintaan untuk buat ulang Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI Client sudah dikirim ke Staff Sertifikasi';
            if (\Storage::exists('dok/konfirmasiSert/'.$produk->lembar_konSert)) {
                \Storage::delete('dok/konfirmasiSert/'.$produk->lembar_konSert);
            }
            $produk->lembar_konSert = null;
            $produk->verify_msg = $request->isiPesan;
            $choice = 'Ketua Seksi Sertifikasi telah menolak Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI';
        }
        $produk->save();

        // ---- Push notif -----
        // get keuangan data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'sertifikasi')->select('users.id', 'users.name', 'role.role_name')->first();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver->id];
        $tokens = PushSubscriptions::where('user_id', $user_receiver->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI',
            'subtitle' => $produk->produk,
            'data' => $choice,
            'toast_msg' => $choice,
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

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

        $produk = Produk::where('id', $idProduk)->first();
        $tgl = \AppHelper::instance()->parseDate($request->tgl);
        $produk->tgl_request_sert = date('Y-m-d', strtotime($tgl));
        if (!is_null($request->file('resi'))) {
            $fileName = 'Resi_Pengiriman_'.$produk->produk.'('.$request->user.')'.uniqid().'.'.$request->resi->extension();
            $request->resi->storeAs('dok/resi', $fileName);
            $produk->resi_pengiriman = $fileName; 
        }
        $produk->save();
        
        // ---- Push notif -----
        // get pemasaran data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'pemasaran')->orWhere('users.id', $produk->user_id)->select('users.id', 'users.name', 'role.role_name')->get();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver[0]->id, $user_receiver[1]->id];
        $tokens = PushSubscriptions::where('user_id', $user_receiver[0]->id)->orWhere('user_id', $user_receiver[1]->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Upload Resi Pengiriman Sertifikat Produk',
            'subtitle' => $produk->produk,
            'data' => 'Subag Umum telah men-upload Resi Pengiriman Sertifikat Produk',
            'toast_msg' => 'Subag Umum telah men-upload Resi Pengiriman Sertifikat Produk',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

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

        // ---- Push notif -----
        // get pemasaran data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->select('users.id', 'users.name', 'role.role_name')->where('role', 'pemasaran');
        if ($produk->request_sert == 'kirim') {
            $user_receiver = $user_receiver->orWhere('role', 'subag_umum');
        }
        $user_receiver = $user_receiver->get();
        
        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver[0]->id];
        $gettokens = PushSubscriptions::where('user_id', $id_penerima);
        if ($produk->request_sert == 'kirim') {
            array_push($id_penerima, $user_receiver[1]->id);
            $gettokens = $gettokens->orWhere('user_id', $user_receiver[1]->id);
        }
        $tokens = $gettokens->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $client = User::select('id', 'name', 'nama_perusahaan')->find($produk->user_id);
        $datas = [
            'title' => 'Penerimaan Sertifikat Produk',
            'subtitle' => $produk->produk,
            'data' => $client->nama_perusahaan.' telah menerima Sertifikat',
            'toast_msg' => $client->nama_perusahaan.' telah menerima Sertifikat',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back()->with('msg', 'Verifikasi Penerimaan Sertifikat telah dilakukan');
    }

    public function konfirmasiResi(Request $request_sert, $idProduk) {
        $produk = Produk::find($idProduk);
        $produk->kode_tahap = 23;
        $produk->kon_resi = 1;
        $produk->save();

        // ---- Push notif -----
        // get pemasaran data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'subag_umum')->orWhere('users.id', $produk->user_id)->select('users.id', 'users.name', 'role.role_name')->get();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = [$user_receiver[0]->id];
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->orWhere('user_id', $user_receiver[1]->id)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Konfirmasi Resi Pengiriman Sertifikat Produk',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Pemasaran telah men-konfirmasi Resi Pengiriman Sertifikat Produk',
            'toast_msg' => 'Seksi Pemasaran telah men-konfirmasi Resi Pengiriman Sertifikat Produk',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back();
    }
}