{{-- @if( (!is_null($pesan) && ($cekOpsi('kuis1_opsi', $pesan[0]) || $cekOpsi('kuis2_opsi', $pesan[0]) || $cekOpsi('kuis3_opsi', $pesan[0]) || $cekOpsi('kuis4_opsi', $pesan[0]) || $cekOpsi('kuis5_opsi', $pesan[0]) || $cekOpsi('kuis6_opsi', $pesan[0])) || is_null($pesan)) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="header_kuis">
    <h5>
        <center><b>{{ strtoupper('A. Informasi Tambahan') }}</b></center>
    </h5>
</div>
<br>
{{-- @endif --}}

{{-- @if( (!is_null($pesan) && $cekOpsi('kuis1_opsi', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        1. Apakah pernah mendapatkan Sertifikat tanda SNI?
    </div>

    <div class="col-lg-2">
        <label class="container_radio">
            <input onclick="slideOpt('.kuis1', 'ya', false)" type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis1_opsi) && $infoDB->kuis1_opsi === 1 ? 'checked' : '' }}
            name="opsi1" value="1">Ya
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input onclick="slideOpt('.kuis1', 'tidak', false)" type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis1_opsi) && $infoDB->kuis1_opsi !== 1 ? 'checked' : '' }}
            name="opsi1" value="0">Tidak
            <span class="checkmark"></span>
        </label>
    </div>
</div>

<div class="ml-3 mb-3 kuis1 {{ !is_null($infoDB) && $infoDB->kuis1_opsi === 1 ? '' : 'hid' }}">
    <div class="row">
        <div class="col-lg-6">
            Jika <b>Ya</b>, Penerbit Sertifikat
        </div>
        <div class="col-lg-6">
            <input class="inpt form-control" type="text" name="penerbitSertSNI" value="{{ !is_null($isi($infoDB, 'kuis1_isi', 0)) ? $isi($infoDB, 'kuis1_isi', 0) : '' }}" {{ !is_null($infoDB) && $infoDB->kuis1_opsi === 1 ? '' : 'disabled' }} placeholder="Penerbit Sertifikat">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6">
            Masa Berlaku
        </div>
        <div class="col-lg-6">
            <input class="inpt form-control" type="text" name="masaBerlakuSNI" value="{{ !is_null($isi($infoDB, 'kuis1_isi', 1)) ? $isi($infoDB, 'kuis1_isi', 1) : '' }}" {{ !is_null($infoDB) && $infoDB->kuis1_opsi === 1 ? '' : 'disabled' }} placeholder="Masa Berlaku">
        </div>
    </div>
</div>
<hr>
{{-- @endif --}}


{{-- @if( (!is_null($pesan) && $cekOpsi('kuis2_opsi', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        2. Apakah perusahaan anda bagian dari sebuah group?
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis2_opsi) && $infoDB->kuis2_opsi === 1 ? 'checked' : '' }}
            name="opsi2" value="1">Ya
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis2_opsi) && $infoDB->kuis2_opsi !== 1 ? 'checked' : '' }}
            name="opsi2" value="0">Tidak
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mt-2 mb-3">
    <div class="col-lg-5">
        Berikan Detailnya
    </div>
    <div class="col-lg-7">
        <textarea class="form-control" name="detailGroup" placeholder="Detail..">{{ !is_null($infoDB) && $infoDB->kuis2_isi != 'null' ? $infoDB->kuis2_isi : '' }}</textarea>
    </div>
</div>
<hr>
{{-- @endif --}}


{{-- @if( (!is_null($pesan) && $cekOpsi('kuis3_opsi', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        3. Apakah diantara group perusahaan anda ada yang telah mendapat sertifikat SNI?
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input onclick="slideOpt('.kuis2', 'ya', false)" type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis3_opsi) && $infoDB->kuis3_opsi === 1 ? 'checked' : '' }}
            name="opsi3" value="1">Ya
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input onclick="slideOpt('.kuis2', 'tidak', false)" type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis3_opsi) && $infoDB->kuis3_opsi !== 1 ? 'checked' : '' }}
            name="opsi3" value="0">Tidak
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class=" ml-3 kuis2 {{ !is_null($infoDB) && $infoDB->kuis3_opsi === 1 ? '' : 'hid' }}">
    <div class="row mt-2 mb-3">
        <div class="col-lg">
            Jika <b>Ya</b>, Tulis nama dan alamat perusahaan tsb.
        </div>
        <div class="col-lg">
            <input class="inpt form-control mb-2" type="text" name="namaComp" placeholder="Nama Perusahaan" value="{{ !is_null($isi($infoDB, 'kuis3_isi', 0)) ? $isi($infoDB, 'kuis3_isi', 0) : '' }}" {{ !is_null($infoDB) && $infoDB->kuis3_opsi === 1 ? '' : 'disabled' }}>
            <textarea class="inpt form-control" name="alamatComp" placeholder="Alamat Perusahaan" {{ !is_null($infoDB) && $infoDB->kuis3_opsi === 1 ? '' : 'disabled' }} >{{ !is_null($isi($infoDB, 'kuis3_isi', 1)) ? $isi($infoDB, 'kuis3_isi', 1) : '' }}</textarea>
        </div>
    </div>
