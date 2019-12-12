@extends('home')

@section('card-header', 'Penjadwalan Pengambilan atau Pengiriman Sertifikat')

@section('second-content')

<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') pemasaran,3,{{ $user->id }},{{ $idProduk }},{{ $kode_tahap }} @endcomponent
       
        @if(!is_null($produk) && $produk->status_sert_jadi == 2 && is_null($produk->tgl_request_sert))
        <center>
            <p class="alert alert-success">Sertifikat telah dicetak</p>
        </center>
        @endif

        @if(!is_null($produk) && !is_null($produk->request_sert) && $produk->status_sert_jadi == 2 && is_null($produk->tgl_request_sert))
            @if($produk->request_sert == 'kirim')
            <center>
                <p class="alert alert-primary">Tunggu Jadwal Pengiriman Sertifikat dari Subag Umum</p>
            </center>
            @endif
        <div class="sukses_sert">
            <h3><b>Sertifikat Produk</b></h3>
            <div class="row mb-2">
                <div class="col-lg-6">
                    <p class="title">Nama Produk</p>
                    <p class="main">{{ $produk->produk }}</p>
                </div>
                <div class="col-lg-6">
                    <p class="title">Nama Perusahaan</p>
                    <p class="main">{{ $user->nama_perusahaan }}</p>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <p class="titiel">Request</p>
                    <p class="main">{{ $produk->request_sert }}</p>  
                </div>
            </div>
        </div>

        <br>
            @if(!is_null($produk) && $produk->request_sert == 'ambil' && is_null($produk->tgl_request_sert))
            <form id="jadwalSert_upload" method="POST" action="{{ url('/jadwalSert_action/'.$idProduk) }}" enctype="multipart/form-data">
                @csrf
                <label><b>Tanggal Pengiriman/Pengambilan Sertifikat</b></label><br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="tgl" class="datepicker-here minDate form-control tanggal"  data-language="en" data-date-format="dd/mm/yyyy" onkeydown="return false;" placeholder="dd/mm/yyyy"/>
                </div>
                <small class="form-text text-muted">Wajib diisi</small><br>
                <div class="validMsg"></div><br>
                <button class="submit_btn" type="button" onclick="ValidateSize('', '.tanggal', '#jadwalSert_upload', '.validMsg');">Submit</button>
            </form>
            @endif
        @elseif(!is_null($produk) && !is_null($produk->tgl_request_sert))
            <center>
                <p class="alert alert-success">Jadwal
                    @if($produk->request_sert == 'ambil')
                    Pengambilan
                    @else
                    Pengiriman
                    @endif
                    Sertifikat telah ditentukan
                </p>
            </center>
            @if ($produk->request_sert == 'kirim' && is_null($produk->resi_pengiriman))
            <center><p class="alert alert-primary">Resi Pengiriman akan diupload oleh <b>Subag Umum</b></p></center>
            @elseif($produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman) && is_null($produk->kon_resi))
            <center><p class="alert alert-success">Resi Pengiriman telah diupload oleh Subag Umum.</p></center>
            <div class="text-center">
                <a href="{{ asset('storage/dok/resi/'.$produk->resi_pengiriman) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Resi Pengiriman
                    </div>
                </a>
            </div>
            <form id="apprvResi" method="POST" action="{{ url('/konfirmasi_resi/'.$idProduk) }}">
                @csrf
                <button type="button" class="submit_btn" onclick="ValidateSize('', '', '#apprvResi', '')">Konfirmasi Resi Pengiriman</button>
            </form>
            @elseif($produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman) && $produk->kon_resi === 1)
            <center><p class="alert alert-primary">Resi Pengiriman telah dikonfirmasi</b></p></center>
            @endif

            @if(is_null($produk->terima_sert))
                <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
                  <div class="row no-gutters">
                      <div class="col-lg-1">
                          <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                      </div>
                      <div class="col-lg-11 pl-2 pr-2">
                          <p style="color: #0D47A1;">Informasi penerimaan sertifikat produk akan dikonfirmasi oleh client</p>
                      </div>
                  </div>
                </div>
                <br>

                @if( ($produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman)) || $produk->request_sert == 'ambil' )
                <center><p class="alert alert-primary">Client belum menerima sertifikat</p></center>
                @endif
            @elseif(!is_null($produk->terima_sert))
                <center><p class="alert alert-success">Client sudah menerima sertifikat.<br>Tanggal penerimaan sertifikat: <b>{{ date('d-m-Y', strtotime($produk->tgl_terima_sert)) }}</b></p></center>
            @endif

        <div class="text-center">
            <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat
                </div>
            </a>
        </div>
        
        <div class="sukses_sert">
            <h3><b>Sertifikat Produk</b></h3>
            <div class="row mb-2">
                <div class="col-lg-6">
                    <p class="title">Nama Produk</p>
                    <p class="main">{{ $produk->produk }}</p>                    
                </div>
                <div class="col-lg-6">
                    <p class="title">Nama Perusahaan</p>
                    <p class="main">{{ $user->nama_perusahaan }}</p>  
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
        <br>

        @elseif( (!is_null($produk) && !is_null($produk->status_sert_jadi) && is_null($produk->request_sert)) )
        <center>
            <p class="alert alert-primary">Tunggu Request Ambil/Kirim Sertifikat dari Client</p>
        </center>
        @else
        <center>
            <p class="alert alert-primary">Draft Sertifikat belum jadi</p>
        </center>
        @endif
        <br>
        
        <div class="row mt-4 mb-4">
            <div class="col-lg">
                <a href="{{ url('/bidPrice/'.$user_id.'/sert/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
        </div>
        
    </div>
</div>


@endsection
