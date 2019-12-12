<div class="row">
    <div class="col-lg">
        <div class="header_kuis">
            <h4>
                <center><b><?php echo e(strtoupper('A. Info Tambahan')); ?></b></center>
            </h4>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg">
        1. Apakah pernah mendapatkan Sertifikat tanda SNI? &nbsp;
    </div>
</div>

<div class="mt-2 ml-4">
    <b class="pr-2">Jawaban: </b>
    <?php if(!is_null($infoDB) && !is_null($infoDB->kuis1_opsi)): ?>
    <span class="<?php echo e(!is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? 'Ya' : 'Tidak'); ?></span>
    <?php else: ?>
    <span class="badge badge-secondary">Kosong</span>
    <?php endif; ?>
    <?php if(!is_null($infoDB) && $infoDB->kuis1_opsi == 1): ?>
    <table width="100%">
        <tr>
            <td>Penerbit Sertifikat:</td>
            <td><input class="form-control" type="text" readonly="" value="<?php echo e(!is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? $infoIsi($infoDB->kuis1_isi)[0] : ''); ?>"></td>
        </tr>
        <tr>
            <td>Masa Berlaku:</td>
            <td><input class="form-control" type="text" readonly="" value="<?php echo e(!is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? $infoIsi($infoDB->kuis1_isi)[1] : ''); ?>"></td>
        </tr>
    </table>
    <?php endif; ?>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        2. Apakah perusahaan anda bagian dari sebuah group? &nbsp;
    </div>
</div>

<div class="mt-2 ml-4">
    <b class="pr-2">Jawaban: </b>
    <?php if(!is_null($infoDB) && !is_null($infoDB->kuis2_opsi)): ?>
    <span class="<?php echo e(!is_null($infoDB) && $infoDB->kuis2_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($infoDB) && $infoDB->kuis2_opsi == 1 ? 'Ya' : 'Tidak'); ?></span>
    <?php else: ?>
    <span class="badge badge-secondary">Kosong</span>
    <?php endif; ?>
    <div class="row mt-3 mb-4">
        <div class="col-lg-2">
            Detail:
        </div>
        <div class="col-lg-10">
            <textarea class="form-control" readonly=""><?php echo e(!is_null($infoDB) && !is_null($infoDB->kuis2_opsi) ? $infoDB->kuis2_isi : ''); ?></textarea>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        3. Apakah diantara group perusahaan anda ada yang telah mendapat sertifikat SNI? &nbsp;
    </div>
</div>
<div class="mt-2 ml-4">
    <b class="pr-2">Jawaban: </b>
    <?php if(!is_null($infoDB) && !is_null($infoDB->kuis3_opsi)): ?>
    <span class="<?php echo e(!is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? 'Ya' : 'Tidak'); ?></span>
    <?php else: ?>
    <span class="badge badge-secondary">Kosong</span>
    <?php endif; ?>
    <table width="100%">
        <?php if(!is_null($infoDB) && $infoDB->kuis3_opsi == 1): ?>
        <tr>
            <td>Nama dan Alamat Perusahaan:</td>
            <td><textarea class="form-control" readonly="" style="height: 100px;"><?php echo e(!is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? strtoupper($infoIsi($infoDB->kuis3_isi)[0]) : ''); ?> - <?php echo e(!is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? $infoIsi($infoDB->kuis3_isi)[1] : ''); ?>

                </textarea></td>
        </tr>
        <?php endif; ?>
    </table>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        4. Apakah perusahaan Saudara telah mendapatkan sertifikat SNI ISO 9001? &nbsp;
    </div>