</div>
<hr>
{{-- @endif --}}

{{-- @if( (!is_null($pesan) && $cekOpsi('kuis4_opsi', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        4. Apakah perusahaan Saudara telah mendapatkan sertifikat SNI ISO 9001?
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input onclick="slideOpt('.kuis3', 'ya', '.kuis3_')" type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis4_opsi) && $infoDB->kuis4_opsi === 1 ? 'checked' : '' }}
            name="opsi4" value="1">Ya
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input onclick="slideOpt('.kuis3', 'tidak', '.kuis3_')" type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis4_opsi) && $infoDB->kuis4_opsi !== 1 ? 'checked' : '' }}
            name="opsi4" value="0">Tidak
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="ml-3 mb-3 kuis3 {{ !is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? '' : 'hid' }}">

    <div class="row">
        <div class="col-lg-6">
            Jika <b>Ya</b>, Penerbit sertifikat ISO
        </div>
        <div class="col-lg-6">
            <input class="inpt form-control" type="text" name="perbitSertISO" value="{{ !is_null($isi($infoDB, 'kuis4_isi', 0)) ? $isi($infoDB, 'kuis4_isi', 0)[0] : '' }}" {{ !is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? '' : 'disabled' }} placeholder="Penerbit Sertifikat Iso">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6">
            Masa Berlaku
        </div>
        <div class="col-lg-6">
            <input class="inpt form-control" type="text" name="masaBerlakuISO" value="{{ !is_null($isi($infoDB, 'kuis4_isi', 0)) ? $isi($infoDB, 'kuis4_isi', 0)[1] : '' }}" {{ !is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? '' : 'disabled' }} placeholder="Masa Berlaku">
        </div>
    </div>
</div>
<div class="ml-3 mb-3 mt-2 kuis3_ {{ !is_null($infoDB) && !is_null($infoDB->kuis4_opsi) && $infoDB->kuis4_opsi !== 1 ? '' : 'hid' }}">
    <div class="row">
        <div class="col-lg-8">
            Jika <b>Tidak</b>, Apakah perusahaan menerapkan dokumentasi SMM dan menerbitkan dokumen mutu/produk secara internal?
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input class="inpt" type="radio" {{ !is_null($infoDB) && !is_null($isi($infoDB, 'kuis4_isi', 1)) && $isi($infoDB, 'kuis4_isi', 1) === 1 ? 'checked' : '' }} name="opsi4_tidak" value="1" {{ !is_null($infoDB) && !is_null($infoDB->kuis4_opsi) && $infoDB->kuis4_opsi !== 1 ? '' : 'disabled' }}>Ya
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-2">
            <label class="container_radio">
                <input class="inpt" type="radio" {{ !is_null($infoDB) && !is_null($isi($infoDB, 'kuis4_isi', 1)) && $isi($infoDB, 'kuis4_isi', 1) !== 1 ? 'checked' : '' }} name="opsi4_tidak" value="0" {{ !is_null($infoDB) && !is_null($infoDB->kuis4_opsi) && $infoDB->kuis4_opsi !== 1 ? '' : 'disabled' }}>Tidak
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
</div>
<hr>
{{-- @endif --}}

{{-- @if( (!is_null($pesan) && $cekOpsi('kuis5_opsi', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        5. Apakah anda bekerja dengan menggunakan sistem shift?
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis5_opsi) && $infoDB->kuis5_opsi === 1 ? 'checked' : '' }}
            name="opsi5" value="1">Ya
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($infoDB) && !is_null($infoDB->kuis5_opsi) && $infoDB->kuis5_opsi !== 1 ? 'checked' : '' }}
            name="opsi5" value="0">Tidak
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<hr>
{{-- @endif --}}

