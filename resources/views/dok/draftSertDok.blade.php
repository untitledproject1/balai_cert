@extends('layouts.dok_sert_header')

@section('card-header-dok', 'Sertifikat Akhir')

@section('content_dok_sert')

<br>

<div class="ml-5 mr-5" style="margin-top: -20px;">

    <table style="position: absolute;" width="100%">
        <tr>
            <td class="text-center">
                <img style="width: 570px; opacity: 0.1;" src="{{ asset('images/balai-besar-keramik.png') }}" alt="">
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td class="text-left">Diterbitkan <br> {{ $date->isoFormat('LL') }}</td>
            <td class="text-right">Berlaku hingga <br> {{ $tgl_exp }}</td>
        </tr>
    </table>

    <div style="margin-top: -30px;">
        <h1 class="text-center"><b>SERTIFIKAT PRODUK</b></h1>
        <h3 class="text-center"><b>Nomor: CPCB-0374-IDN</b></h3>

        <p class="text-center">Sertifikat ini diberikan kepada:</p>

        <h1 class="text-center"><b>{{ strtoupper($user->nama_perusahaan) }}</b></h1>
        <p class="text-center" style="line-height: 0.1;"><b>{{ $user->alamat_perusahaan }}</b></p>

        <div style="line-height: 0.5">
            <p class="text-center">Untuk Importir:</p>
            <h1 class="text-center" style="line-height: 0.4;">PT. NIRO CERAMIC SALES INDONESIA</h1>
        </div>

        <p>sebagai Sertifikat Produk Penggunaan Tanda SNI (SPPT SNI) sesuai dengan Sistem Sertifikasi Produk Tipe 5 serta ketentuan dan persyaratan skema sertifikasi LSPro-BBK untuk produk:</p>

        <h3 class="text-center"><b>Ubin Keramik: SNI ISO 13006:2010</b></h3>

        <p>Tipe, merek dan jenis produk terdapat pada lampiran yang merupakan bagian yang tidak terpisahkan dari sertifikat ini. Pemeliharaan kesesuaian standar produk berdasarkan skema sertifikasi LSPro-BBK dilakukan dengan pengawasan berkala minimal sekali dalam setahun.</p>

        <table width="100%">
            <tr>
                <td width="40%"><img style="width: 80px;" src="{{ asset('images/qr_sert.png') }}" alt=""></td>
                <td>
                    <p class="text-left"><b>Kepala Balai Besar Keramik <br><br><br><br><br> Dr. Gunawan, S.Si, M.Eng</b></p>
                </td>
            </tr>
        </table>

        <p class="small_txt">Pemberian sertifikat ini memberi hak kepada perusahaan / pabrikan untuk menggunakan tanda SNI pada produknya selama perusahaan menghasilkan produk sesuai standar secara konsisten</p>
    </div>
</div>

<!-- ================================================================================-->

<div class="header">
    <table width="100%">
        <tr>
            <td width="25px;">
                <img style="width: 180px; padding-top: -40px;" src="{{ asset('images/kemenperin-logo.png') }}" alt="...">
            </td>
            <td class="text-center">
                <h4><b>BADAN PENELITIAN DAN PENGEMBANGAN INDUSTRI</b></h4>
                <h3 style="padding-top: -5px;"><b>BALAI BESAR KERAMIK</b></h3>
                <h2 style="padding-top: 0;"><b>LEMBAGA SERTIFIKASI PRODUK</b></h2>
                <p class="small_txt" style="padding-top: -10px;">
                    Jln. Jend. A. Yani No. 392 Bandung 40272 Telp. (022) 7206221, 7207115 Fax. (022) 7205322
                    <br> E-mail : keramik@bbk.go.id, lspcencera@yahoo.com
                </p>
            </td>
            <td width="25px;">
                <img style="width: 120px; padding-top: -40px;" src="{{ asset('images/kan.png') }}" alt="...">
            </td>
        </tr>
    </table>