</div>
<div class="mt-2 ml-4">
    <b class="pr-2">Jawaban: </b>
    <?php if(!is_null($infoDB) && !is_null($infoDB->kuis4_opsi) ): ?>
    <span class="<?php echo e(!is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? 'Ya' : 'Tidak'); ?></span>
    <?php else: ?>
    <span class="badge badge-secondary">Kosong</span>
    <?php endif; ?>
    <table width="100%">
        <?php if(!is_null($infoDB) && $infoDB->kuis4_opsi === 1): ?>
        <tr>
            <td>Penerbit sertifikat ISO:</td>
            <td><input class="form-control" type="text" readonly="" value="<?php echo e(!is_null($infoDB) && $infoDB->kuis4_opsi == 1 ? $infoIsi($infoDB->kuis4_isi)[0][0] : ''); ?>"></td>
        </tr>
        <tr>
            <td>Masa Berlaku:</td>
            <td><input class="form-control" type="text" readonly="" value="<?php echo e(!is_null($infoDB) && $infoDB->kuis4_opsi == 1 ? $infoIsi($infoDB->kuis4_isi)[0][1] : ''); ?>"></td>
        </tr>
        <?php elseif(!is_null($infoDB) && $infoDB->kuis4_opsi === 0): ?>
        <tr>
            <td>Apakah perusahaan menerapkan dokumentasi SMM dan menerbitkan dokumen mutu/produk secara internal?:</td>
            <td><input class="form-control" type="text" readonly="" value="<?php echo e(!is_null($infoDB) && $infoDB->kuis4_opsi == 0 ? $infoIsi($infoDB->kuis4_isi)[1] : ''); ?>"></td>
        </tr>
        <?php endif; ?>
    </table>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        5. Apakah anda bekerja dengan menggunakan sistem shift? &nbsp;
    </div>
</div>
<div class="mt-2 ml-4">
    <b class="pr-2">Jawaban: </b>
    <?php if(!is_null($infoDB) && !is_null($infoDB->kuis5_opsi)): ?>
    <span class="<?php echo e(!is_null($infoDB) && $infoDB->kuis5_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($infoDB) && $infoDB->kuis5_opsi == 1 ? 'Ya' : 'Tidak'); ?></span>
    <?php else: ?>
    <span class="badge badge-secondary">Kosong</span>
    <?php endif; ?>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        6. Kapan perusahaan Anda siap disertifikasi? &nbsp;
    </div>
</div>
<div class="mt-2 ml-4">
    <div class="row">
        <div class="col-lg-4">
            <b>Jawaban:</b>
        </div>
        <div class="col-lg-8">
            <input class="form-control" type="text" readonly="" value="<?php echo e(!is_null($infoDB) && !is_null($infoDB->kuis6) ? $infoDB->kuis6 : ''); ?>">
        </div>
    </div>
</div>

<br>

<div class="row mt-3">
    <div class="col-lg">
        <div class="header_kuis">
            <h4>
                <center><b><?php echo e(strtoupper('B. Kuesioner')); ?></b></center>
            </h4>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg">
        1. Kapan contoh tersedia untuk kegiatan evaluasi
    </div>
</div>

<div class="mt-2 ml-4">
    <div class="row">
        <div class="col-lg">
            <b>Jawaban:</b>
            <input class="form-control" type="text" name="evalDate" value="<?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis1) ? $kuesioner->kuis1 : ''); ?>" disabled="">
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-8">
        2. Apakah merupakan contoh produksi atau contoh prototipe?
    </div>
</div>

<div class="mt-3 ml-4">
    <div class="row">
        <div class="col-lg">
            <b>Jawaban:</b>
            <?php if(!is_null($kuesioner) && !is_null($kuesioner->kuis2)): ?>
            <span class="<?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis2) && $kuesioner->kuis2 === 1 ? 'jawaban_ya' : 'jawaban_ya'); ?>"><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis2) && $kuesioner->kuis2 === 1 ? 'Contoh Produksi' : 'Contoh Prototype'); ?></span>
            <?php else: ?>
            <span class="badge badge-secondary">Kosong</span>
            <?php endif; ?>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        3. Apakah ini menjadi proses produksi atau proses contoh protipe?
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <?php if(!is_null($isi($kuesioner, 'kuis3' , 0))): ?>
    <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis3' , 0)) && $isi($kuesioner, 'kuis3' , 0)===1 ? 'jawaban_ya' : 'jawaban_ya'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis3' , 0)) && $isi($kuesioner, 'kuis3' , 0)===1 ? 'Proses Produksi' : 'Proses Contoh Prototipe'); ?></span>
    <?php else: ?>
    <span class="badge badge-secondary">Kosong</span>
    <?php endif; ?>
</div>

