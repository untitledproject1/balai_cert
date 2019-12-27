<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalAudit;
use App\LaporanAudit;
use App\BidPrice;
use App\DokImportir;
use App\DokManufaktur;
use App\Persyaratan_dalam_negeri;
use App\TinjauanPP;
use App\ReviewDokImportir;
use App\ReviewDokManufaktur;
use App\ReviewTinjauanPP;
use App\AuditSamplingPlan;
use App\User;
use App\Produk;
use App\TahapSert;
use App\LaporanSert;
use App\InfoTambahan;
use App\Kuesioner;
use App\BahanHasil;
use App\Sert;
use App\FormatFile;

class JAController extends Controller
{
    public function index($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $formatFile = FormatFile::where('format', 'Surat Pemberitahuan Jadwal Audit')->first();
        $kode_tahap = $produk->kode_tahap;
        $laporanAudit = LaporanAudit::where('produk_id', $idProduk)->first();
        $jadwalAudit = !is_null($laporanAudit) ? $laporanAudit->jadwal_audit()->first() : null;
        $dok = BidPrice::where('produk_id', $idProduk)->first();
        return view('audit.audit', [ 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'jadwalAudit' => $jadwalAudit, 'dok' => $dok, 'kode_tahap' => $kode_tahap, 'formatFile' => $formatFile]);
    }
    public function upload(Request $request, $idProduk) {
        // validasi extensi file upload
        // php.ini
        // post_max_size => ukuran maksimum file yang dapat dihandle oleh php
        // upload_max_filesize => ukuran maksimum file untuk diupload ke server
        $d = \Validator::make($request->file(), [
            'dok' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file harus pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}
    	$file = $request->dok;
        $fileName = 'Surat_Pemberitahuan_Jadwal_Audit-'.uniqid().''.date('YmdHis').'.pdf';
    	$file->storeAs('dok/jadwalAudit', $fileName);
    	
    	$dok = new JadwalAudit;
    	$dok->jadwal_audit = $fileName;
        $dok->doc_maker = \Auth::user()->id;
    	$dok->save();

    	$la = new LaporanAudit;
        $la->produk_id = $idProduk;
    	$la->jadwal_audit_id = $dok->id;
    	$la->save();
    	return redirect()->back();
    }

    public function getDokSert($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        $getVal = function($arr) {
        	if (!is_null($arr)) {
        		return json_decode($arr, true);
        	}
        	return ['', ''];
        };
        $lpModel = new LaporanAudit;
        $laporanAudit = $lpModel->where('produk_id', $idProduk)->first();
        $dbImportir = null;
        $dbTinjauan = null;
        if (!is_null($laporanAudit)) {
            $dok_audit = $lpModel->getDocAudit($idProduk, $laporanAudit->dok_manufaktur_id, $laporanAudit->tinjauan_pp_id);
            $dbImportir = $dok_audit[0];
            // $dbManufaktur = $dok_audit[1];
            $dbTinjauan = $dok_audit[1];
        }

        $infoDB = InfoTambahan::where('produk_id', $idProduk)->first();
        $pesan = !is_null($dbImportir->pesan_form_kuesioner) ? json_decode($dbImportir->pesan_form_kuesioner) : null;
        $infoIsi = function($data) {
            return json_decode($data);
        };
        $isi = function($db, $field, $index) {
            $fd = $field;
            $data = !is_null($db) && !is_null($db->$fd) ? json_decode($db->$fd)[$index] : null;
            return $data;
        };
        $cekOpsi = function($op, $opsi) {
            if (!is_null($opsi)) {
                foreach ($opsi as $key => $value) {
                    if ($value == $op) {
                        return 1;
                    }
                }
            }
            return 0;
        };
        $kuesioner = Kuesioner::where('produk_id', $idProduk)->first();
        $bahanHasil = BahanHasil::where('produk_id', $idProduk)->first();
        $spekP = !is_null($bahanHasil) && !is_null($bahanHasil->spek_pembelian) ? json_decode($bahanHasil->spek_pembelian) : null;
        $alat = !is_null($bahanHasil) && !is_null($bahanHasil->peralatan) ? json_decode($bahanHasil->peralatan) : null;
        $cekDok = function($listDok, $dok) {
            $list = json_decode($listDok);
            if (!is_null($list)) {
                foreach ($list as $key => $value) {
                    if ($value == $dok) {
                        return true;
                    }
                }
            }
            return false;
        };
        // dd();

        return view('audit.dokSert', ['laporanAudit' => $laporanAudit, 'dokImportir' => $dbImportir, 'tinjauanPP' => $dbTinjauan, 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'kode_tahap' => $kode_tahap], compact('infoDB', 'isi', 'cekOpsi', 'pesan', 'kuesioner', 'bahanHasil' , 'spekP', 'alat', 'infoIsi', 'getVal', 'cekDok'));
    }
    public function dok_sert_produk(Request $request) {
        $laModel = new LaporanAudit;
        $laDB = $laModel->where('produk_id', $request->idProduk)->first();
        
        // filter dok sesuai tabel DB
    	$arr = $laModel->cekDokSert_arr($request);
        
        // update kolom auditor
        if (is_null($laDB->auditor)) {
            $laDB->auditor = $request->auditor;
            $laDB->tgl_audit = date('Y-m-d');
        }
        $tabelSNI = 0;
        $dok_tidak_lengkap = [];
		foreach ($arr as $key => $value) {
            $kelengkapanDocDN = 1;
            
            // ambil data dari setiap table di array 'arr'
			$table = $laModel->getTableAudit($value[0], $key, $laDB, $request->idProduk);
            
            // hapus dok jika dinyatakan tidak lengkap
            $tabelReview = $table->getReview();
            $review = !is_null($table) && !is_null($tabelReview) ? $tabelReview : $value[2];
            for ($i=5; $i < count($value); $i++) {
                $field = $value[$i][0];
				if ($value[$i][1] == 'null') {
                    if (!is_null($table) && !is_null($table->$field)) {
                        \Storage::delete('dok/'.$value[1].'/'.$table->$field);
                    }
                    array_push($dok_tidak_lengkap, $field);
					$table->$field = null;
				}
				$ket = [$value[$i][1]];
				array_push($ket, $value[$i][2] === null ? 'null' : $value[$i][2]);
				$review->$field = json_encode($ket);
			}
            // cek kelengkapan semua dok
            for ($i=5; $i < count($value); $i++) {
                // jika dok belum lengkap
                if ($value[$i][1] == 'null') {
                    $kelengkapanDocDN = 0;
                    $table->sni = 2;
                    goto save;
                }
            }
            if ($kelengkapanDocDN == 1) {
                $table->sni = 1;
                $tabelSNI += 1;
            }
            save: {
                // echo $table->sni;
                $review->save();

                // set dok tidak lengkap
                $table->dok_tidak_lengkap = count($dok_tidak_lengkap) != 0 ? json_encode($dok_tidak_lengkap) : null;

                // set review dok foreign key
                $foreignkey = $value[3];
                if (is_null($table->$foreignkey)) {
                    $table->$foreignkey = $review->id;
                }
                $table->save();

                //set dok foreign key 
                $laForeignKey = $value[4];
                if (is_null($laDB->$laForeignKey)) {
                    $laDB->$laForeignKey = $table->id;
                }
                // var_dump($dok_tidak_lengkap);
                $dok_tidak_lengkap = [];
            }
		}
        // dd();

        $laDB->ringkasan = $request->ringkasan;
        $laDB->save();
        // jika semua dok sudah lengkap
        if ($tabelSNI == count($arr)) {
            $produk = Produk::find($request->idProduk);
            $produk->kode_tahap = 18;
            $produk->save();
        }
    	return redirect()->back()->with('successMsg', 'Form berhasil diisi, tunggu kelengkapan dokumen dari client');
    }
    public function verify_dokSert($idProduk) {
        $produk = \DB::table('produk')->select('kode_tahap', 'produk', 'jenis_produk', 'request_sert')->where('id', $idProduk)->first();
        $lpModel = new LaporanAudit;
        $laporanAudit = $lpModel->where('produk_id', $idProduk)->first();
        $dokImportir = null;
        // $dokManufaktur = null;
        $tinjauanPP = null;

        if (!is_null($laporanAudit)) {
            $dok_audit = $lpModel->getDocAudit($idProduk, $laporanAudit->dok_manufaktur_id, $laporanAudit->tinjauan_pp_id);
            $dokImportir = $dok_audit[0];
            // $dokManufaktur = $dok_audit[1];
            $tinjauanPP = $dok_audit[1];
        }
        $getVal = function($arr) {
        	if (!is_null($arr)) {
        		return json_decode($arr, true);
        	}
        	return ['', ''];
        };

        $infoDB = InfoTambahan::where('produk_id', $idProduk)->first();
        $pesan = !is_null($dokImportir) && !is_null($dokImportir->pesan_form_kuesioner) ? json_decode($dokImportir->pesan_form_kuesioner) : null;
        $infoIsi = function($data) {
            return json_decode($data);
        };
        $isi = function($db, $field, $index) {
            $fd = $field;
            $data = !is_null($db) && !is_null($db->$fd) ? json_decode($db->$fd)[$index] : null;
            return $data;
        };
        $cekOpsi = function($op, $opsi) {
            if (!is_null($opsi)) {
                foreach ($opsi as $key => $value) {
                    if ($value == $op) {
                        return 1;
                    }
                }
            }
            return 0;
        };
        $kuesioner = Kuesioner::where('produk_id', $idProduk)->first();
        $bahanHasil = BahanHasil::where('produk_id', $idProduk)->first();
        $spekP = !is_null($bahanHasil) && !is_null($bahanHasil->spek_pembelian) ? json_decode($bahanHasil->spek_pembelian) : null;
        $alat = !is_null($bahanHasil) && !is_null($bahanHasil->peralatan) ? json_decode($bahanHasil->peralatan) : null;
        $cekDok = function($listDok, $dok) {
            $list = json_decode($listDok);
            if (!is_null($list)) {
                foreach ($list as $key => $value) {
                    if ($value == $dok) {
                        return true;
                    }
                }
            }
            return false;
        };

        return view('audit.kelengkapanAudit', ['laporanAudit' => $laporanAudit, 'dokImportir' => $dokImportir, 'tinjauanPP' => $tinjauanPP, 'kode_tahap' => $produk->kode_tahap, 'idProduk' => $idProduk, 'getVal' => $getVal], compact('infoDB', 'isi', 'cekOpsi', 'pesan', 'kuesioner', 'bahanHasil' , 'spekP', 'alat', 'infoIsi', 'produk', 'cekDok'));
    }

    public function dokAudit(Request $request, $idProduk) {
        $laModel = new LaporanAudit;
        $laDB = $laModel->where('produk_id', $idProduk)->first();
        // filter dok sesuai tabel DB
        $arr = $laModel->dokAudit($request);
        // $fn = [];
        $idTable = [];
        foreach ($arr as $key => $value) {
            // ambil data dari setiap table di array 'arr'
            $table = $laModel->getTableAudit($value[0], $key, $laDB, $idProduk);
            // upload dok
            $tabelReview = $table->getReview();
            $review = !is_null($table) && !is_null($tabelReview) ? $tabelReview : $value[2];
            for ($i=3; $i<count($value); $i++) {
                if (isset($value[$i][1])) {
                    // $filename = date('YmdHis').'-'.uniqid().'.'.$value[$i][1]->extension();
                    // $value[$i][1]->storeAs('dok/'.$value[1], $filename);
                    $field = $value[$i][0];
                    // $table->$field = $filename;

                    $ket = json_decode($review->$field, true);
                    $ket[0] = "ada";
                    $review->$field = json_encode($ket);
                }
            }
            $review->save();
            $table->sni = 3;
            $table->save();
            // array_push($idTable, $table->id);
        }
        // $laDB->dok_importir_id = $idTable[0];
        // $laDB->dok_manufaktur_id = $idTable[1];
        // $laDB->tinjauan_pp_id = $idTable[1];
        // $laDB->save();
        return redirect()->back();
    }

    public function async_tinjauanPP_upload(Request $request) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'file' => 'required|max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return response()->json(['success' => false, 'data' => $d->errors()->first()]);}

        $idProduk = $request->produk_id == 'null' ? null : intval($request->produk_id);
        $user_id = $request->user == 'null' ? null : intval($request->user);
        $tinjauanPP_id = $request->tinjauanPP_id == 'null' ? null : intval($request->tinjauanPP_id);
        $dbTinjauanPP = TinjauanPP::find($tinjauanPP_id);
        $reviewTinjauanPP = ReviewTinjauanPP::find($dbTinjauanPP->review_tinjauan_pp_id);

        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('file');
        $fieldName = $request->fieldName;
        $fileName = $fieldName.'-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->extension();
        $file->storeAs('dok/tinjauanPP', $fileName);
        if (\Storage::exists('dok/tinjauanPP/'.$dbTinjauanPP->$fieldName)) {
            \Storage::delete('dok/tinjauanPP/'.$dbTinjauanPP->$fieldName);
        }

        $dbTinjauanPP->$fieldName = $fileName;
        $dbTinjauanPP->save();

        $review = json_decode($reviewTinjauanPP->$fieldName, true);
        $review[0] = "ada";
        $reviewTinjauanPP->$fieldName = json_encode($review);
        $reviewTinjauanPP->save();

        return response()->json(['success' => true, 'data' => $fileName]);
    }