</div>

<table style="position: absolute;" width="100%">
    <tr>
        <td class="text-center">
            <img style="width: 570px; opacity: 0.1;" src="{{ asset('images/balai-besar-keramik.png') }}" alt="">
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td class="text-center"><b>Diterbitkan</b> <br> {{ $date->isoFormat('LL') }}</td>
        <td class="text-center"><b>Lampiran <br> Sertifikat Produk</b> <br> No: CPCB-0374-IDN</td>
        <td class="text-center"><b>Berlaku hingga</b> <br> {{ $tgl_exp }}</td>
    </tr>
</table>

<br>
<br>

<table width="100%">
    <tr>
        <td><b>Perusahaan</b></td>
        <td><b>:</b></td>
        <td><b>{{ $user->nama_perusahaan }}</b></td>
    </tr>
    <tr>
        <td><b>Alamat Perusahaan</b></td>
        <td><b>:</b></td>
        <td><b>{{ $user->alamat_perusahaan }}</b></td>
    </tr>
    <tr>
        <td><b>Direktur</b></td>
        <td><b>:</b></td>
        <td><b>{{ $user->pimpinan_perusahaan }}</b></td>
    </tr>
    <tr>
        <td><b>Importir</b></td>
        <td><b>:</b></td>
        <td><b>PT. Niro Ceramic Sales Indonesia</b></td>
    </tr>
    <tr>
        <td><b>Alamat importir</b></td>
        <td><b>:</b></td>
        <td><b>Jl. Raya Mercedes, Kp. Pabuaran RT. 002 RW. 007, Cicadas Gunung Putri, Bogor, Jawa Barat 16964 - Indonesia</b></td>
    </tr>
    <tr>
        <td><b>Direktur</b></td>
        <td><b>:</b></td>
        <td><b>Eddy Rahardjo</b></td>
    </tr>
    <tr>
        <td><b>Produk</b></td>
        <td><b>:</b></td>
        <td><b>{{ $produk->produk }}</b></td>
    </tr>
    <tr>
        <td style="padding-top: -30px"><b>Tipe/jenis</b></td>
        <td style="padding-top: -30px"><b>:</b></td>
        <td><b>
                <ol>
                    <li>Kelompok B.I.a; Berglasir; Ukuran: 15cm x 90cm, 30cm x 60cm, 30cm x 90cm, 40cm x 80 cm, 45cm x 90cm, 60cm x 60cm, 60cm x 120cm, 80cm x 80cm</li>
                    <li>Kelompok B.I.a; Tidak Berglasir; Ukuran: 30cm x 60cm, 60cm x 60cm, 80cm x 80cm</li>
                </ol>
            </b></td>
    </tr>
    <tr>
        <td><b>Merek</b></td>
        <td><b>:</b></td>
        <td><b>NIRO GRANITE, PORTINO, MGM</b></td>
    </tr>
    <tr>
        <td><b>Standar Produk</b></td>
        <td><b>:</b></td>
        <td><b>SNI ISO 13006:2010</b></td>
    </tr>
    <tr>
        <td><b>Regulasi/ Skema</b></td>
        <td><b>:</b></td>
        <td><b>PERMENPERIN No. 85/M-IND/PER/12/2016 dan Lampiran 2 PERMENPERIN No. 85/M-IND/PER/12/2016</b></td>
    </tr>
    <tr>
        <td><b>Skema Sertifikasi Produk</b></td>
        <td><b>:</b></td>
        <td><b>Tipe 5</b></td>
    </tr>
</table>

<br>

<table width="100%">
    <tr>
        <td width="40%"><img style="width: 80px;" src="{{ asset('images/qr_sert.png') }}" alt=""></td>
        <td>
            <p class="text-left"><b>Kepala Balai Besar Keramik <br><br><br><br><br> Dr. Gunawan, S.Si, M.Eng</b></p>
        </td>
    </tr>
</table>

@endsection
