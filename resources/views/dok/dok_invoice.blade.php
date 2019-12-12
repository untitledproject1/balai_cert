@extends('layouts.dok_header')

@section('card-header-dok', 'Dokumen Invoice')

@section('content_dok')

<style>
    p{
        font-size:12px;
    } 

    td{
        font-size:12px;
    }   
</style>

<p class="text-center"><b>INVOICE JASA LAYANAN SERTIFIKASI</b></p>

<table width="100%">
    <tr>
        <td width="6%">No.&nbsp;{{ $no_surat_invoice }}</td>
        <td width="5%%">Bandung, {{ $tgl_pembuatan->isoFormat('LL') }} <br><br>Yth. Pimpinan <br>{{ $user->nama_perusahaan }} <br> {{ $user->alamat_perusahaan }} <br>{{ $user->kota }}</td>
    </tr>

    <tr>
        <td>Invoice 1</td>    
    </tr>

</table>

<table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="96%" class="text-center"><b>URAIAN</b></td>
        <td width="4%" class="text-center"><b>Biaya</b></td>
    </tr>

    <tr>
        <td width="96%">1 Biaya Permohonan</td>  
        <td>
            <table width="100%">
                <tr>
                    <td width="2%">Rp.</td>  
                    <td width="2%" class="text-right"> {{ number_format($price['b_permohonan'], 0, ',', '.') }}</td>
                </tr>
            </table>
        </td>
    </tr>

     <tr>
        <td width="96%">2 Audit Stage-1</td>  
        <td>
            <table width="100%">
                <tr>
                    <td width="2%">Rp. </td> 
                    <td width="2%" class="text-right"> {{ number_format($price['b_audit1'], 0, ',', '.') }}</td>
                </tr>
            </table>
        </td>
    </tr>

     <tr>
        <td width="96%">3 Audit Kesesuaian</td>  
        <td width="10%"></td>  
    </tr>

     <tr>
        <td width="96%">&nbsp;&nbsp;&nbsp;-Auditor Kepala dan Auditor</td>     
        <td>
            <table width="100%">
                <tr>
                    <td width="2%">Rp.</td>
                    <td width="2%" class="text-right"> {{ number_format($price['b_kepala'], 0, ',', '.') }}</td>
                </tr>
            </table>
        </td>
    </tr>

     <tr>
        <td width="96%">&nbsp;&nbsp;&nbsp;-PPC</td>  
        <td>
            <table width="100%">
                <tr>
                    <td width="2%">Rp.</td>
                    <td width="2%" class="text-right"> {{ number_format($price['b_ppc'], 0, ',', '.') }}</td>
                </tr>
            </table>
        </td>  
    </tr>

     <tr>
        <td width="96%">4 Biaya Jasa Proses Sertifikasi</td>  
        <td width="4%"></td>  
    </tr>

     <tr>
        <td width="96%">&nbsp;&nbsp;&nbsp;-Panitia teknis dan tim penilai</td>  
        <td>
            <table width="100%">
                <tr>
                    <td width="2%">Rp.</td>
                    <td width="2%" class="text-right"> {{ number_format($price['b_pTeknis'], 0, ',', '.') }}</td>
                </tr>
            </table>
        </td>  
    </tr>

     <tr>
        <td width="96%">&nbsp;&nbsp;&nbsp;-Panitia proses Sertifikasi</td>  
        <td>
            <table width="100%">
                <tr>
                    <td width="2%">Rp.</td>
                    <td width="2%" class="text-right"> {{ number_format($price['b_sert'], 0, ',', '.') }}</td> 
                </tr>
            </table>
        </td>
    </tr>

     <tr>
        <td width="96%"><b>&nbsp;&nbsp;&nbsp;Jumlah</b></td>  
        <td>
            <table width="100%">
                <tr>
                    <td width="2%">Rp.</td>
                    <td width="2%" class="text-right"><b>{{ number_format($price['b_total'], 0, ',', '.') }}</b></td>
                </tr>
            </table> 
        </td> 
    </tr>

    <tr>
        <td width="100%" colspan="2">&nbsp;&nbsp;&nbsp;Terbilang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Dua Puluh Tiga Juta Rupiah</b> <br>&nbsp;&nbsp;&nbsp;<i>Untuk biaya Sertifikasi awal SPPT SNI</i></td>
    </tr>

    <tr>
        <td width="100%" colspan="2"><b>Catat</b><br>Subjek pembayaran di atas tidak dikenakan PPn 10%<br>Tarif berdasarkan PP No.47 Tahun 2011<br>Biaya transportasi,visa,akomodasi dan asuransi perjalanan tim audit ditanggung oleh pemohon <br>Biaya di atas belum termasuk biaya pengujian contoh</td>
    </tr>

    <tr>
        <td width="100%" colspan="2">
                <table width="100%">
                    <tr>
                        <td>Referensi<br> <br> </td>
                        <td>{{ $references }}<br> <br>   </td>
                        {{-- <td>Surat Penawaran No.4488/BBK/PJT.1/XII/{{ $date->year }}<br> <br>   </td> --}}
                    </tr>

                    <tr>

                        <td>Tanggal</td>
                        <td>{{ $tgl_pembuatan->isoFormat('D-MMM-YY') }}</td>
                    </tr>
                </table>
        </td>
    </tr>

    <tr>

                <td colspan="2" width="100%" style="padding-left: -20px; padding-top: -11px;">
                
                    <ol>
                        <li>Pembayaran dilakukan melalui <b>SIMPONI (Sistem Informasi PNBP Online)</b> melalui pembayaran kode billing</li>
                        <li>Mengingat masa aktif kode billing tersebut hanya 7 (tujuh) hari kalender sejak tanggal penerbitannya,maka pemohon dapat menghubungi bagian keuangan apabila akan melakukan pembayaran, untuk mendapatkan kode billing tersebut.</li>
                        <li>Mohon konfirmasi via email bbkpnbp@gmail.com setelah melakukan pembayaran disertai kode pembayaran</li>
                        <li>Untuk informasi lebih lanjut, hubungi sub. Bagian Keuangan di 022-7206221 ext. 209</li>
                    </ol>
                </td>
            </tr>
    </tr>
    
    <tr>
        <td width="100%" colspan="2">
                <table width="100%">
                    <tr>
                        <td width="15%">Standar Sistem</td>
                        <td width="70%">SNI ISO 9001:2008</td>

                    </tr>

                    <tr>

                        <td width="18%">No. referensi (order)</td>
                    </tr>

                    <tr>
                        <td width="18%">No. SNI </td>
                    </tr>

                    <tr>
                        <td width="18%">Tipe Sertifikasi</td>
                        <td width="70%">Tipe 5</td>
                    </tr>

                </table>
        </td>
    </tr>

</table>

<p class="float-right text-center mr-8">A.n Kepala Balai besar Keramik <br>Kepala Sub Bagian Keuangan <br><br><br><br><br><br> Karlina Puspitasari <br>198608072009112001 </p>

@endsection
