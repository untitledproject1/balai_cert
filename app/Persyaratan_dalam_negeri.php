<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persyaratan_dalam_negeri extends Model
{
	// Dok importir
	// - daftar_isian_dan_kuesioner_importer
	// - copy_api
	// - penunjukkan_distributor
	// - sert_smm
	// - laporan_pengawasan_iso_9001_terakhir


    protected $table = 'persyaratan_dok_dalam_negeri';

    public function getReview() {
    	return $this->hasOne('App\ReviewDokImportir', 'id', 'review_dok_importir_id')->first();
    }

    public function getDokImpor() {
    	return $this->hasOne('App\DokImportir', 'id');
    }
    
    public function produk_relation() {
    	return $this->hasOne('App\Produk','id');
    }

    public function review() {
    	$dokImportir = $this->getDokImpor()->first();
    	$result = null;
    	if (!is_null($dokImportir)) {
    		$result = $dokImportir->getReview();
    	}
    	return $result;
    }

    public function flashMsg_applySA($idProduk) {
        $db = $this->where('produk_id', $idProduk)->select('sni')->first();
        $info_tambahan = InfoTambahan::where('produk_id', $idProduk)->select('lengkap')->first();
        if ( (!is_null($db) && $db->sni === 2) || (!is_null($info_tambahan) && $info_tambahan->lengkap === 2) ) {
            return 'Seksi Pemasaran telah memverifikasi form Apply SA anda!';
        }
    }

    protected function reqVal($request, $index, $int, $tgl = false) {
        if ($int) {
            return isset($request[$index]) ? intval($request[$index]) : null;
        } elseif ($tgl) {
            if (!is_null($request[$index])) {
                return date('Y-m-d', strtotime($request[$index]));
            }
            return null;
        }
        return isset($request[$index]) ? $request[$index] : null;
    }

    protected function hiddenC($request, $dataExists, $index) {
        if (is_null($request)) {
            if ($index === false) {
                $data = json_decode($dataExists);
            } else {
                $data = json_decode($dataExists)[$index];
            }
        } else {
            $data = $request;
        }
        return $data;
    }

    protected function uploadD($pengisianManual, $fileExists, $location) {
        if (!is_null($pengisianManual)) {
            if (!is_null($fileExists) && \Storage::exists('dok/dokKuesioner/'.$location.'/'.$fileExists)) {
                \Storage::delete('dok/dokKuesioner/'.$location.'/'.$fileExists);
            }
            return null;
        }
        return $fileExists;
    }

    protected function singleC($request, $req, $c1, $c2) {
        $data = [null, null];
        if ($req === 1) {
            if (is_array($c1)) {
                $data[0] = is_null($c1) ? null : $this->hiddenC($this->reqVal($request, $c1[0], $c1[1]), $c1[2], $c1[3]);
            } else {
                $data[0] = $c1;
            }
            $data[1] = null;
        } elseif ($req === 0) {
            if (is_array($c2)) {
                $data[1] = is_null($c2) ? null : $this->hiddenC($this->reqVal($request, $c2[0], $c2[1]), $c2[2], $c2[3]);
            } else {
                $data[1] = $c2;
            }
            $data[0] = null;
        }
        return $data;
    }

    public function info_tambahan($request, $produk_id, $model, $formAction) {
        $db = $model->where('produk_id', $produk_id)->first();
        if (is_null($db)) {
            $dbs = $model;
            $dbs->produk_id = $produk_id;
        } else {$dbs = $db;}

        
        $dbs->kuis1_opsi = $this->reqVal($request, 'opsi1', true);
        if (!isset($request['penerbitSertSNI'])) {
            $isi1 = json_decode($dbs->kuis1_isi);
        } else {
            $isi1 = [$this->reqVal($request, 'penerbitSertSNI', false), $this->reqVal($request, 'masaBerlakuSNI', false)];

        }
        $dbs->kuis1_isi = $dbs->kuis1_opsi === 1 ? json_encode($isi1 , true) : 'null';

        $dbs->kuis2_opsi = $this->reqVal($request, 'opsi2', true);
        $dbs->kuis2_isi = $this->reqVal($request, 'detailGroup', false) != null ? $this->reqVal($request, 'detailGroup', false) : 'null';

        $dbs->kuis3_opsi = $this->reqVal($request, 'opsi3', true);
        if (!isset($request['namaComp'])) {
            $isi3 = json_decode($dbs->kuis3_isi);
        } else {
            $isi3 = [$this->reqVal($request, 'namaComp', false), $this->reqVal($request, 'alamatComp', false)];
        }
        $dbs->kuis3_isi = $dbs->kuis3_opsi === 1 ? json_encode($isi3 , true) : 'null';

        $dbs->kuis4_opsi = $this->reqVal($request, 'opsi4', true);
        if ($dbs->kuis4_opsi === 1) {
            $isi4 = !isset($request['perbitSertISO']) ? json_decode($dbs->kuis4_isi) : [[$this->reqVal($request, 'perbitSertISO', false), $this->reqVal($request, 'masaBerlakuISO', false)], null];
        } elseif ($dbs->kuis4_opsi === 0) {
            $isi4 = !isset($request['opsi4_tidak']) ? json_decode($dbs->kuis4_isi) : [null, $this->reqVal($request, 'opsi4_tidak', true)];
        } else {
            $isi4 = null;
        }
        $dbs->kuis4_isi = json_encode(!is_null($dbs->kuis4_opsi) ? $isi4 : null, true);

        $dbs->kuis5_opsi = $this->reqVal($request, 'opsi5', true);

        $dbs->kuis6 = $this->reqVal($request, 'siapSertDate', false, true);
        if ($formAction == 'false') {
            $dbs->lengkap = 3;
        }

        $dbs->save();
        return $dbs;
    }

    public function kuesioner($request, $produk_id, $model, $formAction) {
        $db = $model->where('produk_id', $produk_id)->first();
        if (is_null($db)) {
            $dbs = $model;
            $dbs->produk_id = $produk_id;
        } else {$dbs = $db;}

        $dbs->kuis1 = $this->reqVal($request, 'evalDate', false, true);

        $dbs->kuis2 = $this->reqVal($request, 'contoh', true);

        $k3 = $this->singleC($request, $this->reqVal($request, 'proses', true), null, ['waktuProduksi', false, $dbs->kuis3, 1]);
        $dbs->kuis3 = json_encode([$this->reqVal($request, 'proses', true), $k3[1]], true);

        $ps = $this->reqVal($request, 'produkStandar', false) != null ? uniqid().''.date('YmdHis').'.'.$request['produkStandar']->extension() : null;
        if (!is_null(json_decode($dbs->kuis4)[1]) && $this->reqVal($request, 'kesudahan', true) === 0) {
            if (!is_null(json_decode($dbs->kuis4)[1]) && \Storage::exists('dok/dokKuesioner/standarProduk/'.json_decode($dbs->kuis4)[1])) {
                \Storage::delete('dok/dokKuesioner/standarProduk/'.json_decode($dbs->kuis4)[1]);
            }
        }
        $k4 = $this->singleC($request, $this->reqVal($request, 'kesudahan', true), json_decode($dbs->kuis4)[1], null);
        $dbs->kuis4 = json_encode([
            $this->reqVal($request, 'kesudahan', true), $k4[0]], true);

        $k111 = $this->singleC($request, $this->reqVal($request, 'produksi', true), ['kelompokProduk', true, $dbs->kuis_111, 1], null);
        $dbs->kuis_111 = json_encode([$this->reqVal($request, 'produksi', true), $k111[0]], true);

        $k112 = $this->singleC($request, $this->reqVal($request, 'orderKerja', true), ['bagianOrderKerja', true, $dbs->kuis_112, 1], ['isolasiProduk', false, $dbs->kuis_112, 2]);
        $dbs->kuis_112 = json_encode([$this->reqVal($request, 'orderKerja', true), $k112[0], $k112[1]], true);
        $dbs->kuis_113 = $this->reqVal($request, 'infoLain', false);
        $dbs->kuis_121 = $this->reqVal($request, 'kepalaJaminan', false);
        $dbs->kuis_122 = $this->reqVal($request, 'lapor', false);

        $k123 = $this->singleC($request, $this->reqVal($request, 'departementTerpisah', true), ['dt', false, $dbs->kuis_123, 1], null);
        $dbs->kuis_123 = json_encode([$this->reqVal($request, 'departementTerpisah', true), $k123[0]], true);

        $dbs->kuis_124 = $this->reqVal($request, 'kepalaInspek', false);
        $dbs->kuis_125 = $this->reqVal($request, 'pemahamanPengujian', true);

        $k126 = [$this->reqVal($request, 'material', true), $this->reqVal($request, 'prosesOperasi', true), $this->reqVal($request, 'produkAkhir', true)];
        $count = count($k126);
        foreach ($k126 as $key => $value) {
            if ($value != 1) {
                $count--;
            }
        }
        $k126_ = $this->singleC($request, $count !== 0 ? 1 : 0, ['pengawasanPersonel', true, $dbs->kuis_126, 1], null);
        $dbs->kuis_126 = json_encode([$k126, $k126_[0]], true);
        
        $k127 = $this->singleC($request, $this->reqVal($request, 'auditMutu', true), ['auditMutu2', false, $dbs->kuis_127, 1], null);
        $dbs->kuis_127 = json_encode([$this->reqVal($request, 'auditMutu', true), $k127[0]], true);

        $dbs->kuis_128 = $this->reqVal($request, 'infoPengendalianMutu', false);
        if ($formAction == 'false') {
            $dbs->lengkap = 3;
        }
        
        $dbs->save();
        return $dbs;
    }

    public function bahan_hasil($request, $produk_id, $model, $formAction) {
        $db = $model->where('produk_id', $produk_id)->first();
        if (is_null($db)) {
            $dbs = $model;
            $dbs->produk_id = $produk_id;
        } else {
            $dbs = $db;
        }

        $sData = [];
        if ($this->reqVal($request, 'jenisbahan', false) != null) {
            foreach ($request['jenisbahan'] as $key => $value) {
                array_push($sData, [
                    "jenis_bahan" => $value,
                    "spesifikasi" => $request['spek'][$key],
                    "pemasok" => $request['namaPemasok'][$key]
                ]);
            }
            $dbs->spek_pembelian = json_encode($sData, true);
        }
        $dbs->form_21 = $this->uploadD($this->reqVal($request, 'jenisbahan', false), $dbs->form_21, 'spekPembelian');
        if (!is_null($dbs->form_21)) {
            $dbs->spek_pembelian = null;
        }

        $dbs->form_22 = json_encode([
            $this->uploadD($this->reqVal($request, 'metodeJaminanMutu', false), json_decode($dbs->form_22)[0], 'jaminanMutu'), 
            $this->reqVal($request, 'metodeJaminanMutu', false) !== null ? $this->reqVal($request, 'metodeJaminanMutu', false) : null], true);

        $dbs->form_31 = json_encode([
            $this->uploadD($this->reqVal($request, 'rincianProduksi', false), json_decode($dbs->form_31)[0], 'rincianProduksi'), 
            $this->reqVal($request, 'rincianProduksi', false) !== null ? $this->reqVal($request, 'rincianProduksi', false) : null], true);

        $dbs->form_32 = json_encode([
            $this->uploadD($this->reqVal($request, 'jenisPemeliharaan', false), json_decode($dbs->form_32)[0], 'jenisPemeliharaan'),
            $this->reqVal($request, 'jenisPemeliharaan', false) !== null ? $this->reqVal($request, 'jenisPemeliharaan', false) : null], true);

        $dbs->form_41 = json_encode([
            $this->uploadD(null, json_decode($dbs->form_41)[0], 'pengendalianMutu'),
            $this->reqVal($request, 'pengendalianMutu', false) !== null ? $this->reqVal($request, 'pengendalianMutu', false) : null], true);

        $pData = [];
        if ($this->reqVal($request, 'namaAlat', false) != null) {
            foreach ($request['namaAlat'] as $key => $value) {
                array_push($pData, [
                    "nama_alat" => $value,
                    "nama_pembuat" => $request['namaPembuat'][$key],
                    "acuan" => $request['acuan'][$key],
                    "sistem" => $request['sistemP'][$key],
                    "sertifikat" => $request['sert'][$key]
                ]);
            }
            $dbs->peralatan = json_encode($pData, true);
        } 
        $dbs->form_42 = $this->uploadD($this->reqVal($request, 'namaAlat', false), $dbs->form_42, 'rincianPeralatan');
        if (!is_null($dbs->form_42)) {
            $dbs->peralatan = null;
        }

        // $dbs->form_511 = json_encode([
        //     $this->uploadD($this->reqVal($request, 'spekUtama', false), json_decode($dbs->form_511)[0], 'spekUtama'), 
        //     $this->reqVal($request, 'spekUtama', false) !== null ? $this->reqVal($request, 'spekUtama', false) : null], true);
        $dbs->form_511 = json_encode([
            $this->uploadD(null, json_decode($dbs->form_511)[0], 'spekUtama'), 
            $this->reqVal($request, 'spekUtama', false)], true);

        // $dbs->form_512 = json_encode([
        //     $this->uploadD($this->reqVal($request, 'jenisSistem', false), json_decode($dbs->form_512)[0], 'jenisSistem'), 
        //     $this->reqVal($request, 'jenisSistem', false) !== null ? $this->reqVal($request, 'jenisSistem', false) : null], true);
        $dbs->form_512 = json_encode([
            $this->uploadD(null, json_decode($dbs->form_512)[0], 'jenisSistem'), 
            $this->reqVal($request, 'jenisSistem', false)], true);

        // $dbs->form_521 = json_encode([
        //     $this->uploadD($this->reqVal($request, 'tingkatCacat', false), json_decode($dbs->form_521)[0], 'tingkatCacat'), 
        //     $this->reqVal($request, 'tingkatCacat', false) !== null ? $this->reqVal($request, 'tingkatCacat', false) : null], true);
        $dbs->form_521 = json_encode([
            $this->uploadD(null, json_decode($dbs->form_521)[0], 'tingkatCacat'), 
            $this->reqVal($request, 'tingkatCacat', false)], true);

        $dbs->form_522 = json_encode([
            $this->uploadD(null, json_decode($dbs->form_522)[0], 'lampiranPengujian'), 
            $this->reqVal($request, 'pengujian', false) !== null ? $this->reqVal($request, 'pengujian', false) : null], true);

        // $dbs->form_523 = json_encode([
        //     $this->uploadD($this->reqVal($request, 'tingkatKeluhan', false), json_decode($dbs->form_523)[0], 'tingkatKeluhan'), 
        //     $this->reqVal($request, 'tingkatKeluhan', false) !== null ? $this->reqVal($request, 'tingkatKeluhan', false) : null], true);
        $dbs->form_523 = json_encode([
            $this->uploadD(null, json_decode($dbs->form_523)[0], 'tingkatKeluhan'), 
            $this->reqVal($request, 'tingkatKeluhan', false)], true);

        if (!is_null(json_decode($dbs->form_524)[1]) && $this->reqVal($request, 'pengujianI', true) === 0) {
            if (\Storage::exists('dok/dokKuesioner/pengujiIndependen/'.json_decode($dbs->form_524)[1])) {
                \Storage::delete('dok/dokKuesioner/pengujiIndependen/'.json_decode($dbs->form_524)[1]);
            }
        }
        $k524 = [null, null];
        if ($this->reqVal($request, 'pengujianI', true) === 1) {
            $k524[0] = $this->uploadD(null, json_decode($dbs->form_524)[1], 'pengujiIndependen');
            $k524[1] = $this->reqVal($request, 'pengujiIndependen', false) != null ? $this->reqVal($request, 'pengujiIndependen', false) : null;
        } elseif ($this->reqVal($request, 'pengujianI', true) === 0) {
            $k524[0] = null;
            $k524[1] = null;
        }
        $dbs->form_524 = json_encode([
            $this->reqVal($request, 'pengujianI', true) !== null ? $this->reqVal($request, 'pengujianI', true) : null, 
            $k524[0], $k524[1]], true);

        if ($formAction == 'false') {
            $dbs->lengkap = 3;
        }
        $dbs->save();

        return $dbs;
    }

    public function verifyKuis($request, $db, $infoT) {
        $pesan = isset($request['pesan']) ? $request['pesan'] : null;
        $dokDalamNegeri = $db;
        $success = true;
        $failed = [];
        if ($infoT['kuis_opsi'] != '1') {
            $success = false;
        }
        $lengkap = !$success ? 2 : 1;
        $dokDalamNegeri->pesan_form_kuesioner = $pesan;
        return [$lengkap, $dokDalamNegeri];
    }
} 
