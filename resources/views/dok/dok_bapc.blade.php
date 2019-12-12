@extends('layouts.dok_header')

@section('card-header-dok', 'Dokumen BAPC')

@section('content_dok')

<style>
    * {
        font-size: 15px;
    }

</style>

<p style="padding-top: -15px"><b>F.04.10</b></p>
<h2 class="text-center"><b>BERITA ACARA PENGAMBILAN CONTOH</b></h2>
<h5 class="text-center" style="padding-top: -25px"><i>SAMPLING REPORT</i></h5>

<div class="text-center">
    <p>Nomor / <span class="small_txt"><i>Number</i></span> : 179/BAPC/LSPro-BBK/09/{{ $date->year }}</p>
    <p style="padding-top: -17px">Nomor <i>referensi</i> / <span class="small_txt"><i>references Number</i></span> : 252/01</p>
</div>

<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari / <span class="small_txt"><i>To day</i></span> <u>{{ $date->format('l') }}</u> Tanggal / <span class="small_txt"><i>Date</i></span> <u>&nbsp;&nbsp;{{ date('d') }}&nbsp;&nbsp;</u> Bulan / <span class="small_txt"><i>Month</i></span> <u>&nbsp;&nbsp;{{ $date->monthName }}&nbsp;&nbsp; Tahun / <span class="small_txt"><i>Year</i></span> &nbsp;&nbsp;&nbsp; {{ $date->year }} &nbsp;&nbsp; yang bertanda tangan di bawah ini, sebagai Petugas Pengambilan Contoh,</u> telah melakukan pengambilan contoh berdasarkan Surat Tugas dari BALAI BESAR KERAMIK / <span class="small_txt"><i>The undersigned as the Sampling Officer, have conducted sampling based on the Sampling Assigment Letter from THE CENTER FOR CERAMIC</i></span> <br>
    <u>Nomor / <span class="small_text"><i>Number :</i></span>&nbsp;&nbsp;&nbsp; 123/SP-TA/BBK/SPPD/8/{{ $date->year }} &nbsp;&nbsp; Tanggal / <span class="small_txt"><i>date</i></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> dengan disaksikan oleh pihak Perusahaan dan disetujui Ketua Tim / <span class="small_txt"><i>With witnesses by Company and approved by Team Leader</i> :</span>
</p>

<table width="100%">
    <tr>
        <td>-</td>
        <td><b>Proses Sertifikasi</b> <br> <span class="small_txt"><i>Certification process</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;"><strike>New</strike> / <strike>Re Certification</strike> / 3<sup style="font-size: 10px;">rd</sup> Surveillance / <strike>Product extention (product/brand/type) </strike>/ <strike>Re sampling</strike></td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Sistem Sertifikasi</b> <br> <span class="small_txt"><i>Certification system</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">Sistem 5</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Komoditi</b> <br> <span class="small_txt"><i>Commodity</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">Laminated Safety Glass for Motor Vehicle</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Nomor Standar Produk</b> <br> <span class="small_txt"><i>Number of Product Standard</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">SNI : 15-1326-2005</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Tipe / Jenis / Ukuran</b> <br> <span class="small_txt"><i>Type / Category / Size</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">Laminated Safety Glass for Motor Vehhicle A Class, Thickness of plastic layer 0.76 mm, Thickness : 4.96 mm; representing : 4.46 mm; 4.66mm; 4.96 mm; 5.86 mm</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Merek</b> <br> <span class="small_txt"><i>Brand</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">KIA Motors Genuine Parts</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Nama Perusahaan</b> <br> <span class="small_txt"><i>Name of Company</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">Korea Autoglass Corporation</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Alamat Perusahaan</b> <br> <span class="small_txt"><i>Company address</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">#134, Sandan-Gil, Jeonui-Myeon, Sejong-si, Korea</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Alamat Pabrik</b> <br> <span class="small_txt"><i>Factory address</i></span></td>
        <td>:</td>
        <td style="border-bottom: 1px solid black;">#134, Sandan-Gil, Jeonui-Myeon, Sejong-si, Korea</td>
    </tr>
