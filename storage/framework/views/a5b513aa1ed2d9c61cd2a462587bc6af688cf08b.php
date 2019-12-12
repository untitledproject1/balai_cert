<div class="row">
    <div class="col-lg-7">
        <label>1. Surat Permohonan F.03.01</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->surat_permohonan_sertifikat_sni)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->surat_permohonan_sertifikat_sni)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->surat_permohonan_sertifikat_sni)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->surat_permohonan_sertifikat_sni); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>2. Copy IUI</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->copy_iui)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->copy_iui)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->copy_iui)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->copy_iui); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>3. Copy Akte Notaris Perusahaan</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->copy_akte_notaris_perusahaan)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->copy_akte_notaris_perusahaan)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->copy_akte_notaris_perusahaan)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->copy_akte_notaris_perusahaan); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>4. Copy TDP</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->copy_tdp)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->copy_tdp)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->copy_tdp)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->copy_tdp); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>5. Copy NPWP</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->copy_npwp)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->copy_npwp)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->copy_npwp)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->copy_npwp); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>6. Copy Sertifikat Patent Merek</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->copy_sert_patent_merek)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->copy_sert_patent_merek)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->copy_sert_patent_merek)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->copy_sert_patent_merek); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>7. Copy Sertifikat ISO 9001</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->copy_sert_iso_9001)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->copy_sert_iso_9001)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->copy_sert_iso_9001)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->copy_sert_iso_9001); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>8. Laporan Audit Sistem Mutu Terakhir</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->laporan_audit_sistem_mutu_terakhir)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->laporan_audit_sistem_mutu_terakhir)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->laporan_audit_sistem_mutu_terakhir)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->laporan_audit_sistem_mutu_terakhir); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>9. Panduan Mutu</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->panduan_mutu)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->panduan_mutu)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->panduan_mutu)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->panduan_mutu); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>10. Daftar Induk Dokumen</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->daftar_induk_dok)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->daftar_induk_dok)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->daftar_induk_dok)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->daftar_induk_dok); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>11. Struktur Organisasi</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->struktur_organisasi)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->struktur_organisasi)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->struktur_organisasi)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->struktur_organisasi); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>12. Diagram Alir Proses Produksi</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->diagram_alir_proses_produksi)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->diagram_alir_proses_produksi)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->diagram_alir_proses_produksi)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->diagram_alir_proses_produksi); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>13. Surat Pertujukkan Wakil Manajemen</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->surat_pertunjukkan_wakil_manajemen)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->surat_pertunjukkan_wakil_manajemen)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->surat_pertunjukkan_wakil_manajemen)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->surat_pertunjukkan_wakil_manajemen); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>14. Ilustrasi Pembubuhan Tanda SNI</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->ilustrasi_pembubuhan_tanda_sni)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->ilustrasi_pembubuhan_tanda_sni)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->ilustrasi_pembubuhan_tanda_sni)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->ilustrasi_pembubuhan_tanda_sni); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>15. Tabel Daftar Tipe Produk</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->tabel_daftar_tipe_produk)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->tabel_daftar_tipe_produk)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->tabel_daftar_tipe_produk)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->tabel_daftar_tipe_produk); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>16. Gambar dan Spesifikasi Produk</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->gambar_dan_spesifikasi_produk)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->gambar_dan_spesifikasi_produk)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->gambar_dan_spesifikasi_produk)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->gambar_dan_spesifikasi_produk); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>17. Tata Letak Pabrik</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->tata_letak_pabrik)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->tata_letak_pabrik)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->tata_letak_pabrik)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->tata_letak_pabrik); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>18. Peta Rute Pabrik Dari Bandara Terdekat</label>
    </div>
    <div class="col-lg">
        <?php if(!is_null($dok) && !is_null($dok->peta_rute_pabrik_dari_bandara_terdekat)): ?>
        <a href="<?php echo e(asset('storage/dok/sa/'.$dok->peta_rute_pabrik_dari_bandara_terdekat)); ?>" target="_blank">
            <div class="view_file" style="margin-top: 0;">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>
        <?php else: ?>
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        <?php endif; ?>
    </div>
</div>
<?php if(!is_null($dok) && !is_null($dok->peta_rute_pabrik_dari_bandara_terdekat)): ?>
<div class="row pl-3">
    <div class="col-lg">
        <p>Nama File: <i><?php echo e($dok->peta_rute_pabrik_dari_bandara_terdekat); ?></i></p>
    </div>
</div>
<?php endif; ?>
<hr>

<br>
<?php /**PATH /var/www/html/balai-cert/resources/views/applySA/dalamNegeriSNI.blade.php ENDPATH**/ ?>