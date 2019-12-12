<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterAuthRequest;
use App\User;
use App\Persyaratan_dalam_negeri;
use App\Transformers\saTransformer;
use App\Transformers\UserTransformer;
use App\Transformers\ProdukTransformer;
use App\Mou;
use JWTAuth;
use Auth;
use App\Produk;
use App\TahapSert;
use App\Log;
use App\Pesan;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class APIController extends Controller
{
    use VerifiesEmails;
    public $loginAfterSignUp = true;

    public function register(RegisterAuthRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->registeredDeviceId = $request->dev_id;
        $user->role_id = '1';
        $user->negeri = $request->negeri;
        $user->nama_perusahaan = $request->nama_perusahaan;
        $user->pimpinan_perusahaan = $request->pimpinan_perusahaan;
        $user->alamat_perusahaan = $request->alamat_perusahaan;
        $user->kota = $request->kota;
        $user->provinsi = $request->provinsi;
        $user->kode_pos = $request->kode_pos;
        $user->no_telp = $request->no_telp;
        $user->no_fax = $request->no_fax;
        $user->email_pengguna = $request->email_pengguna;
        $user->alamat_pabrik = $request->alamat_pabrik;
        $user->telp_pabrik = $request->telp_pabrik;
        $user->fax_pabrik = $request->fax_pabrik;
        $user->email_perusahaan = $request->email_perusahaan;
        $user->jml_pegawai_tetap = $request->jml_pegawai_tetap;
        $user->jml_pegawai_tidak_tetap = $request->jml_pegawai_tidak_tetap;
        $user->jml_line_produksi = $request->jml_line_produksi;
        $user->contact_person = $request->contact_person;
        $user->save();


        $user->sendApiEmailVerificationNotification();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'Message' => 'Please confirm yourself by clicking on verify user button sent to you on your email',
            'data' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $user->registeredDeviceId = $request->dev_id;
            $user->save();

            if ($user->email_verified_at !== NULL) {
                $input = $request->only('email', 'password');
                $jwt_token = null;

                if (!$jwt_token = JWTAuth::attempt($input)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid Email or Password',
                    ], 401);
                }

                return response()->json([
                    'success' => true,
                    'token' => $jwt_token,
                    'data' => $user
                ]);
            } else {
                return response()->json(['error' => 'Please confirm yourself by clicking on verify user button sent to you on your email'], 401);
            }
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->toArray();
    }

    public function changepassword(Request $request)
    {

        $this->validate($request, [
            'token' => 'required',
            'password'  => 'required',
            'password_baru'  => 'required',
            'password_confirm'  => 'required'

        ]);

        $hashed = Hash::make($request->password_confirm);

        $user = JWTAuth::authenticate($request->token);
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Your old password don\'t matches']);
        } else if (!Hash::check($request->password_baru,  $hashed)) {
            return response()->json(['error' => 'Your New password don\'t matches']);
        } else {
            $user = JWTAuth::authenticate($request->token);
            $user->password = bcrypt($request->password_baru);
            $user->save();
            return response()->json([
                'success' => true,
                'message' => 'Password Change Successfully'
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'name' => 'required|string',
            'nama_perusahaan' => 'required',
            'pimpinan_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'no_fax' => 'required',
            'email_pengguna' => 'required',
            'alamat_pabrik' => 'required',
            'telp_pabrik' => 'required',
            'fax_pabrik' => 'required',
            'email_perusahaan' => 'required',
            'jml_pegawai_tetap' => 'required',
            'jml_pegawai_tidak_tetap' => 'required',
            'jml_line_produksi' => 'required',
            'contact_person' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        $user->name = $request->name;
        $user->nama_perusahaan = $request->nama_perusahaan;
        $user->pimpinan_perusahaan = $request->pimpinan_perusahaan;
        $user->alamat_perusahaan = $request->alamat_perusahaan;
        $user->kota = $request->kota;
        $user->provinsi = $request->provinsi;
        $user->kode_pos = $request->kode_pos;
        $user->no_telp = $request->no_telp;
        $user->no_fax = $request->no_fax;
        $user->email_pengguna = $request->email_pengguna;
        $user->alamat_pabrik = $request->alamat_pabrik;
        $user->telp_pabrik = $request->telp_pabrik;
        $user->fax_pabrik = $request->fax_pabrik;
        $user->email_perusahaan = $request->email_perusahaan;
        $user->jml_pegawai_tetap = $request->jml_pegawai_tetap;
        $user->jml_pegawai_tidak_tetap = $request->jml_pegawai_tidak_tetap;
        $user->jml_line_produksi = $request->jml_line_produksi;
        $user->contact_person = $request->contact_person;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User Change Successfully'
        ]);
    }

    public function perusahaan(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        if ($user->role_id == 1) {
            // $produk = Produk::where('user_id', $user->id)->get();

            $tahap = \DB::table('produk')
                ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
                ->leftJoin('users', 'users.id', '=', 'produk.user_id')
                ->select('master_tahap.kode_tahap', 'master_tahap.tahapan', 'produk.*', 'users.*')
                ->where('produk.kode_tahap', '!=', '23')
                ->where('produk.user_id', $user->id)->get();
        } else {
            $tahap = \DB::table('produk')
                ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
                ->leftJoin('users', 'users.id', '=', 'produk.user_id')
                ->select('master_tahap.kode_tahap', 'master_tahap.tahapan', 'produk.*', 'users.*')
                ->where('produk.kode_tahap', '!=', '23')
                ->where('users.role_id', '1')->get();
        }
        //  dd($tahap);
        foreach ($tahap as $p) {
            $aData['list_perusahaan'][] = array(
                'nama_perusahaan' => $p->nama_perusahaan,
                'pimpinan_perusahaan' => $p->pimpinan_perusahaan,
                'alamat_perusahaan' => $p->alamat_perusahaan,
                'kode_tahap' => $p->kode_tahap,
                'tahapan' => $p->tahapan,
                'produk_id' => $p->id,
                'produk' => $p->produk,
                'user_id' => $p->user_id,

            );
        }

        return response()->json($aData);
    }


    public function produk(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'user_id' => 'required'
        ]);



        $user = JWTAuth::authenticate($request->token);
        $produk = Produk::where('user_id', $request->user_id)->get();

        return fractal()
            ->collection($produk)
            ->transformWith(new ProdukTransformer)
            ->toArray();
    }

    // public function notifproduk(Request $request)
    // {
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'function blm dibikin bro'
    //     ]);
    // }

    public function produk_monitoring(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'produk_id' => 'required'
        ]);

        $tahap = \DB::table('master_tahap')->where('kode_tahap', '!=', '0')->get();

        foreach ($tahap as $p => $row) {

            $totPesan =    \DB::table('notif_log')->where('kode_tahap', $row->kode_tahap)->first();

            $aData['list_pesan'][] = array(
                'kode' => $row->kode_tahap,
                'tahapan' => $row->tahapan,
                'notif' => [
                    'type' => 'text or btn',
                    'pesan_notif' =>  ' $d'
                ]
            );

            //dd($p->kode_tahap); 
        }
        //  if ($user = JWTAuth::authenticate($request->token)) {
        return response()->json($aData);
        //   }
    }

    public function produk_detail(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'produk_id' => 'required'
        ]);

        $tahap = \DB::table('produk')
            ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
            ->leftJoin('notif_log', 'notif_log.user_id', '=', 'produk.user_id')
            ->select('master_tahap.kode_tahap', 'master_tahap.tahapan', 'produk.id', 'produk.user_id', 'produk.created_at',  'notif_log.notif', 'notif_log.status', 'notif_log.created_at')
            ->where('produk.id', $request->produk_id)->get();

        // dd($tahap);
        $result = [];
        foreach ($tahap as $item) {
            array_push($result, [
                "kode_tahap" => $item->kode_tahap,
                "tahapan" => $item->tahapan,
                "user_id" => $item->user_id,
                "produk_id" => $item->id,
                "notif" => [
                    [
                        "notif" => $item->notif,
                        "status" => $item->status,
                        "notif_at" => $item->status,
                    ]
                ],
                "created_at" => $item->created_at,
            ]);
        }
        $result2 = [];
        foreach ($result as $key => $value) {
            $notif = $value['notif'];
            foreach ($result2 as $key => $item2) {
                if (($value['kode_tahap'] == $item2['kode_tahap']) && ($value['tahapan'] == $item2['tahapan']) && ($value['user_id'] == $item2['user_id']) && ($value['produk_id'] == $item2['produk_id'])) {
                    array_push($notif, [
                        "notif" => $item2['notif'][0]['notif'],
                        "status" => $item2['notif'][0]['status'],
                    ]);
                    $result2[$key]['notif'] = $notif;
                    continue 2;
                }
            }
            array_push($result2, $value);
        }

        if ($user = JWTAuth::authenticate($request->token)) {
            return response()->json(['detail_produk' => $result2, 'file' => $result2]);
        }
    }


    public function pesan(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
        ]);

        $tahap = \DB::table('produk')
            ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
            ->select('master_tahap.kode_tahap', 'master_tahap.tahapan', 'produk.produk', 'produk.id', 'produk.user_id')
            ->where('user_id', $request->user_id)->get();


        foreach ($tahap as $p) {
            $totPesan = \DB::table('pesan')
                ->where('produk_id', $p->id)->get();

            $aData['list_pesan'][] = array(
                'kode' => $p->kode_tahap,
                'tahapan' => $p->tahapan,
                'produk_id' => $p->id,
                'produk' => $p->produk,
                'user_id' => $p->user_id,
                'total_pesan' => count($totPesan)
            );
        }

        return response()->json($aData);
    }



    public function pesan_detail(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'produk_id' => 'required',
        ]);

        $aDetail = \DB::table('pesan')
            ->where('produk_id', $request->produk_id)->get();


        return response()->json($aDetail);
    }



    public function pesanSend(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'produk_id' => 'required',
            'kode_tahap' => 'required',
            'pesan' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        // dd($user);
        if ($user = JWTAuth::authenticate($request->token)) {
            if ($user->role_id == 1) {
                $pesan = new Pesan;
                $pesan->client = $user->id;
                $pesan->produk_id = $request->produk_id;
                $pesan->kode_tahap = $request->kode_tahap;
                $pesan->pesan = $request->pesan;
                $pesan->created_at = date('Y-m-d H:i:s');
                $pesan->save();
                //  return response()->json($pesan);
            } else if ($user->role_id == 2 or $user->role_id == 3 or $user->role_id == 4 or $user->role_id == 5 or $user->role_id == 6 or $user->role_id == 7 or $user->role_id == 8 or $user->role_id == 9) {
                $pesan = new Pesan;
                $pesan->client = $request->user_id;
                $pesan->admin = $user->id;
                $pesan->produk_id = $request->produk_id;
                $pesan->kode_tahap = $request->kode_tahap;
                $pesan->pesan = $request->pesan;
                $pesan->created_at = date('Y-m-d H:i:s');
                $pesan->save();
                //  return response()->json($pesan);
            }

            $aDetail = \DB::table('pesan')
                ->where('produk_id', $request->produk_id)->get();

            return response()->json($aDetail);
        }
    }



    // public function pesan_load(Request $request)
    // {
    //     $this->validate($request, [
    //         'token' => 'required',
    //         'produk_id' => 'required',
    //         'kode_tahap' => 'required',
    //     ]);
    //     $user = JWTAuth::authenticate($request->token);
    //     if ($user->role_id == 1) {
    //         $data = \DB::table('pesan as ps')
    //             ->leftJoin('users as us', 'us.id', '=',  'ps.client')
    //             ->leftJoin('users as us2',  'ps.admin',  '=', 'us2.id')
    //             ->where('ps.produk_id', $request->produk_id)
    //             // ->where('us.id', $user->id)
    //             ->select('us.name as client_name', 'us2.name as admin_name', 'ps.*')->get();

    //         $pesan = [];

    //         foreach ($data as $item) {
    //             array_push($pesan, $item);
    //         }

    //         return response()->json($pesan);
    //     } else {

    //         $data = \DB::table('pesan as ps')
    //             ->leftJoin('users as us', 'us.id', '=',  'ps.client')
    //             ->leftJoin('users as us2',  'ps.admin',  '=', 'us2.id')
    //             ->where('ps.produk_id', $request->produk_id)
    //             ->where('ps.kode_tahap', $request->kode_tahap)
    //             ->select('us.name as client_name', 'us2.name as admin_name', 'ps.*')->get();

    //         $pesan = [];

    //         foreach ($data as $item) {
    //             array_push($pesan, $item);
    //         }

    //         return response()->json($pesan);
    //     }
    // }
    // public function pesan_load_all(Request $request)
    // {
    //     $this->validate($request, [
    //         'token' => 'required',
    //         'produk_id' => 'required',
    //         'kode_tahap' => 'required',
    //     ]);
    // }

    // public function notif(Request $request)
    // {
    //     $this->validate($request, [
    //         'token' => 'required',
    //     ]);
    //     $user = JWTAuth::authenticate($request->token);
    //     $notif = Log::where('user_id', $user->id)->get();

    //     return response()->json($notif);
    // }

    // public function backup()
    // {
    //     // $data = [];
    //     $user = JWTAuth::authenticate($request->token);
    //     // $pesan = Pesan::where('produk_id', $request->produk_id)->where('kode_tahap', $request->kode_tahap)->orderBy('created_at','DESC')->get();

    //     // foreach($pesan as $item)
    //     // {
    //     //  if($item->client == $user->id )
    //     //  {
    //     //      array_push($data, $item);
    //     //  }
    //     //  if($item->penerima == $user->id)
    //     //  {
    //     //      array_push($data, $item);
    //     //  }
    //     // }
    //     // return response()->json($data);


    //     // $tahap = \DB::table('produk')
    //     // ->leftJoin('tahap_sert', 'tahap_sert.produk_id', '=', 'produk.id')
    //     // ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'tahap_sert.kode_tahap')
    //     // ->select('master_tahap.kode_tahap','master_tahap.tahapan')->get();

    //     // return response()->json($tahap);

    // }



    // public function getSA(Persyaratan_dalam_negeri $dok_negeri)
    // {
    //     $docs = $dok_negeri->all();
    //     return fractal()
    //         ->collection($docs)
    //         ->transformWith(new saTransformer)
    //         ->toArray();
    // }

    // public function verifSA(Request $request, Persyaratan_dalam_negeri $model)
    // {
    //     $dok = $model->first();
    //     $jml = count($request->filename);
    //     $fileCollection = [];

    //     foreach ($request->filename as $key => $value) {
    //         if ($request->dok[$key] == 'null' && !is_null($dok->$value)) {
    //             unlink(public_path() . '/dok/sa/' . $dok->$value);
    //             array_push($fileCollection, $dok->$value);
    //             $dok->$value = null;
    //         }
    //     }

    //     foreach ($request->dok as $key => $value) {
    //         if ($request->dok[$key] == 'null') {
    //             $dok->sni = 2;
    //             break;
    //         }
    //         $jml -= 1;
    //     }
    //     if ($jml == 0) {
    //         $dok->sni = 1;
    //     }
    //     $dok->save();

    //     $mou = new Mou;
    //     $mou->status = null;
    //     $mou->save();


    //     return fractal()
    //         ->collection($fileCollection)
    //         ->transformWith(new saTransformer)
    //         ->toArray();
    // }


    // public function perusahaan(Request $request)
    // {
    //     $this->validate($request, [
    //         'token' => 'required'
    //     ]);

    //     if ($user = JWTAuth::authenticate($request->token)) {
    //         $data = User::where('role_id', '1')->get();

    //         return response()->josn($data);
    //     }
    // }

    // public function produk_list(Request $request)
    // {
    //     $this->validate($request, [
    //         'token' => 'required',
    //         'perusahaan' => 'required'
    //     ]);

    //     $user = JWTAuth::authenticate($request->token);
    //     $produk = Produk::where('user_id', $perusahaan)->get();


    //     return fractal()
    //         ->collection($produk)
    //         ->transformWith(new ProdukTransformer)
    //         ->toArray();
    // }

    //Produk
}
