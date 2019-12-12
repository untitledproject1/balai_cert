@extends('home')

@section('card-header', 'Pembuatan Surat Pemberitahuan Jadwal dan Tim Audit')

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
        @component('stepper') sertifikasi,1,{{ $user->id }},{{ $idProduk }},{{ $kode_tahap }} @endcomponent

        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif
        @if(!is_null($dok) && !is_null($dok->apprv_bukti_bayar) && is_null($jadwalAudit))

        <div class="info_file">
            <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.pdf</b>
        </div>
        <br>

        <p><b>Upload Surat Pemberitahuan Jadwal Audit</b></p>
            <form id="suratJA_upload" method="POST" action="{{ url('/suratJA_upload/'.$idProduk) }}" enctype="multipart/form-data">
                @csrf
                @if(!is_null($formatFile))
                <div class="text-center">
                    <a href="{{ url('/doc/download/format_dok/'.$formatFile->file) }}" >
                        <div class="download_file">
                            <i class="fas fa-download"></i>&nbsp; Download Format File
                        </div>
                    </a>
                </div>
                @else
                <center>
                    <p class="alert alert-primary">Format File <b>Surat Pemberitahuan Jadwal Audit</b> belum ada.<br>Harap hubungi bagian administrator (Super Admin)</p>
                </center>
                @endif
                <br>
                <div class="custom-file">
                    <input type="file" class="custom-file-input fileUpload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="dok" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Upload Surat Pemberihauan Jadwal Audit yang sudah diisi</small>
                </div>
                <br><br>
                <div class="validMsg"></div>
                <button class="reset_btn mr-2" type="reset">Reset</button>
                <button class="submit_btn mt-3" type="button" onclick="ValidateSize('.fileUpload', '', '#suratJA_upload', '.validMsg');">Submit</button>
            </form>
        @elseif(!is_null($dok) && !is_null($dok->apprv_bukti_bayar) && !is_null($jadwalAudit) && is_null($jadwalAudit->apprv) )
        <center>
            <p class="alert alert-success">Surat Pemberitahuan Jadwal Audit telah diupload.<br>Tunggu approval dokumen dari Kabid Paskal</p>
        </center>
        <div class="text-center">
            <a href="{{ url('/doc/download/jadwalAudit/'.$jadwalAudit->jadwal_audit) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Surat Pemberitahuan Jadwal Audit
                </div>
            </a>
        </div>
        @elseif(!is_null($dok) && !is_null($dok->apprv_bukti_bayar) && !is_null($jadwalAudit) && $jadwalAudit->apprv == 1)
        <center>
            <p class="alert alert-success">Surat Pemberitahuan Jadwal Audit telah disetujui</p>
        </center>
        <div class="text-center">
            <a href="{{ url('/doc/download/jadwalAudit/'.$jadwalAudit->jadwal_audit) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Surat Pemberitahuan Jadwal Audit
                </div>
            </a>
        </div>
        @else
        <center>
            <p class="alert alert-warning">Upload Surat Pemberitahuan Jadwal Audit masih dikunci</p>
        </center>
        @endif
        <br>

        <div class="row mt-4 mb-4">
            @if($kode_tahap >= 18)
            <div class="col-lg text-right">
                <a href="{{ url('/auditPlan/'.$user_id.'/audit/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