<div class="kuis_3 ml-4 <?php echo e(!is_null($isi($kuesioner, 'kuis3', 0)) && $isi($kuesioner, 'kuis3', 0) !== 1 ? '' : 'hid'); ?>">
    <div class="row">
        <div class="col-lg">
            Jika <b>prototipe</b>, Kapan produksi dijadwalkan?
        </div>
    </div>
    <div class="col-lg">
        <input class="inpt form-control" type="text" name="waktuProduksi" value="<?php echo e(!is_null($isi($kuesioner, 'kuis3', 1)) ? $isi($kuesioner, 'kuis3', 1) : ''); ?>" disabled="">
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        4. Sudahkah produk diuji sesuai dengan standar?<br>(bila sudah, harap dilamprikan laporannya)
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <?php if(!is_null($isi($kuesioner, 'kuis4' , 0))): ?>
    <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis4' , 0)) && $isi($kuesioner, 'kuis4' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis4' , 0)) && $isi($kuesioner, 'kuis4' , 0)===1 ? 'Sudah' : 'Belum'); ?></span>
    <?php else: ?>
    <span class="badge badge-secondary">Kosong</span>
    <?php endif; ?>
</div>

<div class="kuis_4 <?php echo e(!is_null($isi($kuesioner, 'kuis4', 0)) && $isi($kuesioner, 'kuis4', 0) === 1 ? '' : 'hid'); ?>">
    <?php if(!is_null($kuesioner) && !is_null($isi($kuesioner, 'kuis4', 1))): ?>
    <a href="<?php echo e(asset('storage/dok/dokKuesioner/standarProduk/'.$isi($kuesioner, 'kuis4', 1))); ?>" target="_blank">Lampiran</a><br>
    <?php endif; ?>
</div>
<hr>

<center><i><b>B.1 - Organisasi Pabrik</b></i></center><br>

<b>1.1. Prosedur Produksi</b><br>
<b>Berikan Informasi tentang sistem secara garis besar</b><br><br>

<div class="ml-4">
    <div class="row">
        <div class="col-lg">
            1.1.1. Apakah anda memproduksi berdasarkan pesanan atau untuk persedian?
        </div>
    </div>

    <div class="mt-3 mb-3">
        <b>Jawaban:</b>
        <?php if(!is_null($isi($kuesioner, 'kuis_111' , 0))): ?>
        <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 0)) && $isi($kuesioner, 'kuis_111' , 0)===1 ? 'jawaban_ya' : 'jawaban_ya'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 0)) && $isi($kuesioner, 'kuis_111' , 0)===1 ? 'Pesanan' : 'Persediaan'); ?></span>
        <?php else: ?>
        <span class="badge badge-secondary">Kosong</span>
        <?php endif; ?>
    </div>

    <div class="kuis_111 ml-5 <?php echo e(!is_null($isi($kuesioner, 'kuis_111', 0)) && $isi($kuesioner, 'kuis_111', 0) === 1 ? '' : 'hid'); ?>">
        <div class="row">
            Jika <b>Pesanan</b>, Apakah digunakan sebagai identifikasi kelompok produk yang terpisah?
        </div>
        <div class="mt-3">
            <b>Jawaban:</b>
            <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 1)) && $isi($kuesioner, 'kuis_111' , 1)===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_111' , 1)) && $isi($kuesioner, 'kuis_111' , 1)===1 ? 'Ya' : 'Tidak'); ?></span>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.1.2. Apakah produk dan/atau kontainer menggunakan identifikasi order kerja dalam produksi?
        </div>
    </div>

    <div class="ml-4 mt-3">
        <b>Jawaban:</b>
        <?php if(!is_null($isi($kuesioner, 'kuis_112' , 0))): ?>
        <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_112' , 0)) && $isi($kuesioner, 'kuis_112' , 0)===1 ? 'Ya' : 'Tidak'); ?></span>
        <?php else: ?>
        <span class="badge badge-secondary">Kosong</span>
        <?php endif; ?>
    </div>

    <div class="kuis_112 mt-3 ml-5 <?php echo e(!is_null($isi($kuesioner, 'kuis_112', 0)) && $isi($kuesioner, 'kuis_112', 0) === 1 ? '' : 'hid'); ?>">
        <div class="row">
            <div class="col-lg">
                Jika <b>Ya</b>, Pada bagian manakah yang menggunakan identifikasi order kerja dalam produksi?<br>
            </div>
        </div>
        <div class="row">
            <b>Jawaban:</b>
            <span class="<?php echo e($isi($kuesioner, 'kuis_112' , 1)===1 ? 'jawaban_tidak' : 'jawaban_ya'); ?>">
                <?php if($isi($kuesioner, 'kuis_112' , 1)===1): ?>
                Tidak
                <?php elseif($isi($kuesioner, 'kuis_112' , 1)===2): ?>
                Kontainer
                <?php elseif($isi($kuesioner, 'kuis_112' , 1)===3): ?>
                Produk dan Kontainer
                <?php endif; ?>
            </span>
        </div>
    </div>
    <div class="kuis_112_ ml-4 <?php echo e(!is_null($isi($kuesioner, 'kuis_112', 0)) && $isi($kuesioner, 'kuis_112', 0) !== 1 ? '' : 'hid'); ?>">
        <div class="row">
            <div class="col-lg">
                Jika <b>Tidak</b>, Bagaimana sistem mengisolasi produk dengan mutu yang digunakan?<br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <textarea class="inpt form-control" name="isolasiProduk" style="width: 100%;" disabled=""><?php echo e(!is_null($isi($kuesioner, 'kuis_112', 2)) ? $isi($kuesioner, 'kuis_112', 2) : ''); ?></textarea>
            </div>
        </div>
    </div>

    <hr>

    <div class="row mt-2">
        <div class="col-lg">
            1.1.3. Berikan informasi lain yang relevan mengenai sistem yang digunakan?
        </div>
    </div>
    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <textarea class="form-control" name="infoLain" disabled=""><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_113) ? $kuesioner->kuis_113 : ''); ?></textarea>
    </div>
