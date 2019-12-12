@extends('home')

@section('card-header', 'Pembuatan Invoice dan Upload Kode Biling')

@section('perusahaan')

<div class="row justify-content-center mb-3">
    <div class="col-md-12">
        <div class="col-lg-12">
            <div class="wrap_content">
                <h4>Perusahaan</h4>
                <h6>
                    {{ $user->nama_perusahaan }} <span class="{{ $userAuth -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $userAuth -> negeri == 1 ? 'produsen' : 'importir' }}</span>
                    @if(isset($produk))
                    - {{ $produk->produk }}
                    @endif
                </h6>
            </div>
        </div>
    </div>
</div>

@endsection

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif
        @if(!is_null($model) && $model->status == 1 && is_null($model->invoice_id))
        <center>
            <p class="alert alert-success">Penawaran Harga telah disetujui oleh Kabid PJT</p>
        </center>
        <div class="text-center">
            <a href="{{ url('/doc/download/bidPrice/'.$model->bid_price) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                </div>
            </a>
        </div>
            @if(!is_null($model->tanggal_bayar))
            <center>
                <p class="alert alert-success">Client sudah mengisi form kapan bayar.<br>
                    Tanggal Bayar: <b>{{ date('d-m-Y', strtotime($model->tanggal_bayar)) }}</b>
                </p>
            </center>
            @else
            <center>
                <p class="alert alert-primary">Client belum mengisi form kapan bayar.</p>
            </center>
            @endif
        <br>
        <form id="invoice_create" method="POST" action="{{ url('/invoice_create/'.$idProduk.'/'.$user->id) }}" enctype="multipart/form-data">
            @csrf
            <h5>Form Pembuatan Invoice. &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></h5><br>
            <div class="row">
                <div class="col-lg-6">
                    <label>Nomor Surat</label><br>
                    <input type="text" class="form-control reqText" name="no_invoice" required="">
                    <small class="form-text text-muted">Nomor surat wajib diisi</small>  
                    @if(!is_null($no_surat_invoice))
                    <b><i>Nomor Surat Terakhir:</i> &nbsp;{{ $no_surat_invoice->no }}</b>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label>Tanggal Pembuatan</label>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="tgl_pembuatan" class="datepicker-here form-control reqText" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                        </div>
                        
                    </div>
                    <small class="form-text text-muted">Tanggal pembuatan wajib diisi</small><br>
                </div>
            </div>
            <div class="validMsg"></div>
            <div class="mt-3">
                <button class="reset_btn mr-3" type="reset">Reset</button>
                <button class="submit_btn" type="button" onclick="ValidateSize('', '.reqText', '#invoice_create', '.validMsg');">Submit</button>
            </div>
        </form>
        @elseif(!is_null($model) && is_null($model->status) && is_null($model->invoice_id))
        <center><p class="alert alert-primary">Dokumen Penawaran Harga belum disetujui</p></center>
        @elseif(is_null($model))
        <center><p class="alert alert-primary">Dokumen Penawaran Harga belum dibuat</p></center>
        @endif
        @if(!is_null($model) && !is_null($model->invoice_id) && !is_null($invoice) && $invoice->status === 1 && is_null($invoice->kode_biling))
            <center>
                <p class="alert alert-success">Invoice telah dibuat.</p>
            </center>
            <div class="row">
                <div class="col-lg">
                    <div class="text-center">
                        <a href="{{ url('/doc/download/invoice/'.$invoice->invoice) }}" target="_blank">
                            <div class="download_file">
                                <i class="fas fa-download"></i>&nbsp; Download Invoice
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg align-self-center">
                    <div class="text-center">
                        <a href="{{ url('/doc/download/bidPrice/'.$model->bid_price) }}" target="_blank">
                            <div class="download_file">
                                <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                            </div>
                        </a>
                    </div>    
                </div>
            </div>
            <h5>Form Upload Kode Biling</h5>
            <form id="kode_biling_upload" method="POST" action="{{ url('/kode_biling_upload/'.$idProduk.'/'.$user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Waktu Pembuatan Kode Biling</label><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="waktuKb" class="datepicker-here form-control teks" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                    </div>
                    
                    <small class="form-text text-muted">Wajib diisi</small>
                </div>

                <div class="info_file">
                    <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.pdf</b>
                </div>
                <br>

                <div class="form-group">
                    <label>Upload Kode Biling</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="kb" required="">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                        <small class="form-text text-muted">Wajib diisi</small>  
                    </div>
                </div>
                <div class="validMsg"></div>
                <button class="reset_btn mr-3" type="reset">Reset</button>
                <button class="submit_btn" type="button" onclick="ValidateSize('.file', '.teks', '#kode_biling_upload', '.validMsg');">Submit</button>
            </form>
            <br><br>
        @elseif(!is_null($model) && !is_null($model->invoice_id) && !is_null($invoice) && is_null($invoice->status) )
            <center>
                <p class="alert alert-success">Invoice telah dibuat.<br>Harap upload Invoice yang sudah ditandatangani oleh Ketua BBK</p>
            </center>
            <div class="text-center">
                <a href="{{ url('/doc/download/invoice/'.$invoice->invoice) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Invoice
                    </div>
                </a>
            </div>
            <form id="uploadInvoiceBBK" method="POST" action="{{ url('/upload_invoiceBBK/'.$idProduk) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <label>Upload Invoice</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input invoice" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="invoice" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Wajib diisi</small>  
                </div><br>
                <div class="validMsg"></div><br>
                <button type="button" class="submit_btn" onclick="ValidateSize('.invoice', '', '#uploadInvoiceBBK', '.validMsg')">Upload</button>
            </form>
        @elseif(!is_null($model) && !is_null($model->invoice_id) && !is_null($invoice) && !is_null($invoice->kode_biling) && strtotime($waktuKodeBiling) > strtotime(date('YmdHis')))
            <center>
                <p class="alert alert-success">Invoice telah dibuat. Masa berlaku Kode Biling sampai : <b>{{ date('d-m-Y', strtotime($waktuKodeBiling)) }}</b>.<br>
                    @if(is_null($model->bukti_bayar))
                    Tunggu Client mengupload bukti pembayaran
                    @else
                    Bukti Pembayaran telah diupload
                    @endif
                </p>
            </center>
            <div class="row">
                <div class="col-lg align-self-center">
                    <div class="text-center">
                        <a href="{{ url('/doc/download/invoice/'.$invoice->invoice) }}" target="_blank">
                            <div class="download_file">
                                <i class="fas fa-download"></i>&nbsp; Download Invoice
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg align-self-center">
                    <div class="text-center">
                        <a href="{{ url('/doc/download/buktiBayar/'.$model->bukti_bayar) }}" target="_blank">
                            <div class="download_file">
                                <i class="fas fa-download"></i>&nbsp; Download Bukti Pembayaran
                            </div>
                        </a>
            </div>   
                </div>
                <div class="col-lg align-self-center">
                    <div class="text-center">
                        <a href="{{ url('/doc/download/kodeBiling/'.$invoice->kode_biling) }}" target="_blank">
                            <div class="download_file">
                                <i class="fas fa-download"></i>&nbsp; Download Kode Biling
                            </div>
                        </a>
                    </div>     
                </div>
            </div>
            <br>
        @elseif(!is_null($model) && !is_null($model->invoice_id) && !is_null($waktuKodeBiling) && strtotime($waktuKodeBiling) <= strtotime(date('YmdHis'))) <center>
            <p class="alert alert-warning">Tidak ada tindakan lebih dari 7 hari sejak pembuatan invoice, Kode Biling hangus.<br>Harap Upload Kode Biling yang baru</center>
            <div class="validMsg"></div>
            <form id="kodeBiling_upload" method="POST" action="{{ url('/uploadKB/'.$invoice->id) }}" enctype="multipart/form-data">
                @csrf
                <label>Waktu Pembuatan Kode Biling</label><br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="waktu" class="datepicker-here form-control waktu" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                </div>
                <small class="form-text text-muted">Wajib diisi</small>  
                <label>Upload Kode Biling</label><br>
                <div class="custom-file">
                    <input type="file" class="custom-file-input file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="kb" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Wajib diisi</small>  
                </div>
                <br>
                <div id="validMsg"></div><br>
                <button class="reset_btn" type="reset">Reset</button>
                <button class="submit_btn" type="button" onclick="ValidateSize('.file', '.waktu', '#kodeBiling_upload', '#validMsg');">Submit</button>
            </form>
        @endif
        @if(!is_null($model) && !is_null($model->bukti_bayar) && is_null($model->bpn) && is_null($model->apprv_bukti_bayar))
        <h5>Form Upload BPN (Bukti Pembayaran Negara)</h5>
        
        <div class="info_file mt-3 mb-3">
            <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.pdf</b>
        </div>
        <form id="upload_bpn" method="POST" action="{{ url('/upload_bpn/'.$idProduk) }}" enctype="multipart/form-data">
            @csrf
            <label>BPN</label><br>
            <div class="custom-file">
                <input type="file" class="custom-file-input file2" id="inputGroupFile012" aria-describedby="inputGroupFileAddon01" name="bpn" required="">
                <label class="custom-file-label" for="inputGroupFile012">Pilih File..</label>
                <small class="form-text text-muted">Wajib diisi</small>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-6">
                    <label>Kode NTPN</label><br>
                    <input type="text" name="kode_ntpn" class="form-control textI2" required="" placeholder="Isi Kode NTPN">
                    <small class="form-text text-muted">Wajib diisi</small>
                </div>
                <div class="col-lg-6">
                    <label>Tanggal Bayar</label><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="tgl_byr" class="datepicker-here form-control textI2" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                    </div>
                    <small class="form-text text-muted">Wajib diisi</small><br>
                </div>
            </div>
            <br>
            <div id="validMsg"></div><br>
            <button class="reset_btn mr-2" type="reset">Reset</button>
            <button class="submit_btn" type="button" onclick="ValidateSize('.file2', '.textI2', '#upload_bpn', '#validMsg');">Submit</button>
        </form>
        {{-- @elseif(!is_null($model) && !is_null($model->bukti_bayar) && !is_null($model->bpn) && is_null($model->apprv_bukti_bayar))
        <h5>Approve Bukti Bayar</h5>
        <center>
            <p class="alert alert-success">BPN telah diupload!</p>
        </center>
        <br>
        <b>Kode NTPN: </b> &nbsp; {{ $model->kode_ntpn }}<br>
        <hr>
        <b>Tanggal Bayar: </b> &nbsp; {{ $model->tgl_byr_keuangan }}<br>
        <hr>
        <div class="text-center">
            <a href="{{ url('/doc/download/BPN/'.$model->bpn) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download BPN
                </div>
            </a>
        </div>
        <br> --}}
        {{-- <hr>
        <form id="apprvBuktiBayarForm" method="POST" action="{{ url('/apprv_buktiB/'.$idProduk) }}">
            @csrf
            <button class="submit_btn" type="button" onclick="ValidateSize('', '', '#apprvBuktiBayarForm', '')">Approve</button>
        </form> --}}
        @elseif(!is_null($model) && !is_null($model->bukti_bayar) && !is_null($model->apprv_bukti_bayar))
        <center>
            <p class="alert alert-success"><b>Approval Bukti Pembayaran berhasil</b></p>
        </center>
        <br>
        <b>Kode NTPN: </b> &nbsp; {{ $model->kode_ntpn }}<br>
        <hr>
        <b>Tanggal Bayar: </b> &nbsp; {{ $model->tgl_byr_keuangan }}<br>
        <hr>
        <div class="text-center">
            <a href="{{ url('/doc/download/BPN/'.$model->bpn) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download BPN
                </div>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
