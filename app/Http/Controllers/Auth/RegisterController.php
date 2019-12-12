<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
            'contact_person' => 'required|string|max:255',
            'cp_num' => 'required|string|max:15',
            'no_telp' => 'required|string|max:13',
            'email_perusahaan' => 'required|string|email|max:255',
            'alamat_pabrik' => 'required|string|max:255',
            'telp_pabrik' => 'required|string|max:255',
            'fax_pabrik' => 'required|string|max:255',
            'npwp' => 'max:5000|mimes:png,jpeg,jpg,pdf,docx,doc',
            'no_npwp' => 'string|max:100',
            'nib' => 'max:5000|mimes:png,jpeg,jpg,pdf,docx,doc',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255',
        ],[
            'mimes'  => 'Extensi file harus: png, jpeg, jpg, pdf, docx, doc',
            'email' => 'Harap masukan format email yang valid',
            'unique' => 'Email Akun ini sudah digunakan',
            'required' => ':attribute harus diisi',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['password'] != $data['password-confirm']) {
            $msg = ["password" => "Konfirmasi password anda salah"];
            return redirect()->back()->withErrors($msg);
        }

        $nama_perusahaan = implode('_', explode(' ', $data['nama_perusahaan']));
        $npwp = 'npwp-'.$nama_perusahaan.'-'.uniqid().'.pdf';
        $nib = 'nib-'.$nama_perusahaan.'-'.uniqid().'.pdf';
        if (isset($data['npwp']) && !is_null($data['npwp'])) {
            $data['npwp']->storeAs('dok/npwp', $npwp);
        }
        if (isset($data['nib']) && !is_null($data['nib'])) {
            $data['nib']->storeAs('dok/nib', $nib);
        }
        $no_npwp = !is_null($data['no_npwp']) ? $data['no_npwp'] : null;
        $no_nib = !is_null($data['no_nib']) ? $data['no_nib'] : null;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 1,
            'negeri' => $data['negeri'],
            'nama_perusahaan' => $data['nama_perusahaan'],
            'alamat_perusahaan' => $data['alamat_perusahaan'],
            'pimpinan_perusahaan' => $data['pimpinan_perusahaan'],
            'kota' => $data['kota'],
            'provinsi' => $data['provinsi'],
            'kode_pos' => $data['kode_pos'],
            'no_fax' => $data['no_fax'],
            'email_pengguna' => $data['email_pengguna'],
            'jml_pegawai_tetap' => $data['jml_pegawai_tetap'],
            'jml_pegawai_tidak_tetap' => $data['jml_pegawai_tidak_tetap'],
            'jml_line_produksi' => $data['jml_line_produksi'],
            'contact_person' => $data['contact_person'],
            'cp_num' => $data['cp_num'],
            'no_telp' => $data['no_telp'],
            'email_perusahaan' => $data['email_perusahaan'],
            'alamat_pabrik' => $data['alamat_pabrik'],
            'telp_pabrik' => $data['telp_pabrik'],
            'fax_pabrik' => $data['fax_pabrik'],
            'no_npwp' => $no_npwp,
            'npwp' => $npwp,
            'no_nib' => $no_nib,
            'nib' => $nib,
        ]);
    }
}