</div>

<hr>

<b>1.2. Prosedur pengendalian mutu/inspeksi</b><br>
<b>Berikan Informasi tentang organisasi personel pengendalian mutu pabrik</b><br><br>

<div class="ml-4">
    <div class="row">
        <div class="col-lg">
            1.2.1. Siapa kepala jaminan mutu?
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <textarea class="form-control" name="kepalaJaminan" disabled=""><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_121) ? $kuesioner->kuis_121 : ''); ?></textarea>

    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.2. Kepada siapa melapor?
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <textarea class="form-control" name="lapor" disabled=""><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_122) ? $kuesioner->kuis_122 : ''); ?></textarea>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.3. Apakah ada Departement QC/Inspeksi yang terpisah?
        </div>
    </div>

    <div class="ml-4 mt-3">
        <b>Jawaban:</b>
        <?php if(!is_null($isi($kuesioner, 'kuis_123' , 0))): ?>
        <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_123' , 0)) && $isi($kuesioner, 'kuis_123' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_123' , 0)) && $isi($kuesioner, 'kuis_123' , 0)===1 ? 'Ya' : 'Tidak'); ?></span>
        <?php else: ?>
        <span class="badge badge-secondary">Kosong</span>
        <?php endif; ?>
    </div>

    <div class="kuis_123 <?php echo e(!is_null($isi($kuesioner, 'kuis_123', 0)) && $isi($kuesioner, 'kuis_123', 0) === 1 ? '' : 'hid'); ?>">
        <div class="row">
            <div class="col-lg">
                Jika <b>Ya</b>, Jelaskan<br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <textarea class="inpt form-control" name="dt" style="width: 100%;" disabled=""><?php echo e(!is_null($isi($kuesioner, 'kuis_123', 1)) ? $isi($kuesioner, 'kuis_123', 1) : ''); ?></textarea>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.4. Siapa Kepala inspektur jika berbeda dengan 1.2.1?
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <textarea class="form-control" name="kepalaInspek" style="width: 100%;" disabled=""><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_124) ? $kuesioner->kuis_124 : ''); ?></textarea>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.5. Apakah personel memahami pengujian yang termuat didalam standar yang relevan?
        </div>
    </div>

    <div class="ml-4 mt-3">
        <b>Jawaban:</b>
        <?php if(!is_null($kuesioner) && !is_null($kuesioner->kuis_125)): ?>
        <span class="<?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_125) && $kuesioner->kuis_125 === 1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_125) && $kuesioner->kuis_125 === 1 ? 'Ya' : 'Tidak'); ?></span>
        <?php else: ?>
        <span class="badge badge-secondary">Kosong</span>
        <?php endif; ?>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.6. Apakah petugas gudang/operator produksi bertanggungjawab atas inspeksi dan pengujian:
        </div>
    </div>

    <div class="ml-4 mt-3">
        <div class="row">
            <div class="col-lg">
                - 1.2.6.1. Material?
            </div>
        </div>
        <div class="mt-3 ml-4">
            <b>Jawaban:</b>
            <?php if(!is_null($isi($kuesioner, 'kuis_126' , 0)[0])): ?>
            <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[0]) && $isi($kuesioner, 'kuis_126' , 0)[0]===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[0]) && $isi($kuesioner, 'kuis_126' , 0)[0]===1 ? 'Ya' : 'Tidak'); ?></span>
            <?php else: ?>
            <span class="badge badge-secondary">Kosong</span>
            <?php endif; ?>
        </div>
        <div class="row mt-3">
            <div class="col-lg">
                - 1.2.6.2. Proses operasi?
            </div>
        </div>
        <div class="mt-3 ml-4">
            <b>Jawaban:</b>
            <?php if(!is_null($isi($kuesioner, 'kuis_126' , 0)[1])): ?>
            <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[1]) && $isi($kuesioner, 'kuis_126' , 0)[1]===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[1]) && $isi($kuesioner, 'kuis_126' , 0)[1]===1 ? 'Ya' : 'Tidak'); ?></span>
            <?php else: ?>
            <span class="badge badge-secondary">Kosong</span>
            <?php endif; ?>
        </div>
        <div class="row mt-3">
            <div class="col-lg">
                - 1.2.6.3. Produk akhir?
            </div>
        </div>
        <div class="mt-3 ml-4">
            <b>Jawaban:</b>
            <?php if(!is_null($isi($kuesioner, 'kuis_126' , 0)[2])): ?>
            <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[2]) && $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_126' , 0)[2]) && $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? 'Ya' : 'Tidak'); ?></span>
            <?php else: ?>
            <span class="badge badge-secondary">Kosong</span>
            <?php endif; ?>
        </div>

        <div class="kuis_126 <?php echo e($isi($kuesioner, 'kuis_126' , 0)[0] === 1 ||
            $isi($kuesioner, 'kuis_126' , 0)[1] === 1 ||
            $isi($kuesioner, 'kuis_126' , 0)[2] === 1 ? '' : 'hid'); ?>">
            <div class="row ml-4 mt-2">
                <div class="col-lg">
                    Bila <b>Ya</b>, Apakah mereka diawasi oleh personel pengendali mutu?
                </div>
            </div>
            <div class="row ml-5 mt-2">
                <div class="col-lg-2"><b>Jawaban:</b></div>
                <div class="col-lg-10">
                    <?php if(!is_null($isi($kuesioner, 'kuis_126' , 1))): ?>
                    <span class="<?php echo e($isi($kuesioner, 'kuis_126' , 1)===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e($isi($kuesioner, 'kuis_126' , 1)===1 ? 'Ya' : 'Tidak'); ?></span>
                    <?php else: ?>
                    <span class="badge badge-secondary">Kosong</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.7. Apakah dilakukan audit mutu?
        </div>
    </div>
    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <?php if(!is_null($isi($kuesioner, 'kuis_127' , 0))): ?>
        <span class="<?php echo e(!is_null($isi($kuesioner, 'kuis_127' , 0)) && $isi($kuesioner, 'kuis_127' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($kuesioner, 'kuis_127' , 0)) && $isi($kuesioner, 'kuis_127' , 0)===1 ? 'Ya' : 'Tidak'); ?></span>
        <?php else: ?>
        <span class="badge badge-secondary">Kosong</span>
        <?php endif; ?>
    </div>

    <div class="kuis_127 ml-4 <?php echo e(!is_null($isi($kuesioner, 'kuis_127', 0)) && $isi($kuesioner, 'kuis_127', 0) === 1 ? '' : 'hid'); ?>">
        <div class="row">
            <div class="col-lg">
                Jika <b>Ya</b>, Oleh siapa audit mutu dilakukan?
            </div>
            <div class="col-lg">
                <textarea class="inpt form-control" name="auditMutu2" style="width: 100%;" disabled=""><?php echo e(!is_null($isi($kuesioner, 'kuis_127', 1)) ? $isi($kuesioner, 'kuis_127', 1) : ''); ?></textarea>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.8. Berikan informasi lebih lanjut tentang organisasi pengendalian mutu?
        </div>
    </div>
    <div class="mt-3">
        <b>Jawaban:</b>
        <textarea class="form-control" name="infoPengendalianMutu" style="width: 100%;" disabled=""><?php echo e(!is_null($kuesioner) && !is_null($kuesioner->kuis_128) ? $kuesioner->kuis_128 : ''); ?></textarea>
    </div>
