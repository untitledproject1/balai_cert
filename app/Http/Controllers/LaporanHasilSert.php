<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanSert;
use App\User;
use App\Produk;
use App\TahapSert;
use App\AuditSamplingPlan;
use App\Role;
use App\Sert;
use Illuminate\Support\Arr;
use \Carbon\Carbon;

class LaporanHasilSert extends Controller
{
    // public function index($id, $idProduk) {
    // 	$user = User::find($id);
    //     $produk = Produk::where('id', $idProduk)->first();
    //     if (is_null($user) || is_null($produk)) {
    //         return redirect()->back();
    //     }
    //     $samplingPlan = AuditSamplingPlan::where('produk_id', $idProduk)->first();
    //     $dok = LaporanSert::where('produk_id', $idProduk)->first();
    // 	return view('lapSert.lapSert', ['user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'dok' => $dok, 'samplingPlan' => $samplingPlan]);
    // }

    public function kelengDatSert(Request $request, $idProduk) {
        $dbSert = Sert::where('produk_id', $idProduk)->first();
        if (!is_null($dbSert)) {
            $sert = $dbSert;
        } else {
            $sert = new Sert;
            $sert->produk_id = $idProduk;
        }
        $sert->nomor = $request->no_sert;
        $sert->merek = $request->merek;
        $sert->tipe_jenis = $request->tipe;
        $sert->regulasi_skema = $request->regulasi;
        $sert->skema_sert = $request->skema_sert;
        $sert->save();

        return redirect()->back()->with('msg', 'Form Kelengkapan Data Sertifikat Client berhasil diisi!');
    }

    public function upload(Request $request, $idProduk) {
    	// $dok1 = 'SHU-'.uniqid().'.'.$request->shu->extension();
    	// $dok2 = 'BAPC-'.uniqid().'.'.$request->bapc->extension();
    	// $dok3 = 'Closed_NCR-'.uniqid().'.'.$request->cncr->extension();

    	// $request->shu->storeAs('dok/shu', $dok1);
    	// $request->bapc->storeAs('dok/bapc', $dok2);
    	// $request->cncr->storeAs('dok/closedNCR', $dok3);

    	$dok = LaporanSert::where('produk_id', $idProduk)->first();
        // $dok->produk_id = $idProduk;
    	// $dok->shu = $dok1;
    	// $dok->bapc = $dok2;
    	// $dok->closed_ncr = $dok3;
        $dok->kelengkapan_dok = 1;
    	$dok->save();

    	return redirect()->back();
    }

