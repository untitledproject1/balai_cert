<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class RegisterAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:10',
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
            'contact_person' => 'required',
        ];
    }
}