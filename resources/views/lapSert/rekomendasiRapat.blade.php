@extends('home')

@section('card-header', 'Input Rekomendasi Evaluasi Rapat Teknis')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        <div class="mb-3"><b>List Pengisian Rekomendasi Evaluasi Rapat Teknis</b></div>
        <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
          <div class="row no-gutters">
              <div class="col-lg-1">
                  <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
              </div>
              <div class="col-lg-11 pl-2 pr-2">
                  <p style="color: #0D47A1;">Tim Teknis yang sudah mengisi <b>Rekomendasi Evaluasi Rapat Teknis</b> pada list ini ditandai dengan icon <span class="badge badge-primary badge-pill">&check;</span></p>
              </div>
          </div>
        </div>
        <br>
            
            <ul class="list-group list-group-horizontal">
            @foreach($tim_teknis as $teknis)
            <li class="list-group-item default">
                @if($cek($teknis->id, $dok))
                <span class="badge badge-primary badge-pill">&check;</span> 
                @endif 
            &nbsp; {{ $teknis->name }}</li>
            @endforeach
        </ul>
            
        <br>
        @if(!is_null($dok) && !is_null($dok->laporan_hasil_sert) && !$cek($cr_user->id, $dok))
        <div class="text-center">
            <a href="{{ asset('storage/dok/lapSert/'.$dok->laporan_hasil_sert) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Laporan Hasil Sertifikasi
                </div>
            </a>
        </div>
        <br>
        <p><b>Input Rekomendasi Evaluasi Rapat Teknis</b> &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></p>

        <form id="rekTimTeknis" method="POST" action="{{ url('/rekomendasiRapatTeknis/'.$idProduk.'/'.$user->id) }}">
            @csrf
            <p>Sebagai : {{ \Auth::user()->name }}</p>

            <label>Rekomendasi</label><br>
            <textarea class="form-control" name="rek" placeholder="Isi Rekomendasi di sini.." rows="3"></textarea><br>
            <button class="reset_btn mr-3" type="reset">Reset</button>
            <button class="submit_btn" type="button" onclick="ValidateSize('', '', '#rekTimTeknis', '');">Kirim</button>
        </form>
        @elseif(is_null($dok) || (!is_null($dok) && is_null($dok->laporan_hasil_sert)))
        <center>
            <p class="alert alert-primary">Dokumen Laporan Hasil Setifikasi belum dibuat</p>
        </center>
        @else
        <center>
            <p class="alert alert-success">Rekomendasi Evaluasi Rapat Teknis telah diisi</p>
        </center>
        <div class="text-center">
            <a href="{{ asset('storage/dok/lapSert/'.$dok->laporan_hasil_sert) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-download"></i>&nbsp; Download File Laporan Hasil Sertifikasi
                </div>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
