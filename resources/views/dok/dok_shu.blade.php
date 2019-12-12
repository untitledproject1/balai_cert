@section('card-header-dok', 'Dokumen SHU')

<style>
	#vertical-orientation {
		float: left;
		transform: rotate(-90deg);
		transform-origin: left top 0;
        margin-top:-88px;
        margin-right:0px;
		margin-left: 0px;
		padding-bottom: 10px;
		/*padding-left: 5px;*/
		opacity: 0.9;
		font-size: 10px;
		color: black;
		text-transform: sideways;
	}

	 body {
	 	font-family: adobe-garamond-pro, serif;
            font-size: 15px;
            font-style: normal;
        }

        page img {
            width: 200px;
            height: auto;
        }

        h1,
        h3,
        h4,
        h5,
        h6,
        p {
            color: #000;
        }

        h1,
        h3,
        h5 {
            font-family: adobe-garamond-pro, serif;
            font-weight: 700;
            font-style: normal;
        }

        h5 {
            line-height: 1.5;
        }


        /* ======= 
        ====== Text Option 
        ============================= */

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        /* ======= 
        ====== Float
        =============================== */

        .float-right {
            float: right;
        }

        .float-left {
            float: left;
        }

        /* ===== 
        ===== Margin
        ============================== */

        .m-1 {
            margin: 5px;
        }

        .m-2 {
            margin: 10px;
        }

        .m-3 {
            margin: 15px;
        }

        .m-4 {
            margin: 20px;
        }

        .m-5 {
            margin: 25px;
        }

        .mt-1 {
            margin-top: 5px;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .mt-3 {
            margin-top: 15px;
        }

        .mt-4 {
            margin-top: 20px;
        }

        .mt-5 {
            margin-top: 25px;
        }

        .ml-1 {
            margin-left: 5px;
        }

        .ml-2 {
            margin-left: 10px;
        }

        .ml-3 {
            margin-left: 15px;
        }

        .ml-4 {
            margin-left: 20px;
        }

        .ml-5 {
            margin-left: 25px;
        }

        .mr-1 {
            margin-right: 5px;
        }

        .mr-2 {
            margin-right: 10px;
        }

        .mr-3 {
            margin-right: 15px;
        }

        .mr-4 {
            margin-right: 20px;
        }

        .mr-5 {
            margin-right: 25px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .mb-4 {
            margin-bottom: 20px;
        }

        .mb-5 {
            margin-bottom: 25px;
        }

        /* ====== 
        ===== Padding
        =========================== */

        .p-1 {
            padding: 5px;
        }

        .p-2 {
            padding: 10px;
        }

        .p-3 {
            padding: 15px;
        }

        .p-4 {
            padding: 20px;
        }

        .p-5 {
            padding: 25px;
        }

        .pt-1 {
            padding-top: 5px;
        }

        .pt-2 {
            padding-top: 10px;
        }

        .pt-3 {
            padding-top: 15px;
        }

        .pt-4 {
            padding-top: 20px;
        }

        .pt-5 {
            padding-top: 25px;
        }

        .pl-1 {
            padding-left: 5px;
        }

        .pl-2 {
            padding-left: 10px;
        }

        .pl-3 {
            padding-left: 15px;
        }

        .pl-4 {
            padding-left: 20px;
        }

        .pl-5 {
            padding-left: 25px;
        }

        .pr-1 {
            padding-right: 5px;
        }

        .pr-2 {
            padding-right: 10px;
        }

        .pr-3 {
            padding-right: 15px;
        }

        .pr-4 {
            padding-right: 20px;
        }

        .pr-5 {
            padding-right: 25px;
        }

        .pb-1 {
            padding-bottom: 5px;
        }

        .pb-2 {
            padding-bottom: 10px;
        }

        .pb-3 {
            padding-bottom: 15px;
        }

        .pb-4 {
            padding-bottom: 20px;
        }

        .pb-5 {
            padding-bottom: 25px;
        }

        .header {
            margin-top: -20px;
        }

        .header h2,
        h3,
        h4 {
            font-family: Bell MT, serif;
            line-height: 0.4;
        }

        .small_txt {
            font-size: 11px;
        }

        .small_txt_scnd {
            font-size: 14px;
        }

        .hr_dok_bold {
            border: 1.5px solid #000;
        }

        .hr_dok_bold_scnd {
            margin-top: -5px;
            border: 1px solid #000;
        }

        .hr_dok {
            border: 0.7px solid #000;
        }

        .header_title {
            text-align: center;
            line-height: 1.7;
        }

        .tbl_no {
            margin: 0;
            padding: 0;
            line-height: -2;
        }

        .text_justify {
            text-align: justify;
        }

        .logo_overlay {
            margin: auto;
        }

        .logo_overlay img {
            
        }

</style>

<div class="header">
        <table width="100%">
            <tr>
                <td width="15px;">
                    <img style="width: 140px; padding-top: -10px;" src="{{ asset('images/kemenperin-logo.png') }}" alt="...">
                </td>
                <td style="padding-right: -5px; padding-left: -5px;" class="text-center">
                    <h4><b>BADAN PENELITIAN DAN PENGEMBANGAN INDUSTRI</b></h4>
                    <h3 style="padding-top: -5px;"><b>BALAI BESAR KERAMIK</b></h3>
                    <h4 style="padding-top: -5px;"><b>LABORATORIUM PENGUJIAN BALAI BESAR KERAMIK</b></h4>
                    <p style="padding: -15px -10px 0 -10px; font-size:10px;">
                  	Jln. Jend. A. Yani No. 392 Bandung Telp. (022) 7206221, 7207115 Fax. (022) 7205322 E-mail:keramik@bbk.go.id
                    </p>
                    <hr class="hr_dok" style="width:98%; text-align: center; margin-top:-10px;">

                </td>
                <td width="25px;" class="text-center" style="font-size:9px;">
                    <img style="width: 100px; padding-top: -5px;" src="{{ asset('images/kan.png') }}" alt="..."><b>Laboratorium Penguji <br> LP-367-IDN</b>
                </td>
            </tr>
        </table>
    </div>

<br>
<h3 class="text-center">SERTIFIKAT PENGUJIAN</h3>
 <table style="padding-left: 100px;" width="100%">
 	<tr>
 		<td width="50%">BBK</td>
 		<td width="50%" class="text-right">F-Paskal-03-02</td>
 	</tr>
 </table>	

<table  border="1" style="padding-left: 100px; border-collapse:collapse;" width="100%">
	<tr>
		<td class="pl-2" width="20%"><b>Nomor Pengujian: 001-3/BBK/JU-01/{{ $date->year }}</b></td>
		<td width="10%" class="text-center"><b>Halaman 1 dari 3</b></td>
	</tr>
</table>

<br>

<table style="padding-left: 100px; border-collapse: collapse;" width="100%">
	<tr>
		<td colspan="3" class="pl-2 pr-4" width="100%"><b>Peminta Jasa</b></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4" width="250px">Nama Perusahaan</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td width="350px" style="padding-left: -54px;"><b>{{ strtoupper($user->nama_perusahaan) }}</b></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Alamat Perusahaan</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;">{{ $user->alamat_perusahaan }} {{ $user->kota }}</td>
	</tr>


	<tr>
		<td class="pl-2 pr-4">Alamat Pabrik</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;">{{ $user->alamat_pabrik }} {{ $user->kota }}</td>
	</tr>
	
	<tr>
		<td colspan="3" width="100%" class="pl-2 pr-4"><b><br>Uraian Contoh</b></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Tanggal Terima</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Jenis/Tipe</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>
	
	<tr>
		<td class="pl-2 pr-4">Klasifikasi</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px; "></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Merek</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Tanda Contoh</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Jumlah</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>

	<tr>
		<td colspan="3" class="pl-2 pr-4" width="100%"><b><br>Pengambilan Contoh</b></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Instansi Pengambil Contoh</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"><b>BALAI BESAR KERAMIK</b></td>
	</tr>
	
	<tr>
		<td class="pl-2 pr-4">Pengambil</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Tanggal Pengambilan Contoh</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Berita Acara Pengambilan Contoh</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;">192/BAPC/LSPro-BBK/09/{{ $date->year }}</td>
	</tr>

	<br>
	
	<tr>
		<td width="300px" colspan="3" class="pl-2 pr-4"><b><br>Pengujian</b></td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Acuan Pengujian</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;">SNI 15-0131-2006</td>
	</tr>

	<tr>
		<td class="pl-2 pr-4">Tanggal Pengujian</td>
		<td style="padding-left:-50px;" width="1px">:</td>
		<td style="padding-left: -54px;"></td>
	</tr>

	<tr>
		<td colspan="3" class="pl-2 pr-4"><b><br>Hasil Uji</b></td>
	</tr>

	<tr>
		<td colspan="3"	class="pl-2 pr-4">Hasil pengujian terdiri dari 3 (tiga) halaman</td> 
	</tr>
	
</table>

<br><br><br><br><br>

<div class="pr-1 pl-1 pt-1" style="font-size: 13px; border:1px solid black;" id="vertical-orientation">Sertifikat ini bukan Sertifikat jaminan Mutu. Hasil uji dalam Sertifikat ini hanya berlaku untuk contoh yang diuji.<br> Dilarang menggandakan Sertifikat ini,kecuali secara lengkap</div>


<p class="text-left" style="float: right; padding-top: -60px;">Bandung, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>Kepala Bidang Pengujian, Sertifikasi dan Kalibrasi <br><br><br><br><br><br><b> </b></p>



