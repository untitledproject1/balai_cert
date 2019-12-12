@extends('home')

@section('card-header', 'Approval Draft Sertifikasi Produk')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') client,6,{{ $idProduk }},{{ $kode_tahap }} @endcomponent

        @if(\Session::has('msg'))
        <center><p class="alert alert-success">{{ \Session::get('msg') }}</p></center>
        @endif

        @if(!is_null($produk) && !is_null($produk->draft_sert) && is_null($produk->status_sert_jadi))
        <center>
            <p class="alert alert-success">Draft Sertifikat telah dibuat</p>
        </center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat
                </div>
            </a>
        </div>

        <div class="mt-3">
            <p><b>Approval Draft Sertifikat</b></p>
            <form id="apprvSertForm" method="POSt" action="{{ url('/apprv_draftSert_action/'.$idProduk) }}">
                @csrf
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <label class="container_radio">
                            <input type="radio" name="apprv" value="1" onclick="slideOpt('.pesanT', 'tidak', false)" required="">Terima
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label class="container_radio">
                            <input type="radio" name="apprv" value="0" onclick="slideOpt('.pesanT', 'ya', false)" required="">Tolak
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

                <div class="pesanT hid">
                    <b>Pesan: </b><br>
                    <textarea class="form-control inpt" class="inpt" name="pesanT" disabled="" placeholder="Pesan di sini.."></textarea>
                </div>
                <br>
                <button class="submit_btn" type="button" onclick="apprvSert()">Kirim</button>
            </form>
        </div>

        @elseif(!is_null($produk) && ($produk->status_sert_jadi == 1 || $produk->status_sert_jadi == 2 || $produk->status_sert_jadi == 3))
        <center>
            <p class="alert alert-success">Approval Draft Sertifikat berhasil. 
                @if($produk->status_sert_jadi >= 2)
                <br>Lanjut ketahap selanjutnya untuk memilih Ambil/Kirim Sertifikat
                @elseif($produk->status_sert_jadi === 1)
                <br>Tunggu Seksi Sertifikasi untuk mencetak sertifikast terlebih dahulu, setelah itu lanjut ke tahap selanjutnya untuk memilih Ambil/Kirim Sertifikat
                @endif
            </p>
        </center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat
                </div>
            </a>
        </div>
        @elseif(!is_null($produk) && $produk->status_sert_jadi === 4)
        <center>
            <p class="alert alert-primary">Approval Sertifikat: <b>Tolak</b>.<br> Permintaan pembuatan ulang draft serifikat telah dikirim ke seksi sertifikasi</p>
        </center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat Lama
                </div>
            </a>
        </div>
        <b>Pesan permintaan pembuatan ulang draft sertifikat : </b>
        <textarea class="form-control" disabled="">{{ $produk->pesan_sert }}</textarea>
        @else
        <center>
            <p class="alert alert-warning">Draft Sertifikat belum dibuat</p>
        </center>
        @endif
        <br>

        <div class="row mt-4 mb-4">
            <div class="col-lg-6">
                <a href="{{ url('/verify_dokSert/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            @if($kode_tahap >= 22)
            <div class="col-lg-6 text-right">
                <a href="{{ url('/req_sert/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
