@extends('home')

@section('card-header', 'Pembuatan Dokumen Penawaran Harga')

@section('second-content')

<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') pemasaran,2,{{ $user->id }},{{ $idProduk }},{{ $kode_tahap }} @endcomponent

        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif
        @if((!is_null($mou) && $mou->status == 2) && (!is_null($model) || is_null($model)))
            <center>
                <p class="alert alert-success">Client telah selesai upload MOU yang sudah ditandatangani</p>
            </center>
            <div class="text-center">
                <a href="{{ asset('/doc/download/mou/'.$mou->mou) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Signed MOU
                    </div>
                </a>
            </div>
            <br>
            @if((!is_null($mou) && $mou->status == 2) && is_null($model))
            <h5><b>Form pembuatan dokumen penawaran harga.</b> &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></h5>
            <center><p class="alert alert-primary">Biaya sertifikasi produk yang terdapat pada dokumen MOU akan terupdate otomatis oleh total harga pada rincian biaya yang terdapat pada dokumen penawaran harga</p></center>
            <br>
            <form id="bidPriceSubmit" method="POST" action="{{ url('/bidPrice_create/'.$idProduk.'/'.$user->id) }}">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Nomor Surat</label><br>
                            <input type="text" class="form-control reqText" name="no_bp" required="">
                            <small class="form-text text-muted">Nomor surat wajib diisi</small>  
                            @if(!is_null($no_surat_bp))
                            <b><i>Nomor Surat Terakhir:</i> &nbsp;{{ $no_surat_bp->no }}</b>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Tanggal Pembuatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="tgl_pembuatan" class="minDate form-control reqText" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                            </div>
                            
                            <small class="form-text text-muted">Tanggal pembuatan wajib diisi</small><br>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label>Hal</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="hal" placeholder="Hal"></textarea>
                        </div>
                    </div>
                    <label>Biaya Permohonan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input class="form-control bpText" type="text" name="b_permohonan" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)">
                    </div>
                    <label>Audit Stage-I (Audit Kecukupan)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input class="form-control bpText" type="text" name="b_audit1" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)">
                    </div>
                    
                    <p><b>Audit Kesesuaian</b></p>
                    <div class="row ml-2 mr-2">
                        <div class="col-lg-6">
                            <label>Auditor Kepala dan Auditor</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input class="form-control bpText" type="text" name="b_kepala" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>PPC</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input class="form-control bpText" type="text" name="b_ppc" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)">
                            </div>
                        </div>
                    </div>
                    
                    <p><b>Biaya jasa proses sertifikasi</b></p>
                    <div class="row ml-2 mr-2">
                        <div class="col-lg-6">
                            <label>Panitia Teknis dan Tim Penilai</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input class="form-control bpText" type="text" name="b_pTeknis" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Panitia Proses Sertifikasi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input class="form-control bpText" type="text" name="b_sert" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)">
                            </div>
                        </div>
                    </div>
                    <div id="validMsg"></div>
                    <div class="mt-4">
                        <button class="reset_btn mr-3" type="reset">Reset</button>
                        
                        <button class="submit_btn" type="button" onclick="ValidateSize('null', '.reqText', '#bidPriceSubmit', '#validMsg')">Kirim</button>
                    </div>
                </div>
            </form>
            @elseif(!is_null($model) && !is_null($model->bid_price) && $model->status === 3)
            <center>
                <p class="alert alert-success">Dokumen Penawaran harga telah dibuat.<br>Harap Upload Dokumen Penawaran Harga yang sudah di tandatangani oleh ketua BBK</p>
            </center>
            <div class="text-center">
                <a href="{{ url('/doc/download/bidPrice/'.$model->bid_price) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                    </div>
                </a>
            </div>
            <form id="uploadBP_BBK" method="POST" action="{{ url('/uploadBP_BBK/'.$idProduk) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <label>Upload Penawaran Harga</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input bp" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="bp" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Wajib diisi</small>
                </div><br>
                <div class="validMsg"></div><br>
                <button type="button" class="submit_btn" onclick="ValidateSize('.bp', '', '#uploadBP_BBK', '.validMsg')">Upload</button>
            </form>
            @elseif(!is_null($model) && !is_null($model->bid_price) && $model->status === 2)
            <center>
                <p class="alert alert-success">Dokumen Penawaran harga telah dibuat.<br>Selanjutnya Approval Penawaran Harga oleh Kabid PJT</p>
            </center>
            <div class="text-center">
                <a href="{{ url('/doc/download/bidPrice/'.$model->bid_price) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                </div>
            </a>
            </div>
            @elseif(!is_null($model) && $model->status === 1)
            <center>
                <p class="alert alert-success">Dokumen Penawaran telah di disetujui oleh Kabid PJT</p>
            </center>
            <div class="text-center">
                <a href="{{ url('/doc/download/bidPrice/'.$model->bid_price) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                    </div>
                </a>
            </div>
            @else
            <center>
                <p class="alert alert-warning">Form pembuatan dokumen penawaran harga masih dikunci</p>
            </center>
            @endif

        @else
            <center>
                <p class="alert alert-primary">Client belum men-upload MOU yang sudah ditandatangani</p>
            </center>    
        @endif

        <br>

        <div class="row mt-4 mb-4">
            <div class="col-lg-6">
                <a href="{{ url('/company/'.$user->id.'/sert/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            @if($kode_tahap >= 22)
            <div class="col-lg-6 text-right">
                <a href="{{ url('/jadwalSert/'.$user->id.'/sert/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
