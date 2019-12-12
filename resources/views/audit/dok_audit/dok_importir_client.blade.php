@if(!is_null($dokImportir) && $dokImportir->sni == 2)

<p class="mt-4"><b>Perusahaan Dalam Negeri (Importir)</b></p>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'surat_permohonan_sertifikat_sni')) || is_null($dokImportir) )
<div class="dok">
    <label>1. Surat Permohonan Importir F.03.01</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_sertifikat_sni,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->surat_permohonan_sertifikat_sni) ? $dokImportir->surat_permohonan_sertifikat_sni : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->surat_permohonan_sertifikat_sni) ? 'File telah diupload' : '' }}</i>
    </div>
    <b class="pt-3">Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[1] != 'null' ? $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( !is_null($dokImportir) && $getVal($dokImportir->rvI_daftar_isian_dan_kuesioner)[0] == 'null' )
<div class="dok mt-3">
    <label>2. Daftar Isian dan Kuesioner F.48.01</label><br>
    <input class="fileName" type="hidden" name="fileName[]" value="daftar_isian_dan_kuesioner,dokImportir">
    <button class="toggle_btn mr-2" type="button" data-toggle="collapse" data-target="#dok_sa" aria-expanded="false" aria-controls="kuesioner">
        Daftar Isian dan Kuesioner F.48.01 &nbsp; <i class="fas fa-chevron-down fa-lg" style="color: #002b51;"></i>
    </button>
    <div class="collapse" id="dok_sa">
        @include('applySA.kuesionerSNI')
    </div>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'copy_iui')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>3. Copy IUI</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_iui,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_iui) ? $dokImportir->copy_iui : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_iui) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_copy_iui)[1] != 'null' ? $getVal($dokImportir->rvI_copy_iui)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'copy_akte_notaris_perusahaan')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>4. Copy Akte Notaris Perusahaan</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_akte_notaris_perusahaan,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_akte_notaris_perusahaan) ? $dokImportir->copy_akte_notaris_perusahaan : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_akte_notaris_perusahaan) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[1] != 'null' ? $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'copy_tdp')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>5. Copy TDP/Ijin Prinsip/SIUP</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_tdp,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_tdp) ? $dokImportir->copy_tdp : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_tdp) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_copy_tdp)[1] != 'null' ? $getVal($dokImportir->rvI_copy_tdp)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'copy_npwp')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>6. Copy NPWP</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_npwp,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_npwp) ? $dokImportir->copy_npwp : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_npwp) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_copy_npwp)[1] != 'null' ? $getVal($dokImportir->rvI_copy_npwp)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'copy_api')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>7. Copy Angka Pengenal Importir (API)</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_api,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_api) ? $dokImportir->copy_api : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_api) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_copy_api)[1] != 'null' ? $getVal($dokImportir->rvI_copy_api)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'copy_sert_patent_merek')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>8. Copy Sertifikat Patent Merek/Tanda Bukti Pendaftaran Paten Merek</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_sert_patent_merek,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_sert_patent_merek) ? $dokImportir->copy_sert_patent_merek : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->copy_sert_patent_merek) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_copy_sert_patent_merek)[1] != 'null' ? $getVal($dokImportir->rvI_copy_sert_patent_merek)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'penunjukkan_distributor')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>9. Penunjukan Distributor (<i>contract agreement manufacturer & importer</i>)</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="penunjukkan_distributor,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->penunjukkan_distributor) ? $dokImportir->penunjukkan_distributor : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->penunjukkan_distributor) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_penunjukkan_distributor)[1] != 'null' ? $getVal($dokImportir->rvI_penunjukkan_distributor)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'struktur_organisasi')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>10. Struktur Organisasi</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="struktur_organisasi,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->struktur_organisasi) ? $dokImportir->struktur_organisasi : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->struktur_organisasi) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_struktur_organisasi)[1] != 'null' ? $getVal($dokImportir->rvI_struktur_organisasi)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'ilustrasi_pembubuhan_tanda_sni')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>11. Ilustrasi Pembubuhan Tanda SNI</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="ilustrasi_pembubuhan_tanda_sni,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->ilustrasi_pembubuhan_tanda_sni) ? $dokImportir->ilustrasi_pembubuhan_tanda_sni : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->ilustrasi_pembubuhan_tanda_sni) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[1] != 'null' ? $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'tabel_daftar_tipe_produk')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>12. Tabel Daftar Tipe/ kategori produk yang akan di SNI-kan</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="tabel_daftar_tipe_produk,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->tabel_daftar_tipe_produk) ? $dokImportir->tabel_daftar_tipe_produk : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->tabel_daftar_tipe_produk) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[1] != 'null' ? $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'gambar_dan_spesifikasi_produk')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>13. Gambar dan spesifikasi produk yang akan di SNI-kan (katalog)</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="gambar_dan_spesifikasi_produk,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->gambar_dan_spesifikasi_produk) ? $dokImportir->gambar_dan_spesifikasi_produk : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->gambar_dan_spesifikasi_produk) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[1] != 'null' ? $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'sert_smm')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>14. Sertifikat SMM</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="sert_smm,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->sert_smm) ? $dokImportir->sert_smm : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->sert_smm) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_sert_smm)[1] != 'null' ? $getVal($dokImportir->rvI_sert_smm)[1] : '' }}</textarea>
</div>
<hr>
@endif
@if( (!is_null($dokImportir) && ($dokImportir->sni == 2 || is_null($dokImportir->sni)) && $cekDok($dokImportir->dok_tidak_lengkap, 'laporan_pengawasan_iso_9001_terakhir')) || is_null($dokImportir) )
<div class="dok mt-3">
    <label>15. Laporan pengawasan ISO 9001 terakhir</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="laporan_pengawasan_iso_9001_terakhir,dokImportir">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dokImportir) && !is_null($dokImportir->laporan_pengawasan_iso_9001_terakhir) ? $dokImportir->laporan_pengawasan_iso_9001_terakhir : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($dokImportir) && !is_null($dokImportir->laporan_pengawasan_iso_9001_terakhir) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[1] != 'null' ? $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[1] : '' }}</textarea>
</div>
<hr>
@endif