@extends('home')

@section('card-header', 'Verifikasi Penerimaaan Sertifikat')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') client,8,{{ $idProduk }},{{ $kode_tahap }} @endcomponent
        <hr>

        @if(\Session::has('msg'))
        <center><p class="alert alert-success">{{ \Session::get('msg') }}</p></center>
        @endif

        @if(!is_null($produk) && $kode_tahap == 23)
            @if($produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman))
            <center>
                <p class="alert alert-success">Waktu pengiriman sertifikat: <b>{{ date('d-m-Y', strtotime($produk->tgl_request_sert)) }}</b></p>
            </center>
            @else
            <center>
                <p class="alert alert-success">Request pengambilan/pengiriman sertifikat: <b>{{ ucfirst($produk->request_sert) }}</b></p>
            </center>
            @endif

        <h5>Verifikasi penerimaan sertifikat</h5>
        Apakah sertifikat telah diterima?
        <form id="verTerimaSert" method="POST" action="{{ url('/verify_terimaSert_post/'.$produk->id) }}"> 
            @csrf
            <button class="submit_btn mt-3" type="button" onclick="ValidateSize('', '', '#verTerimaSert', '');">Ya</button>
        </form>

        @elseif(!is_null($produk) && $kode_tahap == 24)
        <center>
            <center><p class="alert alert-success">Sertifikat telah diterima</p></center>
        </center>
        <h5>Verifikasi penerimaan sertifikat</h5>
        <p>Tanggal diterimanya sertifikat: <b>{{ date('d-m-Y', strtotime($produk->tgl_terima_sert)) }}</b></p>
        @else
        <center>
            <center><p class="alert alert-warning">Penjadawalan Ambil/Kirim Sertifikat belum selesai</p></center>
        </center>
        @endif
        <br>
        <div class="row mt-4 mb-4">
            <div class="col-lg">
                <a href="{{ url('/req_sert/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
        </div>
        
    </div>                
</div> 
@endsection
