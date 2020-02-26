<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Persyaratan_dalam_negeri;
use App\Persyaratan_luar_negeri;
use App\Produk;
use App\Mou;
use App\DokImportir;
use App\DokManufaktur;
use App\TahapSert;
use App\InfoTambahan;
use Illuminate\Support\Arr;
use App\Kuesioner;
use App\BahanHasil;
use App\PushSubscriptions;

class CompanyController extends Controller
{
    public function list() {
        $roleId = Role::where('role', 'client')->first()->id;
        $client = \DB::table('users')
            ->leftJoin('produk', 'produk.user_id', '=', 'users.id')
            ->where('role_id', $roleId)
            ->select('users.id', 'users.nama_perusahaan', 'users.negeri', 'users.pimpinan_perusahaan', 'users.provinsi', 'users.kota', 'users.alamat_perusahaan', 'users.email_perusahaan', 'users.no_telp')->get();
        
        // filter data unique
        $result = collect([]);
        foreach ($client as $key => $value) {
        	$double = 0;
        	foreach ($result as $key2 => $item) {
        		if ($value->id == $item->id) {
        			$double += 1;
        		}
        	}
        	if ( $double == 0 ) {
                $value->jumlah_produk = 0;
	        	$result->push($value);
        	}
        }

        // set jumlah produk
        foreach ($client as $key => $value) {
            foreach ($result as $key2 => $item) {
                if ($value->id == $item->id) {
                    $result[$key2]->jumlah_produk += 1;
                }
            }
        }

        return view('company.company_list', ['client' => $result]);
    }

    public function cert_list($status) {
        $operator = $status == 'history' ? '=' : '!=';
        $card_header = $status == 'history' ? 'Riwayat Sertifikasi Produk' : 'Sertifikasi Yang Sedang Berjalan';

        $client = \DB::table('users')
            ->leftJoin('produk', 'produk.user_id', '=', 'users.id')
            ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
            ->where('produk', '!=', null)
            ->where('produk.kode_tahap', $operator, 24)
            ->select('users.id', 'users.nama_perusahaan', 'users.negeri', 'users.pimpinan_perusahaan', 'users.provinsi', 'users.kota', 'users.alamat_perusahaan', 'users.email_perusahaan', 'users.no_telp', 'master_tahap.tahapan', 'master_tahap.kode_tahap', 'produk.produk', 'produk.jenis_produk', 'produk.id as produk_id', 'produk.updated_at', 'produk.created_at')->get();
        
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

        if ($status == 'history') {
        	$result = $unique;
        } else {
            $roleDB = \Auth::user()->role()->first();
            $role = $roleDB->id;
            $group_tahap = \DB::table('group_tahapan')->get();
            // dd($group_tahap);

        	// filter data sesuai kode_tahap
	        $result = collect([]);
	        foreach ($unique as $key => $value) {
                foreach ($group_tahap as $key2 => $value2) {
                    $tahap = json_decode($value2->tahap, true);
                    if ($value2->role_seksi == $role) {
                        if ($status == 'all') {
                            // if ($value->kode_tahap > $tahap[0]) {
                                $result->push($value);
                            // }
                        } else {
                            foreach ($tahap as $key3 => $value3) {
                                if ($value->kode_tahap == $value3) {
                                    $result->push($value);
                                }
                                // if ($key == count($unique)-1 && $key3 == count($tahap)-1) {
                                //     dd($result, $value3);
                                // }
                            }
                        }
                    }
                }
	        }
        }
        $result = $result->sortBy('created_at');
        // dd($result, $role, $group_tahap, $tahap);

        $page = function($role, $kode_tahap) {
            $name = 'company';
            if ($role == 'pemasaran') {
                if ($kode_tahap < 13) {
                    $name = 'company';
                } elseif ($kode_tahap <= 21) {
                    $name = 'bidPrice';
                } elseif ($kode_tahap <= 24) {
                    $name = 'jadwalSert';
                }
            }
            elseif ($role == 'sertifikasi') {
                if ($kode_tahap <= 17) {
                    $name = 'company';
                } elseif ($kode_tahap <= 19) {
                    $name = 'auditPlan';
                } elseif ($kode_tahap <= 24) {
                    $name = 'draftSert';
                }
            }
            return $name;
        };
        $getlink = function($role) {
            $link = '';
            if ($role == 'pemasaran') {$link = 'sert';}
            elseif ($role == 'kerjasama') {$link = 'cmou';}
            elseif ($role == 'kabidpjt') {$link = 'approval';}
            elseif ($role == 'keuangan') {$link = 'invoice';}
            elseif ($role == 'sertifikasi') {$link = 'audit';}
            elseif ($role == 'auditor') {$link = 'dokSert';}
            elseif ($role == 'kabidpaskal') {$link = 'apprv_jadwalAudit';}
            elseif ($role == 'tim_teknis') {$link = 'rekomendasiRapatTeknis';}
            elseif ($role == 'komite_timTeknis') {$link = 'keputusanTeknis';}
            elseif ($role == 'subag_umum') {$link = 'pengirimanSert';}
            elseif ($role == 'ketua_tim_teknis') {$link = 'isi_dataLapSert';}
            elseif ($role == 'ketua_sertifikasi') {$link = 'verify_lembarKonSert';}
            return $link;
        };

        return view('company.cert_list', ['client' => $result, 'page' => $page, 'link' => $getlink, 'status' => $status, 'card_header' => $card_header]);
    }

