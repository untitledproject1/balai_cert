

<div class="header_kuis">
    <h6>
        <center><b>B.1 - Organisasi Pabrik</b></center>
    </h6>
</div>

<br>

<div class="row">
    <div class="col-lg">
        <b>1.1. Prosedur Produksi</b>
    </div>
</div>

<div class="ml-4">
    <div class="row mb-3">
        <div class="col-lg">
            <b>Berikan Informasi tentang sistem secara garis besar</b>
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg">
            1.1.1. Apakah anda memproduksi berdasarkan pesanan atau untuk persedian?
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 0)) && $isi($kuesioner, 'kuis_111' , 0)===1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_111', 'ya', false)" name="produksi" value="1">Pesanan
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 0)) && $isi($kuesioner, 'kuis_111' , 0) !==1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_111', 'tidak', false)" name="produksi" value="0">Persediaan
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="ml-3 kuis_111 <?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 0)) && $isi($kuesioner, 'kuis_111' , 0)===1 ? '' : 'hid'); ?>">

        <div class="row">
            <div class="col-lg">
                <div class="col-lg">Jika <b>Pesanan</b>, Apakah digunakan sebagai identifikasi kelompok produk yang terpisah?</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <label class="container_radio">
                    <input class="inpt" <?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 1)) && $isi($kuesioner, 'kuis_111' , 1)===1 ? 'checked' : ''); ?> type="radio" name="kelompokProduk" value="1" <?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 0)) && $isi($kuesioner, 'kuis_111' , 0)===1 ? '' : 'disabled'); ?>>Ya
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-lg-3">
                <label class="container_radio">
                    <input class="inpt" <?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 1)) && $isi($kuesioner, 'kuis_111' , 1) !==1 ? 'checked' : ''); ?> type="radio" name="kelompokProduk" value="0" <?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 0)) && $isi($kuesioner, 'kuis_111' , 0)===1 ? '' : 'disabled'); ?>>Tidak
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

    </div>
    
    
    <div class="row">
        <div class="col-lg">1.1.2. Apakah produk dan/atau kontainer menggunakan identifikasi order kerja dalam produksi?</div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)===1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_112', 'ya', '.kuis_112_')" name="orderKerja" value="1">Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0) !==1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_112', 'tidak', '.kuis_112_')" name="orderKerja" value="0">Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-3">

        <div class="kuis_112 <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)===1 ? '' : 'hid'); ?>">

            <div class="row">
                <div class="col-lg">
                    Jika <b>Ya</b>, Pada bagian manakah yang menggunakan identifikasi order kerja dalam produksi?
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-3">
                    <label class="container_radio">
                        <input class="inpt" type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 1)===1 ? 'checked' : ''); ?> name="bagianOrderKerja" value="1" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)!==1 ? '' : 'disabled'); ?>>Tidak
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="container_radio">
                        <input class="inpt" type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 1)===2 ? 'checked' : ''); ?> name="bagianOrderKerja" value="2" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)!==1 ? '' : 'disabled'); ?>>Kontainer
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="container_radio">
                        <input class="inpt" type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 1)===3 ? 'checked' : ''); ?> name="bagianOrderKerja" value="3" <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)!==1 ? '' : 'disabled'); ?>>Produk dan Kontainer
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="kuis_112_ <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && !is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)!==1 ? '' : 'hid'); ?>">
            <div class="row">
                <div class="col-lg">
                    Jika <b>Tidak</b>, Bagaimana sistem mengisolasi produk dengan mutu yang digunakan?
                </div>
            </div>
            <div class="row mt-2 mb-3">
                <div class="col-lg">
                    <textarea class="inpt form-control" name="isolasiProduk" style="width: 100%;" 
                    <?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && !is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)!==1 ? '' : 'disabled'); ?> placeholder="Deskripsi di sini.."><?php echo e(!is_null($isi($kuesioner, 'kuis_112', 2)) ? $isi($kuesioner, 'kuis_112', 2) : ''); ?></textarea>
                </div>
            </div>

        </div>

    </div>
    
    <div class="row">
        <div class="col-lg">
            1.1.3. Berikan informasi lain yang relevan mengenai sistem yang digunakan?
        </div>
    </div>
    <div class="row mt-2 mb-3">
        <div class="col-lg">
            <textarea class="form-control" placeholder="Informasi lain.." name="infoLain"><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_113) ? $kuesioner->kuis_113 : ''); ?></textarea>
        </div>
    </div>
    