</div>

<hr>

<center><b><i>B.2 - Bahan-bahan Komponen dan Pelayanan</i></b></center><br>

<div class="row">
    <div class="col-lg">
        <b>2.1. Spesifikasi pembelian/jaminan mutu bahan.</b>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        Berikan rincian bahan baku yang dibeli, spesifikasi dan pemasok utama yang terlibat. (dapat menggunakan lampiran)
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran" class="<?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? '' : 'hid'); ?>">
        <?php if(!is_null($bahanHasil) && !is_null($bahanHasil->form_21)): ?>
        <a href="<?php echo e(asset('storage/dok/dokKuesioner/spekPembelian/'.$bahanHasil->form_21)); ?>" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        <?php endif; ?>
    </div>
    <div id="manual" class="<?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'hid' : ''); ?>">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Pengisian Manual</button>

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
                            <table border="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Jenis bahan</th>
                                        <th class="text-center">Spesifikasi</th>
                                        <th class="text-center">Nama Pemasok</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php if(!is_null($spekP)): ?>
                                    <?php $__currentLoopData = $spekP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bodyContent">
                                        <td><input class="jenisbahan form-control" type="text" name="jenisbahan[]" value="<?php echo e($data->jenis_bahan); ?>" disabled=""></td>
                                        <td><input class="spek form-control" type="text" name="spek[]" value="<?php echo e($data->spesifikasi); ?>" disabled=""></td>
                                        <td><input class="namaPemasok form-control" type="text" name="namaPemasok[]" value="<?php echo e($data->pemasok); ?>" disabled=""></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr class="bodyContent">
                                        <td><input class="jenisbahan form-control" type="text" name="jenisbahan[]" disabled=""></td>
                                        <td><input class="spek form-control" type="text" name="spek[]" disabled=""></td>
                                        <td><input class="namaPemasok form-control" type="text" name="namaPemasok[]" disabled=""></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>2.2. Berikan juga metode jaminan mutu yang diadopsi dalam penerimaan bahan baku, komponen atau pelayanan, dan tunjukkan langkah-langkah yang diambil terhadap barang yang tidak memenuhi syarat. (dapat menggunakan lampiran)</b>
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran1" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? '' : 'hid'); ?>">
        <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0))): ?>
        <a href="<?php echo e(asset('storage/dok/dokKuesioner/jaminanMutu/'.$isi($bahanHasil, 'form_22', 0))); ?>" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        <?php endif; ?>
    </div>
    <div id="manual1" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? 'hid' : ''); ?>">
        <textarea class="form-control" name="metodeJaminanMutu" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_22', 1)) ? $isi($bahanHasil, 'form_22', 1) : ''); ?></textarea>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>3.1. Sistem</b>
    </div>
