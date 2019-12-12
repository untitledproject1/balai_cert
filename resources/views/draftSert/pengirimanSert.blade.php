@extends('home')

@section('card-header', 'Upload Resi Pengiriman/Berita Acara')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @if(!is_null($produk) && !is_null($produk->request_sert) && is_null($produk->terima_sert) )
            <br>
            <h5>Upload Resi Pengiriman/Berita Acara</h5>
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
        @elseif(!is_null($produk) && !is_null($produk->request_sert) && !is_null($produk->terima_sert))
            <center><p class="alert alert-success">Client sudah menerima sertifikat</p></center>
        @endif

        @if(!is_null($produk) && !is_null($produk->request_sert))
        	@if($produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman))
	        <center><p class="alert alert-success">Resi Pengiriman telah diupload</p></center>
	        <div class="text-center">
	            <a href="{{ url('doc/download/resi/'.$produk->resi_pengiriman) }}" target="_blank">
	                <div class="download_file">
	                    <i class="fas fa-download"></i>&nbsp; Download Resi Pengiriman
	                </div>
	            </a>
	        </div>
	        @elseif($produk->request_sert == 'kirim' && is_null($produk->resi_pengiriman))
	        <center><p class="alert alert-primary">Harap untuk upload Resi Pengiriman/Berita Acara</p></center>
	        @endif
        <div class="sukses_sert">
            <h3><b>Sertifikat Produk</b></h3>
            <br>
            <p class="title">Nama Produk</p>
            <p class="main">{{ $produk->produk }}</p>
            <p class="title">Nama Perusahaan</p>
            <p class="main">{{ $user->nama_perusahaan }}</p>
            <p class="title">Request</p>
            <p class="main">{{ $produk->request_sert }}</p>
            @if(!is_null($produk->tgl_request_sert))
            <p class="title">Waktu</p>
            <p class="main">{{ $produk->tgl_request_sert }}</p>
            @endif
        </div>
        @else
        <center><p class="alert alert-primary">Sertifikat belum dicetak</p></center>
        @endif
        <br>
        @if(!is_null($produk) && $produk->request_sert == 'kirim' && is_null($produk->resi_pengiriman))
        {{-- <h5>Upload Resi Pengiriman/Berita Acara</h5> --}}
        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif
        <form id="uploadResi" method="POST" action="{{ url('/upload_resi/'.$idProduk.'/'.$user->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user" value="{{ $user->nama_perusahaan }}" required="">
            <label><b>Tanggal Pengiriman/Pengambilan Sertifikat</b></label><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="tgl" class="minDate form-control tanggal"  data-language="en" data-date-format="dd/mm/yyyy" onkeydown="return false;" placeholder="dd/mm/yyyy" autocomplete="off" />
            </div><br>
            <label><b>Upload Resi</b></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input fileResi" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="resi" required="">
                <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                <small class="form-text text-muted">Wajib diisi</small>  
            </div><br><br>
            <div class="validMsg"></div><br>
            <button type="reset" class="reset_btn">Reset</button>
            <button type="button" class="submit_btn ml-3" onclick="ValidateSize('.fileResi', '.tanggal', '#uploadResi', '.validMsg')">Submit</button>
        </form>
        {{-- @elseif(!is_null($produk) && $produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman)) --}}
        @endif
        <br>
    </div>
</div>
@endsection