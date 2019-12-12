@extends('home')

@section('card-header', 'Input Keputusan Komite Evaluasi Rapat Teknis')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        {{-- <div class="mb-3"><b>List Pengisian Rekomendasi Evaluasi Rapat Teknis</b></div>
        @if($jumlahIsi == count($tim_teknis))
            <ul class="list-group list-group-horizontal">
                @foreach($komite_timTeknis as $komite)
                <li class="list-group-item" style="cursor: default;">
                    @if($cek($komite->id, $dok, true))
                    <span class="badge badge-primary badge-pill">&check;</span> 
                    @endif 
                &nbsp; {{ $komite->name }}</li>
                @endforeach
            </ul>
        @else
            <ul class="list-group list-group-horizontal">
                @foreach($tim_teknis as $teknis)
                <li class="list-group-item">
                    @if($cek($teknis->id, $dok, false))
                    <span class="badge badge-primary badge-pill">&check;</span> 
                    @endif 
                &nbsp; {{ $teknis->name }}</li>
                @endforeach
            </ul>
        @endif
        <br> --}}
        @if(!is_null($dok) && !is_null($dok->laporan_hasil_sert))
        <center><p class="alert alert-success">Dokumen Laporan Hasil Sertifikasi berhasi dibuat</p></center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/lapSert/'.$dok->laporan_hasil_sert) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Laporan Hasil Sertifikasi
                </div>
            </a>
        </div>
        <br>
        @endif
        @if(!is_null($dok) && !is_null($dok->laporan_hasil_sert) && $dok->status_timTeknis === 1 && is_null($dok->signed_lapSert))
        <p><b>Input Keputusan Komite Evaluasi Rapat Teknis</b> &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></p>

        <form id="komiteForm" method="POST" action="{{ url('/keputusanTeknis/'.$idProduk.'/'.$user->id) }}">
            @csrf
            <p>Sebagai : {{ $userAuth->name }}</p>

            <label>Keputusan</label><br>
            <textarea class="form-control" name="kep" required="" placeholder="Isi Keputusan di sini.." rows="3"></textarea><br>
            <button class="reset_btn mr-3" type="reset">Reset</button>
            <button class="submit_btn" type="button" onclick="ValidateSize('', '', '#komiteForm', '');">Submit</button>
        </form>
        @elseif(is_null($dok) || (!is_null($dok) && is_null($dok->laporan_hasil_sert)))
        <center>
            <p class="alert alert-primary">Dokumen Laporan Hasil Setifikasi belum dibuat</p>
        </center>
        @elseif(!is_null($dok) && !is_null($dok->laporan_hasil_sert) && $dok->status_timTeknis !== 1 && is_null($dok->signed_lapSert) )
        <center>
            <p class="alert alert-primary">Tunggu Rekomendasi Evaluasi Rapat Teknis</p>
        </center>
        @elseif(!is_null($dok) && !is_null($dok->laporan_hasil_sert) && $dok->status_timTeknis === 1 && $dok->signed_lapSert === 2)
        <center>
            <p class="alert alert-success">Keputusan Komite Evaluasi Rapat Teknis telah diisi</p>
        </center>
        <h5>Upload Laporan Hasil Sertifikasi yang sudah ditandatangani</h5>
        <form id="signedLapSert" method="POST" action="{{ url('/signedLapSert/'.$idProduk.'/'.$user_id) }}" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                <input type="file" class="file custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="signed_dok" required="">
                <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                <small class="form-text text-muted">Wajib diisi</small>
                <br>
            </div>
            <div class="validMsg"></div><br>
            <button class="reset_btn mr-2" type="reset">Reset</button>
            <button class="submit_btn ml-3" type="button" onclick="ValidateSize('.file', '', '#signedLapSert', '.validMsg');">Submit</button>
        </form>
        @elseif(!is_null($dok) && !is_null($dok->laporan_hasil_sert) && $dok->signed_lapSert === 1 )
        <center>
            <p class="alert alert-success">Dokumen Laporan Hasil Sertifikasi yang sudah ditandatangani telah diupload</p>
        </center>
        @endif
    </div>
</div>
@endsection
