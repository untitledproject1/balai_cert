@extends('home')

@section('card-header', 'Sign MOU')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') client,2,{{ $idProduk }},{{ $kode_tahap }} @endcomponent
        
        <hr>
        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif
        @if(!is_null($mou) && ($mou->status == 1 && strtotime(date('Y-m-d H:i:s')) <= strtotime($mou->tgl_exp)))
            <h4>Download File MOU</h4>
            <center>
                <p class="alert alert-info">MOU telah dibuat oleh Seksi Kerjama<br>
                    Harap untuk upload MOU sebelum tanggal <b>{{ date('d-m-Y', strtotime($mou->tgl_exp)) }}</b>.</p>
            </center>
            <p class="alert alert-info">Download file terlebih dahulu sebelum upload MOU yang sudah ditanda tangan</p>

            <div class="text-center">
                <a href="{{ url('/doc/download/mou/'.$mou->mou) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp;Download MOU
                    </div>
                </a>
            </div>
            
            <hr>
            <br>

            <form id="signMou_upload" method="POST" action="{{ url('/mou_signed/'.$mou->id) }}" enctype="multipart/form-data">
                @csrf
                <h4>Upload File MOU</h4>
                <p><b>Upload MOU yang sudah ditanda tangan</b></p>
                <br>
                <div class="alert alert-info" role="alert">
                    <p>Batas upload file <b>3 hari kerja</b> <br>
                        Format file yang diizinkan <b>.pdf, .doc, .jpg, .png</b></p>
                </div>
                <br>
                <div class="custom-file">
                    <input type="file" class="file custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="mou" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Wajib diisi</small>
                    <br>
                </div>
                <div class="validMsg"></div>
                <br>
                <button class="reset_btn" type="reset">Reset</button>
                <button class="submit_btn ml-3" type="button" onclick="ValidateSize('.file', '', '#signMou_upload', '.validMsg');">Kirim</button>
            </form>
            @elseif(!is_null($mou) && $mou->status == 2 && !is_null($mou->mou))
                @if( (!is_null($bidPrice) && is_null($bidPrice->tanggal_bayar)) || (is_null($bidPrice)) )
                <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="p-3">
                  <div class="row no-gutters">
                      <div class="col-lg-1">
                          <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                      </div>
                      <div class="col-lg-11 pl-2 pr-2">
                        <p style="color: #0D47A1;"> 
                            @if($kode_tahap === 14)
                            Lanjut ketahap selanjutnya untuk mengisi <b>Form Waktu Pembayaran</b>
                            @else
                            Tunggu <b>Pembuatan Penawaran Harga oleh Seksi Pemasaran</b> sebelum lanjut ke tahap selanjutnya untuk mengisi <b>Form Waktu Pembayaran</b>
                            @endif
                        </p>
                      </div>
                  </div>
                </div>
                <br>
                @endif
            <center>
                <p class="alert alert-success">MOU telah diupload</p>
            </center>
            <div class="text-center">
                <a href="{{ url('/doc/download/mou/'.$mou->mou) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download MOU
                    </div>
                </a>
            </div>
            @elseif(!is_null($mou) && strtotime(date('Y-m-d H:i:s')) > strtotime($mou->tgl_exp))
            <div class="text-center">
                <a href="{{ url('/doc/download/mou/'.$mou->mou) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp;Download MOU
                    </div>
                </a>
            </div><br>
            <div class="lock_sign_mou">
                <img draggable=”false” style="width: 100px;" src="{{ asset('images/icon/lock.svg') }}" alt="">
                <br>
                <center>
                    <b>Upload file MOU telah dikunci oleh sistem, harap hubungi seksi kerjasama <br> <span class="tlpn">{{ $seksi_kerjasama->no_telp }}</span></b>
                </center>
            </div>
            @elseif(is_null($mou))
            <center>
                <p class="alert alert-primary">MOU belum dibuat</p>
            </center>
            @endif
            <br>
            <br>

            <div class="row mt-4 mb-4">
                <div class="col-lg-6">
                    <a href="{{ url('/sa/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
                </div>
                @if($kode_tahap >= 14)
                <div class="col-lg-6 text-right">
                    <a href="{{ url('/form_bayar/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
                </div>
                @endif
            </div>

    </div>
    @endsection
