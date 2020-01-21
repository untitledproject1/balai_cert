<?php

namespace App\Helpers;

use \Carbon\Carbon; 
use App\Notifications;

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
                        // dd($data);
                    }
                } else {
                    $data = ['receiver_id' => $value->receiver_id];
                }
            }
        }
        // dd($kt, $data, $request_sert);

        return $data;
    }

    public function breadcrumbs($url_segment) {
        Global $breadcrumbs;
        $breadcrumbs = [];

        // list of breadcrumbs //

        function manual_book($url_segment) {
            global $breadcrumbs;
            array_push($breadcrumbs, ['name' => 'Manual Book User', 'url' => Route('manual_book')]);
        }

        function format_dok($url_segment) {
            global $breadcrumbs;
            array_push($breadcrumbs, ['name' => 'Format Dokumen', 'url' => Route('format_dok')]);
        }

        function dashboard($url_segment) {
            global $breadcrumbs;
            array_push($breadcrumbs, ['name' => 'Dashboard', 'url' => Route('dashboard_superAdmin')]);
        }

        function cert_list($url_segment) {
            global $breadcrumbs;
            array_push($breadcrumbs, ['name' => 'List Perusahaan', 'url' => Route('sertifikasi_produk')]);
        }

        function cert_list_produk($url_segment) {
            global $breadcrumbs;
            cert_list($url_segment);
            array_push($breadcrumbs, ['name' => 'List Produk Perusahaan', 'url' => Route('detail_produk', ['company_id' => $url_segment[3]])]);
        }

        // ------------------------- //


        // breadcrumbs selection 

        if ($url_segment['2'] == 'dashboard') {
            dashboard($url_segment);
        } elseif ($url_segment['2'] == 'cert_list') {
            if (isset($url_segment['3'])) {
                cert_list_produk($url_segment);
            } else {
                cert_list($url_segment);
            }
        } elseif ($url_segment['2'] == 'pengaturan') {
            if ($url_segment['3'] == 'format_dok') {
                format_dok($url_segment);
            } else {
                manual_book($url_segment);
            }
        }

        // dd($breadcrumbs);

        return $breadcrumbs;
    }

    public function push_notif($user_ids, $datas, $id_penerima) {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = [
            "Authorization: key=AAAA_JbzqLE:APA91bHUmLyyElawC1fjhnMWkXIhCzoOHQ8Mj5gch9nM3zsc4DUGR3UaLpsYiXegzwNzErezTJevwMu1lfXq16SjBryFcBjPjmk0uBmgAxeX3hUhgkQU2JbeIASbk16UB64ceHQgTENU",
            "Content-Type: application/json"
        ];

        $data = [
            "registration_ids" => [],
            "data" => []
        ];
        
        // store notif log
        $notifDB = new Notifications;
        $notifDB->id = date('YmdHis').''.uniqid();
        $notifDB->title = $datas['title'];
        $notifDB->subtitle = $datas['subtitle'];
        $notifDB->data = $datas['data'];
        $notifDB->user_id = $id_penerima;
        $notifDB->save();

        // set users device id/endpoint
        foreach ($user_ids as $key => $value) {
            array_push($data['registration_ids'], $value);
        }

        // set notification data
        $datas['time'] = date('Y-m-d H:i:s', strtotime($notifDB->created_at));
        $data['data'] = $datas;

        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        // Execute post
        $result = curl_exec($ch);
        
        // Close connection
        curl_close($ch);


        return $result;
    }
}