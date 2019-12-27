@extends('home')

@section('card-header', 'Verifikasi Dokumen Sertifikasi Awal')

@section('second-content')

<div class="col">
    <div class="wrap_content">
        {{-- {{{dd($dok)}}} --}}
        @component('stepper') pemasaran,1,{{ $user->id }},{{ $idProduk }},{{ $kode_tahap }} @endcomponent

        @if( (!is_null($dok) && $dok->sni == 1) && (!is_null($infoDB) && $infoDB->lengkap == 1) )
        <center>
            <p class="alert alert-success">Dokumen dan Form Persyaratan Sertifikat SNI sudah lengkap</p>
        </center>
        @else
        @if(!is_null($dok) && $dok->sni == 1)
        <center>
            <p class="alert alert-success">Dokumen sudah lengkap</p>
        </center>
        @elseif(!is_null($dok) && $dok->sni == 2)
        <center>
            <p class="alert alert-warning">Dokumen belum lengkap</p>
        </center>
        @endif
        @if( (!is_null($infoDB) && $infoDB->lengkap == 1) && !($kode_tahap >= 11) )
        <center>
            <p class="alert alert-success">Daftar Isian dan Kuesioner F.48.01 sudah lengkap</p>
        </center>
        @elseif( (!is_null($infoDB) && $infoDB->lengkap == 2) && !($kode_tahap >= 11) )
        <center>
            <p class="alert alert-warning">Daftar Isian dan Kuesioner F.48.01 belum lengkap</p>
        </center>
        @endif
        @endif
        {{-- @if( is_null($dok) || (!is_null($dok) && is_null($dok->sni)) || (!is_null($infoDB) && is_null($infoDB->sni)) )
        <center>
            <p class="alert alert-primary">Client belum melengkapi dokumen.<br>Form verifikasi belum aktif</p>
        </center>
        @endif --}}
        @if( (!is_null($dok) && !is_null($dok->sni) && $dok->sni == 3) && (!is_null($infoDB) && !is_null($infoDB->lengkap) && $infoDB->lengkap == 3) )
        <center>
            <p class="alert alert-primary">Client sudah melengkapi dokumen.<br>Form verifikasi telah aktif</p>
        </center>
        @elseif( ( (!is_null($dok) && is_null($dok->sni)) && (!is_null($infoDB) && is_null($infoDB->lengkap)) ) || (is_null($dok) || is_null($infoDB)) )
        <center>
            <p class="alert alert-primary">Client belum melengkapi dokumen.<br>Form verifikasi belum aktif</p>
        </center>
        @endif
        @if( (
            (!is_null($dok) && $dok->sni == 1 && !is_null($infoDB) && $infoDB->lengkap == 2) || 
            (!is_null($dok) && $dok->sni == 2 && !is_null($infoDB) && $infoDB->lengkap == 1) || 
            (!is_null($dok) && $dok->sni == 2 && !is_null($infoDB) && $infoDB->lengkap == 2)
            ) && !($kode_tahap >= 11) 
        )
        <center>
            <p class="alert alert-primary">Verfikasi telah dilakukan, Permintaan untuk melengkapi form telah dikirim.<br>Tunggu kelengkapan dokumen dari client</p>
        </center>
        @endif
        @if(\Session::has('successMsg'))
        <center>
            <p class="alert alert-success">{{ \Session::get('successMsg') }}</p>
        </center>
        @endif
        <br>
        <form id="verifySAForm" method="POST" action="{{ $user->negeri == 1 ? url('/verifySA/'.$idProduk) : url('/verifySALuar/'.$idProduk) }}">
            @csrf
            @if($user->negeri == 1)
                @if(!is_null($dok) && $dok->sni == 3)
                <center>
                    <p class="alert alert-danger mb-3">Harap untuk mengisi form verifikasi dengan lengkap</p>
                </center>
                @endif
                
                @if(
                    ( (!is_null($dok) && !is_null($dok->sni) && $dok->sni == 3) && (!is_null($infoDB) && !is_null($infoDB->lengkap) && $infoDB->lengkap == 3) ) ||
                    ( (is_null($infoDB) || !is_null($infoDB)) && !is_null($dok) ) ||
                    $kode_tahap >= 11
                )
                <div class="mb-2">
                    <button class="toggle_btn mr-3" type="button" data-toggle="collapse" data-target="#dok_sa" aria-expanded="false" aria-controls="dok_sa">
                        Form Apply Sertifikasi Awal &nbsp; <i class="fas fa-chevron-down fa-lg rotate" style="color: #002b51;"></i>
                    </button>
                    <small class="form-text text-muted" style="margin-top: -15px;">Klik untuk melihat form</small>
                </div>
                <br>
                <div class="collapse" id="dok_sa">
                    @if(!is_null($dok) && $dok->sni !== 1 && $infoDB->lengkap !== 1)
                    <div id="save">
                        <a href="#send_file">
                            <div class="save_file_link">
                                <span id="save_file_txt"><i class="fas fa-paper-plane"></i> &nbsp; Kirim Data</span>
                            </div>
                        </a>
                    </div>
                    @endif

                    <h5>Dokumen Sertifikasi Awal</h5><br>
                    @include('applySA.verify.dok_dalamNegeri')<br>
 
                    <h5>Daftar Isian dan Kuesioner F.48.01</h5><br>
                    @if(!is_null($dok) && $dok->sni == 1)
                        @include('applySA.kuesionerSNI')
                    @else
                        @include('applySA.verify.kuis_dalamNegeri.kuis_dalamNegeri')
                    @endif
                </div>
                @endif

                @if( (!is_null($dok) && !is_null($dok->sni)) && (!is_null($infoDB) && !is_null($infoDB->lengkap)) && 
                    (
                        (!is_null($dok) && $dok->sni != 1 && $dok->sni != 2) || 
                        (!is_null($infoDB) && $infoDB->lengkap != 1 && $infoDB->lengkap != 2) 
                    )

                )
                <div id="validMsg"></div>
                <div id="send_file">
                    <button class="reset_btn mr-3" type="reset">Reset</button>
                    <button class="submit_btn" type="button" onclick="ValidateSize('null', '.choice', '#verifySAForm', '#validMsg', true)">Kirim</button>
                </div>
                @endif

            @else
                @include('applySA.verify.dok_luarNegeri')
                @include('applySA.verify.kuis_luarNegeri.kuis_luarNegeri')
                @if((!is_null($dok) && $dok->sni != 1) || is_null($dok))
                <button class="reset_btn mr-3" type="reset">Reset</button>
                <button class="submit_btn" type="submit">Kirim hasil kelengkapan dokumen</button>
                @endif
            @endif
        </form><br>

        @if($kode_tahap >= 13)
        <div class="row mt-4 mb-4">
            <div class="col-lg text-right">
                <a href="{{ url('/bidPrice/'.$user->id.'/sert/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        @endif
    </div>
</div>

<script type="text/javascript">
    $(".rotate").click(function () {
    $(this).toggleClass("down");
})
</script>

@endsection
