    
    <div class="row mt-4 mb-3">
        <div class="col-lg">
            <center><b><i>B.4 - Pengendalian Mutu Pengujian</i></b></center>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg"><b>4.1. Sistem</b></div>
    </div>
    <div class="row">
        <div class="col-lg">
            Berikan rincian sistem pengendalian mutu, termasuk sistem pengalihan contoh yang diikuti dengan acuan tertentu sesuai degan standar yang relevan. Penggunaan jadwal pengendalian mutu atau suplemen acuan sialng terhadap diagram yang disebutkan di 3.1 akan lebih menguntungkan. Lampirkan panduan atau instruksi pengendalian mutu yang diterbitkan untuk personel.
        </div>
    </div>
    <div class="row mt-2 mb-3">
        <div class="col-lg ml-3">
            <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_41', 0))): ?>
            
            <a href="<?php echo e(url('/doc/download/dokKuesioner/pengendalianMutu/'.$isi($bahanHasil, 'form_41', 0))); ?>" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Lampiran
                </div>
            </a><br>
            <?php endif; ?>

            <div class="mt-2">Lampiran</div>
            <div class="custom-file">
                <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                <input class="fileName" type="hidden" value="form_41,B.4_4.1,pengendalianMutu">
                <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_41', 0)) ? $isi($bahanHasil, 'form_41', 0) : 'Pilih File..'); ?></label>
                <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_41', 0)) ? 'File telah diupload' : ''); ?></i>
            </div>

            <div class="mt-2">Rincian Pengendalian Mutu</div>
            <textarea class="form-control" name="pengendalianMutu" style="width: 100%;" placeholder="Rincian di sini.."><?php echo e(!is_null($isi($bahanHasil, 'form_41', 1)) ? $isi($bahanHasil, 'form_41', 1) : ''); ?></textarea>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg">
            <b>4.2. Peralatan/Instrumen pengujian, gauge, atau perkakas.</b>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            Berikan rincian peralatan yang digunakan, nama pembuat dan acuan atau dan tunjukkan sistem dan frekuensi pemeriksaan dan sertifikat, jika ada. (dapat menggunakan lampiran)
        </div>
    </div>
    <div class="ml-3">
        <div class="pb-3" colspan="4">
            <button type="button" class="btn btn-outline-secondary mt-2" onclick="inputToggle('#lampiran11', '#manual11', 'rincianPeralatan', '.perltn')">Pengisisan Manual/Gunakan Lampiran</button>
            <div id="lampiran11" class="<?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? '' : 'hid'); ?>">
                <?php if(!is_null($bahanHasil) && !is_null($bahanHasil->form_42)): ?>
                
                <a href="<?php echo e(url('/doc/download/dokKuesioner/rincianPeralatan/'.$bahanHasil->form_42)); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Lampiran
                    </div>
                </a><br>
                <?php endif; ?>
                <div class="mt-2 mb-3">
                    <i>Gunakan lampiran</i><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input pb-3 bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                        <input class="fileName" type="hidden" value="form_42,B.4_4.2,rincianPeralatan">
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? $bahanHasil->form_42 : 'Pilih File..'); ?></label>
                        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                        <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'File telah diupload' : ''); ?></i>
                    </div>
                </div>

                <br>
            </div>
            <div id="manual11" class="mt-2 <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'hid' : ''); ?>">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Pengisian Manual</button>

                <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                    <button type="button" class="btn btn-primary mb-2" id="tambahBahan11">+ Tambah baris</button>
                                    <table border="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama Alat</th>
                                                <th class="text-center">Nama Pembuat</th>
                                                <th class="text-center">Acuan</th>
                                                <th class="text-center">Sistem dan Frekuensi pemeriksaan</th>
                                                <th class="text-center">Sertifikat</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody11">
                                            <?php if(!is_null($alat)): ?>
                                            <?php $__currentLoopData = $alat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="bodyContent11">
                                                <td><input class="form-control perltn namaAlat" type="text" name="namaAlat[]" value="<?php echo e($data2->nama_alat); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn namaPembuat" type="text" name="namaPembuat[]" value="<?php echo e($data2->nama_pembuat); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn acuan" type="text" name="acuan[]" value="<?php echo e($data2->acuan); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn sistemP" type="text" name="sistemP[]" value="<?php echo e($data2->sistem); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn sert" type="text" name="sert[]" value="<?php echo e($data2->sertifikat); ?>" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><button type="button" class="btn btn-secondary hapusContent11">Hapus</button></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <tr class="bodyContent11">
                                                <td><input class="form-control perltn namaAlat" type="text" name="namaAlat[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn namaPembuat" type="text" name="namaPembuat[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn acuan" type="text" name="acuan[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn sistemP" type="text" name="sistemP[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><input class="form-control perltn sert" type="text" name="sert[]" <?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'disabled' : ''); ?>></td>
                                                <td><button type="button" class="btn btn-secondary hapusContent11">Hapus</button></td>
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
        </div>
    </div>
    
    <div class="row mt-4 mb-4">
        <div class="col-lg">
            <center><b><i>B.5 - Rekaman dan dokumentasi</i></b></center>
        </div>
    </div>
    

    <div class="row">
        <div class="col-lg">
            <b>5.1. Umum</b>
        </div>
    </div>
    

    <div class="ml-4">
        
        <div class="row">
            <div class="col-lg">
                5.1.1. Tunjukkan betuk spesifikasi utama, seperti gambar teknik produk/bagian-bagian jadwal, contoh acuan, dsb. Tunjukkan juga rekaman umum yang tersedia. (dapat menggunakan lampiran)
            </div>
        </div>
        <div>
            <div class="pb-3 pl-3" colspan="3">
                <div id="lampiran4">
                    <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0))): ?>
                    <a href="<?php echo e(asset('storage/dok/dokKuesioner/spekUtama/'.$isi($bahanHasil, 'form_511', 0))); ?>" target="_blank">Lampiran Lama</a><br>
                    <?php endif; ?>
                    <div class="mt-2 mb-2">
                        <i>Gunakan lampiran</i><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                            <input class="fileName" type="hidden" value="form_511,B.5_5.1.1,spekUtama">
                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0)) ? $isi($bahanHasil, 'form_511', 0) : 'Pilih File..'); ?></label>
                            <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                            <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0)) ? 'File telah diupload' : ''); ?></i>
                        </div>
                    </div>
                </div>
                <div id="manual4" class="mt-2">
                    Pengisian Manual<br>
                    <textarea class="form-control spU" name="spekUtama" style="width: 100%"><?php echo e(!is_null($isi($bahanHasil, 'form_511', 1)) ? $isi($bahanHasil, 'form_511', 1) : ''); ?></textarea>
                </div>
                
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-lg">
                5.1.2. Tunjukkan sistem yang digunakan untuk memebuat desain/speksifikasi. (dapat menggunakan lampiran)
            </div>
        </div>
        <div class="pl-3">
            <div id="lampiran5">
                <div class="row">
                    <div class="col-lg">
                        <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0))): ?>
                        <a href="<?php echo e(asset('storage/dok/dokKuesioner/jenisSistem/'.$isi($bahanHasil, 'form_512', 0))); ?>" target="_blank">Lampiran Lama</a><br>
                        <?php endif; ?>
                        <div class="mt-2 mb-2">
                            <i>Gunakan lampiran</i><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                                <input class="fileName" type="hidden" value="form_512,B.5_5.1.2,jenisSistem">
                                <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0)) ? $isi($bahanHasil, 'form_512', 0) : 'Pilih File..'); ?></label>
                                <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                                <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0)) ? 'File telah diupload' : ''); ?></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="manual5" class="row mt-2">
                <div class="col-lg">
                    Pengisian Manual<br>
                    <textarea class="form-control jnsSis" name="jenisSistem" style="width: 100%" ><?php echo e(!is_null($isi($bahanHasil, 'form_512', 1)) ? $isi($bahanHasil, 'form_512', 1) : ''); ?></textarea>
                </div>
            </div>
            
        </div>
    </div>

    
    <div class="row mt-3">
        <div class="col-lg">
            <b>5.2. Kesesuaian spesifikasi</b>
        </div>
    </div>
    

    <div class="ml-4">
        <div class="row">
            <div class="col-lg">
                5.2.1. Tunjukkan tingkat cacat dari temuan ketidaksesuaian dalam 6 bulan terakhir. (dapat menggunakan lampiran)
            </div>
        </div>
        <div class="row pl-3">
            <div class="col-lg">
                <div id="lampiran6">
                    <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0))): ?>
                    <a href="<?php echo e(asset('storage/dok/dokKuesioner/tingkatCacat/'.$isi($bahanHasil, 'form_521', 0))); ?>" target="_blank">Lampiran Lama</a><br>
                    <?php endif; ?>
                    <div class="mt-2 mb-2">
                        <i>Gunakan lampiran</i><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                            <input class="fileName" type="hidden" value="form_521,B.5_5.2.1,tingkatCacat">
                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0)) ? $isi($bahanHasil, 'form_521', 0) : 'Pilih File..'); ?></label>
                            <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                            <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0)) ? 'File telah diupload' : ''); ?></i>
                        </div>
                    </div>
                </div>
                <div id="manual6" class="mt-2">
                    Pengisian Manual<br>
                    <textarea class="form-control tngktCCt" name="tingkatCacat" style="width: 100%"><?php echo e(!is_null($isi($bahanHasil, 'form_521', 1)) ? $isi($bahanHasil, 'form_521', 1) : ''); ?></textarea>
                    </div>
                </div>
                
        </div>
        
        <div class="row mt-2">
            <div class="col-lg">
                5.2.2. Jika pengujian dilakukan sesuai dengan standar yang relevan telah dilaksanakan, lampirkan hasil uji jika ada.
            </div>
        </div>
        <div class="row pl-3">
            <div class="col-lg">
                <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_522', 0))): ?>
                <a href="<?php echo e(asset('storage/dok/dokKuesioner/lampiranPengujian/'.$isi($bahanHasil, 'form_522', 0))); ?>" target="_blank">Lampiran Lama</a><br>
                <?php endif; ?>
                <div class="mt-2 mb-2">
                    <i>Lampiran</i><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                        <input class="fileName" type="hidden" value="form_522,B.5_5.2.2,lampiranPengujian">
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_522', 0)) ? $isi($bahanHasil, 'form_522', 0) : 'Pilih File..'); ?></label>
                        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                        <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_522', 0)) ? 'File telah diupload' : ''); ?></i>
                    </div>
                </div>
                Pengisian Manual<br>
                <textarea class="form-control" name="pengujian" style="width: 100%"><?php echo e(!is_null($isi($bahanHasil, 'form_522', 1)) ? $isi($bahanHasil, 'form_522', 1) : ''); ?></textarea>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-lg">
                5.2.3. Tunjukkan tingkat keluhan yang diterima selama masa jaminan dan berikan presentasi dari jumlah keluaran. (dapat menggunakan lampiran)
            </div>
        </div>
        <div class="row pl-3">
            <div class="col-lg">
                <div id="lampiran7">
                    <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0))): ?>
                    <a href="<?php echo e(asset('storage/dok/dokKuesioner/tingkatKeluhan/'.$isi($bahanHasil, 'form_523', 0))); ?>" target="_blank">Lampiran Lama</a><br>
                    <?php endif; ?>
                    <div class="mt-2 mb-2">
                        <i>Gunakan lampiran</i><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                            <input class="fileName" type="hidden" value="form_523,B.5_5.2.3,tingkatKeluhan">
                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0)) ? $isi($bahanHasil, 'form_523', 0) : 'Pilih File..'); ?></label>
                            <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                            <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0)) ? 'File telah diupload' : ''); ?></i>
                        </div>
                    </div>
                </div>
                <div id="manual7" class="mt-2">
                    Pengisian Manual<br>
                    <textarea class="form-control tnktK" name="tingkatKeluhan" style="width: 100%"><?php echo e(!is_null($isi($bahanHasil, 'form_523', 1)) ? $isi($bahanHasil, 'form_523', 1) : ''); ?></textarea>
                </div>
                
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-lg">
                5.2.4. Apakah telah dilakukan pengujian independen pada produk sesuai standar?
            </div>
        </div>
        <div class="row ml-3 mt-2">
            <div class="col-lg">
                <label class="container_radio">
                    <input type="radio" onclick="slideOpt('.kuis_524', 'ya', false)" <?php echo e(!is_null($isi($bahanHasil, 'form_524' , 0)) && $isi($bahanHasil, 'form_524' , 0)==1 ? 'checked' : ''); ?> name="pengujianI" value="1">Ya
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-lg-3">
                <label class="container_radio">
                    <input type="radio" onclick="slideOpt('.kuis_524', 'tidak', false)" <?php echo e(!is_null($isi($bahanHasil, 'form_524' , 0)) && $isi($bahanHasil, 'form_524' , 0) !=1 ? 'checked' : ''); ?> name="pengujianI" value="0">Tidak
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <tr>
            <td></td>
            <td colspan="4">
                <div class="kuis_524 pl-3 <?php echo e(!is_null($isi($bahanHasil, 'form_524' , 0)) && $isi($bahanHasil, 'form_524' , 0)==1 ? '' : 'hid'); ?>">
                    Jika <b>Ya</b>, oleh siapa? Lampirkan salinan jika ada<br>
                    <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_524', 1))): ?>
                    <a href="<?php echo e(asset('storage/dok/dokKuesioner/pengujiIndependen/'.$isi($bahanHasil, 'form_524', 1))); ?>" target="_blank">Lampiran Lama</a><br>
                    <?php endif; ?>
                    <div class="mt-2 mb-3">
                        <i>Lampiran</i><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input inpt bHasilUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]">
                            <input class="fileName" type="hidden" value="form_524,B.5_5.2.4,pengujiIndependen">
                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_524', 1)) ? $isi($bahanHasil, 'form_524', 1) : 'Pilih File..'); ?></label>
                            <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                            <i class="resUpload"><?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_524', 1)) ? 'File telah diupload' : ''); ?></i>
                        </div>
                    </div>
                    <textarea class="form-control inpt" name="pengujiIndependen" style="width: 100%" <?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_524', 1)) ? '' : 'disabled'); ?>><?php echo e(!is_null($isi($bahanHasil, 'form_524', 2)) ? $isi($bahanHasil, 'form_524', 2) : ''); ?></textarea>
                </div>
            </td>
        </tr>
    </div>

    
    <br><?php /**PATH /var/www/html/balai-cert/resources/views/applySA/kuesioner2.blade.php ENDPATH**/ ?>