@extends('layouts.dok_header')

@section('card-header-dok', 'Dokumen Sampling Plan')

@section('content_dok')

<p class="text-left"><b>F-sertifikasi-12</b></p>

<p class="text-center">
    <b>SAMPLING PLAN</b> <br>
    RENCANA PENGAMBILAN CONTOH
</p>
<br>

<table border="1" width="100%" style="border-collapse: collapse">
    <tr>
        <td class="pl-2"><b><i>Name of Company</i></b> <br> Nama Perusahaan</td>
        <td width="3%" class="text-center"><b>:</b></td>
        <td width="60%">&nbsp;&nbsp; {{ $user->nama_perusahaan }}</td> 
    </tr>
    <tr>
        <td class="pl-2"><b><i>Company  address</i></b> <br> Alamat Perusahaan</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2"><b><i>Factory  address</i></b> <br> Alamat Pabrik</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; {{ $user->alamat_pabrik }}</td>
    </tr>
    <tr>
        <td class="pl-2"><b><i>Name of Importer</i></b> <br> Nama Importir</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2"><b><i>Importer address</i></b> <br> Alamat Importir</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2"><b><i>Scope</i></b> <br> Ruang Lingkup  :</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2">- <b><i>Commodity</i></b> <br> &nbsp; Komoditi</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2">- <b><i>Number of Product Standard</i></b> <br> &nbsp; Nomor Standard Produk</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2">- <b><i>Type  / Category  / Size</i></b> <br> &nbsp; Tipe /Jenis / Ukuran</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2">- <b><i>Brand</i></b> <br> &nbsp; Merek</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2">- <b><i>Certification process</i></b> <br> &nbsp; Proses Sertifikasi</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
    <tr>
        <td class="pl-2">- <b><i>Certification system</i></b> <br> &nbsp; Sistem Sertifikasi</td>
        <td class="text-center"><b>:</b></td>
        <td>&nbsp;&nbsp; </td>
    </tr>
</table>

<br>

<table border="1" width="100%" style="border-collapse: collapse">
    <tr>
        <td width="60%" class="pl-2"><b><i>Sampling date </i> <span class="ml-5">:</span> </b> <br> <p class="small_txt">Tgl. Pengambilan Contoh </p></td>
        <td class="pl-2"><b><i>Sampling officer </i> <span class="ml-3">:</span> </b> <br> <p class="small_txt"> P P C</p></td>
    </tr>
</table>

<br><br><br><br><br><br><br><br>

<p class="text-center"><b>QUANTITY OF SAMPLE WIIL BE TAKEN</b></p>
<p class="small-txt text-center" style="margin-top: -15px;">Jumlah Contoh Yang Akan Diambil</p>

<br>

<table border="1" width="100%" style="border-collapse: collapse">
    <tr>
        <td class="small_txt text-center">No</td>
        <td width="30%" class="small_txt text-center"> <b>Type  / Category  / Size</b> <br> Tipe /Jenis / Ukuran </td>
        <td width="12%" class="small_txt text-center"> <b>Brand</b> <br> Merek </td>
        <td width="18%" class="small_txt text-center p-2"> <b>Delivered to testing Laboratory</b> <br> Dikirim keLab Uji </td>
        <td width="18%" class="small_txt text-center p-2"> <b>Company Archive</b> <br> Arsip Perusahaan </td>
        <td width="18%" class="small_txt text-center p-2"> <b>Total Sample</b> </td>
    </tr>
    <tr>
        <td class="text-center">1.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<p class="ml-2 mr-2"><i>The sample will be taken from production line or from warehouse / Contoh  akan diambil dari alir produksi  atau dari gudang</i></p>

<p class="text-right">Bandung, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

<br>

<table width="100%">
    <tr>
        <td width="35%" class="text-center"><b>Team  Leader /</b> <br> <p class="small_txt">Ketua Tim</p> <br><br><br><br> <b>Name</b> </td>
        <td></td>
        <td width="35%" class="text-center"><b>Sampling Officer/</b> <br> <p class="small_txt">Petugas Pengambil Contoh</p> <br><br><br><br> <b>Name</b></td>
    </tr>
</table>

<p><b>Catatan</b> / Note :</p>

<p class="ml-2">The sample for testing laboratory will be sent to : <br>
   Contoh  untuk Lab. Uji mohon dikirim ke
</p>


@endsection


