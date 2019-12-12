<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Produk;

class ProdukTransformer extends TransformerAbstract
{
    // private $request = [];
    // public function __construct($produk) {
    //     $this->request = $produk;
    // }

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Produk $produk)
    {
        return [
            'produk' => $produk->id,
            'nama_produk' => $produk->produk,
            'jenis_produk' => $produk->jenis_produk,
            'kode_tahap' => $produk->kode_tahap,
            'sert_id' => $produk->sert_id,
            'draft_sert' => $produk->draft_sert,
            'status_sert_jadi' => $produk->status_sert_jadi,
            'pesan_sert' => $produk->pesan_sert,
            'request_sert' => $produk->request_sert,
            'tgl_request_sert' => $produk->tgl_request_sert,
            'resi_pengiriman' => $produk->resi_pengiriman,
            'alamat_kirim' => $produk->alamat_kirim,
        ];
    }
}
