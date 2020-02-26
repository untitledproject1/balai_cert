@extends('home')

@section('card-header', 'Verifikasi Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI')

@section('perusahaan')
<div class="row justify-content-center mb-3">
    <div class="col-md-12">
        <div class="col-lg-12">
            <div class="wrap_content">
                <h4>Perusahaan</h4>
                <h6>
                    {{ $user->nama_perusahaan }} <span class="{{ $userAuth -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $userAuth -> negeri == 1 ? 'produsen' : 'importir' }}</span>
                    @if(isset($produk))
                    - {{ $produk->produk }}
                    @endif
                </h6>
            </div>
        </div>
    </div>
</div>
@endsection

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @if(\Session::has('msg'))
        <center><p class="alert alert-primary">{{ \Session::get('msg') }}</p></center>
        @endif
        @if(!is_null($produk) && !is_null($produk->lembar_konSert) && is_null($produk->verify_konSert))
        <center><p class="alert alert-success">Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI Client sudah dibuat</p></center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/konfirmasiSert/'.$produk->lembar_konSert) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI
                </div>
            </a>
        </div>
        <h5 class="mt-2">Verifikasi Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI</h5>
        <form id="verify_lembarSert" method="POST" action="{{ url('/verify_lembarKonSert/'.$idProduk.'/'.$user->id) }}">
            @csrf
            <div class="row mt-3">
                <div class="col-lg-6">
                    <label class="container_radio">
                        <input type="radio" class="verifyL" onclick="slideOpt('.isiPesan', 'tidak', false)" name="pilih" value="1">Setujui
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="container_radio">
                        <input type="radio" class="verifyL" onclick="slideOpt('.isiPesan', 'ya', false)" name="pilih" value="2">Tolak
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="isiPesan hid">
                <label>Pesan</label><br>
                <textarea class="form-control inpt" name="isiPesan" disabled=""></textarea>
                <small class="form-text text-muted">Pesan tidak wajib diisi</small>
            </div><br>
            <div class="validMsg"></div><br>
            <button type="reset" class="reset_btn">Reset</button>
            <button type="button" class="submit_btn ml-3" onclick="ValidateSize('', '.verifyL', '#verify_lembarSert', '.validMsg', true)">Kirim</button>
        </form>
        @elseif(!is_null($produk) && !is_null($produk->lembar_konSert) && !is_null($produk->verify_konSert))
        <center><p class="alert alert-success">Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI Client lolos verifikasi</p></center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/konfirmasiSert/'.$produk->lembar_konSert) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI
                </div>
            </a>
        </div>
        @elseif(!is_null($produk) && is_null($produk->lembar_konSert) && is_null($produk->verify_konSert))
        <center><p class="alert alert-success">Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI Client belum dibuat</p></center>
        @endif
    </div>
</div>
@endsection