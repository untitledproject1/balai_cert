<?php

namespace App\Helpers;

use \Carbon\Carbon; 

/**
* AppHelper berisi beberapa global functions
*/
class AppHelper
{
	public static function instance() {
    	return new AppHelper();
    }

    public function parseDate($string) {
    	return Carbon::createFromFormat('d/m/Y', $string);
    }

    public function getPesan($kode_tahap, $tahap_sert, $request_sert = null) {
    	if ($kode_tahap < 11 || $kode_tahap == 13) {
    		$data = ['Seksi Pemasaran'];
    	} elseif ($kode_tahap <= 11) {
    		$data = ['Seksi Kerjasama'];
    	} elseif ($kode_tahap == 14 || $kode_tahap == 15) {
    		$data = ['Seksi Keuangan'];
    	} elseif ($kode_tahap == 16 || ($kode_tahap >= 18 && $kode_tahap < 22) ) {
    		$data = ['recceiver' => 'Seksi Sertifikasi'];
    	} elseif ($kode_tahap == 17) {
    		$data = ['Auditor'];
    	} elseif ($kode_tahap == 23 || $kode_tahap == 24) {
    		if ($request_sert == 'kirim') {
    			$data = ['Subag Umum'];
    		} else {
    			$data = ['Seksi Pemasaran'];
    		}
    	}

    	foreach ($tahap_sert as $key => $value) {
    		if ($value->kode_tahap == $kode_tahap) {
    			array_push($data, $value->tahapan);
    		}
    	}
    	
    	return $data;
    }
}