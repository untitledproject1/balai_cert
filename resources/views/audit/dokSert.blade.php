@extends('home')

@section('card-header', 'Laporan Audit Kecukupan sertifikasi Produk')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @if((!is_null($dokImportir) && $dokImportir->sni == 2) || (!is_null($tinjauanPP) && $tinjauanPP->sni == 2))
        <center>
            <p class="alert alert-primary">Permintaan upload dokumen yang kurang telah dikirm</p>
        </center>
        @elseif((!is_null($dokImportir) && $dokImportir->sni == 1) && (!is_null($tinjauanPP) && $tinjauanPP->sni == 1))
        <center>
            <p class="alert alert-success">Dokumen sudah lengkap</p>
        </center>
        @elseif((!is_null($dokImportir) && $dokImportir->sni == 3) || (!is_null($tinjauanPP) && $tinjauanPP->sni == 3))
        <center>
            <p class="alert alert-primary">Client telah men-upload dokumen.<br>Harap verifikasi dokumen terlebih dahulu</p>
        </center>
        @elseif( !is_null($laporanAudit) && is_null($laporanAudit->dok_importir_id) && is_null($laporanAudit->tinjauan_id) )
        <center>
            <p class="alert alert-warning">Harap submit form terlebih dahulu untuk mengirim permintaan upload dokumen yang kurang ke client</p>
        </center>
        @endif
        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif
        @if(!is_null($laporanAudit) && !is_null($laporanAudit->jadwal_audit_id))
            @if(\Session::has('successMsg') && (!is_null($dokImportir) && $dokImportir->sni != 1) && (!is_null($tinjauanPP) && $tinjauanPP->sni != 1))
            <center>
                <p class="alert alert-success">{{ \Session::get('successMsg') }}</p>
            </center>
            @endif
            <div class="validMsg"></div>
            <form id="dokSertForm" method="POST" action="{{ url('/dok_sert_produk') }}">
                @csrf
                <input type="hidden" name="idProduk" value="{{ $idProduk }}">
                @include('audit.dok_audit.dok_importir')
                {{-- @include('audit.dok_audit.dok_manufaktur') --}}
                @include('audit.dok_audit.tinjauan_pp')
                <br>
                <b>Nama Auditor:</b><br>
                <input type="text" class="form-control ringkasan" name="auditor" placeholder="Nama Auditor" required="" {{ 
                        ((!is_null($tinjauanPP) && $tinjauanPP->sni == 3) || 
                        (!is_null($dokImportir) && $dokImportir->sni == 3)) ||
                        (is_null($dokImportir) || is_null($tinjauanPP)) ? '' : 'disabled' }} value="{{ !is_null($laporanAudit) && !is_null($laporanAudit->auditor) ? $laporanAudit->auditor : '' }}">
				<small class="form-text text-muted">Wajib Diisi</small><br>
                <h5>Ringkasan Audit Kecukupan</h5>
                <textarea class="form-control ringkasan" name="ringkasan" rows="4" placeholder="Isi Ringkasan Audit Kecukupan" {{ 
                        ((!is_null($tinjauanPP) && $tinjauanPP->sni == 3) || 
                        (!is_null($dokImportir) && $dokImportir->sni == 3)) ||
                        (is_null($dokImportir) || is_null($tinjauanPP)) ? '' : 'disabled' }}
                >{{ !is_null($laporanAudit) && !is_null($laporanAudit->ringkasan) ? $laporanAudit->ringkasan : '' }}</textarea>
                <small class="form-text text-muted">Wajib Diisi</small>
                <br><br>

                @if( !is_null($laporanAudit ) && 
                    (
                        ((!is_null($dokImportir) && ($dokImportir->sni != 2 && $dokImportir->sni != 1)) ||
                        (!is_null($tinjauanPP) && ($tinjauanPP->sni != 2 && $tinjauanPP->sni != 1)))
                        
                        ||
                        
                        (is_null($dokImportir) || is_null($tinjauanPP) )
                    )
                )
                <div class="validMsg"></div><br>
                <button class="reset_btn mr-3" type="reset">Reset</button>
                <button class="submit_btn" type="button" onclick="ValidateSize('', '.ringkasan', '#dokSertForm', '.validMsg')">Submit</button>
                @endif
            </form>
        @else
            <center>
                <p class="alert alert-primary">Surat Pemberitahuan Jadwal dan Tim Audit belum dibuat</p>
            </center>
        @endif
    </div>
</div>
@endsection
