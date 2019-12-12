@extends('layouts.dok_header')

@section('card-header-dok', 'Laporan Hasil Sertifikasi')

@section('content_dok')

<p class="text-right">F.05.02</p>
<p class="text-center"><b>LAPORAN HASIL SERTIFIKASI</b></p>

<table width="100%">
    <tr>
        <td>Nama perusahaan</td>
        <td>:</td>
        <td> {{ $user->nama_perusahaan }}</td>
    </tr>
    <tr>
        <td>Alamat pabrik</td>
        <td>:</td>
        <td> {{ $user->alamat_perusahaan }}</td>
    </tr>
    <tr>
        <td>Tahapan sertifikasi</td>
        <td>:</td>
        <td> Survailen 3</td>
    </tr>
    <tr>
        <td>Tanggal audit</td>
        <td>:</td>
        <td> {{ $tgl_audit }}</td>
    </tr>
    <tr>
        <td>Tim Audit</td>
        <td>:</td>
        <td> {{ $tim_audit }}</td>
    </tr>
    <tr>
        <td>Jenis sertifikasi</td>
        <td>:</td>
        <td> Sertifikasi produk</td>
    </tr>
    <tr>
        <td>Lingkup sertifikasi</td>
        <td>:</td>
        <td> SNI 03-0797-2006 - {{ $produk->jenis_produk }}</td>
    </tr>
</table>

<br><br>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <th class="text-center" width="5%">No</th>
        <th class="text-center" width="30%">Nama dokumen</th>
        <th class="text-center" width="60%">Penilaian</th>
    </tr>
    <tr>
        <td class="text-center" width="5%">1</td>
        <td width="30%">Hasil Assesmen</td>
        <td width="60%">&nbsp;&nbsp;&nbsp;
            @if(isset($data['hasilA']))
                @if(!is_null($data['hasilA']) && $data['hasilA'] == '1')
                MS
                @else
                TMS
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="text-center" width="5%">2</td>
        <td width="30%">Verifikasi</td>
        <td width="60%">&nbsp;&nbsp;&nbsp;
            @if(isset($data['verif']))
                @if(!is_null($data['verif']) && $data['verif'] == '1')
                MS
                @else
                TMS
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="text-center" width="5%">3</td>
        <td width="30%">Berita Acara Pengambilan Contoh</td>
        <td width="60%">&nbsp;&nbsp;&nbsp;
            @if(isset($data['bapc']))
                @if(!is_null($data['bapc']) && $data['bapc'] == '1')
                MS
                @else
                TMS
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="text-center" width="5%">4</td>
        <td width="30%">Hasil Pengujian</td>
        <td width="60%">&nbsp;&nbsp;&nbsp;
            @if(isset($data['hasilP']))
                @if(!is_null($data['hasilP']) && $data['hasilP'] == '1')
                MS
                @else
                TMS
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="3" width="10%" height="15%">5 Rekomendasi Evaluasi Rapat Teknis<br>
            <div class="p-2">
                {!! nl2br($rekomendasi) !!}
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="3" width="10%" height="15%">6 Keputusan Komite Evaluasi Teknis<br>
            <div class="p-2">
                @if(!is_null($keputusan))
                Nama : {{ $keputusan['nama'] }}<br>
                Keputusan : {{ $keputusan['keputusan'] }}
                @endif
            </div>
        </td>
    </tr>
</table>

<br><br><br>

<table class="float-right">
    <tr>
        <td>Bandung,</td>
    </tr>
    <tr>
        <td>Ketua Komite Evaluasi Teknis</td>
    </tr>
</table>




@endsection