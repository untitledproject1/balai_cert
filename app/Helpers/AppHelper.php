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

    public function getMessageProp($kode_tahap, $tahap_sert, $request_sert, $role = null) {
        $data = [];
        $kode_tahap = 24;
        if ($kode_tahap < 11 || $kode_tahap == 13) {
            if ($role == 'client') {
        		$data = ['Seksi Pemasaran'];
            } else {
                $data = [['Client', 'Kabid PJT']];
            }
    	} elseif ($kode_tahap <= 12) {
    		$data = ['Seksi Kerjasama'];
    	} elseif ($kode_tahap == 14 || $kode_tahap == 15) {
    		$data = ['Seksi Keuangan'];
    	} elseif ($kode_tahap == 16 || ($kode_tahap >= 18 && $kode_tahap < 22) ) {
            if ($kode_tahap < 18) {
                if ($role == 'client') {
            		$data = ['Seksi Sertifikasi'];
                } else {
                    $data = [['Client', 'Kabid Paskal']];
                }
            } else {
                if ($kode_tahap == 19) {
                    $data = [['Ketua Tim Teknis', 'Komite Tim Teknis']];
                } else {
                    $data = ['Seksi Sertifikasi'];
                }
            }
    	} elseif ($kode_tahap == 17) {
    		$data = ['Auditor'];
    	} elseif ($kode_tahap >= 22) {
    		if ($request_sert == 'kirim') {
    			$data = ['Subag Umum'];
    		} elseif ($request_sert == 'ambil') {
    			$data = ['Seksi Pemasaran'];
    		}
    	}
        dd($kode_tahap, $data);

        // if () {
        //     # code...
        // }

    	foreach ($tahap_sert as $key => $value) {
    		if ($value->kode_tahap == $kode_tahap+1) {
    			array_push($data, $value->tahapan);
                array_push($data, $value->admin);
    		}
    	}
    	
    	return $data;
    }

    public function getMessageParam($kode_tahap, $tahap_sert) {
        foreach ($tahap_sert as $key => $value) {
            if ($kode_tahap+1 == $value->kode_tahap) {
                $data = ['receiver_id' => $value->receiver_id];
            }
        }

        return $data;
    }
}