    public function auditPlan($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $data_sert = Sert::where('produk_id', $idProduk)->first();
        $kode_tahap = $produk->kode_tahap;
        $lpModel = new LaporanAudit;
        $laporanAudit = $lpModel->where('produk_id', $idProduk)->first();
        $dok_audit = $lpModel->getDocAudit($idProduk, $laporanAudit->dok_manufaktur_id, $laporanAudit->tinjauan_pp_id);

        $dokImportir = $dok_audit[0];
        // $dokManufaktur = !is_null($laporanAudit) ? $laporanAudit->dokManufaktur() : null;
        $tinjauanPP = $dok_audit[1];
        $samplingPlan = null;
        $dok = null;
        if(!is_null($laporanAudit) && (
            (!is_null($dokImportir) && $dokImportir->sni == 1) ||  
            (!is_null($tinjauanPP) && $tinjauanPP->sni == 1)) ) {
            $samplingPlan = AuditSamplingPlan::where('produk_id', $idProduk)->first();
            $dok = LaporanSert::where('produk_id', $idProduk)->first();
        }
        $formatFile = FormatFile::where('format', 'Audit Plan')->orWhere('format', 'Sampling Plan')->get();
        $formatFileAp = $formatFile->where('format', 'Audit Plan')->first();
        $formatFileSp = $formatFile->where('format', 'Sampling Plan')->first();

        return view('audit.audit_samplingPlan', ['user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'dokImportir' => $dokImportir, 'tinjauanPP' => $tinjauanPP, 'dok' => $dok, 'samplingPlan' => $samplingPlan, 'kode_tahap' => $kode_tahap, 'data_sert' => $data_sert, 'formatFileAp' => $formatFileAp, 'formatFileSp' => $formatFileSp]);
    }
    public function auditPlan_upload(Request $request, $idProduk) {
        // $d = \Validator::make($request->file(), [
        //     'auditPlan' => 'required|max:2000|mimes:pdf',
        //     'samplingPlan' => 'required|max:2000|mimes:pdf',
        // ],[
        //     'max'    => 'Ukuran file :attribute tidak boleh melebihi 2 megabytes',
        //     'mimes'      => 'Extensi file :attribute harus pdf',
        // ]);
        // if ($d->fails()) {return redirect()->back()->withErrors($d);}

        // $fileName1 = 'AuditPlan-'.uniqid().'.'.$request->auditPlan->extension();
        // $fileName2 = 'SamplingPlan-'.uniqid().'.'.$request->samplingPlan->extension();
        // $request->auditPlan->storeAs('dok/auditPlan', $fileName1);
        // $request->samplingPlan->storeAs('dok/samplingPlan', $fileName2);
        
        $asPlan = AuditSamplingPlan::where('produk_id', $idProduk)->first();
        $asPlan->doc_maker = \Auth::user()->id;
        $asPlan->save();

        $produk = Produk::find($idProduk);
        $produk->kode_tahap = 19;
        $produk->save();

        return redirect()->back();
    }
    public function apprv_jadwalAudit($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        $laporanAudit = LaporanAudit::where('produk_id', $idProduk)->first();
        $jadwalAudit = !is_null($laporanAudit) ? $laporanAudit->jadwal_audit()->first() : null;
        return view('audit.apprv_jadwal', [ 'user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'jadwalAudit' => $jadwalAudit, 'kode_tahap' => $kode_tahap]);
    }
    public function apprvPost(Request $request) {
        $laporanAudit = LaporanAudit::where('produk_id', $request->produkId)->first();
        $la = $laporanAudit->jadwal_audit()->first();
        if ($request->choice == '1') {
            $la->apprv = 1;
            $la->save();
            $produk = Produk::find($request->produkId);
            $produk->kode_tahap = 17;
            $produk->save();
        } else {
            if (\Storage::exists('dok/jadwalAudit/'.$la->jadwal_audit)) {
                \Storage::delete('dok/jadwalAudit/'.$la->jadwal_audit);
            }
            $la->delete();
        }
        return redirect()->back();
    }

    public function jaDownload($user_id) {
        $user = User::find($user_id);
        $date = \Carbon\Carbon::now();
        $pdf = \PDF::loadView('dok.dok_jadwal_audit', ['user' => $user, 'date' => $date]);
        return $pdf->download('Surat_Pemberitahuan_Jadwal_Audit.pdf');
    }

    public function apDownload($user_id, $idProduk) {
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $date = \Carbon\Carbon::now();
        $pdf = \PDF::loadView('dok.dok_audit_plan', ['user' => $user, 'date' => $date, 'produk' => $produk]);
        return $pdf->download('Audit_Plan.pdf');
    }

    public function spDownload($user_id, $idProduk) {
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $date = \Carbon\Carbon::now();
        $pdf = \PDF::loadView('dok.dok_audit_samplingPlan', ['user' => $user, 'date' => $date, 'produk' => $produk]);
        return $pdf->download('Samplin_Plan.pdf');
    }

    public function shuDownload($user_id, $idProduk) {
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $date = \Carbon\Carbon::now();
        $pdf = \PDF::loadView('dok.dok_shu', ['user' => $user, 'date' => $date, 'produk' => $produk]);
        return $pdf->download('Sertifikat_Hasil_Uji.pdf');
    }

    public function bapcDownload($user_id, $idProduk) {
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $date = \Carbon\Carbon::now();
        $pdf = \PDF::loadView('dok.dok_bapc', ['user' => $user, 'date' => $date, 'produk' => $produk]);
        return $pdf->download('BAPC.pdf');
    }

    public function closed_ncrDownload($user_id, $idProduk) {
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $date = \Carbon\Carbon::now();
        $pdf = \PDF::loadView('dok.dok_closed_ncr', ['user' => $user, 'date' => $date, 'produk' => $produk]);
        return $pdf->download('Closed_NCR.pdf');
    }
}