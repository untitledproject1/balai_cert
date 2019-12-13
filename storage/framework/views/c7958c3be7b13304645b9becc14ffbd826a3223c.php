<div class="modal fade bd-example-modal-lg modal-all-doc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dokumen - dokumen semua tahap sertifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="body">
                <div class="container p-3">
                    
                    
                    <h5>Apply SA</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            Surat Permohonan F.03.01<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->surat_permohonan_sertifikat_sni)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->surat_permohonan_sertifikat_sni)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Surat Permohonan F.03.01
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy IUI<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_iui)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_iui)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy IUI
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy Akte Notaris Perusahaan<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_akte_notaris_perusahaan)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_akte_notaris_perusahaan)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy Akte Notaris Perusahaan
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy TDP<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_tdp)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_tdp)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy TDP
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Copy NPWP<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_npwp)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_npwp)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy NPWP
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy Sertifikat Patent Merek<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_sert_patent_merek)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_sert_patent_merek)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy Sertifikat Patent Merek
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy Sertifikat ISO 9001<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_sert_iso_9001)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_sert_iso_9001)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy Sertifikat ISO 9001
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Laporan Audit Sistem Mutu Terakhir<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->laporan_audit_sistem_mutu_terakhir)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->laporan_audit_sistem_mutu_terakhir)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Laporan Audit Sistem Mutu Terakhir
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Panduan Mutu<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->panduan_mutu)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->panduan_mutu)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Panduan Mutu
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Daftar Induk Dokumen<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->daftar_induk_dok)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->daftar_induk_dok)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Daftar Induk Dokumen
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Struktur Organisasi<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->struktur_organisasi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->struktur_organisasi)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Struktur Organisasi
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Diagram Alir Proses Produksi<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->diagram_alir_proses_produksi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->diagram_alir_proses_produksi)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Diagram Alir Proses Produksi
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Surat Pertujukkan Wakil Manajemen<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->surat_pertunjukkan_wakil_manajemen)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->surat_pertunjukkan_wakil_manajemen)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Surat Pertujukkan Wakil Manajemen
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Ilustrasi Pembubuhan Tanda SNI<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->ilustrasi_pembubuhan_tanda_sni)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->ilustrasi_pembubuhan_tanda_sni)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Ilustrasi Pembubuhan Tanda SNI
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Tabel Daftar Tipe Produk<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->tabel_daftar_tipe_produk)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->tabel_daftar_tipe_produk)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Tabel Daftar Tipe Produk
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Gambar dan Spesifikasi Produk<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->gambar_dan_spesifikasi_produk)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->gambar_dan_spesifikasi_produk)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Gambar dan Spesifikasi Produk
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Tata Letak Pabrik<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->tata_letak_pabrik)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->tata_letak_pabrik)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Tata Letak Pabrik
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Peta Rute Pabrik Dari Bandara Terdekat<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->peta_rute_pabrik_dari_bandara_terdekat)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->peta_rute_pabrik_dari_bandara_terdekat)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Peta Rute Pabrik Dari Bandara Terdekat
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            No NPWP : <br>
                            <b><?php echo e($user->no_npwp); ?></b>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>

                    

                    <hr>
                    <h5>MOU</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            MOU<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->mou)): ?>
                                <a href="<?php echo e(url('/doc/download/mou/'.$sert_doc->mou)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download MOU
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Penawaran Harga</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            Penawaran Harga<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->bid_price)): ?>
                                <a href="<?php echo e(url('/doc/download/bidPrice/'.$sert_doc->bid_price)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Penawaran Harga
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Invoice<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->invoice)): ?>
                                <a href="<?php echo e(url('/doc/download/invoice/'.$sert_doc->invoice)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Invoice
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Kode Biling<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->kode_biling)): ?>
                                <a href="<?php echo e(url('/doc/download/kodeBiling/'.$sert_doc->kode_biling)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Kode Biling
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Bukti Pembayaran<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->bukti_bayar)): ?>
                                <a href="<?php echo e(url('/doc/download/buktiBayar/'.$sert_doc->bukti_bayar)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Bukti Pembayaran
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Surat Pemberitahuan Jadwal dan Tim Audit</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            Surat Pemberitahuan Jadwal dan Tim Audit<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->jadwal_audit)): ?>
                                <a href="<?php echo e(url('/doc/download/jadwalAudit/'.$sert_doc->jadwal_audit)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Surat Pemberitahuan Jadwal dan Tim Audit
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Laporan Audit Kecukupan Sertifikasi Produk</h5>
                    <b>Perusahaan Dalam Negeri (Importir)</b>
                    <div class="row">
                        <div class="col-lg-3">
                            Surat Permohonan F.03.01<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->surat_permohonan_sertifikat_sni)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->surat_permohonan_sertifikat_sni)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Surat Permohonan F.03.01
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy IUI<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_iui)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_iui)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy IUI
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy Akte Notaris Perusahaan<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_akte_notaris_perusahaan)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_akte_notaris_perusahaan)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy Akte Notaris Perusahaan
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy TDP<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_tdp)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_tdp)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy TDP
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Copy NPWP<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_npwp)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_npwp)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy NPWP
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy Angkat Pengenal Importir (API)<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_api)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_api)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy Angkat Pengenal Importir (API)
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Copy Sertifikat Patent Merek/TandaBuktiPendaftaran Paten Merek<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_sert_patent_merek)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->copy_sert_patent_merek)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Copy Sertifikat Patent Merek/TandaBuktiPendaftaran Paten Merek
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="col-lg-3">
                            Penunjukan Distributor (<i>contract agreement manufacturer & importer)</i><br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->copy_sert_patent_merek)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->penunjukkan_distributor)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Penunjukan Distributor <i style="color: #fff;">(contract agreement manufacturer & importer)</i>
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Struktur Organisasi<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->struktur_organisasi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->struktur_organisasi)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Struktur Organisasi
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Ilustrasi Pembubuhan Tanda SNI<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->ilustrasi_pembubuhan_tanda_sni)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->ilustrasi_pembubuhan_tanda_sni)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Ilustrasi Pembubuhan Tanda SNI
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Tabel Daftar Tipe/ kategori produk yang akan di SNI-kan<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->tabel_daftar_tipe_produk)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->tabel_daftar_tipe_produk)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Tabel Daftar Tipe/ kategori produk yang akan di SNI-kan
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Gambar dan spesifikasi produk yang akan di SNI-kan (katalog)<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->gambar_dan_spesifikasi_produk)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->gambar_dan_spesifikasi_produk)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Gambar dan spesifikasi produk yang akan di SNI-kan (katalog)
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Laporan pengawasan ISO 9001 terakhir<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->gambar_dan_spesifikasi_produk)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->laporan_pengawasan_iso_9001_terakhir)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Laporan pengawasan ISO 9001 terakhir
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <b>Tinjauan Proses Produksi</b>
                    <div class="row">
                        <div class="col-lg-3">
                            Struktur Organisasi (Bhs. Inggris atau Bhs. Indonesia)<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->struktur_organisasi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->struktur_organisasi_tp)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Struktur Organisasi (Bhs. Inggris atau Bhs. Indonesia)
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Diagram Alir Produksi/ Prosedur Operasi (<i>Bhs. Inggris atau Bhs. Indonesia</i>)<br>
                            
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->diagram_alir_produksi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->diagram_alir_produksi)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Diagram Alir Produksi/ Prosedur Operasi <i style="color: #fff;">(Bhs. Inggris atau Bhs. Indonesia)</i>
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Daftar Peralatan<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->struktur_organisasi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->daftar_peralatan)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Daftar Peralatan
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Spesifikasi bahan baku<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->struktur_organisasi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->spesifikasi_peralatan)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Spesifikasi bahan baku
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            Tata Letak/ layout pabrik (Bhs. Inggris atau Bhs. Indonesia)<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->struktur_organisasi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->tata_letak_pabrik_tp)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Tata Letak/ layout pabrik (Bhs. Inggris atau Bhs. Indonesia)
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Peta rute pabrik dari bandara terdekat<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->struktur_organisasi)): ?>
                                <a href="<?php echo e(url('/doc/download/sa/'.$sert_doc->peta_letak_pabrik_dari_bandara_terdekat)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Peta rute pabrik dari bandara terdekat
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Laporan Hasil Sertifikasi</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            SHU<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->shu)): ?>
                                <a href="<?php echo e(url('/doc/download/shu/'.$sert_doc->shu)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download SHU
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            BAPC<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->bapc)): ?>
                                <a href="<?php echo e(url('/doc/download/bapc/'.$sert_doc->bapc)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download BAPC
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Closed NCR<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->closed_ncr)): ?>
                                <a href="<?php echo e(url('/doc/download/closedNCR/'.$sert_doc->closed_ncr)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Closed NCR
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Laporan Hasil Sertifikasi<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->laporan_hasil_sert)): ?>
                                <a href="<?php echo e(url('/doc/download/lapSert/'.$sert_doc->laporan_hasil_sert)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Laporan Hasil Sertifikasi
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Draft Sertifikat</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            Lembar Konfirmasi Sertifikat<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->lembar_konSert)): ?>
                                <a href="<?php echo e(url('/doc/download/konfirmasiSert/'.$sert_doc->lembar_konSert)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Lembar Konfirmasi Sertifikat
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Draft Sertifikat<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->draft_sert)): ?>
                                <a href="<?php echo e(url('/doc/download/draftSert/'.$sert_doc->draft_sert)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Draft Sertifikat
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            Resi Pengiriman<br>
                            <div class="text-center" style="font-size: 14px;">
                                <?php if(!is_null($sert_doc) && !is_null($sert_doc->resi_pengiriman)): ?>
                                <a href="<?php echo e(url('/doc/download/resi/'.$sert_doc->resi_pengiriman)); ?>" target="_blank">
                                    <div class="download_file">
                                        <i class="fas fa-download"></i>&nbsp; Download Resi Pengiriman
                                    </div>
                                </a>
                                <?php else: ?>
                                <p class="alert alert-warning">Dokumen belum ada</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/html/balai-cert/resources/views/modal_all_doc.blade.php ENDPATH**/ ?>