    public function verifySA($id, $idProduk) {
    	$user = User::find($id);
        $produk = Produk::where('id', $idProduk)->first();
    	if (is_null($user) || is_null($produk)) {
            return redirect()->back();
        }
        $kode_tahap = $produk->kode_tahap;
    	$dok = $user->negeri == '1' ? Persyaratan_dalam_negeri::where('produk_id', $idProduk)->first() : Persyaratan_luar_negeri::where('produk_id', $idProduk)->first();
    	$dokImportir = !is_null($dok) && $user->negeri == '2' ? $dok->dok_importir()->first() : null;
        $dokManufaktur = !is_null($dok) && $user->negeri == '2' ? $dok->dok_manufaktur()->first() : null;
        $dokDalamNegeri = !is_null($dok) && $user->negeri == '2' ? $dok->dok_importir()->first()->more_doc()->first() : null;
        $infoDB = InfoTambahan::where('produk_id', $idProduk    )->first();
        $infoIsi = function($data) {
            return json_decode($data);
        };
        $pesan = !is_null($dok) && !is_null($dok->pesan_form_kuesioner) ? $dok->pesan_form_kuesioner : null;
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
    	return view('applySA.verifySA', compact('dok', 'user', 'dokImportir', 'dokManufaktur', 'dokDalamNegeri', 'idProduk', 'produk', 'infoDB', 'infoIsi', 'pesan', 'cekOpsi', 'isi', 'kuesioner', 'bahanHasil' , 'spekP', 'alat', 'kode_tahap'), ['user_id' => $id]);
    }
    
