<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Persyaratan_dalam_negeri;
use App\Persyaratan_luar_negeri;
use App\User;
use App\Produk;
use App\TinjauanPP;
use App\LaporanAudit;
use App\InfoTambahan;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $user = new User;
        return redirect($user->home());
    }

    public function dashboard() {
        $user = \Auth::user();
        $produk = $user->currentProduct()->sortBy('kode_tahap');
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

    public function pesan() {
        return view('pesan/messages_produk');
    }

    public function messages() {
        return view('pesan/messages');
    }

    public function view_dok($file) {
        $pdf = \PDF::loadView('dok.'.$file);
        $pdf->setPaper('A4');
        if ($file == 'draftSertDok') {
            $pdf->setPaper('A4','landscape');
        }
        return $pdf->stream();
    }

    public function deleteAll($idProduk) {
        $produk = Produk::find($idProduk);
        if (is_null($produk)) {
            dd("Produk tidak ditemukan!");
        } else {
            \DB::table('audit_sampling_plan')->where('produk_id', $idProduk)->delete();
            \DB::table('bahan_hasil')->where('produk_id', $idProduk)->delete();

            // $laporan_audit = \DB::table('laporan_audit')->where('produk_id', $idProduk)->select('dok_manufaktur_id', 'tinjauan_pp_id', 'dok_importir_id')->first();
            $dok_importir = \DB::table('persyaratan_dok_dalam_negeri')->where('produk_id', $idProduk)->select('review_dok_importir_id')->first();
            if (!is_null($dok_importir)) {
            	\DB::table('review_dok_importir')->where('id', $dok_importir->review_dok_importir_id)->delete();
            }
            $laporan_audit = \DB::table('laporan_audit')->where('produk_id', $idProduk)->first();
            if (!is_null($laporan_audit)) {
                \DB::table('jadwal_audit')->where('id', $laporan_audit->jadwal_audit_id)->delete();
            }
            if (!is_null($laporan_audit) && !is_null($laporan_audit->tinjauan_pp_id)) {
                $tinjauan_pp = \DB::table('tinjauan_pp')->where('id', $laporan_audit->tinjauan_pp_id)->select('review_tinjauan_pp_id')->first();
                \DB::table('review_tinjauan_pp')->where('id', $tinjauan_pp->review_tinjauan_pp_id)->delete();
                \DB::table('tinjauan_pp')->where('id', $laporan_audit->tinjauan_pp_id)->delete();
            }
            if (!is_null($laporan_audit) && !is_null($laporan_audit->dok_manufaktur_id)) {
                $dok_manufaktur = \DB::table('dok_manufaktur')->where('id', $laporan_audit->dok_manufaktur_id)->select('review_dok_manufaktur_id')->first();
                \DB::table('review_dok_manufaktur')->where('id', $dok_manufaktur->review_dok_manufaktur_id)->delete();
            }

            $bidPrice = \DB::table('bid_price')->where('produk_id', $idProduk)->select('invoice_id')->first();
            if (!is_null($bidPrice)) {
                \DB::table('invoice')->where('id', $bidPrice->invoice_id)->delete();
            }
            \DB::table('bid_price')->where('produk_id', $idProduk)->delete();

            \DB::table('info_tambahan')->where('produk_id', $idProduk)->delete();
            \DB::table('kuesioner')->where('produk_id', $idProduk)->delete();
            // \DB::table('laporan_audit')->where('produk_id', $idProduk)->delete();
            \DB::table('mou')->where('produk_id', $idProduk)->delete();
            \DB::table('persyaratan_dok_dalam_negeri')->where('produk_id', $idProduk)->delete();
            \DB::table('pesan')->where('produk_id', $idProduk)->delete();
            \DB::table('produk')->where('id', $idProduk)->delete();
            dd("Data berhasil dihapus!");
        }
    }

    public function profil() {
        $user = \Auth::user();
        $produk = \DB::table('produk as p')->leftJoin('users as us', 'us.id', '=', 'p.user_id')->where('p.kode_tahap', 23)->where('user_id', $user->id)->orderBy('p.created_at', 'desc')->get();
        return view('profil', ['user' => $user, 'produk' => $produk]);
    }

    public function settingComp(Request $request) {
        $user = \Auth::user();

        if (!is_null($user->negeri)) {
            $valid = \Validator::make($request->all(), [
                'nama_perusahaan' => 'required|string|max:255',
                'pimpinan_perusahaan' => 'required|string|max:255',
                'alamat_perusahaan' => 'required|string|max:255',
                'negeri' => 'required|string',
                'kota' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
                'kode_pos' => 'required|string|max:255',
                'no_fax' => 'required|string|max:255',
                'email_pengguna' => 'required|string|email|max:255',
                'jml_pegawai_tetap' => 'required|integer',
                'jml_pegawai_tidak_tetap' => 'required|integer',
                'jml_line_produksi' => 'required|integer',
                'contact_person' => 'required|string|max:13',
                'no_telp' => 'required|string|max:13',
                'email_perusahaan' => 'required|string|email|max:255',
                'npwp' => 'max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
                'nib' => 'max:2000|mimes:png,jpeg,jpg,pdf,docx,doc',
            ],[
                'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
                'mimes'  => 'Extensi file harus: png, jpeg, jpg, pdf, docx, doc',
                'email' => 'Harap masukan format email yang valid',
                'required' => ':attribute harus diisi',
            ]);
        } else {
            $valid = \Validator::make($request->all(), [
                'no_telp' => 'required|string|max:13',
            ],[
                'max'    => 'Ukuran tidak boleh melebihi 2 megabytes',
                'required' => ':attribute harus diisi',
            ]);
        }
        if ($valid->fails()) {return redirect()->back()->withErrors($valid);}

        if (!is_null($user->negeri)) {
            $npwp = 'npwp_'.date('YmdHis').''.uniqid().'.pdf';
            $nib = 'nib_'.date('YmdHis').''.uniqid().'.pdf';
            if (!is_null($request->file('npwp'))) {
                if (\Storage::exists('dok/npwp/'.$user->npwp)) {
                    \Storage::delete('dok/npwp/'.$user->npwp);
                }
                $request->file('npwp')->storeAs('dok/npwp', $npwp);
            }
            if (!is_null($request->file('nib'))) {
                if (\Storage::exists('dok/nib/'.$user->nib)) {
                    \Storage::delete('dok/nib/'.$user->nib);
                }
                $request->file('nib')->storeAs('dok/nib', $nib);
            }
            $user->nama_perusahaan = $request->nama_perusahaan;
            $user->pimpinan_perusahaan = $request->pimpinan_perusahaan;
            $user->alamat_perusahaan = $request->alamat_perusahaan;
            $user->negeri = $request->negeri;
            $user->no_telp = $request->no_telp;
            $user->kota = $request->kota;
            $user->provinsi = $request->provinsi;
            $user->kode_pos = $request->kode_pos;
            $user->no_fax = $request->no_fax;
            $user->email_pengguna = $request->email_pengguna;
            $user->jml_pegawai_tetap = $request->jml_pegawai_tetap;
            $user->jml_pegawai_tidak_tetap = $request->jml_pegawai_tidak_tetap;
            $user->jml_line_produksi = $request->jml_line_produksi;
            $user->no_telp = $request->no_telp;
            $user->email_perusahaan = $request->email_perusahaan;
            $user->npwp = $npwp;
            $user->nib = $nib;
        } else {
            $user->no_telp = $request->no_telp;
        }
        $user->save();

        return redirect()->back()->with('success', 'Data Profil berhasil diubah!');
    }

    public function setting() {
        $user = \Auth::user();
        return view('setting', ['user' => $user]);
    }

    public function settingAcc(Request $request) {
    	$valid = \Validator::make($request->all(), [
    		'name' => 'required|string',
    		'password' => 'required|string|min:8',
    	]);
    	if ($valid->fails()) {return redirect()->back()->withErrors($valid);}

    	$user = \Auth::user();
    	if (\Hash::check($request->password, $user->password)) {
	    	if ($request->new_password == $request->password_confirmation) {
	    		$user->password = \Hash::make($request->new_password);
	    		$user->save();
	    		return redirect()->back()->with('success', 'Password berhasil diubah');
	    	} else {
	    		$msg = ["password" => "Konfirmasi password anda salah"];
	    	}
    	} else {
    		$msg = ["password" => "Password lama salah"];
    	}
    	return redirect()->back()->withErrors($msg);
    }

    public function downloadDoc($directory, $directory2 = null, $file) {
        $dir = $directory;
        if (!is_null($directory2)) {
            $dir = $directory.'/'.$directory2;
        }
        if (\Storage::exists('dok/'.$dir.'/'.$file)) {
            return response()->download(storage_path('app/public/dok/'.$dir.'/'.$file));
        }
    }

    public function manual($role) {
        $manual = Role::where('role', $role)->first();
        if (!is_null($manual->manual) && \Storage::exists('dok/format_dok/'.$manual->manual)) {
            return response()->download(storage_path('app/public/dok/format_dok/'.$manual->manual));
        }
        dd('Manual belum ada!');
    }

    // public function editDok(Request $request) {
    //     // Creating the new document...
    //     $zip = new \PhpOffice\PhpWord\Shared\ZipArchive();

    //     //This is the main document in a .docx file.
    //     $fileToModify = 'word/document.xml';

    //     $file = public_path('storage/dok/sertifikat_akhir.docx');
    //     $name = date('Ymdhis').'.docx';
    //     $temp_file = storage_path('app/public/dok/'.$name);
    //     copy($file, $temp_file);

    //     if ($zip->open($temp_file) === TRUE) {
    //         //Read contents into memory
    //         $oldContents = $zip->getFromName($fileToModify);

    //         // echo $oldContents;

    //         //Modify contents:
    //         $newContents = str_replace('{CPCB-0374-IDN}', 'Bisa', $oldContents);
    //         $newContents = str_replace('{CPCB-0374-IDN}', 'Santosh Achari', $newContents);

    //         //Delete the old...
    //         $zip->deleteName($fileToModify);
    //         //Write the new...
    //         $zip->addFromString($fileToModify, $newContents);
    //         //And write back to the filesystem.
    //         $return =$zip->close();
    //         If ($return==TRUE){
    //             if (\Storage::exists('dok/'.$name)) {
    //                 return response()->download(storage_path('app/public/dok/'.$name));
    //             }                
    //             dd("Success!");
    //         }
    //     } else {
    //         dd('failed');
    //     }

    //     // $file = public_path('storage/dok/sertifikat_akhir.docx');

    //     // $phpword = new \PhpOffice\PhpWord\TemplateProcessor($file);

    //     // $phpword->setValue('{CPCB-0374-IDN}','Santosh');
    //     // // $phpword->setValue('{lastname}','Achari');
    //     // // $phpword->setValue('{officeAddress}','Yahoo');
    //     // $name = date('YmdHis');
    //     // $phpword->saveAs($name.'.docx');
    //     // if (\Storage::exists('dok/'.$name)) {
    //     //     return response()->download(storage_path('app/public/dok/'.$name));
    //     // }
    // }
}