{{-- @if( (!is_null($pesan) && $cekOpsi('kuis6_opsi', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        6. Kapan perusahaan Anda siap disertifikasi?<br><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
            </div>
            <input type="text" name="siapSertDate" class="minDate form-control" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" value="{{ !is_null($infoDB) && !is_null($infoDB->kuis6) ? $infoDB->kuis6 : '' }}" />
        </div>
    </div>
</div>
<hr>
{{-- @endif --}}

{{-- @if( !is_null($pesan) && ($cekOpsi('kuis1', $pesan[0]) || $cekOpsi('kuis2', $pesan[0]) || $cekOpsi('kuis3', $pesan[0]) || $cekOpsi('kuis4', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="header_kuis">
    <h5>
        <center><b>{{ strtoupper('B. Kuesioner') }}</b></center>
    </h5>
</div>
{{-- @endif --}}
<br>
{{-- @if( (!is_null($pesan) && $cekOpsi('kuis1', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        1. Kapan contoh atau prototype, tersedia untuk kegiatan evaluasi<br><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
            </div>
            <input type="text" name="evalDate" class="minDate form-control" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" value="{{ !is_null($kuesioner) && !is_null($kuesioner->kuis1) ? $kuesioner->kuis1 : '' }}" />
        </div>
    </div>
</div>
<hr>
{{-- @endif --}}

{{-- @if( (!is_null($pesan) && $cekOpsi('kuis2', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        2. Apakah merupakan contoh produksi atau contoh prototipe?
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($kuesioner) && !is_null($kuesioner->kuis2) && $kuesioner->kuis2===1 ? 'checked' : '' }} name="contoh" value="1">Contoh Produksi
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($kuesioner) && !is_null($kuesioner->kuis2) && $kuesioner->kuis2 !==1 ? 'checked' : '' }} name="contoh" value="0">Contoh Prototipe
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<hr>
{{-- @endif --}}

{{-- @if( (!is_null($pesan) && $cekOpsi('kuis3', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8">
        3. Apakah ini menjadi proses produksi atau proses contoh protipe?
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($isi($kuesioner, 'kuis3' , 0)) && $isi($kuesioner, 'kuis3' , 0)===1 ? 'checked' : '' }} onclick="slideOpt('.kuis_3', 'tidak', false)" name="proses" value="1">Proses Produksi
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($isi($kuesioner, 'kuis3' , 0)) && $isi($kuesioner, 'kuis3' , 0) !==1 ? 'checked' : '' }} onclick="slideOpt('.kuis_3', 'ya', false)" name="proses" value="0">Proses Contoh Prototipe
            <span class="checkmark"></span>
        </label>
    </div>
</div>

<div class="ml-3 mb-3 kuis_3 {{ !is_null($isi($kuesioner, 'kuis3' , 0)) && $isi($kuesioner, 'kuis3' , 0)  === 0 ? '' : 'hid' }}">
    <div class="row">
        <div class="col-lg-8">
            Jika <b>prototipe</b>, Kapan produksi dijadwalkan?<br><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="waktuProduksi" class="minDate form-control inpt" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" value="{{ !is_null($isi($kuesioner, 'kuis3', 1)) ? $isi($kuesioner, 'kuis3', 1) : '' }}" {{ !is_null($isi($kuesioner, 'kuis3' , 0)) && $isi($kuesioner, 'kuis3' , 0) !== 1 ? '' : 'disabled' }} />
            </div>
        </div>
    </div>
</div>
<hr>
{{-- @endif --}}

{{-- @if( (!is_null($pesan) && $cekOpsi('kuis4', $pesan[0])) || is_null($pesan) || (!is_null($infoDB) && $infoDB->lengkap == 1) ) --}}
<div class="row">
    <div class="col-lg-8" colspan="2">
        4. Sudahkah produk diuji sesuai dengan standar?<br>(bila sudah, harap dilamprikan laporannya)
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($isi($kuesioner, 'kuis4' , 0)) && $isi($kuesioner, 'kuis4' , 0)===1 ? 'checked' : '' }} onclick="slideOpt('.kuis_4', 'ya', false)" name="kesudahan" value="1">Sudah
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input type="radio" {{ !is_null($isi($kuesioner, 'kuis4' , 0)) && $isi($kuesioner, 'kuis4' , 0) !==1 ? 'checked' : '' }} onclick="slideOpt('.kuis_4', 'tidak', false)" name="kesudahan" value="0">Belum
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mt-2 mb-3">
    <div class="col-lg-12">
        <div class="kuis_4 {{ !is_null($isi($kuesioner, 'kuis4' , 0)) && $isi($kuesioner, 'kuis4' , 0) ===1 ? '' : 'hid' }}">
            @if(!is_null($kuesioner) && !is_null($isi($kuesioner, 'kuis4', 1)) )
            {{-- <a href="{{ asset('storage/dok/dokKuesioner/standarProduk/'.$isi($kuesioner, 'kuis4', 1)) }}">Lampiran Lama</a><br> --}}
            <a href="{{ url('/doc/download/dokKuesioner/standarProduk/'.$isi($kuesioner, 'kuis4', 1)) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Lampiran
                </div>
            </a><br>
            @endif
            <b>Lampiran</b><br>
            <div class="custom-file mt-2">
                <input type="file" class="custom-file-input kuisUpload inpt" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]" {{ !is_null($isi($kuesioner, 'kuis4' , 0)) && $isi($kuesioner, 'kuis4' , 0) ===1 ? '' : 'disabled' }}>
                <input class="fileName" type="hidden" value="kuis4,B_4,standarProduk">
                <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($isi($kuesioner, 'kuis4', 1)) ? $isi($kuesioner, 'kuis4', 1) : 'Pilih File..' }}</label>
                <small class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                <i class="resUpload">{{ !is_null($isi($kuesioner, 'kuis4', 1)) ? 'File telah diupload' : '' }}</i>
            </div>
        </div>
    </div>
</div>
<br>

{{-- @endif --}}