</table>

<br>

<div class="ml-3 mr-3">
    <table width="100%">
        <tr>
            <td><b>Nama Importir</b> <br> <span class="small_txt"><i>Name of Importer</i></span></td>
            <td>:</td>
            <td>PT. KIA Mobil Indonesia</td>
        </tr>
        <tr>
            <td><b>Alamat Importir</b> <br> <span class="small_txt"><i>Importer address</i></span></td>
            <td>:</td>
            <td>Jl. Dokter Saharjo No. 315 Tebet barat Jakarta Selatan</td>
        </tr>
        <tr>
            <td><b>Kode Produksi</b> <br> <span class="small_txt"><i>Production Code</i></span></td>
            <td>:</td>
            <td>LSG-4.96/KAC-KIA/09/2018</td>
        </tr>
        <tr>
            <td><b>Jumlah contoh yang diambil</b> <br> <span class="small_txt"><i>Quantity</i></span></td>
            <td>:</td>
            <td>78 pieces (actual size and small size), taken from warehouse</td>
        </tr>
        <tr>
            <td><b>Tanggal Pengambilan Contoh</b> <br> <span class="small_txt"><i>Date of Sampling</i></span></td>
            <td>:</td>
            <td>September 5 - 6, 2018</td>
        </tr>
        <tr>
            <td><b>Mewakili Jumlah Komoditi sebesar</b> <br> <span class="small_txt"><i>Representing the quantity of</i></span></td>
            <td>:</td>
            <td>1670 pieces</td>
        </tr>
    </table>
</div>

<table width="100%">
    <tr>
        <td>-</td>
        <td><b>Dari seri produksi yang dikeluarkan tanggal</b> <br> <span class="small_txt"><i>From production series issued on</i></span></td>
        <td>:</td>
        <td>September 5, 2018</td>
    </tr>
    <tr>
        <td>-</td>
        <td><b>Dengan cara pengambilan contoh</b> <br> <span class="small_txt"><i>Using the sampling method</i></span></td>
        <td>:</td>
        <td>A c a k / Random Sampling</td>
    </tr>
</table>

<br>

<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kemudian contoh tersebut dibagi menjadi 2 (dua) yang sama, dikemas, diberi Label Contoh Uji dan dikirimkan kepada masing-masing 1 (satu) contoh kepada Perusahaan (sebagai arsip) dan 1 (satu) contoh kepada Balai/Laboratorium Uji. / <span class="small_txt"><i>The sample was then divided into 2 (two) equal part, packaged, provided, provided with a Sample Label and was delivered in the quantity of 1 (one) sample each to the Company (as reference) and1 (one) sample to the Testing Laboratory/Agency.</i></span> <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikianlah Berita Acara Pengambilan Contoh ini dibuat dengan sesungguhnya / <span class="small_txt"><i>This Sampling Report is being truthfully submitted.</i></span>
</p>

<p class="text-right">Sejong-Si, September 06, 2018</p>

<br><br>

<table width="100%">
    <tr>
        <td width="50%" class="text-center">
            Saksi dari Perusahaan <br> <span class="small_txt"><i>Witnesses from the Company</i></span> <br><br><br><br><br>
            <u>Min - Sun Jang</u> <br>
            Quality Management Section
        </td>
        <td width="50%" class="text-center">
            Petugas Pengambil Contoh <br> <span class="small_txt"><i>Sampling Officer</i></span> <br><br><br><br><br><br>
            Moelyanto
        </td>
    </tr>
</table>

<br><br>

<table width="100%">
    <tr>
        <td width="50%" class="text-center">
            I m p o r t i r <br> <span class="small_txt"><i>I m p o r t e r</i></span> <br><br><br><br><br>
            Lee Dae Hee
        </td>
        <td width="50%" class="text-center">
            Ketua Tim <br> <span class="small_txt"><i>Team Leader</i></span> <br><br><br><br><br>
            Aristianto MMB
        </td>
    </tr>
</table>

@endsection
