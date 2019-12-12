<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Arr;
use App\Http\Requests\ApplySA;
use App\Notifications\ApplySaNotif;
use App\Persyaratan_dalam_negeri;
use App\Persyaratan_luar_negeri;
use App\DokImportir;
use App\DokManufaktur;
use App\Mou;
use App\User;
use App\Role;
use App\Produk;
use App\TahapSert;
use App\InfoTambahan;
use App\Kuesioner;
use App\BahanHasil;
use App\SpekPembelian;
use App\Peralatan;
use App\ReviewDokImportir;
use App\FormatFile;

class SAController extends Controller
{
    protected function dok($idProduk) {
        $model = \Auth::user()->negeri == '1' ? new Persyaratan_dalam_negeri : new Persyaratan_luar_negeri;
        return $model->where('produk_id', $idProduk)->first();
    }
    public function list_produk() {
        $produk = \Auth::user()->produk_client();
        return view('list_produk.list_produk', ['produk' => $produk]);
    }

    public function newSA() {
        $user = \Auth::user();
        if ($user->total_available_cert() == 0) {
            abort(404);
        }
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
        $cekDok = function($listDok, $dok) {
            $list = json_decode($listDok);
            foreach ($list as $key => $value) {
                if ($value == $dok) {
                    return true;
                }
            }
            return false;
        };

        return view('applySA.applySA', ['dok' => null, 'dokImportir' => null, 'dokManufaktur' => null, 'infoDB' => null, 'pesan' => null, 'kuesioner' => null, 'bahanHasil' => null, 'isi' => $isi, 'cekOpsi' => $cekOpsi, 'spekP' => null, 'alat' => null, 'kode_tahap' => null, 'idProduk' => null, 'user' => $user, 'produk' => null, 'cekDok' => $cekDok]);
    }

