<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    // private $request = [];
    // public function __construct($user) {
    //     $this->request = $user;
    // }

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'nama_perusahaan' => $user->nama_perusahaan,
            'pimpinan_perusahaan' => $user->pimpinan_perusahaan,
            'alamat_perusahaan' => $user->alamat_perusahaan,
            'kota' => $user->kota,
            'provinsi' => $user->provinsi,
            'kode_pos' => $user->no_telp,
            'no_fax' => $user->no_fax,
            'email_pengguna' => $user->email_pengguna,
            'alamat_pabrik' => $user->alamat_pabrik,
            'telp_pabrik' => $user->telp_pabrik,
            'fax_pabrik' => $user->fax_pabrik,
            'email_perusahaan' => $user->email_perusahaan,
            'jml_pegawai_tetap' => $user->jml_pegawai_tetap,
            'jml_pegawai_tidak_tetap' => $user->jml_pegawai_tidak_tetap,
            'jml_line_produksi' => $user->jml_line_produksi,
            'contact_person' => $user->contact_person,
        ];
    }
}