    public function verSA(Request $request, $id) {
        $model = new Persyaratan_dalam_negeri;
        $infoT = Arr::except($request->all(), ['_token', 'fileName', 'dok', 'pesan']);
        $getDok = Persyaratan_dalam_negeri::where('produk_id', $id)->first();
        $dok = !is_null($getDok) ? $getDok : $model;
        $infoDB = InfoTambahan::where('produk_id', $id)->first();
        $kuesioner = Kuesioner::where('produk_id', $id)->first();
        $bahanHasil = BahanHasil::where('produk_id', $id)->first();
        $produk = Produk::find($id);

		$jml = count($request->dok);
        $dok_tidak_lengkap = [];
        
		foreach ($request->fileName as $key => $value) {
			if ($request->dok[$key] == 'null') {
                if (!is_null($dok->$value)) {
                    \Storage::delete('dok/sa/'.$dok->$value);
                }
                array_push($dok_tidak_lengkap, $value);
				$dok->$value = null;
			}
		}
    	foreach ($request->dok as $key => $value) {
    		if ($request->dok[$key] == 'null') {
		    	$dok->sni = 2;
    			break;
    		}
    		$jml-=1;
    	}
        $dok->dok_tidak_lengkap = count($dok_tidak_lengkap) != 0 ? json_encode($dok_tidak_lengkap) : null;

        $infoTStatus = $model->verifyKuis($request->all(), $dok, $infoT);
        if ($infoTStatus[0] == 2) {
            $lngkp = 2;
        } else {
            $lngkp = 1;
        }
        $infoDB->lengkap = $lngkp;
        $infoDB->save();
        $kuesioner->lengkap = $lngkp;
        $kuesioner->save();
        $bahanHasil->lengkap = $lngkp;
        $bahanHasil->save();
        if ($jml == 0) {
    		$infoTStatus[1]->sni = 1;
        }
    	if ($jml == 0 && $infoTStatus[0] == 1) {
            $produk->kode_tahap = 11;
            $produk->save();
    	}
    	$infoTStatus[1]->save();

        // ---- Push notif -----
        // get user_fcm_token
        $user_token = [];
        $id_penerima = $produk->user_id;
        $gettokens = PushSubscriptions::where('user_id', $id_penerima);
        if ($infoTStatus[1]->sni == 1) {
            // get kerjasama user data
            $receiver = User::leftJoin('role', 'role.id', '=', 'users.role_id')->where('role', 'kerjasama')->select('users.id', 'users.name', 'role.role_name')->first();
            $gettokens = $gettokens->orWhere('user_id', $receiver->id);
        }
        $tokens = $gettokens->get();
        foreach ($tokens as $key => $value) {
            array_push($user_token, $value->user_fcm_token);
        }

        // send notification to receiver
        $datas = [
            'title' => 'Apply SA',
            'subtitle' => $produk->produk,
            'data' => 'Seksi Pemasaran telah mem-verifikasi form Apply SA',
            'toast_msg' => 'Seksi Pemasaran telah mem-verifikasi form Apply SA',
            'time' => date('Y-m-d H:i:s')
        ];

        \AppHelper::instance()->push_notif($user_token, $datas, $id_penerima);

    	return redirect()->back();
    }

    // public function verSALuar(Request $request, $id) {
    //     // filter dok sesuai tabel DB
    //     $dok = Persyaratan_luar_negeri::where('produk_id', $id)->first();
    //     $arr = [[$dok->dok_importir()->first()->more_doc()->first(), 'sa'], [$dok->dok_importir()->first(), 'dokImportir'],[$dok->dok_manufaktur()->first(), 'dokManufaktur']];
    //     foreach ($request->fileName as $key => $value) {
    //         if (explode(',', $value)[1] == 'sa') {$index = 0;}
    //         elseif (explode(',', $value)[1] == 'dokImportir') {$index = 1;}
    //         else {$index = 2;}
    //         array_push($arr[$index], [explode(',', $value)[0], $request->dok[$key]]);
    //     }
    //     $sni = [];
    //     foreach ($arr as $key => $value) {
    //         for($i=2;$i<count($value);$i++) {
    //             $field = $value[$i][0];
    //             // hapus dok jika tidak lengkap
    //             if ($value[$i][1] == 'null' && !is_null($value[0]->$field)) {
    //                 \Storage::delete('dok/'.$value[1].'/'.$value[0]->$field);
    //                 $value[0]->$field = null;
    //             }
    //         }
    //         // cek kelengkapan dok - 1
    //         $jmlDok = count($arr)-2;
    //         $lengkap = $value[1] == 'sa' ? 'sni' : 'lengkap';
    //         for ($j=2; $j < count($arr); $j++) { 
    //             if ($value[$j][1] == 'null') {
    //                 $value[0]->$lengkap = 2;
    //                 break;
    //             }
    //             $jmlDok-=1;
    //         }
    //         if ($jmlDok == 0) {$value[0]->$lengkap = 1;}
    //         array_push($sni, $value[0]->$lengkap);
    //         $value[0]->save();
    //     }
    //     // cek kelengkapan dok - 2
    //     foreach ($sni as $key => $value) {
    //         if ($value == 2) {$dok->sni = 2;break;}
    //         if ($key == 2 && $value == 1) {
    //             $dok->sni = 1;
    //             $tahap = TahapSert::where('produk_id', $id)->first();
    //             $tahap->apply_sa = 1;
    //             $tahap->save();
    //         }
    //     }
    //     $dok->save();
    //     return redirect()->back();
    // }
}