    public function sa($idProduk) {
        $getDoc = $this->dok($idProduk);
        $dok = is_null($getDoc) ? null : $getDoc;
        $user = \Auth::user();
        $negeri = $user->negeri;

        $produk = \DB::table('produk')->select('kode_tahap', 'produk', 'jenis_produk')->where('id', $idProduk)->first();
        $dokImportir = !is_null($dok) && $negeri == '2' ? $dok->dok_importir()->first() : null;
        $dokManufaktur = !is_null($dok) && $negeri == '2' ? $dok->dok_manufaktur()->first() : null;
        $infoDB = InfoTambahan::where('produk_id', $idProduk)->first();
        $pesan = !is_null($dok) && !is_null($dok->pesan_form_kuesioner) ? $dok->pesan_form_kuesioner : null;
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
        $formatFile = FormatFile::where('format', 'Surat Permohonan F.03.01')->first();

        return view('applySA.applySA', compact('dok', 'dokImportir', 'dokManufaktur', 'infoDB', 'isi', 'cekOpsi', 'pesan', 'kuesioner', 'bahanHasil' , 'spekP', 'alat', 'idProduk', 'infoIsi', 'user', 'cekDok'), ['kode_tahap' => $produk->kode_tahap, 'produk' => $produk, 'formatFile' => $formatFile]);
    }
    public function applySA(Request $request) {
        // validasi extensi file upload
        // $d = \Validator::make($request->file(), [
        //     'dok.*' => 'required|max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
        // ],[
        //     'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
        //     'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        // ]);
        // if ($d->fails()) {return redirect()->back()->withErrors($d);}
        $user = \Auth::user();
        $currentProduct = $user->currentProduct();
        if (is_null($currentProduct)) {
            $produk = new Produk;
            $produk->user_id = $user->id;
            $available_product = false;
        } else {
            $produk = $currentProduct;
            $available_product = true;
        }
        $produk->produk = $request->produk;
        $produk->jenis_produk = $request->jenis_produk;
        $produk->save();
        $msg = 'Produk berhasil diisi!';

        $produkName = !is_null($currentProduct) ? $currentProduct->produk : $produk->produk;
        $idProduk = !is_null($currentProduct) ? $currentProduct->id : $produk->id;
        $currentDoc = $this->dok($idProduk);
        $infoDB = InfoTambahan::where('produk_id', $idProduk)->first();
        $kuisDB = Kuesioner::where('produk_id', $idProduk)->first();
        $bHasilDB = BahanHasil::where('produk_id', $idProduk)->first();

        if ($available_product) {
            if (!is_null($currentDoc)) {
                $dok = $currentDoc;
            } else {
                $dok = new Persyaratan_dalam_negeri;
                $dok->produk_id = $idProduk;
            }
            // if (!is_null($request->file('dok')) && count($request->file('dok')) != 0) {
            //     $fn = [];
            //  $fieldName = [];
            //  for ($i=0;$i<count($request->file('dok'));$i++) {
            //         if (isset($request->file('dok')[$i])) {
            //        array_push($fieldName, $request->fileName[$i]);
            //        array_push($fn, date('YmdHis').''.uniqid().'.'.$request->file('dok')[$i]->getClientOriginalExtension());
            //           $request->file('dok')[$i]->storeAs('dok/sa', $fn[$i]);
            //         }
            //  }
            //  foreach ($fieldName as $key => $value) {
            //      $dok->$value = $fn[$key];
            //  }

            // }
            
            if (!is_null($currentProduct) && $request->form_action == 'true') {
                $msg = 'Form Apply SA telah di-simpan';
            } elseif (!is_null($currentProduct) && $request->form_action == 'false') {
                $msg = 'Form Apply SA telah di-submit';
                $dok->sni = 3;
            }
            
            if ( (!is_null($infoDB) && $infoDB->lengkap !== 1) || is_null($infoDB)) {
                // dd();
                $formKuesioner = Arr::except($request->all(), ['_token', 'fileName', 'dok']);
                $model = new Persyaratan_dalam_negeri;
                $model->info_tambahan($formKuesioner, $idProduk, new InfoTambahan, $request->form_action);
                $model->kuesioner($formKuesioner, $idProduk, new Kuesioner, $request->form_action);
                $model->bahan_hasil($formKuesioner, $idProduk, new BahanHasil, $request->form_action);
            }

            $dok->save();
        }

    	return redirect('/sa/'.$idProduk)->with('msg', $msg);
    }
    public function applySAluar(Request $request, Persyaratan_luar_negeri $model) {
        $d = \Validator::make($request->file(), [
            'dok.*' => 'required|max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file harus: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}
        
        // filter dok sesuai tabel DB
        $arr = [
            [new DokImportir, 'dokImportir'],
            [new DokManufaktur, 'dokManufaktur']
        ];
        foreach ($request->fileName as $key => $value) {
            if (explode(',', $value)[1] == 'dokImportir') {$index = 0;}
            else {$index = 1;}
            $review = isset($request->review[$key]) ? $request->review[$key] : null;
            array_push($arr[$index], [explode(',', $value)[0], $request->dok[$key], $review]);
        }
        // input produk
        $produk = \Auth::user()->produk();
        if (is_null($produk)) {
            $produk = new Produk;
            $produk->user_id = \Auth::user()->id;
            $produk->produk = $request->produk;
            $produk->save();
        }
        // upload dok
        $dokImportirId = null;
        $dokManufakturId = null;
        $dokLuar = $this->dok()[0];
        $dokEmpty = new Persyaratan_luar_negeri;        
        foreach ($arr as $key => $value) {
            $table = $dokEmpty->getTable($value[0], $key, $dokLuar);
            for ($i=2; $i<count($value); $i++) {
                $fn = uniqid().'-'.date('YmdHis').'.'.$value[$i][1]->getClientOriginalExtension();
                $value[$i][1]->storeAs('dok/'.$value[1], $fn);
                $field = $value[$i][0];
                $table->$field = $fn;
            }  
            
            // set kelengkapan dokumen
            $table->lengkap = '3';
            $table->save();
            // set dok_importir_id dan dok_manufaktur_id foreign key
            if ($key == 1) {$dokImportirId = $table->id;}
            elseif ($key == 2) {$dokManufakturId = $table->id;}
        }
        if (!is_null($this->dok()[0])) {
            $dok = new Persyaratan_luar_negeri;
            $dok->sni = 3;
            if (is_null($this->dok()[0])) {
                $dok->produk_id = \Auth::user()->id_produk();
                $dok->dok_importir_id = $dokImportirId;
                $dok->dok_manufaktur_id = $dokManufakturId;
            }
            $dok->save();
        }
        return redirect()->back();
    }

    public function surat_sni($negeri) {
        // $user = \Auth::user();
        // $date = \Carbon\Carbon::now();
        // $pdf = \PDF::loadView('dok.dok_sni', ['user' => $user, 'date' => $date]);
        // $fileName = 'Surat_Permohonan_F.03.01.pdf';
        // return $pdf->download($fileName);
        if (\Storage::exists('dok/format_dok/surat_permohonan_sni.doc')) {
            return response()->download(storage_path('app/public/dok/format_dok/surat_permohonan_sni.doc'));
        }
    }

    public function async_sa_upload(Request $request) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'file.*' => 'required|max:5000|mimes:png,jpeg,jpg,pdf,docx,doc',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 5 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return response()->json(['success' => false, 'data' => $d->errors()->first()]);}

        $idProduk = $request->produk_id == 'null' ? null : intval($request->produk_id);
        $user_id = $request->user == 'null' ? null : intval($request->user);
        if (!is_null($this->dok($idProduk))) {
            $dok = $this->dok($idProduk);
        } else {
            $dok = new Persyaratan_dalam_negeri;
            $dok->produk_id = $idProduk;
        }
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('file');
        $fieldName = $request->fieldName;
        $fileName = $fieldName.'-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('dok/sa', $fileName);
        if (\Storage::exists('dok/sa/'.$dok->$fieldName)) {
            \Storage::delete('dok/sa/'.$dok->$fieldName);
        }

        $dok->$fieldName = $fileName;
        $dok->save();

        if (isset($request->tinjauanPP_id) && $request->tinjauanPP_id != 'null') {
            $reviewDokImportir = ReviewDokImportir::find($dok->review_dok_importir_id);
            $review = json_decode($reviewDokImportir->$fieldName, true);
            $review[0] = "ada";
            $reviewDokImportir->$fieldName = json_encode($review);
            $reviewDokImportir->save();
        }

        return response()->json(['success' => true, 'data' => $fileName]);
    }

