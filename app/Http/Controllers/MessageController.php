<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pesan;
use App\User;

class MessageController extends Controller
{
	public function index() {
		$user = \Auth::user();
		$produk = Produk::where('user_id', $user->id)->get();

        return view('pesan/messages', ['produk' => $produk]);
    }

    public function send_message_client(Request $request, $idProduk, $admin_id, $client_id = null) {
        $d = \Validator::make($request->all(), [
            'pesan' => 'required|string|max:255',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $produk = Produk::find($idProduk);

        $pesan = new Pesan;
        $pesan->ket_pesan = 'client';
        if (!is_null($client_id)) {
            $pesan->client = intval($client_id);
            $pesan->ket_pesan = 'admin';
        }
        $pesan->admin = intval($admin_id);
        $pesan->produk_id = $produk->id;
        $pesan->kode_tahap = $produk->kode_tahap;
        $pesan->pesan = $request->pesan;
        $pesan->save();

        return redirect()->back()->with('msg_success', 'Pesan berhasil dikirim');
    }

    public function search_produk(Request $request) {
    	$produk = Produk::where('user_id', $request->user_id)->where('produk', 'like', '%'.$request->produk.'%')->select('id', 'produk', 'request_sert', 'kode_tahap')->get();

    	$tahapan = \DB::table('master_tahap as mt')
            ->leftJoin('users as u', 'u.role_id', '=', 'mt.role_id')
            ->select('mt.kode_tahap', 'mt.tahapan', 'u.id as receiver_id', 'u.name as receiver', 'mt.role_id')
            ->get();

	    $result = collect([]);
	    if (!is_null($request->admin_id)) {
	        foreach ($tahapan as $key => $value) {
	        	if ($value->receiver_id == $request->admin_id) {
	        		$result->push($value);
	        	}
	        }
	    } else {
	    	$result = $tahapan;
	    }

    	return response()->json(['data' => $produk, 'tahap' => $result]);
    }

    public function getMsg(Request $request) {
    	$pesan = \DB::table('pesan as psn')
    		->where('produk_id', $request->produk_id)
    		->where('kode_tahap', $request->kode_tahap)
    		->leftJoin('users as client', 'psn.client', '=', 'client.id')
    		->leftJoin('users as admin', 'psn.admin', '=', 'admin.id')
    		->leftJoin('role', 'admin.role_id', '=', 'role.id')
    		->select('client.name as client', 'admin.name as admin', 'role.role_name', 'psn.pesan', 'psn.created_at as waktu_terkirim', 'psn.ket_pesan')->latest('waktu_terkirim')->get();

    	return response()->json(['data' => $pesan]);
    }

    public function set_prop(Request $request) {
    	$request_sert = $request->request_sert;
    	$role = $request->role;
    	$tahap_sert = json_decode(htmlspecialchars_decode($request->tahap_sert));
    	$kode_tahap = $request->kode_tahap;
    	$user = json_decode(htmlspecialchars_decode($request->user));
    	$produk_id = $request->produk_id;
    	$penerima = '';
    	$form_url = '';

    	// ---- seleksi penerima pesan ----
    	if($role == 'client') {
            if($request_sert !== 'null') {
                $penerima = "<div class='col-lg-6'><b>".\AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, $request_sert, $role)[2]."</b></div> <div class='col-lg-6'><label class='badge badge-secondary'>".\AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, $request_sert, $role)[0]."</label></div>";
            } else {
                $penerima = "<div class='col-lg-6'><b>".\AppHelper::instance()->getMessageProp($produk->first()->kode_tahap, $tahap_sert, null, $role)[2]."</b></div> <div class='col-lg-6'><label class='badge badge-secondary'>".\AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, null, $role)[0]."</label></div>";
            }
        } else {
            $penerima = "<div class='col-lg-6'><b>".$user->name."</b></div><div class='col-lg-6'><label class='badge badge-secondary'>".$user->nama_perusahaan."</label></div>";
        }

        // ---- get tahap sertifikasi ----
        $tahap = "<div class='col-lg-12'><b>".\AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, null)[1]."</b></div>";

        // ---- set action url ----
        if($role != 'client') {
            if($request_sert !== 'null') {
	            $form_url = url('/message_send/'.$produk_id.'/'.\AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, $request_sert)['receiver_id'].'/'.$user->id);
            } else {
	            $form_url = url('/message_send/'.$produk_id.'/'.\AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, null)['receiver_id'].'/'.$user->id);
	        }
        } else {
            if($request_sert !== 'null') {
	            $form_url = url('/message_send/'.$produk_id.'/'.\AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, $request_sert)['receiver_id']);
            } else {
	            $form_url = url('/message_send/'.$produk_id.'/'.\AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, null)['receiver_id']);
            }
        }

        return response()->json([ 'penerima' => $penerima, 'tahap' => $tahap, 'form_url' => $form_url ]);
    }

    public function send_msg_ajax(Request $request) {
    	$d = \Validator::make($request->all(), [
            'message' => 'required|string|max:255',
        ]);
        // if ($d->fails()) {return redirect()->back()->withErrors($d);}
        if ($d->fails()) {return response()->json([ 'err' => 'Proses pengiriman pesan gagal!' ]);}

        $url = explode('/', $request->url);
        $produk_id = intval($url[4]);
        $admin_id = intval($url[5]);
        $client_id = isset($url[6]) ? intval($url[6]) : null;
        $produk = Produk::find($produk_id);

        $pesan = new Pesan;
        $pesan->ket_pesan = 'client';
        if (!is_null($client_id)) {
            $pesan->client = $client_id;
            $pesan->ket_pesan = 'admin';
        }
        $pesan->admin = $admin_id;
        $pesan->produk_id = $produk->id;
        $pesan->kode_tahap = $produk->kode_tahap;
        $pesan->pesan = $request->message;
        $pesan->save();

        $user = \DB::table('users')->leftJoin('role', 'role.id', '=', 'users.role_id')->where('users.id', $admin_id)->select('users.name', 'role.role_name')->first();

        return response()->json([ 'data' => $pesan, 'msg_prop' => $user ]);
    }

    public function pesan_admin() {
    	$client = User::where('negeri', 1)
            ->select('users.id', 'users.nama_perusahaan', 'users.negeri', 'users.pimpinan_perusahaan', 'users.provinsi', 'users.kota', 'users.alamat_perusahaan', 'users.email_perusahaan', 'users.no_telp')->get();


    	return view('pesan.messages_admin', ['client' => $client]);
    }

    public function pesan_admin_produk($company_id) {
    	$user = User::where('id', $company_id)->select('id', 'name', 'nama_perusahaan', 'negeri')->first();
    	if (is_null($user)) {
    		abort(404);
    	}
    	$produk = Produk::where('user_id', $company_id)->get();

    	return view('pesan.messages_admin_produk', ['produk' => $produk, 'company_id' => $company_id, 'user' => $user]);
    }
}