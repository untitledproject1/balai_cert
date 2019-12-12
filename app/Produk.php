<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    public function user_r()
    {
    	return $this->belongsTo('App\User','id');
    }

    public function detail_tahap() {
    	return $this->belongsTo('App\MasterTahap', 'kode_tahap', 'kode_tahap')->first();
    }
}
