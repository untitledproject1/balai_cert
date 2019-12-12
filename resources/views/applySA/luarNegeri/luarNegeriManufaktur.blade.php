@if(is_null($dokManufaktur) || (!is_null($dokManufaktur) && $dokManufaktur->lengkap == 2))
<br>
<b><i>Dokumen Manufaktur</i></b><br>
@endif
@if( (!is_null($dokManufaktur) && is_null($dokManufaktur->surat_permohonan_dari_manufaktur)) || is_null($dokManufaktur) )
<div class="dok">
    {{-- <label>1. Surat Permohonan Dari Manufaktur</label><br>
    <input class="file" type="file" name="dok[]" required="">
    <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_dari_manufaktur,dokManufaktur"> --}}

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="dok[]" required="">
        <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_dari_manufaktur,dokManufaktur">
        <label class="custom-file-label" for="inputGroupFile04">Pilih File..</label>
    </div>
</div>
<br>
@endif