    public function async_kuis_upload(Request $request) {
    	// validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'file.*' => 'required|max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return response()->json(['success' => false, 'data' => $d->errors()->first()]);}

        $idProduk = $request->produk_id == 'null' ? null : intval($request->produk_id);
    	$user_id = $request->user == 'null' ? null : intval($request->user);
    	$dbKuis = Kuesioner::where('produk_id', $idProduk)->first();
    	if (!is_null($dbKuis)) {
    		$kuis = $dbKuis;
    	} else {
    		$kuis = new Kuesioner;
    		$kuis->produk_id = $idProduk;
    	}
    	$user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('file');
        $fieldName = $request->fieldName;
        $fileName = $request->kuisFileName.'-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        $isi = function($db, $field, $index) {
            $fd = $field;
            $data = !is_null($db) && !is_null($db->$fd) ? json_decode($db->$fd)[$index] : null;
            return $data;
        };

        $file->storeAs('dok/dokKuesioner/'.$request->kuisDirect.'', $fileName);
        if (\Storage::exists('dok/dokKuesioner/'.$request->kuisDirect.'/'.$isi($kuis, $kuis->fieldName, 1))) {
            \Storage::delete('dok/dokKuesioner/'.$request->kuisDirect.'/'.$isi($kuis, $kuis->fieldName, 1));
        }

        $kuis->$fieldName = json_encode([null, $fileName]);
        $kuis->save();

        return response()->json(['success' => true, 'data' => $fileName]);
    }

    public function async_bHasil_upload(Request $request) {
    	// validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'file.*' => 'required|max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return response()->json(['success' => false, 'data' => $d->errors()->first()]);}

        $idProduk = $request->produk_id == 'null' ? null : intval($request->produk_id);
    	$user_id = $request->user == 'null' ? null : intval($request->user);
    	$dbKuis = BahanHasil::where('produk_id', $idProduk)->first();
    	if (!is_null($dbKuis)) {
    		$kuis = $dbKuis;
    	} else {
    		$kuis = new BahanHasil;
    		$kuis->produk_id = $idProduk;
    	}
    	$user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('file');
        $fieldName = $request->fieldName;
        $fileName = $request->kuisFileName.'-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        $isi = function($db, $field, $index) {
            $fd = $field;
            $data = !is_null($db) && !is_null($db->$fd) ? json_decode($db->$fd)[$index] : null;
            return $data;
        };

        $file->storeAs('dok/dokKuesioner/'.$request->kuisDirect.'', $fileName);
        if (\Storage::exists('dok/dokKuesioner/'.$request->kuisDirect.'/'.$isi($kuis, $kuis->fieldName, 1))) {
            \Storage::delete('dok/dokKuesioner/'.$request->kuisDirect.'/'.$isi($kuis, $kuis->fieldName, 1));
        }

        if ($fieldName == 'form_21' || $fieldName == 'form_42') {
            $kuis->$fieldName = $fileName;
        } elseif ($fieldName == 'form_524') {
            $kuis->$fieldName = json_encode([null, $fileName, null]);
        } else {
            $kuis->$fieldName = json_encode([$fileName, null]);
        }
        $kuis->save();

        return response()->json(['success' => true, 'data' => $fileName]);
    }
}