</div>

<div class="row">
    <div class="col-lg">
        Berikan rincian berbagai tahap dalam peroduksi, jadwal produksi dan atau tambahan dalam bentuk diagram untuk memudahkan pemahaman. (dapat menggunakan lampiran)
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran2" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? '' : 'hid'); ?>">
        <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0))): ?>
        <a href="<?php echo e(asset('storage/dok/dokKuesioner/rincianProduksi/'.$isi($bahanHasil, 'form_31', 0))); ?>" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        <?php endif; ?>
    </div>
    <div id="manual2" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? 'hid' : ''); ?>">
        <textarea class="form-control" name="rincianProduksi" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_31', 1)) ? $isi($bahanHasil, 'form_31', 1) : ''); ?></textarea>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>3.2. Sistem pemeliharaan pabrik dan perolehan</b>
    </div>
</div>

<div class="row">
    <div class="col-lg">
        <b>Sebutkan jenis sistem pemeliharaan yang diterapkan?. (dapat menggunakan lampiran)</b>
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran3" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? '' : 'hid'); ?>">
        <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0))): ?>
        <a href="<?php echo e(asset('storage/dok/dokKuesioner/jenisPemeliharaan/'.$isi($bahanHasil, 'form_32', 0))); ?>" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        <?php endif; ?>
    </div>
    <div id="manual3" class="<?php echo e(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? 'hid' : ''); ?>">
        <textarea class="form-control" name="jenisPemeliharaan" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_32', 1)) ? $isi($bahanHasil, 'form_32', 1) : ''); ?></textarea>
    </div>
