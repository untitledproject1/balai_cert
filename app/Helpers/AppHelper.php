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
        // $kode_tahap = 10;
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
    		if ($role == 'client') {
                if ($request_sert == 'kirim') {
        			$data = ['Subag Umum'];
        		} elseif ($request_sert == 'ambil') {
        			$data = ['Seksi Pemasaran'];
        		}
            } else {
                $data = ['Client'];
            }
    	}

        $kt = $kode_tahap != '24' ? $kode_tahap+1 : $kode_tahap;
    	foreach ($tahap_sert as $key => $value) {
    		if ($value->kode_tahap == $kt) {
    			array_push($data, $value->tahapan);

                if ($kt == 23 || $kt == 24) {
                    $rcvr = explode(',', $value->receiver);
                    if ($request_sert == 'kirim') {
                        array_push($data, $rcvr[1]);
                    } elseif ($request_sert == 'ambil') {
                        array_push($data, $rcvr[0]);
                    }
                } else {
                    array_push($data, $value->receiver);
                }
    		}
    	}
        // dd($data, $kode_tahap, $request_sert);
    	
    	return $data;
    }

    public function getMessageParam($kode_tahap, $tahap_sert, $request_sert = null) {
        $kt = $kode_tahap != '24' ? $kode_tahap+1 : $kode_tahap;
        foreach ($tahap_sert as $key => $value) {
            if ($kt == $value->kode_tahap) {

                if ($kt == 23 || $kt == 24) {
                    $rId = explode(',', $value->receiver_id);
                    if ($request_sert == 'kirim') {
                        $data = ['receiver_id' => $rId[1]];
                    } elseif ($request_sert == 'ambil') {
                        $data = ['receiver_id' => $rId[0]];
                    }
                } else {
                    $data = ['receiver_id' => $value->receiver_id];
                }
            }
        }
        // dd($kt, $data);

        return $data;
    }
}