</div>


<div class="row">
    <div class="col-lg">
        <b>1.2. Prosedur pengendalian mutu/inspeksi</b>
    </div>
</div>

<div class="ml-4">
    <div class="row mb-3">
        <div class="col-lg">
            <b>Berikan Informasi tentang organisasi personel pengendalian mutu pabrik</b>
        </div>
    </div>


    
    <div class="row">
        <div class="col-lg">
            1.2.1. Siapa kepala jaminan mutu?
        </div>
    </div>
    <div class="row mt-2 mb-3">
        <div class="col-lg"><textarea class="form-control" name="kepalaJaminan" placeholder="Kepala jaminan mutu"><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_121) ? $kuesioner->kuis_121 : ''); ?></textarea></div>
    </div>
    
    <div class="row">
        <div class="col-lg">
            1.2.2. Kepada siapa melapor?
        </div>
    </div>
    <div class="row mt-2 mb-3">
        <div class="col-lg">
            <textarea class="form-control" name="lapor" placeholder="Melapor kepada.."><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_122) ? $kuesioner->kuis_122 : ''); ?></textarea>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg" colspan="2">
            1.2.3. Apakah ada Departement QC/Inspeksi yang terpisah?
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_123' , 0)) && $isi($kuesioner, 'kuis_123' , 0)===1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_123', 'ya', false)" name="departementTerpisah" value="1">Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_123' , 0)) && $isi($kuesioner, 'kuis_123' , 0) !==1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_123', 'tidak', false)" name="departementTerpisah" value="0">Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="kuis_123 <?php echo e(!is_null($isi($kuesioner, 'kuis_123' , 0)) && $isi($kuesioner, 'kuis_123' , 0) === 1 ? '' : 'hid'); ?>">
        <div class="row ml-3">
            <div class="col-lg-5">
                Jika <b>Ya</b>, Jelaskan
            </div>
            <div class="col-lg-7">
                <textarea class="inpt form-control" name="dt" style="width: 100%;" 
                <?php echo e(!is_null($isi($kuesioner, 'kuis_123' , 0)) && $isi($kuesioner, 'kuis_123' , 0) === 1 ? '' : 'disabled'); ?> placeholder="Jelaskan di sini.."><?php echo e(!is_null($isi($kuesioner, 'kuis_123', 1)) ? $isi($kuesioner, 'kuis_123', 1) : ''); ?></textarea>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg" colspan="2">
            1.2.4. Siapa Kepala inspektur jika berbeda dengan 1.2.1?
        </div>
    </div>
    <div class="row mt-2 mb-3">
        <div class="col-lg">
            <textarea class="form-control" name="kepalaInspek" style="width: 100%;" placeholder="Kepala Inspektur"><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_124) ? $kuesioner->kuis_124 : ''); ?></textarea>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg">
            1.2.5. Apakah personel memahami pengujian yang termuat didalam standar yang relevan?
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3">
            <label class="container_radio">
                <input <?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_125) && $kuesioner->kuis_125 === 1 ? 'checked' : ''); ?> type="radio" name="pemahamanPengujian" value="1">Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input <?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_125) && $kuesioner->kuis_125 !== 1 ? 'checked' : ''); ?> type="radio" name="pemahamanPengujian" value="0">Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg">
            1.2.6. Apakah petugas gudang/operator produksi bertanggungjawab atas inspeksi dan pengujian:
        </div>
    </div>

    <div class="row ml-3">
        <div class="col-lg-8">
            1.2.6.1. Material?
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[0]) && $isi($kuesioner, 'kuis_126' , 0)[0]===1 ? 'checked' : ''); ?> onchange="slideOpt2('0', 'ya')" name="material" value="1">Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[0]) && $isi($kuesioner, 'kuis_126' , 0)[0] !==1 ? 'checked' : ''); ?> onchange="slideOpt2('0', 'tidak')" name="material" value="0">Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="row ml-3">
        <div class="col-lg-8">
            1.2.6.2. Proses operasi?
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[1]) && $isi($kuesioner, 'kuis_126' , 0)[1]===1 ? 'checked' : ''); ?> onchange="slideOpt2('1', 'ya')" name="prosesOperasi" value="1">Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[1]) && $isi($kuesioner, 'kuis_126' , 0)[1] !==1 ? 'checked' : ''); ?> onchange="slideOpt2('1', 'tidak')" name="prosesOperasi" value="0">Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="row ml-3">
        <div class="col-lg-8">
            1.2.6.3. Produk akhir?
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[2]) && $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? 'checked' : ''); ?> onchange="slideOpt2('2', 'ya')" name="produkAkhir" value="1">Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[2]) && $isi($kuesioner, 'kuis_126' , 0)[2] !==1 ? 'checked' : ''); ?> onchange="slideOpt2('2', 'tidak')" name="produkAkhir" value="0">Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="ml-4 kuis_126 
        <?php echo e($isi($kuesioner, 'kuis_126' , 0)[0]===1 || $isi($kuesioner, 'kuis_126' , 0)[1]===1 || $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? '' : 'hid'); ?>">
        <div class="row">
            <div class="col-lg">
                Bila <b>Ya</b>, Apakah mereka diawasi oleh personel pengendali mutu?
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label class="container_radio">
                    <input class="inpt" type="radio" 
                    <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 1)) && $isi($kuesioner, 'kuis_126' , 1)===1 ? 'checked' : ''); ?> name="pengawasanPersonel" value="1" <?php echo e($isi($kuesioner, 'kuis_126' , 0)[0]===1 || $isi($kuesioner, 'kuis_126' , 0)[1]===1 || $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? '' : 'disabled'); ?>>Ya
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-lg-3">
                <label class="container_radio">
                    <input class="inpt" type="radio" 
                    <?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 1)) && $isi($kuesioner, 'kuis_126' , 1) !==1 ? 'checked' : ''); ?> name="pengawasanPersonel" value="0" <?php echo e($isi($kuesioner, 'kuis_126' , 0)[0]===1 || $isi($kuesioner, 'kuis_126' , 0)[1]===1 || $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? '' : 'disabled'); ?>>Tidak
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg">
            1.2.7. Apakah dilakukan audit mutu?
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_127' , 0)) && $isi($kuesioner, 'kuis_127' , 0)===1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_127', 'ya', false)" name="auditMutu" value="1">Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" <?php echo e(!is_null($isi($kuesioner, 'kuis_127' , 0)) && $isi($kuesioner, 'kuis_127' , 0) !==1 ? 'checked' : ''); ?> onclick="slideOpt('.kuis_127', 'tidak', false)" name="auditMutu" value="0">Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="ml-3 mb-3 kuis_127 <?php echo e(!is_null($isi($kuesioner, 'kuis_127' , 0)) && $isi($kuesioner, 'kuis_127' , 0)===1 ? '' : 'hid'); ?>">
        <div class="row">
            <div class="col-lg">
                Jika <b>Ya</b>, Oleh siapa audit mutu dilakukan?
            </div>
            <div class="col-lg">
                <textarea class="inpt form-control" name="auditMutu2" style="width: 100%;" 
                <?php echo e(!is_null($isi($kuesioner, 'kuis_127' , 0)) && $isi($kuesioner, 'kuis_127' , 0)===1 ? '' : 'disabled'); ?> placeholder="Dilakukan oleh.."><?php echo e(!is_null($isi($kuesioner, 'kuis_127', 1)) ? $isi($kuesioner, 'kuis_127', 1) : ''); ?></textarea>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg">
            1.2.8. Berikan informasi lebih lanjut tentang organisasi pengendalian mutu?
        </div>
    </div>
    <div class="row mt-2 mb-3">
        <div class="col-lg">
            <textarea class="form-control" name="infoPengendalianMutu" style="width: 100%;" placeholder="Deskripsi di sini.."><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_128) ? $kuesioner->kuis_128 : ''); ?></textarea>
        </div>
    </div>
    <br>
    
