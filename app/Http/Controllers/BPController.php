<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BidPrice;
use App\Mou;
use App\Invoice;
use App\User;
use App\Produk;
use App\TahapSert;
use Illuminate\Support\Arr;
use App\NoSurat;
use App\PushSubscriptions;

class BPController extends Controller
{
    public function terbilang($nilai) {
        // $nilai = abs($nilai);
        // $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        // $temp = "";
        // if ($nilai < 12) {
        //     $temp = " ". $huruf[$nilai];
        // } else if ($nilai <20) {
        //     $temp = $this->terbilang($nilai - 10). " belas";
        // } else if ($nilai < 100) {
        //     $temp = $this->terbilang($nilai/10)." puluh". $this->terbilang($nilai % 10);
        // } else if ($nilai < 200) {
        //     $temp = " seratus" . $this->terbilang($nilai - 100);
        // } else if ($nilai < 1000) {
        //     $temp = $this->terbilang($nilai/100) . "ratus" . $this->terbilang($nilai % 100);
        // } else if ($nilai < 2000) {
        //     $temp = " seribu" . $this->terbilang($nilai - 1000);
        // } else if ($nilai < 1000000) {
        //     $temp = $this->terbilang($nilai/1000) . "ribu" . $this->terbilang($nilai % 1000);
        // } else if ($nilai < 1000000000) {
        //     $temp = $this->terbilang($nilai/1000000) . " juta" . $this->terbilang($nilai % 1000000);
        // } else if ($nilai < 1000000000000) {
        //     $temp = $this->terbilang($nilai/1000000000) . "milyar" . $this->terbilang(fmod($nilai,1000000000));
        // } else if ($nilai < 1000000000000000) {
        //     $temp = $this->terbilang($nilai/1000000000000) . "trilyun" . $this->terbilang(fmod($nilai,1000000000000));
        // }

        // return $temp;

        $number_format = new \NumberFormatter('in', \NumberFormatter::SPELLOUT);
        return $number_format->format($nilai);
    }

    protected function bidPrice($view, $id, $idProduk, $no_surat = null) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
    	$noSurat = NoSurat::where('jenis', 'penawaran_harga')->select('no')->orderBy('id', 'desc')->first();

