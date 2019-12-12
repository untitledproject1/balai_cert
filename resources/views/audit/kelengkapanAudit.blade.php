@extends('home')

@section('card-header', 'Form Kelengkapan Laporan Audit Kecukupan sertifikasi Produk')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') client,5,{{ $idProduk }},{{ $kode_tahap }} @endcomponent
        <hr>

        @if((!is_null($dokImportir) && $dokImportir->sni == 2) || (!is_null($tinjauanPP) && $tinjauanPP->sni == 2))
        <center>
            <p class="alert alert-danger">Harap untuk mengupload dokumen - dokumen yang kurang dibawah ini</p>
            {{-- <div class="info_file">
                <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b>
            </div> --}}
        </center>
        @elseif((!is_null($dokImportir) && $dokImportir->sni == 1) && (!is_null($tinjauanPP) && $tinjauanPP->sni == 1))
        <center>
            <p class="alert alert-success">Dokumen sudah lengkap</p>
        </center>
        @elseif((!is_null($dokImportir) && $dokImportir->sni == 3) || (!is_null($tinjauanPP) && $tinjauanPP->sni == 3))
        <center>
            <p class="alert alert-primary">Tunggu verifikasi dokumen</p>
        </center>
        @endif
        @if(!is_null($laporanAudit) && !is_null($laporanAudit->auditor) && !is_null($laporanAudit->jadwal_audit_id) && !is_null($dokImportir) && !is_null($tinjauanPP))
           @if( (!is_null($dokImportir) && $dokImportir->sni == 2) || (!is_null($tinjauanPP) && ($tinjauanPP->sni == 2 || is_null($tinjauanPP->sni))) )
           <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="p-3">
              <div class="row no-gutters">
                  <div class="col-lg-1">
                      <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                  </div>
                  <div class="col-lg-11 pl-2 pr-2">
                      <p style="color: #0D47A1;">Jika data anda belum lengkap, Anda tidak perlu khawatir kehilangan file. <br>File yang telah anda upload otomatis tersimpan meskipun anda belum men-submit form ini.</p>
                  </div>
              </div>
            </div>
            <br>
            @endif
           
            <form id="dokAudit_upload" method="POST" action="{{ url('/dokAudit/'.$idProduk) }}">
                @csrf
                @if(
                    ( !is_null($dokImportir) && ($dokImportir->sni == 3 || is_null($dokImportir->sni)) )  || 
                    ( !is_null($tinjauanPP) && ($tinjauanPP->sni == 3 || is_null($tinjauanPP->sni)) ) || 
                    $kode_tahap >= 18
                )
                {{-- @if($kode_tahap >= 18) --}}
                    {{-- @include('audit.dok_audit.dok_importir')
                    @include('audit.dok_audit.dok_manufaktur')
                    @include('audit.dok_audit.tinjauan_pp') --}}
                    
                    @include('audit.dok_audit.dok_importir_clientSNI')
                    @include('audit.dok_audit.tinjauan_pp_clientSNI')
                @else
                    @include('audit.dok_audit.dok_importir_client')
                    @include('audit.dok_audit.tinjauan_pp_client')
                @endif

                <h5>Ringkasan Audit Kecukupan</h5>
                <textarea class="form-control" name="ringkasan" rows="4" placeholder="Isi Ringkasan Audit Kecukupan" disabled="">{{ !is_null($laporanAudit) && !is_null($laporanAudit->ringkasan) ? $laporanAudit->ringkasan : '' }}</textarea><br><br>

                @if( (!is_null($laporanAudit) && !is_null($laporanAudit->auditor)) &&
                    ((!is_null($dokImportir) && $dokImportir->sni == 2) ||
                    (!is_null($tinjauanPP) && $tinjauanPP->sni == 2))
                )

                <input id="form_action" type="hidden" name="form_action" value="">

                <br>
                <hr>

                <div class="validMsg"></div>
                <br>
                <button class="reset_btn mr-3" type="reset">Reset</button>
                <button class="submit_btn" type="button" onclick="ValidateSize('', '', '#dokAudit_upload', '.validMsg')">Submit</button>
                @endif
            </form>
            <br>
        @else
            <center>
                <p class="alert alert-primary">Auditor belum mengisi Laporan Audit Kecukupan Sertifikasi Produk</p>
            </center>
        @endif
        <br>
        <div class="row mt-4 mb-4">
            <div class="col-lg-6">
                <a href="{{ url('/bukti_bayar/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            @if($kode_tahap >= 20)
            <div class="col-lg-6 text-right">
                <a href="{{ url('/apprv_draftSert/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>


    </div>
</div>
@endsection
