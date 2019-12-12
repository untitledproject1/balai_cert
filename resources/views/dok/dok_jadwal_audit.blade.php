@extends('layouts.dok_header')

@section('card-header-dok', 'Surat Pemberitahuan Audit')

@section('content_dok')

<table width="100%">
    <tr>
        <td width="20%">Nomor</td>
        <td width="5%">:</td>
        <td></td>
        <td width="30%">Bandung, {{ $date->isoFormat('LL') }}</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td>:</td>
        <td></td>
    </tr>
</table>

<p>
    Kepada Yth. <br>
    Pimpinan Perusahaan <br>
    <b>{{ $user->nama_perusahaan }}</b> <br>
    {{ $user->alamat_perusahaan }}
</p>

<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Berdasarkan jadual audit survailen SPPT SNI untuk {{ $user->nama_perusahaan }} maka bersama ini kami menugaskan Auditor dari LSPro BBK yaitu Sdr, <b>(Ketua Tim),</b> Sdr, <b>(Aggota Tim)</b> dan Sdr. <b>(PPC)</b> untuk melakukan pemeriksaan sistem mutu berdasarkan SNI ISO 9001:2015 dan SNI 15-0047-2005 beserta pelaksanaan pengambilan contoh produk untuk pengujian mutu produk di Laboratorium Balai Besar Keramik pada tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <b>2018,</b> dengan rincian sebagai berikut:
</p>

<table width="100%">
    <tr>
        <td width="35%">Status Audit</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Nomor Referensi Perusahaan</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Komoditi</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Kategori / Tipe</td>
        <td>:</td>
        <td></td>
    </tr>
</table>

<table style="margin-bottom: 5px;" width="100%">
    <tr>
        <td width="35%">Perluasan</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Merek</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Nomor Standar</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Sistem Manajemen Mutu</td>
        <td>:</td>
        <td></td>
    </tr>
</table>

<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Audit akan dilaksanakan mulai pukul 09:00 WIB dan jadwal akan kami kirimkan kemudian. Pada saat audit diharapkan Top Manajemen dan personel yang berkepentingan hadir untuk interview dengan auditor. Mohon dapat disediakan ruangan untuk menyiapkan laporan.
</p>

<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Akomodasi dan transportasi petugas untuk keperluan tersebut kami bebankan langsung pada pihak PT. {{ $user->nama_perusahaan }}
</p>

<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian informasi dari kami. Apabila ada hal yang kurang jelas harap segera menghubungi kami. Atas perhatiannya disampaikan terima kasih.
</p>

<p class="float-right text-center">
    Kepala Paskal <br><br><br><br>
    Dr. Gunawan
</p>

<br><br><br><br><br>

<div class="small_txt">Tembusan :
    <ol>
        <li>Kabid PASKAL BBK</li>
        <li>Kabid PJT BBK</li>
        <li>Kabag TU BBK</li>
        <li>Tim Audit dan PPC</li>
        <li>Pertinggal</li>
    </ol>
</div>

<p style="padding-top: -10px;">
    Persetujuan Perusahaan <br><br><br>
    (.......................................) <br>
    Tanggal Persetujuan:
</p>

@endsection
