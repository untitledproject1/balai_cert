@if(!is_null($tinjauanPP) && $tinjauanPP->sni == 2)

<p class="mt-4"><b>Tinjauan Proses Produksi</b></p>
@endif
@if( (!is_null($tinjauanPP) && ($tinjauanPP->sni == 2 || is_null($tinjauanPP->sni)) && $cekDok($tinjauanPP->dok_tidak_lengkap, 'struktur_organisasi')) || is_null($tinjauanPP) )
<div class="dok">
    <label>1. Struktur Organisasi (Bhs. Inggris atau Bhs. Indonesia)</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input tinjauanPP_upload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="struktur_organisasi,tinjauanPP">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->struktur_organisasi) ? $tinjauanPP->struktur_organisasi : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->struktur_organisasi) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_struktur_organisasi)[1] != 'null' ? $getVal($tinjauanPP->rvT_struktur_organisasi)[1] : '' }}</textarea>
</div>

<hr>
@endif
@if( (!is_null($tinjauanPP) && ($tinjauanPP->sni == 2 || is_null($tinjauanPP->sni)) && $cekDok($tinjauanPP->dok_tidak_lengkap, 'diagram_alir_produksi')) || is_null($tinjauanPP) )
<div class="dok">
    <label>2. Diagram Alir Produksi/ Prosedur Operasi (<i>Bhs. Inggris atau Bhs. Indonesia</i>)</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input tinjauanPP_upload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="diagram_alir_produksi,tinjauanPP">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->diagram_alir_produksi) ? $tinjauanPP->diagram_alir_produksi : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->diagram_alir_produksi) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_diagram_alir_produksi)[1] != 'null' ? $getVal($tinjauanPP->rvT_diagram_alir_produksi)[1] : '' }}</textarea>
</div>

<hr>
@endif
@if( (!is_null($tinjauanPP) && ($tinjauanPP->sni == 2 || is_null($tinjauanPP->sni)) && $cekDok($tinjauanPP->dok_tidak_lengkap, 'daftar_peralatan')) || is_null($tinjauanPP) )
<div class="dok">
    <label>3. Daftar Peralatan</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input tinjauanPP_upload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="daftar_peralatan,tinjauanPP">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->daftar_peralatan) ? $tinjauanPP->daftar_peralatan : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->daftar_peralatan) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_daftar_peralatan)[1] != 'null' ? $getVal($tinjauanPP->rvT_daftar_peralatan)[1] : '' }}</textarea>
</div>

<hr>
@endif
@if( (!is_null($tinjauanPP) && ($tinjauanPP->sni == 2 || is_null($tinjauanPP->sni)) && $cekDok($tinjauanPP->dok_tidak_lengkap, 'spesifikasi_peralatan')) || is_null($tinjauanPP) )
<div class="dok">
    <label>4. Spesifikasi bahan baku</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input tinjauanPP_upload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="spesifikasi_peralatan,tinjauanPP">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->spesifikasi_peralatan) ? $tinjauanPP->spesifikasi_peralatan : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->spesifikasi_peralatan) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[1] != 'null' ? $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[1] : '' }}</textarea>
</div>

<hr>
@endif
@if( (!is_null($tinjauanPP) && ($tinjauanPP->sni == 2 || is_null($tinjauanPP->sni)) && $cekDok($tinjauanPP->dok_tidak_lengkap, 'tata_letak_pabrik')) || is_null($tinjauanPP) )
<div class="dok">
    <label>5. Tata Letak/ layout pabrik (<i>Bhs. Inggris atau Bhs. Indonesia</i>)</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input tinjauanPP_upload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="tata_letak_pabrik,tinjauanPP">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->tata_letak_pabrik) ? $tinjauanPP->tata_letak_pabrik : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->tata_letak_pabrik) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_tata_letak_pabrik)[1] != 'null' ? $getVal($tinjauanPP->rvT_tata_letak_pabrik)[1] : '' }}</textarea>
</div>

<hr>
@endif
@if( (!is_null($tinjauanPP) && ($tinjauanPP->sni == 2 || is_null($tinjauanPP->sni)) && $cekDok($tinjauanPP->dok_tidak_lengkap, 'peta_letak_pabrik_dari_bandara_terdekat')) || is_null($tinjauanPP) )
<div class="dok">
    <label>6. Peta rute pabrik dari bandara terdekat</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input tinjauanPP_upload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="peta_letak_pabrik_dari_bandara_terdekat,tinjauanPP">
        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) ? $tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat : 'Pilih File..' }}</label>
        <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</small>
        <small class="form-text text-muted">Wajib diisi</small>
        <i class="resUpload">{{ !is_null($tinjauanPP) && !is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) ? 'File telah diupload' : '' }}</i>
    </div>
    <b>Review :</b>
    <textarea disabled="" class="form-control">{{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[1] != 'null' ? $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[1] : '' }}</textarea>
</div>

<hr>
@endif