</div>

<hr>

<center><b><i>B.4 - Pengendalian Mutu Pengujian</i></b></center><br>

<div class="row">
    <div class="col-lg">
        <b>4.1. Sistem</b>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        Berikan rincian sistem pengendalian mutu, termasuk sistem pengalihan contoh yang diikuti dengan acuan tertentu sesuai degan standar yang relevan. Penggunaan jadwal pengendalian mutu atau suplemen acuan sialng terhadap diagram yang disebutkan di 3.1 akan lebih menguntungkan. Lampirkan panduan atau instruksi pengendalian mutu yang diterbitkan untuk personel.
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <br>
    <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_41', 0))): ?>
    <a href="<?php echo e(asset('storage/dok/dokKuesioner/pengendalianMutu/'.$isi($bahanHasil, 'form_41', 0))); ?>" target="_blank">
        <div class="view_file">
            <i class="fas fa-eye"></i> &nbsp; Lampiran
        </div>
    </a><br>
    <?php endif; ?>
    <textarea class="form-control" name="pengendalianMutu" style="width: 100%;" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_41', 1)) ? $isi($bahanHasil, 'form_41', 1) : ''); ?></textarea>
</div>

<hr>

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

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran11" class="<?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? '' : 'hid'); ?>">
        <?php if(!is_null($bahanHasil) && !is_null($bahanHasil->form_42)): ?>
        <a href="<?php echo e(asset('storage/dok/dokKuesioner/rincianPeralatan/'.$bahanHasil->form_42)); ?>" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        <?php endif; ?>
    </div>
    <div id="manual11" class="<?php echo e(!is_null($bahanHasil) && !is_null($bahanHasil->form_42) ? 'hid' : ''); ?>">
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
                            <table border="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Alat</th>
                                        <th class="text-center">Nama Pembuat</th>
                                        <th class="text-center">Acuan</th>
                                        <th class="text-center">Sistem dan Frekuensi pemeriksaan</th>
                                        <th class="text-center">Sertifikat</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody11">
                                    <?php if(!is_null($alat)): ?>
                                    <?php $__currentLoopData = $alat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bodyContent11">
                                        <td><input class="form-control namaAlat" type="text" name="namaAlat[]" value="<?php echo e($data2->nama_alat); ?>" disabled=""></td>
                                        <td><input class="form-control namaPembuat" type="text" name="namaPembuat[]" value="<?php echo e($data2->nama_pembuat); ?>" disabled=""></td>
                                        <td><input class="form-control acuan" type="text" name="acuan[]" value="<?php echo e($data2->acuan); ?>" disabled=""></td>
                                        <td><input class="form-control sistemP" type="text" name="sistemP[]" value="<?php echo e($data2->sistem); ?>" disabled=""></td>
                                        <td><input class="form-control sert" type="text" name="sert[]" value="<?php echo e($data2->sertifikat); ?>" disabled=""></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr class="bodyContent11">
                                        <td><input class="form-control namaAlat" type="text" name="namaAlat[]" disabled=""></td>
                                        <td><input class="form-control namaPembuat" type="text" name="namaPembuat[]" disabled=""></td>
                                        <td><input class="form-control acuan" type="text" name="acuan[]" disabled=""></td>
                                        <td><input class="form-control sistemP" type="text" name="sistemP[]" disabled=""></td>
                                        <td><input class="form-control sert" type="text" name="sert[]" disabled=""></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<center><b><i>B.5 - Rekaman dan dokumentasi</i></b></center><br>

<div class="row">
    <div class="col-lg">
        <b>5.1. Umum</b>
    </div>
</div>

