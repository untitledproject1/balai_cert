<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanAudit extends Model
{
    protected $table = 'laporan_audit';

    public function jadwal_audit() {
    	return $this->hasOne('App\JadwalAudit', 'id', 'jadwal_audit_id');
    }

    public function dokImportir() {
    	return $this->hasOne('App\Persyaratan_dalam_negeri', 'id', 'dok_importir_id')->first();
    }

    public function dokManufaktur() {
    	return $this->hasOne('App\DokManufaktur', 'id', 'dok_manufaktur_id')->first();
    }

    public function tinjauanPP() {
    	return $this->hasOne('App\TinjauanPP', 'id', 'tinjauan_pp_id')->first();
    }

    public function getDocAudit($idProduk, $dok_manufaktur_id, $tinjauan_pp_id) {
        $dbImportir = \DB::table('persyaratan_dok_dalam_negeri as dn')
            ->leftJoin('review_dok_importir as rvI', 'rvI.id', '=', 'dn.review_dok_importir_id')
            ->where('dn.produk_id', $idProduk)
            ->select('dn.*', 
                'rvI.id as rvI_id',
                'rvI.surat_permohonan_sertifikat_sni as rvI_surat_permohonan_sertifikat_sni',
                'rvI.daftar_isian_dan_kuesioner_importer as rvI_daftar_isian_dan_kuesioner',
                'rvI.copy_iui as rvI_copy_iui',
                'rvI.copy_akte_notaris_perusahaan as rvI_copy_akte_notaris_perusahaan',
                'rvI.copy_npwp as rvI_copy_npwp',
                'rvI.copy_tdp as rvI_copy_tdp',
                'rvI.copy_api as rvI_copy_api',
                'rvI.copy_sert_patent_merek as rvI_copy_sert_patent_merek',
                'rvI.penunjukkan_distributor as rvI_penunjukkan_distributor',
                'rvI.struktur_organisasi as rvI_struktur_organisasi',
                'rvI.ilustrasi_pembubuhan_tanda_sni as rvI_ilustrasi_pembubuhan_tanda_sni',
                'rvI.tabel_daftar_tipe_produk as rvI_tabel_daftar_tipe_produk',
                'rvI.gambar_dan_spesifikasi_produk as rvI_gambar_dan_spesifikasi_produk',
                'rvI.sert_smm as rvI_sert_smm',
                'rvI.laporan_pengawasan_iso_9001_terakhir as rvI_laporan_pengawasan_iso_9001_terakhir'
            )
            ->first();

        // $dbManufaktur = \DB::table('dok_manufaktur as dm')
        //  ->leftJoin('review_dok_manufaktur as rvM', 'rvM.id', '=', 'dm.review_dok_manufaktur_id')
        //  ->where('dm.id', $dok_manufaktur_id)
        //  ->select('dm.*', 
        //      'rvM.id as rvM_id',
        //      'rvM.surat_permohonan_dari_manufaktur as rvM_surat_permohonan_dari_manufaktur',
        //      'rvM.daftar_isian_dan_kuesioner_manufaktur as rvM_daftar_isian_dan_kuesioner_manufaktur',
        //      'rvM.izin_usaha_manufaktur as rvM_izin_usaha_manufaktur',
        //      'rvM.sert_iso_9001 as rvM_sert_iso_9001',
        //      'rvM.laporan_pengawasan_iso_9001_terakhir as rvM_laporan_pengawasan_iso_9001_terakhir',
        //      'rvM.struktur_organisasi as rvM_struktur_organisasi',
        //      'rvM.diagram_alir_produksi as rvM_diagram_alir_produksi',
        //      'rvM.panduan_mutu as rvM_panduan_mutu',
        //      'rvM.daftar_induk_dok as rvM_daftar_induk_dok',
        //      'rvM.surat_penunjukkan_wakil_manajemen as rvM_surat_penunjukkan_wakil_manajemen',
        //      'rvM.tata_letak_pabrik as rvM_tata_letak_pabrik',
        //      'rvM.peta_rute_pabrik_dari_bandara_terdekat as rvM_peta_rute_pabrik_dari_bandara_terdekat'
        //  )
        //  ->first();

        $dbTinjauan = \DB::table('tinjauan_pp as tp')
            ->leftJoin('review_tinjauan_pp as rvT', 'rvT.id', '=', 'tp.review_tinjauan_pp_id')
            ->where('tp.id', $tinjauan_pp_id)
            ->select('tp.*', 
                'rvT.id as rvT_id',
                'rvT.struktur_organisasi as rvT_struktur_organisasi',
                'rvT.diagram_alir_produksi as rvT_diagram_alir_produksi',
                'rvT.daftar_peralatan as rvT_daftar_peralatan',
                'rvT.spesifikasi_peralatan as rvT_spesifikasi_peralatan',
                'rvT.tata_letak_pabrik as rvT_tata_letak_pabrik',
                'rvT.peta_letak_pabrik_dari_bandara_terdekat as rvT_peta_letak_pabrik_dari_bandara_terdekat'
            )
            ->first();

        // return [$dbImportir, $dbManufaktur, $dbTinjauan];
        return [$dbImportir, $dbTinjauan];
    }

    public function cekDokSert_arr($request) {
        // $arr = [
        //     [new Persyaratan_dalam_negeri, 'dokImportir', new ReviewDokImportir, 'review_dok_importir_id', 'dok_importir_id'],
        //     [new DokManufaktur, 'dokManufaktur', new ReviewDokManufaktur, 'review_dok_manufaktur_id', 'dok_manufaktur_id'],
        //     [new TinjauanPP, 'tinjauanPP', new ReviewTinjauanPP, 'review_tinjauan_pp_id', 'tinjauan_pp_id']
        // ];
        $arr = [
            [new Persyaratan_dalam_negeri, 'dokImportir', new ReviewDokImportir, 'review_dok_importir_id', 'dok_importir_id'],
            [new TinjauanPP, 'tinjauanPP', new ReviewTinjauanPP, 'review_tinjauan_pp_id', 'tinjauan_pp_id']
        ];
        foreach ($request->fileName as $key => $value) {
            // $dokKey = $key != count($request->fileName)-1 ? $key+1 : $key;
            if (explode(',', $value)[1] == 'dokImportir') {$index = 0;}
            else {$index = 1;}
            $review = isset($request->review[$key]) ? $request->review[$key] : null;
            array_push($arr[$index], [explode(',', $value)[0], $request->dok[$key], $review]);
        }
        // dd($request->fileName, $request->dok, $arr);

        return $arr;
    }

    public function getTableAudit($table, $key, $la, $idProduk) {
        if (!is_null($la) && $key == 0) {
            $tb = $table->where('produk_id', $idProduk)->first();
            $getTable = !is_null($tb) ? $tb : $table;
        } elseif (!is_null($la) && $key == 1) {
            $getTable = !is_null($la->tinjauanPP()) ? $la->tinjauanPP() : $table;
        }

        return $getTable;
    }

    public function dokAudit($request) { 
        // $arr = [
        //     [new Persyaratan_dalam_negeri, 'dokImportir', new ReviewDokImportir],
        //     [new DokManufaktur, 'dokManufaktur', new ReviewDokManufaktur],
        //     [new TinjauanPP, 'tinjauanPP', new ReviewTinjauanPP]
        // ];
        $arr = [
            [new Persyaratan_dalam_negeri, 'dokImportir', new ReviewDokImportir],
            [new TinjauanPP, 'tinjauanPP', new ReviewTinjauanPP]
        ];
        foreach ($request->fileName as $key => $value) {
            // $dokKey = $key != count($request->fileName)-1 ? $key+1 : $key;
            if (explode(',', $value)[1] == 'dokImportir') {$index = 0;}
            else {$index = 1;}
            array_push($arr[$index], [explode(',', $value)[0], $request->dok[$key]]);
        }
        
        return $arr;
    }

    public function flashMsg_laporanAudit($idProduk) {
        $laporanAudit = $this->where('produk_id', $idProduk)->first();
        $dbImportir = null;
        $dbTinjauan = null;
        $flashInfo = null;
        if (!is_null($laporanAudit)) {
            $dok_audit = $this->getDocAudit($idProduk, $laporanAudit->dok_manufaktur_id, $laporanAudit->tinjauan_pp_id);
            $dbImportir = $dok_audit[0];
            // $dbManufaktur = $dok_audit[1];
            $dbTinjauan = $dok_audit[1];

            if ( (!is_null($dbImportir) && $dbImportir->sni === 2) || (!is_null($dbTinjauan) && $dbTinjauan->sni === 2) ) {
                $flashInfo = 'Auditor telah memverifikasi Laporan Audit Kecukupan Sertifikasi Produk';
            }
        }
        return $flashInfo;
    }
}
