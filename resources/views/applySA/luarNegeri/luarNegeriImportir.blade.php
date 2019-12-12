{{-- @if(is_null($dokImportir) || (!is_null($dokImportir) && $dokImportir->lengkap == 2))
<b><i>Dokumen Importir</i></b><br><br>
@endif --}}
@if( (!is_null($dokImportir) && is_null($dokImportir->surat_permohonan_sertifikat_sni)) || is_null($dokImportir) )
<div class="dok">
    <label>1. Surat Permohonan Importir F.03.01</label><br>
    <a href="{{ url('/surat_sni/download/'.$user->negeri.'/'.$idProduk) }}" target="_blank">
        <div class="view_file" style="margin-top: 0;">
            <i class="fas fa-eye"></i>&nbsp;
            Download Format Dokumen
        </div>
    </a><br>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_sertifikat_sni,sa">
        <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
        <small id="emailHelp" class="form-text text-muted">Upload Surat Permohonan Importir F.03.01 yang sudah diisi</small>
    </div>
</div><br>
@endif
@if( (!is_null($dokImportir) && is_null($dokImportir->copy_iui)) || is_null($dokImportir) )
<div class="dok">
    <label>2. Copy IUI</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_iui,dokImportir">
        <label class="custom-file-label" for="inputGroupFile02">Pilih File..</label>
    </div>
</div><br>
@endif
@if( (!is_null($dokImportir) && is_null($dokImportir->copy_api)) || is_null($dokImportir) )
<div class="dok">
    <label>3. Copy API</label><br>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="copy_api,dokImportir">
        <label class="custom-file-label" for="inputGroupFile03">Pilih File..</label>
    </div>
</div>
@endif