<div class="ml-4 mt-3">
    <div class="row">
        <div class="col-lg">
            5.1.1. Tunjukkan betuk spesifikasi utama, seperti gambar teknik produk/bagian-bagian jadwal, contoh acuan, dsb. Tunjukkan juga rekaman umum ang tersedia. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran4">
            <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0))): ?>
            <a href="<?php echo e(asset('storage/dok/dokKuesioner/spekUtama/'.$isi($bahanHasil, 'form_511', 0))); ?>" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            <?php endif; ?>
        </div>
        <div id="manual4">
            <textarea class="form-control" name="spekUtama" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_511', 1)) ? $isi($bahanHasil, 'form_511', 1) : ''); ?></textarea>
        </div>
        
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.1.2. Tunjukkan sistem yang digunakan untuk memebuat desain/speksifikasi. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran5">
            <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0))): ?>
            <a href="<?php echo e(asset('storage/dok/dokKuesioner/jenisSistem/'.$isi($bahanHasil, 'form_512', 0))); ?>" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            <?php endif; ?>
        </div>
        <div id="manual5">
            <textarea class="form-control" name="jenisSistem" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_512', 1)) ? $isi($bahanHasil, 'form_512', 1) : ''); ?></textarea>
        </div>
        
    </div>

</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>5.2. Kesesuaian spesifikasi</b>
    </div>
</div>

<div class="ml-4 mt3-3">
    <div class="row">
        <div class="col-lg">
            5.2.1. Tunjukkan tingkat cacat dari temuan ketidaksesuaian dalam 6 bulan terakhir. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran6">
            <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0))): ?>
            <a href="<?php echo e(asset('storage/dok/dokKuesioner/tingkatCacat/'.$isi($bahanHasil, 'form_521', 0))); ?>" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            <?php endif; ?>
        </div>
        <div id="manual6">
            <textarea class="form-control" name="tingkatCacat" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_521', 1)) ? $isi($bahanHasil, 'form_521', 1) : ''); ?></textarea>
        </div>
        
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.2.2. Jika pengujian dilakukan sesuai dengan standar yang relevan telah dilaksanakan, lampirkan hasil uji jika ada
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <br>
        <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_522', 0))): ?>
        <a href="<?php echo e(asset('storage/dok/dokKuesioner/lampiranPengujian/'.$isi($bahanHasil, 'form_522', 0))); ?>" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        <?php endif; ?>
        <textarea class="form-control" name="pengujian" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_522', 1)) ? $isi($bahanHasil, 'form_522', 1) : ''); ?></textarea>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.2.3. Tunjukkan tingkat keluhan yang diterima selama masa jaminan dan berikan presentasi dari jumlah keluaran. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran7">
            <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0))): ?>
            <a href="<?php echo e(asset('storage/dok/dokKuesioner/tingkatKeluhan/'.$isi($bahanHasil, 'form_523', 0))); ?>" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            <?php endif; ?>
        </div>
        <div id="manual7">
            <textarea class="form-control" name="tingkatKeluhan" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_523', 1)) ? $isi($bahanHasil, 'form_523', 1) : ''); ?></textarea>
        </div>
        
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.2.4. Apakah telah dilakukan pengujian independen pada produk sesuai standar?
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <?php if(!is_null($isi($bahanHasil, 'form_524' , 0))): ?>
        <span class="<?php echo e(!is_null($isi($bahanHasil, 'form_524' , 0)) && $isi($bahanHasil, 'form_524' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak'); ?>"><?php echo e(!is_null($isi($bahanHasil, 'form_524' , 0)) && $isi($bahanHasil, 'form_524' , 0)===1 ? 'Ya' : 'Tidak'); ?></span>
        <?php else: ?>
        <span class="badge badge-secondary">Kosong</span>
        <?php endif; ?>
    </div>

    <div class="kuis_524 ml-4 mt-3 <?php echo e(!is_null($isi($bahanHasil, 'form_524', 0)) && $isi($bahanHasil, 'form_524', 0) === 1 ? '' : 'hid'); ?>">
        Jika <b>Ya</b>, oleh siapa? Lampirkan salinan jika ada<br>

        <b>Jawaban:</b><br>
        <?php if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_524', 1))): ?>
        <a href="<?php echo e(asset('storage/dok/dokKuesioner/pengujiIndependen/'.$isi($bahanHasil, 'form_524', 1))); ?>" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a>
        <?php endif; ?>
        <textarea class="form-control inpt" name="pengujiIndependen" style="width: 100%" disabled=""><?php echo e(!is_null($isi($bahanHasil, 'form_524', 2)) ? $isi($bahanHasil, 'form_524', 2) : ''); ?></textarea>
    </div>
</div>
<br>
<?php /**PATH /var/www/html/balai-cert/resources/views/applySA/kuesionerSNI.blade.php ENDPATH**/ ?>