</div>

    
    <div class="row mt-2 mb-3">
        <div class="col-lg">
            <h6>
                <center><b><i>B.2 - Bahan-bahan Komponen dan Pelayanan</i></b></center>
            </h6>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg">
            <b>2.1. Spesifikasi pembelian/jaminan mutu bahan.</b>
        </div>
    </div>

    <div class="ml-3">
        <div class="row">
            <div class="col-lg">
                Berikan rincian bahan baku yang dibeli, spesifikasi dan pemasok utama yang terlibat. (dapat menggunakan lampiran)
            </div>
        </div>
        <tr>

            <td colspan="4" class="mt-2">
                <button type="button" class="btn btn-outline-secondary mt-2" onclick="inputToggle('#lampiran', '#manual', 'spekMutuBahan', '.spekMutu')">Pengisisan Manual/Gunakan Lampiran</button>
                <div id="lampiran" class="<?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? '' : 'hid'); ?>">
                    <?php if(!is_null($bahanHasil) && !is_null($bahanHasil->form_21)): ?>
                    
                    <a href="<?php echo e(url('/doc/download/dokKuesioner/spekPembelian/'.$bahanHasil->form_21)); ?>" target="_blank">
                        <div class="download_file">
                            <i class="fas fa-download"></i>&nbsp; Lampiran
                        </div>
                    </a><br>
                    <?php endif; ?>
                    <div class="mt-2">
                        <i>Gunakan lampiran</i><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                            <input class="fileName" type="hidden" value="form_21,B.2_2.1,spekPembelian">
                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? $bahanHasil->form_21 : 'Pilih File..'); ?></label>
                            <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                            <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'File telah diupload' : ''); ?></i>
                        </div>
                    </div>
                    <br>
                </div>
                <div id="manual" class="mb-4 <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'hid' : ''); ?>">
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target=".bd-example-modal-lg">Pengisian Manual</button>

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel">Spesifikasi pembelian/jaminan mutu bahan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="body">
                                    <div class="container-fluid p-3">
                                        <button type="button" class="btn btn-primary mb-2" id="tambahBahan">+ Tambah baris</button>
                                        <table border="0">
                                            <thead>
                                                <tr>
                                                    <th>Jenis bahan</th>
                                                    <th>Spesifikasi</th>
                                                    <th>Nama Pemasok</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                            <?php if(!is_null($spekP)): ?>
                                                <?php $__currentLoopData = $spekP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="bodyContent">
                                                    <td><input class="jenisbahan form-control spekMutu" type="text" name="jenisbahan[]" value="<?php echo e($data->jenis_bahan); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'disabled' : ''); ?>></td>
                                                    <td><input class="spek form-control spekMutu" type="text" name="spek[]" value="<?php echo e($data->spesifikasi); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'disabled' : ''); ?>></td>
                                                    <td><input class="namaPemasok form-control spekMutu" type="text" name="namaPemasok[]" value="<?php echo e($data->pemasok); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'disabled' : ''); ?>></td>
                                                    <td><button type="button" class="btn btn-secondary hapusContent">Hapus</button></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr class="bodyContent">
                                                    <td><input class="jenisbahan form-control spekMutu" type="text" name="jenisbahan[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'disabled' : ''); ?>></td>
                                                    <td><input class="spek form-control spekMutu" type="text" name="spek[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'disabled' : ''); ?>></td>
                                                    <td><input class="namaPemasok form-control spekMutu" type="text" name="namaPemasok[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'disabled' : ''); ?>></td>
                                                    <td><button type="button" class="btn btn-secondary hapusContent">Hapus</button></td>
                                                </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </div>

    
    <div class="row mt-2">
        <div class="col-lg">
            2.2. Berikan juga metode jaminan mutu yang diadopsi dalam penerimaan bahan baku, komponen atau pelayanan, dan tunjukkan langkah-langkah yang diambil terhadap barang yang tidak memenuhi syarat. (dapat menggunakan lampiran)
        </div>
    </div>
    <div class="ml-3">
        <div class="pb-3" colspan="3">
            <button type="button" class="btn btn-outline-secondary mt-2" onclick="inputToggle('#lampiran1', '#manual1', 'metodeJM', '.metodeJm')">Pengisisan Manual/Gunakan Lampiran</button>
            <div id="lampiran1" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? '' : 'hid'); ?>">
                <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0))): ?>
                
                <a href="<?php echo e(url('/doc/download/dokKuesioner/jaminanMutu/'.$isi($bahanHasil, 'form_22', 0))); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Lampiran
                    </div>
                </a><br>
                <?php endif; ?>
                <div class="mt-2 mb-2">
                    <i>Gunakan lampiran</i><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                        <input class="fileName" type="hidden" value="form_22,B.2_2.2,jaminanMutu">
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? $isi($bahanHasil, 'form_22', 0) : 'Pilih File..'); ?></label>
                        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                        <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? 'File telah diupload' : ''); ?></i>
                    </div>
                </div>
                <br>
            </div>
            <div id="manual1" class="mt-2 <?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? 'hid' : ''); ?>">
                Pengisian Manual
                <textarea class="form-control metodeJm" name="metodeJaminanMutu" style="width: 100%" placeholder="Pengisian di sini.." <?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? 'disabled' : ''); ?>><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 1)) ? $isi($bahanHasil, 'form_22', 1) : ''); ?></textarea>
            </div>
        </div>
    </div>
    
    <div class="row mt-4 mb-3">
        <div class="col-lg">
            <center><b><i>B.3 - Produksi</i></b></center>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg">
            <b>3.1.Sistem</b>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            Berikan rincian berbagai tahap dalam peroduksi, jadwal produksi dan atau tambahan dalam bentuk diagram untuk memudahkan pemahaman. (dapat menggunakan lampiran)
        </div>
    </div>
    <div class="ml-3">
        <div colspan="3">
            <button type="button" class="btn btn-outline-secondary mt-2" onclick="inputToggle('#lampiran2', '#manual2', 'rincianP', '.rinProduk')">Pengisisan Manual/Gunakan Lampiran</button>
            <div id="lampiran2" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? '' : 'hid'); ?>">
                <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0))): ?>
                
                <a href="<?php echo e(url('/doc/download/dokKuesioner/rincianProduksi/'.$isi($bahanHasil, 'form_31', 0))); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Lampiran
                    </div>
                </a><br>
                <?php endif; ?>
                <div class="mt-2 mb-3">
                    <i>Gunakan lampiran</i><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                        <input class="fileName" type="hidden" value="form_31,B.3_3.1,rincianProduksi">
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? $isi($bahanHasil, 'form_31', 0) : 'Pilih File..'); ?></label>
                        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                        <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? 'File telah diupload' : ''); ?></i>
                    </div>
                </div>
                <br>
            </div>
            <div id="manual2" class="mt-2 <?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? 'hid' : ''); ?>">
                Pengisian Manual
                <textarea class="form-control rinProduk" name="rincianProduksi" style="width: 100%" placeholder="Pengisian di sini.." <?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? 'disabled' : ''); ?>><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 1)) ? $isi($bahanHasil, 'form_31', 1) : ''); ?></textarea>
            </div>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col-lg">
            <b>3.2. Sistem pemeliharaan pabrik dan perolehan</b>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            Sebutkan jenis sistem pemeliharaan yang diterapkan?. (dapat menggunakan lampiran)
        </div>
    </div>
    <div class="ml-3">
        <div class="pb-3" colspan="3">
            <button type="button" class="btn btn-outline-secondary mt-2" onclick="inputToggle('#lampiran3', '#manual3', 'jenisP', '.jnsP')">Pengisisan Manual/Gunakan Lampiran</button>
            <div id="lampiran3" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? '' : 'hid'); ?>">
                <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0))): ?>
                
                <a href="<?php echo e(url('/doc/download/dokKuesioner/jenisPemeliharaan/'.$isi($bahanHasil, 'form_32', 0))); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Lampiran
                    </div>
                </a><br>
                <?php endif; ?>
                <div class="mt-2 mb-3">
                    <i>Gunakan lampiran</i><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                        <input class="fileName" type="hidden" value="form_32,B.3_3.2,jenisPemeliharaan">
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? $isi($bahanHasil, 'form_32', 0) : 'Pilih File..'); ?></label>
                        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                        <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? 'File telah diupload' : ''); ?></i>
                    </div>
                </div>
                <br>
            </div>
            <div id="manual3" class="mt-2 <?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? 'hid' : ''); ?>">
                Pengisian Manual
                <textarea class="form-control jnsP" name="jenisPemeliharaan" style="width: 100%" placeholder="Pengisian di sini.." <?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? 'disabled' : ''); ?>><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 1)) ? $isi($bahanHasil, 'form_32', 1) : ''); ?></textarea>
            </div>
        </div>
    </div>
    
<?php /**PATH /var/www/html/balai-cert/resources/views/applySA/kuesioner1.blade.php ENDPATH**/ ?>