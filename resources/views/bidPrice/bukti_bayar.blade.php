@extends('home')

@section('card-header', 'Form Upload Bukti Pembayaran')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') client,4,{{ $idProduk }},{{ $kode_tahap }} @endcomponent
        <hr>
        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif
        @if(is_null($model) || (!is_null($model) && is_null($model->invoice_id)))
        <center>
            <p class="alert alert-primary">Tunggu pembuatan Invoice dari Seksi Keuangan</p>
        </center>
        @elseif(!is_null($model) && !is_null($model->bukti_bayar))
        <center>
            <p class="alert alert-success">
                @if(!is_null($model) && $model->apprv_bukti_bayar == 1)
                Bukti Pembayaran telah di-approve
                @elseif(!is_null($model) && $model->apprv_bukti_bayar != 1 && is_null($model->bpn))
                Bukti Pembayaran telah diupload. <br>Tunggu Seksi Keuangan untuk mengupload BPN (Bukti Penerimaan Negara).
                @elseif(!is_null($model) && $model->apprv_bukti_bayar != 1 && !is_null($model->bpn))
                Bukti Pembayaran telah diupload. <br>Seksi Keuangan telah mengupload BPN (Bukti Penerimaan Negara).
                @endif
            </p>
        </center>
            @if(!is_null($model) && !is_null($invoice) && !is_null($model->bpn) && $model->apprv_bukti_bayar != 1)
            <div class="text-center">
                <a href="{{ url('/doc/download/BPN/'.$model->bpn) }}" target="_blank">
                    <div class="download_file text-center">
                        <i class="fas fa-download"></i>&nbsp; Download BPN
                    </div>
                </a>
            </div>
            @endif
        @endif
        @if(!is_null($model) && !is_null($model->invoice_id))
        <center>
            <p class="alert alert-success">
                Invoice telah dibuat.<br>
                @if(!is_null($model) && !is_null($invoice) && !is_null($invoice->kode_biling))
                Maksimal waktu pembayaran : <b>{{ date('d-m-Y', strtotime($waktuKodeBiling)) }}</b>
                @endif
            </p>
        </center>
        <div class="row">
            <div class="col-lg align-self-center">
            <div class="text-center">
                <a href="{{ url('/doc/download/invoice/'.$invoice->invoice) }}" target="_blank">
                    <div class="download_file text-center">
                        <i class="fas fa-download"></i>&nbsp; Download Invoice
                    </div>
                </a>
            </div>
            </div>
        @endif
        @if( !is_null($model) && !is_null($invoice) && !is_null($invoice->kode_biling) )
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="{{ url('/doc/download/kodeBiling/'.$invoice->kode_biling) }}" target="_blank">
                        <div class="download_file text-center">
                            <i class="fas fa-download"></i>&nbsp; Download Kode Biling
                        </div>
                    </a>
                </div>
            </div>
        @endif
        </div>
        @if(!is_null($model) && !is_null($model->invoice_id) && is_null($model->bukti_bayar) &&
            strtotime(date('Ymd')) <= strtotime($waktuKodeBiling)
            )
        <br>
        <div class="info_file">
            <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b>
        </div>

        <p class="mt-3"><b>Upload Bukti Pembayaran.</b></p>

        <form id="buktiBayar_upload" method="POST" action="{{ url('/bukti_bayar/'.$model->produk_id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="bbyr" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Wajib diisi</small>
                </div>
            </div>
            <br>
            <div class="validMsg"></div>
            <br>
            <button class="submit_btn mt-3" type="button" onclick="ValidateSize('.file', '', '#buktiBayar_upload', '.validMsg');">Submit</button>
        </form>
        @elseif(!is_null($model) && !is_null($model->bukti_bayar))
        <div class="text-center">
            <a href="{{ url('/doc/download/buktiBayar/'.$model->bukti_bayar) }}" target="_blank">
            <div class="download_file">
                <i class="fas fa-download"></i>&nbsp; Download Bukti Pembayaran
            </div>
        </a>
        </div>
        @elseif( !is_null($model) && !is_null($model->invoice_id) && is_null($model->bukti_bayar) &&
        strtotime(date('Ymd')) > strtotime(date('Ymd', strtotime($waktuKodeBiling))) )
        <div style="background: #eee; padding: 10px;">
            <img style="width: 100px;" src="{{ asset('images/icon/lock.svg') }}" alt="">
            <br>
            <center>
                <p class="alert alert-danger">Tidak ada tindakan lebih dari 7 hari sejak pembuatan invoice, Kode Biling hangus.<br>Harap hubungi Seksi Keuangan</p>
            </center>
        </div>
        @endif
        @if( !is_null($model) && !is_null($model->apprv_bukti_bayar) )
        <br>
        {{-- <b>Kode NTPN: </b> &nbsp; {{ $model->kode_ntpn }}<br>
        <hr>
        <b>Tanggal Bayar: </b> &nbsp; {{ $model->tgl_byr_keuangan }}<br> --}}
        <hr>
        <center><p class="alert alert-success">Pembayaran telah diverifikasi oleh Seksi Keuangan</p></center>
        <div class="text-center">
            <a href="{{ url('/doc/download/BPN/'.$model->bpn) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download BPN
                </div>
            </a>
        </div>
        @endif
        <br>

        <div class="row mt-4 mb-4">
            <div class="col-lg-6">
                <a href="{{ url('/form_bayar/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            @if($kode_tahap >= 17)
            <div class="col-lg-6 text-right">
                <a href="{{ url('/verify_dokSert/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>
</div>
@endsection
