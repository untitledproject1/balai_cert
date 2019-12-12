@extends('home')

@section('card-header', 'Request Kirim atau Ambil di BBK')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') client,7,{{ $idProduk }},{{ $kode_tahap }} @endcomponent
        <hr>

        @if(!is_null($produk) && !is_null($produk->draft_sert))
        <div class="text-center">
            <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat
                </div>
            </a>
        </div>
        @endif

        @if(!is_null($produk) && $produk->status_sert_jadi == 2 && is_null($produk->request_sert))
        <center>
            <p class="alert alert-success">Sertifikat telah dicetak</p>
        </center>
        <p><b>Request Ambil atau Kirim Sertifikat</b></p>

        <form id="reqSertJadiForm" method="POST" action="{{ url('/req_sert_action/'.$produk->id) }}"> 
            @csrf
            <div class="row mt-3">
                <div class="col-lg-3">
                    <label class="container_radio">
                        <input type="radio" onclick="slideOpt('.reqSert', 'tidak', false)" name="req" value="1">Ambil
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="container_radio">
                        <input type="radio" onclick="slideOpt('.reqSert', 'ya', false)" name="req" value="2">Kirim
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="reqSert hid">
                <b>Alamat Pengiriman</b><br>
                <textarea class="form-control inpt alamat" name="" disabled="" placeholder="Alamat Pengiriman">{{ !is_null(\Auth::user()->alamat_perusahaan) ? \Auth::user()->alamat_perusahaan : '' }}</textarea>
                <small class="form-text text-muted">Alamat bisa diubah jika diperlukan</small>
                <br>
            </div>
            <button class="submit_btn mt-3" type="button" onclick="ValidateSize('', '.alamat', '#reqSertJadiForm', '.validMsg')">Kirim</button>
        </form>

        @elseif(!is_null($produk) && !is_null($produk->request_sert) && is_null($produk->tgl_request_sert))
        <center>
            <p class="alert alert-primary">
                Tunggu Jadwal
                @if($produk->request_sert == 'ambil')
                Pengambilan Sertifikat dari Seksi Pemasaran
                @else
                Pengiriman Sertifikat dari Subag Umum
                @endif
            </p>
        </center>

        <div class="sukses_sert">
            <h3><b>Sertifikat Produk</b></h3>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <p class="title">Nama Produk</p>
                    <p class="main">{{ $produk->produk }}</p>  
                </div>
                <div class="col-lg-6">
                    <p class="title">Nama Perusahaan</p>
                    <p class="main">{{ $userAuth->nama_perusahaan }}</p>    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <p class="title">Request</p>
                    <p class="main">{{ $produk->request_sert }}</p>    
                </div>
            </div>
        </div>

        <br>
        @elseif(!is_null($produk) && !is_null($produk->request_sert) && !is_null($produk->tgl_request_sert))
        <center>
            <p class="alert alert-success">Jadwal
                @if($produk->request_sert == 'ambil')
                Pengambilan
                @else
                Pengiriman
                @endif
                Sertifikasi telah ditentukan</p>
        </center>
        <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
          <div class="row no-gutters">
              <div class="col-lg-1">
                  <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
              </div>
              <div class="col-lg-11 pl-2 pr-2">
                <p style="color: #0D47A1;">
                    @if($produk->request_sert == 'kirim')
                        @if(!is_null($produk->kon_resi))
                        Lanjut ke tahap selanjutnya untuk mengkonfirmasi penerimaan sertifikat
                        @else
                        Tunggu konfirmasi resi pengiriman dari seksi pemasaaran, setelah itu lanjut ke tahap selanjutnya untuk konfirmasi apakah sertifikat telah diterima
                        @endif
                    @else
                        Lanjut ke tahap selanjutnya untuk mengkonfirmasi penerimaan sertifikat
                    @endif
                </p>
              </div>
          </div>
        </div>
        <br>

        <div class="sukses_sert">
            <h3><b>Sertifikat Produk</b></h3>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <p class="title">Nama Produk</p>
                    <p class="main">{{ $produk->produk }}</p>  
                </div>
                <div class="col-lg-6">
                    <p class="title">Nama Perusahaan</p>
                    <p class="main">{{ $userAuth->nama_perusahaan }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <p class="title">Request</p>
                    <p class="main">{{ $produk->request_sert }}</p>
                </div>
                <div class="col-lg-6">
                    <p class="title">Waktu</p>
                    <p class="main">{{ $produk->tgl_request_sert }}</p>
                </div>
            </div>  
        </div>

        @else
        <center>
            <p class="alert alert-warning">Draft Sertifikat belum jadi</p>
        </center>
        @endif

        <br>
        @if(!is_null($produk) && !is_null($produk->tgl_request_sert) && $produk->request_sert == 'kirim' && is_null($produk->resi_pengiriman))
        <center><p class="alert alert-primary">Tunggu Subag Umum untuk men-upload resi pengiriman</p></center>
        @elseif(!is_null($produk) && $produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman))
        <center><p class="alert alert-success">Subag Umum telah men-upload resi pengiriman</p></center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/resi/'.$produk->resi_pengiriman) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Resi Pengiriman
                </div>
            </a>
        </div>
        @endif
        <br>
        <div class="row mt-4 mb-4">
            <div class="col-lg-6 text-left">
                <a href="{{ url('/apprv_draftSert/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            @if($kode_tahap >= 23)
            <div class="col-lg-6 text-right">
                <a href="{{ url('/verify_terimaSert/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>
        
    </div>                
</div> 
@endsection
