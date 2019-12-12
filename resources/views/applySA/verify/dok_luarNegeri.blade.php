<h4 class="mb-3"><b><i>Dok Importir</i></b><br></h4>
<div class="row ">
    <div class="col-lg-7">
        <label>1. Surat Permohonan Sertifikasi SNI</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[]" required="" value="ada" onclick="{{ (!is_null($dokDalamNegeri) && is_null($dokDalamNegeri->surat_permohonan_sertifikat_sni)) || is_null($dokDalamNegeri) ? 'return false' : '' }}" {{ !is_null($dokDalamNegeri) && !is_null($dokDalamNegeri->surat_permohonan_sertifikat_sni) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[]" required="" value="null" onclick="{{ 
		(!is_null($dokDalamNegeri) && is_null($dokDalamNegeri->surat_permohonan_sertifikat_sni)) || is_null($dokDalamNegeri) ? 'return false' : '' }}" {{ (!is_null($dokDalamNegeri) && is_null($dokDalamNegeri->surat_permohonan_sertifikat_sni)) || is_null($dokDalamNegeri) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
    <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_sertifikat_sni,sa">
    @if(!is_null($dokDalamNegeri) && !is_null($dokDalamNegeri->surat_permohonan_sertifikat_sni))
    {{ $dokDalamNegeri->surat_permohonan_sertifikat_sni }} |
    <a href="{{ asset('storage/dok/sa/'.$dokDalamNegeri->surat_permohonan_sertifikat_sni) }}" target="_blank">Lihat File</a>
    @else

    @endif
</div><br>
<center>
    <p class="alert alert-warning">Dokumen belum ada</p>
</center>

<div class="row">
    <div class="col-lg-7">
        <label>2. Daftar Isian dan Kuesioner F.48.01</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[]" required="" value="ada" onclick="{{ (!is_null($dokImportir) && is_null($dokImportir->daftar_isian_dan_kuesioner_importer)) || is_null($dokImportir) ? 'return false' : '' }}" {{ !is_null($dokImportir) && !is_null($dokImportir->daftar_isian_dan_kuesioner_importer) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>


        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[]" required="" value="null" onclick="{{ (!is_null($dokImportir) && is_null($dokImportir->daftar_isian_dan_kuesioner_importer)) || is_null($dokImportir) ? 'return false' : '' }}" {{ (!is_null($dokImportir) && is_null($dokImportir->daftar_isian_dan_kuesioner_importer)) || is_null($dokImportir) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
    <br>
    <input class="fileName" type="hidden" name="fileName[]" value="daftar_isian_dan_kuesioner_importer,dokImportir">
    @if(!is_null($dokImportir) && !is_null($dokImportir->daftar_isian_dan_kuesioner_importer))
    {{ $dokImportir->daftar_isian_dan_kuesioner_importer }} |
    <a href="{{ asset('storage/dok/dokImportir/'.$dokImportir->daftar_isian_dan_kuesioner_importer) }}" target="_blank">Lihat File</a>
    @else

    @endif
</div><br>
<center>
    <p class="alert alert-warning">Dokumen belum ada</p>
</center>

<div class="row">
    <div class="col-lg-7">
        <label>3. Copy API</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[]" required="" value="ada" onclick="{{ (!is_null($dokImportir) && is_null($dokImportir->copy_api)) || is_null($dokImportir) ? 'return false' : '' }}" {{ !is_null($dokImportir) && !is_null($dokImportir->copy_api) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>


        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[]" required="" value="null" onclick="{{ (!is_null($dokImportir) && is_null($dokImportir->copy_api)) || is_null($dokImportir) ? 'return false' : '' }}" {{ (!is_null($dokImportir) && is_null($dokImportir->copy_api)) || is_null($dokImportir) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
    <br>
    <input class="fileName" type="hidden" name="fileName[]" value="copy_api,dokImportir">
    @if(!is_null($dokImportir) && !is_null($dokImportir->copy_api))
    {{ $dokImportir->copy_api }} |
    <a href="{{ asset('storage/dok/dokImportir/'.$dokImportir->copy_api) }}" target="_blank">Lihat File</a>
    @else

    @endif
</div><br>
<center>
    <p class="alert alert-warning">Dokumen belum ada</p>
</center>
<br>


<h4 class="mb-3"><b><i>Dok Manufaktur</i></b><br></h4>
<div class="row">
    <div class="col-lg-7">
        <label>1. Surat Permohonan Dari Manufaktur</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[]" required="" value="ada" onclick="{{ (!is_null($dokManufaktur) && is_null($dokManufaktur->surat_permohonan_dari_manufaktur)) || is_null($dokManufaktur) ? 'return false' : '' }}" {{ !is_null($dokManufaktur) && !is_null($dokManufaktur->surat_permohonan_dari_manufaktur) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>

        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[]" required="" value="null" onclick="{{ (!is_null($dokManufaktur) && is_null($dokManufaktur->surat_permohonan_dari_manufaktur)) || is_null($dokManufaktur) ? 'return false' : '' }}" {{ (!is_null($dokManufaktur) && is_null($dokManufaktur->surat_permohonan_dari_manufaktur)) || is_null($dokManufaktur) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
    <br>
    <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_dari_manufaktur,dokManufaktur">
    @if(!is_null($dokManufaktur) && !is_null($dokManufaktur->surat_permohonan_dari_manufaktur))
    {{ $dokManufaktur->surat_permohonan_dari_manufaktur }} |
    <a href="{{ asset('storage/dok/dokManufaktur/'.$dokManufaktur->surat_permohonan_dari_manufaktur) }}" target="_blank">Lihat File</a>
    @else

    @endif
</div><br>
<center>
    <p class="alert alert-warning">Dokumen belum ada</p>
</center>
<br>
