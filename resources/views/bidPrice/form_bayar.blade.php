@extends('home')

@section('card-header', 'Form Waktu Pembayaran')


@section('second-content')

<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') client,3,{{ $idProduk }},{{ $kode_tahap }} @endcomponent
        
        <hr>
        @if(\Session::has('errMsg'))
        <p class="pl-3 alert alert-danger">{{ \Session::get('errMsg') }}</p>
        @endif
        @if(is_null($bidPrice))
        <center>
            <p class="alert alert-primary">Penawaran Harga belum dibuat</p>
        </center>
        @elseif(!is_null($bidPrice) && $bidPrice->status == 1 && is_null($bidPrice->bukti_bayar))
            @if(is_null($bidPrice->invoice_id) && $bidPrice->status == 1)
            <div class="text-center">
                <a href="{{ url('/doc/download/bidPrice/'.$bidPrice->bid_price) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                    </div>
                </a>
            </div>
            
                @if(is_null($bidPrice->tanggal_bayar))
                <p>Masukan tanggal pembayaran</p>
                <form id="tglBayarForm" method="POST" action="{{ url('/form_bayar/'.$idProduk) }}">
                    @csrf
                    <label>Tanggal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="tgl" class="minDate form-control tglBayar" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                    </div>
                    <br>                
                    <div class="validMsg"></div>
                    <button type="button" class="submit_btn mt-3" onclick="ValidateSize('', '.tglBayar', '#tglBayarForm', '.validMsg')">Submit</button>
                </form>
                @else
                <b><i>Form Waktu Pembayaran telah diisi.</i></b><br>
                Tanggal pembayaran: &nbsp; <b>{{ date('d-m-Y', strtotime($bidPrice->tanggal_bayar)) }}</b><br>
                @endif
                <br>
            <center>
                <p class="alert alert-success">Penawaran Harga telah disetujui oleh Kabid PJT. Tunggu Pembuatan Invoice dan Kode Biling dari Seksi Keuangan</p>
            </center>
            @elseif(!is_null($bidPrice->invoice_id) && !is_null($invoice->status))
            <center>
                <p class="alert alert-success">Invoice telah dibuat. 
                    @if(!is_null($invoice->kode_biling))
                    Maksimal Waktu Pembayaran : <b>{{ date('d-m-Y', strtotime($waktuKodeBiling)) }}</b>.<br>Upload Bukti Pembayaran di tahap selanjutnya
                    @else
                    <br>
                    Kode Biling belum diupload oleh Seksi Keuangan
                    @endif
                </p>
            </center>
            @endif
        @elseif( !is_null($bidPrice) && (!is_null($bidPrice->bukti_bayar) || !is_null($bidPrice->invoice_id)))
            <center>
                <p class="alert alert-success">
                    @if(!is_null($invoice->kode_biling))
                    Maksimal Waktu Pembayaran : <b>{{ date('d-m-Y', strtotime($waktuKodeBiling)) }}</b>.
                        @if(!is_null($bidPrice->bukti_bayar))
                        <br>Bukti Pembayaran telah diupload
                        @else
                        <br>Upload Bukti Pembayaran di tahap selanjutnya
                        @endif
                        <br>
                    @else
                    Kode Biling belum diupload oleh Seksi Keuangan
                    @endif
                </p>
            </center>
        @else
            <center>
                <p class="alert alert-primary">Tunggu Apporval Penawaran harga dari Kabid PJT</p>
            </center>
        @endif
        @if(!is_null($bidPrice) && !is_null($bidPrice->invoice_id) && $bidPrice->status == 1 && !is_null($invoice->status))
        <div class="row">
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="{{ url('/doc/download/bidPrice/'.$bidPrice->bid_price) }}" target="_blank">
                        <div class="download_file">
                            <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="{{ url('/doc/download/invoice/'.$invoice->invoice) }}" target="_blank">
                        <div class="download_file text-center">
                            <i class="fas fa-download"></i>&nbsp; Download Invoice
                        </div>
                    </a>
                </div>
            </div>
            @if(!is_null($invoice->kode_biling))
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
        @endif
        <br>
        <div class="row mt-4 mb-4">
            <div class="col-lg-6 text-left">
                <a href="{{ url('/mou/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            @if($kode_tahap >= 15)
            <div class="col-lg-6 text-right">
                <a href="{{ url('/bukti_bayar/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