    public function async_shu_upload(Request $request) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'file' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return response()->json(['success' => false, 'data' => $d->errors()->first()]);}

        $idProduk = $request->produk_id == 'null' ? null : intval($request->produk_id);
        $user_id = $request->user == 'null' ? null : intval($request->user);

        $lapSert = LaporanSert::where('produk_id', $idProduk)->first();
        if (!is_null($lapSert)) {
            $dok = $lapSert;
        } else {
            $dok = new LaporanSert;
            $dok->produk_id = $idProduk;
            $dok->doc_maker = \Auth::user()->id;
        }

        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('file');
        $fieldName = $request->fieldName;
        $fileName = $fieldName.'-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->extension();
        $dir = $fieldName;
        if ($fieldName == 'closed_ncr') {
            $dir = 'closedNCR';
        }

        $file->storeAs('dok/'.$dir, $fileName);
        if (\Storage::exists('dok/'.$dir.'/'.$dok->$fieldName)) {
            \Storage::delete('dok/'.$dir.'/'.$dok->$fieldName);
        }

        $dok->$fieldName = $fileName;
        $dok->save();

        $audit = false;
        if (!is_null($dok->shu) && !is_null($dok->bapc) && !is_null($dok->closed_ncr)) {
            $audit = true;
        }

        return response()->json(['success' => true, 'data' => $fileName, 'audit' => $audit]);
    }

    public function create(Request $request, $idProduk, $user_id) {
		$dok = LaporanSert::where('produk_id', $idProduk)->first();
        $date = Carbon::now();
        $tgl1 = \AppHelper::instance()->parseDate($request->tgl1);
        $tgl2 = \AppHelper::instance()->parseDate($request->tgl2);
        $produk = Produk::find($idProduk);
        $user = User::find($user_id);
        $data = [
            'hasilA' => null,
            'verif' => null,
            'bapc' => null,
            'hasilP' => null
        ];

        $tgl_audit = $tgl1->day.'-'.$tgl2->day.' '.$tgl2->monthName.' '.$tgl2->year;
    	$pdf = \PDF::loadView('dok.lapSertDok', ['produk' => $produk, 'date' => $date, 'user' => $user, 'data' => $data, 'tgl_audit' => $tgl_audit, 'tim_audit' => $request->tim_audit, 'rekomendasi' => null, 'keputusan' => null ]);
    	$output = $pdf->output();
    	$fileName = 'Laporan_Hasil_Sertifikasi-'.uniqid().''.date('YmdHis').'.pdf';
        \Storage::put('dok/lapSert/'.$fileName, $output);

		$dok->laporan_hasil_sert = $fileName;
        $dok->tanggal_audit = $tgl_audit;
        $dok->tim_audit = $request->tim_audit;
		$dok->save();

		return redirect()->back();
    }

    public function getRekomendasi($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        $dok = LaporanSert::where('produk_id', $idProduk)->first();
        $cr_user = \Auth::user();
        $tim_teknis = \DB::table('users')->select('id', 'name')->where('role_id', $cr_user->role_id)->get();
        $cek = function($id, $dok) {
        	if (!is_null($dok) && !is_null($dok->input_tt)) {
        		foreach (json_decode($dok->input_tt, true) as $key => $value) {
	                if ($value['id'] == $id) {
	                    return true;
	                }
	            }
        	}
            return false;
        };
        return view('lapSert.rekomendasiRapat', ['user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'dok' => $dok, 'kode_tahap' => $kode_tahap, 'tim_teknis' => $tim_teknis, 'cek' => $cek, 'cr_user' => $cr_user]);
    }

    public function rekomendasi(Request $request, $idProduk, $user_id) {
        $tTeknis = \Auth::user();
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $date = Carbon::now();
    	$dok = LaporanSert::where('produk_id', $idProduk)->first();

    	if (!is_null($dok->input_tt)) {
    		$rek = json_decode($dok->input_tt, true);
    		array_push($rek, ["id"=>$tTeknis->id,"nama"=>$tTeknis->name,"rekomendasi"=>$request->rek]);
            $rekDB = json_encode($rek);
    	} else {
    		$rek = [["id"=>$tTeknis->id,"nama"=>$tTeknis->name,"rekomendasi"=>$request->rek]];
    		$rekDB = json_encode($rek);
    	}
    	$dok->input_tt = $rekDB;
        $dataLapSert = [
            'hasilA' => $dok->hasil_assesmen,
            'verif' => $dok->verifikasi,
            'bapc' => $dok->bapc_lap,
            'hasilP' => $dok->hasil_pengujian
        ];

    	$pdf = \PDF::loadView('dok.lapSertDok', ['user' => $user, 'produk' => $produk, 'date' => $date, 'rekomendasi' => $rek, 'data' => $dataLapSert, 'tgl_audit' => $dok->tanggal_audit, 'tim_audit' => $dok->tim_audit]);
    	$output = $pdf->output();
    	$fileName = 'Laporan_Hasil_Sertifikasi-'.uniqid().''.date('YmdHis').'.pdf';

    	if (\Storage::exists('dok/lapSert/'.$dok->laporan_hasil_sert)) {
            \Storage::delete('dok/lapSert/'.$dok->laporan_hasil_sert);
        }
        \Storage::put('dok/lapSert/'.$fileName, $output);

		$dok->laporan_hasil_sert = $fileName;
		$dok->save();

		return redirect()->back();
    }

    public function getKeputusan($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
        $dok = LaporanSert::where('produk_id', $idProduk)->first();
        
        // $tim_teknisRole = Role::where('role', 'tim_teknis')->orWhere('role', 'komite_timTeknis')->get();
        // $dbTim_teknis = \DB::table('users')->select('id', 'name', 'role_id')->where('role_id', $tim_teknisRole[0]->id)->orWhere('role_id', $tim_teknisRole[1]->id)->get();
        // $timT = [];
        // $komite_timT = [];
        // foreach ($dbTim_teknis as $key => $value) {
        // 	if ($value->role_id == $tim_teknisRole[0]->id) {
        // 		array_push($timT, $value);
        // 	} else {
        // 		array_push($komite_timT, $value);
        // 	}
        // }
        // $cek = function($id, $dok, $komite) {
        // 	$input_tt = $komite ? $dok->input_evaluasi_tt : $dok->input_tt;
        // 	if (!is_null($dok) && !is_null($input_tt)) {
        // 		foreach (json_decode($input_tt, true) as $key => $value) {
	       //          if ($value['id'] == $id) {
	       //              return true;
	       //          }
	       //      }
        // 	}
        //     return false;
        // };
        // $cr_user = \Auth::user();
        // $jumlahIsi = count(json_decode($dok->input_tt, true));
        return view('lapSert.keputusanRapat', ['user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'dok' => $dok, 'kode_tahap' => $kode_tahap]);
    }

    public function keputusan(Request $request, $idProduk, $user_id) {
        $dok = LaporanSert::where('produk_id', $idProduk)->first();
    	// $rek = json_decode($dok->input_tt, true);
    	$komiteTeknis = \Auth::user()->name;
        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $rek = $dok->rekomendasi;
        $date = Carbon::now();
    	// if (!is_null($dok->input_evaluasi_tt)) {
    	// 	$kep = json_decode($dok->input_evaluasi_tt, true);
    	// 	array_push($kep, ["id"=>$komiteTeknis->id,"nama"=>$komiteTeknis->name,"keputusan"=>$request->kep]);
     //        $kepDB = json_encode($kep);
    	// } else {
    	// 	$kep = [["id"=>$komiteTeknis->id,"nama"=>$komiteTeknis->name,"keputusan"=>$request->kep]];
    	// 	$kepDB = json_encode($kep);
    	// }
    	// $dok->input_evaluasi_tt = $kepDB;
        $dataLapSert = [
            'hasilA' => $dok->hasil_assesmen,
            'verif' => $dok->verifikasi,
            'bapc' => $dok->bapc_lap,
            'hasilP' => $dok->hasil_pengujian
        ];

        $kep = [];
        $kep['nama'] = $komiteTeknis;
        $kep['keputusan'] = $request->kep;
    	$pdf = \PDF::loadView('dok.lapSertDok', ['produk' => $produk, 'user' => $user, 'date' => $date, 'rekomendasi' => $rek, 'keputusan' => $kep, 'data' => $dataLapSert, 'tgl_audit' => $dok->tanggal_audit, 'tim_audit' => $dok->tim_audit]);
    	$output = $pdf->output();
    	$fileName = 'Laporan_Hasil_Sertifikasi-'.uniqid().''.date('YmdHis').'.pdf';
        if (\Storage::exists('dok/lapSert/'.$dok->laporan_hasil_sert)) {
            \Storage::delete('dok/lapSert/'.$dok->laporan_hasil_sert);
        }
        \Storage::put('dok/lapSert/'.$fileName, $output);

		$dok->laporan_hasil_sert = $fileName;
        $dok->input_evaluasi_tt = $request->kep;
        $dok->signed_lapSert = 2;
		$dok->save();

        $dbTim_teknis = \DB::table('users')->select('id')->where('role_id', $user->role_id)->get();

		return redirect()->back();
    }

    public function isi_dataLapSert($id, $idProduk) {
        $user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
        if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;

        // $tim_teknisRole = Role::where('role', 'tim_teknis')->orWhere('role', 'komite_timTeknis')->get();
        // $dbTim_teknis = \DB::table('users')->select('id', 'name', 'role_id')->where('role_id', $tim_teknisRole[0]->id)->orWhere('role_id', $tim_teknisRole[1]->id)->get();
        // $timT = [];
        // $komite_timT = [];
        // foreach ($dbTim_teknis as $key => $value) {
        //     if ($value->role_id == $tim_teknisRole[0]->id) {
        //         array_push($timT, $value);
        //     } else {
        //         array_push($komite_timT, $value);
        //     }
        // }
        // $cek = function($id, $dok, $komite) {
        //     $input_tt = $komite ? $dok->input_evaluasi_tt : $dok->input_tt;
        //     if (!is_null($dok) && !is_null($input_tt)) {
        //         foreach (json_decode($input_tt, true) as $key => $value) {
        //             if ($value['id'] == $id) {
        //                 return true;
        //             }
        //         }
        //     }
        //     return false;
        // };
        // $jumlahTimTeknis = count($timT);

        $lapSert = LaporanSert::where('produk_id', $idProduk)->first();
        // $rekTimTeknis = !is_null($lapSert) ? count(json_decode($lapSert->input_tt)) : 0;

        return view('lapSert.isi_dataLapSert', ['user' => $user, 'produk' => $produk, 'idProduk' => $idProduk, 'user_id' => $id, 'kode_tahap' => $kode_tahap, 'lapSert' => $lapSert]);
    }

    public function post_dataLapSert(Request $request, $idProduk, $user_id) {
        $user = User::find($user_id);
        $produk = Produk::where('id', $idProduk)->first();
        $lapSert = LaporanSert::where('produk_id', $idProduk)->first();

        $date = Carbon::now();
        $rekomendasi = !is_null($request->rekomendasi) ? $request->rekomendasi : '';
        $keputusan = null;

        $dataLapSert = [
            'hasilA' => $request->hasilA,
            'verif' => $request->verif,
            'bapc' => $request->bapc,
            'hasilP' => $request->hasilP
        ];
        $pdf = \PDF::loadView('dok.lapSertDok', ['produk' => $produk, 'user' => $user, 'date' => $date, 'rekomendasi' => $rekomendasi, 'keputusan' => $keputusan, 'data' => $dataLapSert, 'tgl_audit' => $lapSert->tanggal_audit, 'tim_audit' => $lapSert->tim_audit]);
        $output = $pdf->output();
        $fileName = 'Laporan_Hasil_Sertifikasi-'.uniqid().''.date('YmdHis').'.pdf';
        if (\Storage::exists('dok/lapSert/'.$lapSert->laporan_hasil_sert)) {
            \Storage::delete('dok/lapSert/'.$lapSert->laporan_hasil_sert);
        }
        \Storage::put('dok/lapSert/'.$fileName, $output);

        $lapSert->laporan_hasil_sert = $fileName;
        $lapSert->hasil_assesmen = $request->hasilA;
        $lapSert->verifikasi = $request->verif;
        $lapSert->bapc_lap = $request->bapc;
        $lapSert->hasil_pengujian = $request->hasilP;
        $lapSert->rekomendasi = $rekomendasi;
        $lapSert->status_timTeknis = 2;
        $lapSert->save();

        return redirect()->back()->with('successMsg', 'Data kelengkapan Laporan Hasil Sertifikasi berhasil diisi!');
    }

    public function kelengkapan_lapSert(Request $request, $idProduk, $user_id) {
        $lapSert = LaporanSert::where('produk_id', $idProduk)->first();
        $lapSert->status_timTeknis = 1;
        $lapSert->save();

        return redirect()->back();
    }

    public function signedLapSert(Request $request, $idProduk, $user_id) {
        $lapSert = LaporanSert::where('produk_id', $idProduk)->first();
        $fileName = 'Laporan_Hasil_Sertifikasi-'.uniqid().'.'.$request->signed_dok->extension();
        $request->signed_dok->storeAs('dok/lapSert', $fileName);
        if (\Storage::exists('dok/lapSert/'.$lapSert->laporan_hasil_sert)) {
            \Storage::delete('dok/lapSert/'.$lapSert->laporan_hasil_sert);
        }

        $lapSert->laporan_hasil_sert = $fileName;
        $lapSert->signed_lapSert = 1;
        $lapSert->save();

        $produk = Produk::find($idProduk);
        $produk->kode_tahap = 20;
        $produk->save();

        return redirect()->back();
    }

    public function async_audit_upload(Request $request) {
        // validasi extensi file upload
        $d = \Validator::make($request->file(), [
            'file' => 'required|max:2000|mimes:pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
            'mimes'      => 'Extensi file yang diperbolehkan: png, jpeg, jpg, pdf, docx, doc',
        ]);
        if ($d->fails()) {return response()->json(['success' => false, 'data' => $d->errors()->first()]);}

        $idProduk = $request->produk_id == 'null' ? null : intval($request->produk_id);
        $user_id = $request->user == 'null' ? null : intval($request->user);

        $dbTinjauanPP = AuditSamplingPlan::where('produk_id', $idProduk)->first();
        if (!is_null($dbTinjauanPP)) {
            $dok = $dbTinjauanPP;
        } else {
            $dok = new AuditSamplingPlan;
            $dok->produk_id = $idProduk;
        }

        $user = User::find($user_id);
        $produk = Produk::find($idProduk);
        $nama_perusahaan = implode('_', explode(' ', $user->nama_perusahaan));
        $nama_produk = implode('_', explode(' ', $produk->produk));

        $file = $request->file('file');
        $fieldName = $request->fieldName;
        $fileName = $fieldName.'-'.$nama_perusahaan.'-'.$nama_produk.'-'.uniqid().'.'.$file->extension();
        if ($fieldName == 'audit_plan') {
            $dir = 'auditPlan';
        } elseif ($fieldName == 'sampling_plan') {
            $dir = 'samplingPlan';
        }
        $file->storeAs('dok/'.$dir, $fileName);
        if (\Storage::exists('dok/'.$dir.'/'.$dok->$fieldName)) {
            \Storage::delete('dok/'.$dir.'/'.$dok->$fieldName);
        }

        $dok->$fieldName = $fileName;
        $dok->save();

        $audit = false;
        if (!is_null($dok->audit_plan) && !is_null($dok->sampling_plan)) {
            $audit = true;
        }

        return response()->json(['success' => true, 'data' => $fileName, 'audit' => $audit]);
    }
}