    	return view($view, ['model' => BidPrice::where('produk_id', $idProduk)->first(), 'mou' => MOU::where('produk_id', $idProduk)->first(), 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'kode_tahap' => $kode_tahap, 'no_surat_bp' => $noSurat]);
    }

    public function index($id, $idProduk) {
        return $this->bidPrice('bidPrice.bidPrice', $id, $idProduk);
    }

    public function getRealCur($value) {
        $sVal = explode('.', $value);
        $val = '';
        foreach ($sVal as $key => $value) {
            $val.=$value;
        }
        return intval($val);
    }

    public function rincin_harga($request) {
        $dbprice = Arr::except($request, ['_token', 'no_bp', 'tgl_pembuatan', 'hal']);
        $dbprice['b_total'] = 0;
        foreach ($request as $key => $value) {
            if ($key != '_token' && $key != 'no_bp' && $key != 'tgl_pembuatan' && $key != 'hal') {
                $dbprice['b_total']+= $this->getRealCur($value);
            }
        }
        $price = $dbprice;
        $price['b_permohonan'] = $request['b_permohonan'] == '' ? 0 : $this->getRealCur($request['b_permohonan']);
        $price['b_audit1'] = $request['b_audit1'] == '' ? 0 : $this->getRealCur($request['b_audit1']);
        $price['b_kepala'] = $request['b_kepala'] == '' ? 0 : $this->getRealCur($request['b_kepala']);
        $price['b_ppc'] = $request['b_ppc'] == '' ? 0 : $this->getRealCur($request['b_ppc']);
        $price['b_pTeknis'] = $request['b_pTeknis'] == '' ? 0 : $this->getRealCur($request['b_pTeknis']);
        $price['b_sert'] = $request['b_sert'] == '' ? 0 : $this->getRealCur($request['b_sert']);
        $price['b_total'] = $price['b_total'] !== 0 ? $price['b_total'] : 0;

        return $price;
    }

    public function create(Request $request, $idProduk, $user_id, BidPrice $model) {
        $price = $this->rincin_harga($request->all());

        $user = User::find($user_id);
        $total_pegawai = $user->jml_pegawai_tetap + $user->jml_pegawai_tidak_tetap;
        $date = \Carbon\Carbon::now();
        $produk = Produk::find($idProduk);

        $pdf = \PDF::loadView('dok.dok_bidPrice', ['produk' => $produk, 'price' => $request->price, 'date' => $date, 'user' => $user, 'price' => $price, 'total_pegawai' => $total_pegawai, 'tgl_pembuatan' => $date->parse($request->tgl_pembuatan), 'no_surat_bp' => $request->no_bp, 'hal' => $request->hal, 'harga_terbilang' => $this->terbilang($price['b_total'])]);
        $output = $pdf->output();

        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));
        $fileName = 'Penawaran_harga-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.pdf';
        
        \Storage::put('dok/bidPrice/'.$fileName, $output);

		$dok = new $model;
        $dok->produk_id = $idProduk;
        $dok->doc_maker = \Auth::user()->id;
        $dok->status = 3;
		$dok->bid_price = $fileName;
        $dok->tgl_pembuatan = date('Y-m-d', strtotime($request->tgl_pembuatan));
        $dok->hal = $request->hal;
        $dok->harga = json_encode($price);
		$dok->save();

		$mou = Mou::where('mou.produk_id', $idProduk)->first();
		$no_surat_mou = NoSurat::where('dok', $mou->mou)->first();

		$pdf = \PDF::loadView('dok.dok_mou', ['user' => $user, 'date' => $date, 'biaya_sert' => $price['b_total'], 'tgl_pembuatan' => $date->parse($mou->tgl_kontrak), 'no_surat' => $no_surat_mou->no, 'harga_terbilang' => $price['b_total']]);
        $output = $pdf->output();

        $fileName = 'MOU-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.pdf';

        \Storage::put('dok/mou/'.$fileName, $output);
        if (\Storage::exists('dok/mou/'.$mou->mou)) {
            \Storage::delete('dok/mou/'.$mou->mou);
        }

        $mou->mou = $fileName;
        $mou->save();
        $no_surat_mou->dok = $fileName;
        $no_surat_mou->save();

		$no_surat = new NoSurat;
		$no_surat->jenis = 'penawaran_harga';
		$no_surat->dok = $dok->bid_price;
		$no_surat->no = $request->no_bp;
        $no_surat->save();

		return redirect()->back();
    }

    public function edit_rincianHarga(Request $request, $idProduk, $user_id) {
        $price = $this->rincin_harga($request->all());
        $bidPrice = BidPrice::where('produk_id', $idProduk)->first();
        $no_surat_bp = NoSurat::where('dok', $bidPrice->bid_price)->first();

        $user = User::find($user_id);
        $total_pegawai = $user->jml_pegawai_tetap + $user->jml_pegawai_tidak_tetap;
        $date = \Carbon\Carbon::now();
        $produk = Produk::find($idProduk);

        $pdf = \PDF::loadView('dok.dok_bidPrice', ['produk' => $produk, 'date' => $date, 'user' => $user, 'price' => $price, 'total_pegawai' => $total_pegawai, 'tgl_pembuatan' => $date->parse($bidPrice->tgl_pembuatan), 'no_surat_bp' => $no_surat_bp->no, 'hal' => $bidPrice->hal, 'harga_terbilang' => $this->terbilang($price['b_total'])]);
        $output = $pdf->output();

        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));
        $fileName = 'Penawaran_harga-'.$nama_perusahaan.'-'.$nama_produk.'_'.uniqid().'.pdf';

        \Storage::put('dok/bidPrice/'.$fileName, $output);
        if (\Storage::exists('dok/bidPrice/'.$bidPrice->bid_price)) {
            \Storage::delete('dok/bidPrice/'.$bidPrice->bid_price);
        }

        $bidPrice->bid_price = $fileName;
        $bidPrice->harga = json_encode($price);
        $bidPrice->save();
        $no_surat_bp->dok = $fileName;
        $no_surat_bp->save();

        return redirect()->back()->with('successMsg', 'Rincian Harga Dokumen Penawaran Harga berhasil diedit!');
    }

    public function uploadBP_BBK(Request $request, $idProduk) {
        // validasi extensi file upload        
        $d = \Validator::make($request->file(), [
            'bp' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file harus pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $user = User::find($request->user_id);
        $produk = Produk::find($idProduk);
        $bidPrice = BidPrice::where('produk_id', $idProduk)->first();

        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('bp');
        $fileName = 'Penawaran_harga-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        if (\Storage::exists('dok/bidPrice/'.$bidPrice->bid_price)) {
            \Storage::delete('dok/bidPrice/'.$bidPrice->bid_price);
        }
        $file->storeAs('dok/bidPrice', $fileName);

        $no_surat = NoSurat::where('dok', $bidPrice->bid_price)->first();
        $no_surat->dok = $fileName;
        $no_surat->save();

        $bidPrice->bid_price = $fileName;
        $bidPrice->status = 2;
        $bidPrice->save();

        // ---- Push notif -----
        // get client data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'kabidpjt')->select('users.id', 'users.name', 'role.role_name')->first();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = $user_receiver->id;
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Pembuatan Penawaran Harga',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Pemasaran telah membuat penawaran harga',
            'toast_msg' => 'Seksi Pemasaran telah membuat penawaran harga'
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back();
    }

    public function getApprove($id, $idProduk) {
        return $this->bidPrice('bidPrice.apprv_bidPrice', $id, $idProduk);
    }

    public function approve(Request $request, $idProduk) {
    	$dok = BidPrice::where('produk_id', $idProduk)->first();
        $produk = Produk::find($idProduk);
        $choice = '';
    	if ($request->choice == 'terima') {
	    	$dok->status = 1;
        	$dok->save();
            $produk->kode_tahap = 14;
            $produk->save();
            $choice = 'Kabid PJT telah men-approve penawaran harga';
    	} else {
            if (\Storage::exists('dok/bidPrice/'.$dok->bid_price)) {
                \Storage::delete('dok/bidPrice/'.$dok->bid_price);
            }
            $dok->delete();
            $choice = 'Penawaran harga telah ditolak oleh Kabid PJT';
    	}

        // ---- Push notif -----
        // get client data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'pemasaran')->select('users.id', 'users.name', 'role.role_name')->first();

        // get user_fcm_token
        $user_token = [];
        $id_penerima = $user_receiver->id;
        $gettokens = PushSubscriptions::where('user_id', $id_penerima);
        if ($request->choice == 'terima') {
            $client = User::select('id', 'nama_perusahaan')->find($produk->user_id);
            $gettokens = $gettokens->orWhere('user_id', $client->id);
        }
        $tokens = $gettokens->get();

        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Approval Penawaran Harga',
            'subtitle' => $produk->produk,
            'data' => $choice,
            'toast_msg' => $choice,
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

    	return redirect()->back();
    }

    public function getForm_bayar($idProduk) {
        $produk = Produk::find($idProduk);
        if (!is_null($produk)) {
            $bidPrice = BidPrice::where('produk_id', $produk->id)->first();
            $idProduk = $produk->id;
        } else {
            abort(404);
            // $bidPrice = null;
            // $idProduk = null;
        }
        $kode_tahap = $produk->kode_tahap;
        $invoice = !is_null($bidPrice) ? $bidPrice->invoice()->first() : null;
        $waktuKodeBiling = !is_null($invoice) && !is_null($invoice->masa_kode_biling) ? $invoice->masa_kode_biling : null;
        return view('bidPrice.form_bayar', ['bidPrice' => $bidPrice, 'idProduk' => $idProduk, 'waktuKodeBiling' => $waktuKodeBiling, 'kode_tahap' => $kode_tahap, 'invoice' => $invoice, 'produk' => $produk]);
    }

    public function form_bayar(Request $request, $idProduk) {
        $dateMax = date('Y-m-d H:i:s', strtotime('+7 day', strtotime(date('Y-m-d H:i:s'))));
        if (strtotime($request->tgl) > strtotime($dateMax)) {
            return redirect()->back()->with('errMsg', 'Waktu maksimal pembayaran yaitu 7 hari dari sekarang!');
        }

        $dok = BidPrice::where('produk_id', $idProduk)->first();
        $dok->verifikasi_bayar = 1;
        $dok->tanggal_bayar = date('Y-m-d', strtotime($request->tgl));
        $dok->save();

        // ---- Push notif -----
        // get keuangan data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'keuangan')->select('users.id', 'users.name', 'role.role_name')->first();
        $produk = Produk::find($idProduk);  // get produk
        $client = User::select('id', 'nama_perusahaan')->find($produk->user_id);

        // get user_fcm_token
        $user_token = [];
        $id_penerima = $user_receiver->id;
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Form Waktu Pembayaran',
            'subtitle' => $produk->produk,
            'data' => $client->nama_perusahaan.' telah megisi form waktu pembayaran',
            'toast_msg' => $client->nama_perusahaan.' telah megisi form waktu pembayaran',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back();
    }

    public function getInvoice_create($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        $bp = BidPrice::where('produk_id', $idProduk)->first();
        if (is_null($bp)) {
            $inv = null;
        } else {
            $inv = Invoice::find($bp->invoice_id);
        }
        $no_surat_invoice = NoSurat::where('jenis', 'invoice')->select('no')->orderBy('id', 'desc')->first();
        $waktuKodeBiling = !is_null($inv) && !is_null($inv->masa_kode_biling) ? $inv->masa_kode_biling : null;
        return view('invoice.invoice', ['model' => $bp, 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'invoice' => $inv, 'waktuKodeBiling' => $waktuKodeBiling, 'kode_tahap' => $kode_tahap, 'no_surat_invoice' => $no_surat_invoice]);
    }

    public function invoice_create(Request $request, $idProduk, $user_id) {
        $user = User::find($user_id);
        $date = \Carbon\Carbon::now();
        $dok = BidPrice::where('produk_id', $idProduk)->first();
        $price = json_decode($dok->harga, true);
        $pdf = \PDF::loadView('dok.dok_invoice', ['date' => $date, 'user' => $user, 'price' => $price, 'references' => $dok->bid_price, 'tgl_pembuatan' => $date->parse($request->tgl_pembuatan), 'no_surat_invoice' => $request->no_invoice]);
        $output = $pdf->output();
        $ifile = 'Invoice-'.uniqid().''.date('YmdHis').'.pdf';
        \Storage::put('dok/invoice/'.$ifile, $output);
        
        $invoice = new Invoice;
        $invoice->invoice = $ifile;
        $invoice->tgl_pembuatan = date('Y-m-d', strtotime($request->tgl_pembuatan));
        $invoice->doc_maker = \Auth::user()->id;
        $invoice->save();

        $dok->invoice_id = $invoice->id;
        $dok->save();

        $no_surat = new NoSurat;
        $no_surat->jenis = 'invoice';
        $no_surat->dok = $ifile;
        $no_surat->no = $request->no_invoice;
        $no_surat->save();

        return redirect()->back();
    }

    public function upload_invoiceBBK(Request $request, $idProduk) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'invoice' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file harus pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $user = User::find($request->user_id);
        $produk = Produk::find($idProduk);
        $bp = BidPrice::where('produk_id', $idProduk)->first();
        $invoice = Invoice::find($bp->invoice_id);

        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('invoice');
        $fileName = 'Invoice-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        if (\Storage::exists('dok/invoice/'.$invoice->invoice)) {
            \Storage::delete('dok/invoice/'.$invoice->invoice);
        }
        $file->storeAs('dok/invoice', $invoice->invoice);

        $no_surat = NoSurat::where('dok', $invoice->invoice)->first();
        $no_surat->dok = $fileName;
        $no_surat->save();

        $invoice->invoice = $fileName;
        $invoice->status = 1;
        $invoice->save();

        return redirect()->back();
    }

    public function kode_biling_upload(Request $request, $idProduk, $user_id) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'kb' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file harus pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $file = $request->file('kb');
        $fileName = 'Kode_Biling-'.uniqid().''.date('YmdHis').'.pdf';
        $file->storeAs('dok/kodeBiling', $fileName);

        $bidPrice = BidPrice::where('produk_id', $idProduk)->select('invoice_id')->first();
        $invoice = Invoice::find($bidPrice->invoice_id);
        $invoice->kode_biling = $fileName;
        $invoice->masa_kode_biling = date('Y-m-d H:i:s', strtotime('+7 day', strtotime($request->waktuKb)));
        $invoice->save();

        $produk = Produk::find($idProduk);
        $produk->kode_tahap = 15;
        $produk->save();

        // ---- Push notif -----
        // get client data
        $receiver = User::select('id', 'nama_perusahaan')->find($produk->user_id);

        // get user_fcm_token
        $user_token = [];
        $id_penerima = $receiver->id;
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Pembuatan Invoice dan Kode Biling',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Keuangan telah membuat Invoice dan Kode Biling',
            'toast_msg' => 'Seksi Keuangan telah membuat Invoice dan Kode Biling',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back();
    }

    public function getBukti($idProduk) {
        $produk = Produk::find($idProduk);
        $bidPrice = BidPrice::where('produk_id', $produk->id)->first();
        if (!is_null($bidPrice)) {
            $invoice = Invoice::where('id', $bidPrice->invoice_id)->first();
        } else {
            $invoice = null;
        }
        $kode_tahap = $produk->kode_tahap;
        $waktuKodeBiling = !is_null($invoice) && !is_null($invoice->masa_kode_biling)  ? $invoice->masa_kode_biling : null;
        return view('bidPrice.bukti_bayar', ['model' => $bidPrice, 'invoice' => $invoice, 'waktuKodeBiling' => $waktuKodeBiling, 'kode_tahap' => $kode_tahap, 'idProduk' => $idProduk, 'produk' => $produk]);
    }

    public function bukti_bayar(Request $request, $id) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'bbyr' => 'required|max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
        ],[
            'max' => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes' => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $file = $request->file('bbyr');
        $fileName = 'Bukti_pembayaran-'.uniqid().''.date('YmdHis').'.pdf';
        $file->storeAs('dok/buktiBayar', $fileName);

        $bidPrice = BidPrice::where('produk_id', $id)->first();
        $bidPrice->bukti_bayar = $fileName;
        $bidPrice->save();

        // ---- Push notif -----
        // get keuangan data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'keuangan')->select('users.id', 'users.name', 'role.role_name')->first();
        $produk = Produk::find($id);  // get produk
        $client = User::select('id', 'nama_perusahaan')->find($produk->user_id);

        // get user_fcm_token
        $user_token = [];
        $id_penerima = $user_receiver->id;
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Upload Bukti Pembayaran',
            'subtitle' => $produk->produk,
            'data' => $client->nama_perusahaan.' telah men-upload Bukti Pembayaran',
            'toast_msg' => $client->nama_perusahaan.' telah men-upload Bukti Pembayaran',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back();
    }

    public function kbiling_upload(Request $request, $idInvoice, $produk_id) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'kb' => 'required|max:2000|mimes:pdf',
        ],[
            'max' => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes' => 'Extensi file yang diperbolehkan: pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}
        $invoice = Invoice::find($idInvoice);
        if (\Storage::exists('dok/kodeBiling/'.$invoice->kode_biling)) {
            \Storage::delete('dok/kodeBiling/'.$invoice->kode_biling);
        }
        $file = $request->file('kb');
        $fileName = 'Kode_Biling-'.uniqid().''.date('YmdHis').'.pdf';
        $file->storeAs('dok/kodeBiling', $fileName);

        $invoice->kode_biling = $fileName;
        $invoice->masa_kode_biling = date('Y-m-d H:i:s', strtotime('+7 day', strtotime(date('Y-m-d H:i:s'))));
        
        $invoice->save();

        // ---- Push notif -----
        // get client data
        $produk = Produk::find($produk_id)->first();
        $receiver = User::select('id', 'nama_perusahaan')->find($produk->user_id);

        // get user_fcm_token
        $user_token = [];
        $id_penerima = $receiver->id;
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Pembuatan Kode Biling',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Keuangan telah membuat Kode Biling baru',
            'toast_msg' => 'Seksi Keuangan telah membuat Kode Biling baru',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back();
    }

    public function apprv_buktiB(Request $request, $id) {
        $bidPrice = BidPrice::where('produk_id', $id)->first();
        $bidPrice->apprv_bukti_bayar = 1;
        $bidPrice->save();

        $produk = Produk::find($id);
        $produk->kode_tahap = 16;
        $produk->save();

        return redirect()->back();
    }

    public function upload_bpn(Request $request, $idProduk) {
        // validasi extensi file upload        
        $d = \Validator::make($request->file(), [
            'bpn' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file harus pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $file = $request->file('bpn');
        $fileName = 'BPN-'.uniqid().''.date('YmdHis').'.pdf';
        $file->storeAs('dok/BPN', $fileName);

        $bidPrice = BidPrice::where('produk_id', $idProduk)->first();
        $bidPrice->bpn = $fileName;
        $bidPrice->kode_ntpn = $request->kode_ntpn;
        $bidPrice->apprv_bukti_bayar = 1;
        $bidPrice->tgl_byr_keuangan = date('Y-m-d', strtotime($request->tgl_byr));
        $bidPrice->save();

        $produk = Produk::find($idProduk);
        $produk->kode_tahap = 16;
        $produk->save();

        // ---- Push notif -----
        // get keuangan data
        $user_receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'sertifikasi')->select('users.id', 'users.name', 'role.role_name')->first();
        $produk = Produk::find($idProduk);  // get produk
        $client = User::select('id', 'nama_perusahaan')->find($produk->user_id);

        // get user_fcm_token
        $user_token = [];
        $id_penerima = $user_receiver->id;
        $tokens = PushSubscriptions::where('user_id', $id_penerima)->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Bukti Pembayaran Client',
            'subtitle' => $produk->produk,
            'data' => 'Bukti Pembayaran '.$client->nama_perusahaan.' telah selesai',
            'toast_msg' => 'Bukti Pembayaran '.$client->nama_perusahaan.' telah selesai',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

        return redirect()->back();
    }
}
