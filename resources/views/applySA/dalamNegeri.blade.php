@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'surat_permohonan_sertifikat_sni')) || is_null($dok->sni)) ) || is_null($dok) )
<div class="dok">
    <label>1. Surat Permohonan F.03.01</label><br>
    <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
    <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
    <br><br>
    @if(!is_null($formatFile))
    <div class="text-center mb-2">
        <a href="{{ url('/doc/download/format_dok/'.$formatFile->file) }}" target="_blank">
            <div class="download_file" style="margin-top: 0;">
                <i class="fas fa-download"></i>&nbsp;
                Download Format Dokumen
            </div>
        </a>
    </div>
    @else
    <center>
        <p class="alert alert-primary">Format file <b>Surat Permohonan F.03.01</b> belum ada.<br>Harap hubungi Seksi Pemasaran</p>
    </center>
    @endif
    <div class="custom-file">
        <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_sertifikat_sni">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->surat_permohonan_sertifikat_sni) ? $dok->surat_permohonan_sertifikat_sni : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Upload Surat Permohonan F.03.01 yang sudah diisi</small>
        <i class="resUpload">{{ !is_null($dok) && !is_null($dok->surat_permohonan_sertifikat_sni) ? 'File telah diupload' : '' }}</i>
    </div>
</div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'copy_iui')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>2. Copy IUI</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="copy_iui">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->copy_iui) ? $dok->copy_iui : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->copy_iui) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'copy_akte_notaris_perusahaan')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>3. Copy Akte Notaris Perusahaan</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="copy_akte_notaris_perusahaan">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->copy_akte_notaris_perusahaan) ? $dok->copy_akte_notaris_perusahaan : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->copy_akte_notaris_perusahaan) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'copy_tdp')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>4. Copy TDP</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="copy_tdp">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->copy_tdp) ? $dok->copy_tdp : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->copy_tdp) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'copy_npwp')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>5. Copy NPWP</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="copy_npwp">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->copy_npwp) ? $dok->copy_npwp : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->copy_npwp) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'copy_sert_patent_merek')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>6. Copy Sertifikat Patent Merek</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="copy_sert_patent_merek">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->copy_sert_patent_merek) ? $dok->copy_sert_patent_merek : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->copy_sert_patent_merek) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'copy_sert_iso_9001')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>7. Copy Sertifikat ISO 9001</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="copy_sert_iso_9001">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->copy_sert_iso_9001) ? $dok->copy_sert_iso_9001 : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->copy_sert_iso_9001) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'laporan_audit_sistem_mutu_terakhir')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>8. Laporan Audit Sistem Mutu Terakhir</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="laporan_audit_sistem_mutu_terakhir">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->laporan_audit_sistem_mutu_terakhir) ? $dok->laporan_audit_sistem_mutu_terakhir : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->laporan_audit_sistem_mutu_terakhir) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'panduan_mutu')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>9. Panduan Mutu</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="panduan_mutu">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->panduan_mutu) ? $dok->panduan_mutu : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->panduan_mutu) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'daftar_induk_dok')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>10. Daftar Induk Dokumen</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="daftar_induk_dok">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->daftar_induk_dok) ? $dok->daftar_induk_dok : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->daftar_induk_dok) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'struktur_organisasi')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>11. Struktur Organisasi</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="struktur_organisasi">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->struktur_organisasi) ? $dok->struktur_organisasi : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->struktur_organisasi) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'diagram_alir_proses_produksi')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>12. Diagram Alir Proses Produksi</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="diagram_alir_proses_produksi">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->diagram_alir_proses_produksi) ? $dok->diagram_alir_proses_produksi : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->diagram_alir_proses_produksi) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'surat_pertunjukkan_wakil_manajemen')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>13. Surat Pertujukkan Wakil Manajemen</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="surat_pertunjukkan_wakil_manajemen">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->surat_pertunjukkan_wakil_manajemen) ? $dok->surat_pertunjukkan_wakil_manajemen : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->surat_pertunjukkan_wakil_manajemen) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'ilustrasi_pembubuhan_tanda_sni')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>14. Ilustrasi Pembubuhan Tanda SNI</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="ilustrasi_pembubuhan_tanda_sni">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->ilustrasi_pembubuhan_tanda_sni) ? $dok->ilustrasi_pembubuhan_tanda_sni : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->ilustrasi_pembubuhan_tanda_sni) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'tabel_daftar_tipe_produk')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>15. Tabel Daftar Tipe Produk</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="tabel_daftar_tipe_produk">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->tabel_daftar_tipe_produk) ? $dok->tabel_daftar_tipe_produk : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->tabel_daftar_tipe_produk) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'gambar_dan_spesifikasi_produk')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>16. Gambar dan Spesifikasi Produk</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="gambar_dan_spesifikasi_produk">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->gambar_dan_spesifikasi_produk) ? $dok->gambar_dan_spesifikasi_produk : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->gambar_dan_spesifikasi_produk) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'tata_letak_pabrik')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>17. Tata Letak Pabrik</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="tata_letak_pabrik">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->tata_letak_pabrik) ? $dok->tata_letak_pabrik : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->tata_letak_pabrik) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif
@if( (!is_null($dok) && ( ($dok->sni == 2 && $cekDok($dok->dok_tidak_lengkap, 'peta_rute_pabrik_dari_bandara_terdekat')) || is_null($dok->sni)) ) || is_null($dok) )
    <div class="dok">
        <label>18. Peta Rute Pabrik Dari Bandara Terdekat</label><br>
        <small>Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
        <br>
        <div class="custom-file">
            <input type="file" class="custom-file-input saUpload file @error('dok[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
            <input class="fileName" type="hidden" name="fileName[]" value="peta_rute_pabrik_dari_bandara_terdekat">
            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->peta_rute_pabrik_dari_bandara_terdekat) ? $dok->peta_rute_pabrik_dari_bandara_terdekat : 'Pilih File..' }}</label>
            <i class="resUpload">{{ !is_null($dok) && !is_null($dok->peta_rute_pabrik_dari_bandara_terdekat) ? 'File telah diupload' : '' }}</i>
        </div>
    </div><br>
@endif