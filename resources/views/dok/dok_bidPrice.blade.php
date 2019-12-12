@extends('layouts.dok_header')

@section('card-header-dok', 'Penawaran Harga')

@section('content_dok')

<div class="ml-4 mr-4">
    <table width="100%">
        <tr>
            <td width="5%">Nomor</td>
            <td width="2%">:</td>
            <td width="40%">{{ $no_surat_bp }}</td>
            <td width="60%" style="text-align: right;">Bandung, {{ $tgl_pembuatan->isoFormat('LL') }}</td>
        </tr>
        <tr>
            <td width="25%">Sifat</td>
            <td>:</td>
            <td>Biasa</td>
        </tr>
        <tr>
            <td width="25%">Lampiran</td>
            <td>:</td>
            <td>1 (satu)</td>
        </tr>
        <tr>
            <td width="25%">Hal</td>
            <td>:</td>
            <td>{{ $hal }}</td>
            {{-- <td>Informasi Biaya SPPT SNI dalam Rangka Survailen</td> --}}
        </tr>
    </table>

    <br>

    <p class="text-left">
        <div style="width: 300px">
            Yth. Pimpinan <br>
            <b>{{ $user->pimpinan_perusahaan }}</b><br>
            {{ $user->alamat_perusahaan }}
        </div>
    </p><br>
    <table>
        <tbody>
            <tr>
                <td width="15%">Telp.</td>
                <td>:</td>
                <td>&nbsp;{{ $user->no_telp }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>&nbsp;{{ $user->email_perusahaan }}</td>
            </tr>
            {{-- <tr>
            <td>Up.</td>
            <td>:</td>
            <td>&nbsp;Frans</td>
        </tr> --}}
        </tbody>
    </table>

    <p class="mt-2" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Berkenaan dengan akan dilaksanakannya survailen ke-2 SPPT SNI di {{ $user->nama_perusahaan }} , untuk komoditi {{ $produk->jenis_produk }} (jumlah karyawan {{ $total_pegawai }} orang), dengan ini kami sampaikan rincian biaya seperti terlampir.</p>

    <p class="mt-2" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Apabila ada perubahan tipe kategori produk, merk, legilitas/susunan organisasi produsen, jumlah karyawan produsen mohon segera diinformasikan. Untuk pembayaran biaya tersebut di atas, dimohon agar dapat menggunakan aplikasi SIMPONI. Kode biling untuk penyetoran akan kami sampaikan bersamaan dengan surat tagihan.</p>

    <p class="mt-2" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Sebagai bentuk komitmen dalam menegakkan Zona Integritas, tidak dibenarkan untuk memberikan hadiah atau gratifikasi dalam bentuk apapun kepada petugas layanan, auditor/PPC dan petugas kami yang lain terkait pelayanan sertifikasi SNI/Produk.</p>

    <p class="mt-2" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Atas perhatian dan kerjasamanya disampaikan terima kasih.
    </p>

    
<p class="pt-5 text-center float-right">
    Kepala Balai Besar Keramik <br><br><br><br><br><br>
    <b>Gunawan</b>
</p>



    <br><br><br><br><br><br><br><br><br><br><br><br>


    <p class="text-left float-left">
        Tembusan : <br>
        1. Kabid PASKAL <br>
        2. Kabag. Tata Usaha <br>
    </p>

    <br>
    <br>

    <div style="margin-top: 210px;">
        <table>
            <tr>
                <td>Lampiran Surat No</td>
                <td>:</td>
                <td>{{ $no_surat_bp }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $tgl_pembuatan->isoFormat('LL') }}</td>
            </tr>
        </table>

        <br><br><br>

        <p class="text-center">
            <b>
                RINCIAN BIAYA SERTIFIKASI PRODUK <br>
                PENGGUNAAN TANDA (SPPT) SNI <br>
                DALAM RANGKA SURVAILEN <br>
                {{ $user->nama_perusahaan }} <br>
            </b>
        </p>

        <div class="ml-5 mr-5">
            <table width="100%">
                <tr>
                    <td width="3%">1</td>
                    <td>Biaya Permohonan</td>
                    <td width="30%">
                        <table width="100%">
                            <tr>
                                <td class="text-right">Rp.</td>
                                <td class="text-right">{{ number_format($price['b_permohonan'], 0, '.', ',') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="3%">2</td>
                    <td>Audit Stage-I (Audit Kecukupan)</td>
                    <td width="30%">
                        <table width="100%">
                            <tr>
                                <td class="text-right">Rp.</td>
                                <td class="text-right">{{ number_format($price['b_audit1'], 0, '.', ',') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="3%">3</td>
                    <td>Audit Kesesuaian</td>
                </tr>
            </table>

            <table width="100%" class="ml-4 mr-1">
                <tr>
                    <td width="3%">-</td>
                    <td width="60%">Auditor Kepala dan Auditor</td>
                    <td width="30%">
                        <table width="100%">
                            <tr>
                                <td class="text-right">Rp.</td>
                                <td class="text-right">{{ number_format($price['b_kepala'], 0, '.', ',') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="3%">-</td>
                    <td>PPC</td>
                    <td width="25%">
                        <table width="100%">
                            <tr>
                                <td class="text-right">Rp.</td>
                                <td class="text-right">{{ number_format($price['b_ppc'], 0, '.', ',') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td width="3%">4</td>
                    <td>Biaya jasa proses sertifikasi</td>
                </tr>
            </table>

            <table width="100%" class="ml-4 mr-1">
                <tr>
                    <td width="3%">-</td>
                    <td>Panitia teknis dan tim penilai</td>
                    <td width="25%">
                        <table width="100%">
                            <tr>
                                <td class="text-right">Rp.</td>
                                <td class="text-right">{{ number_format($price['b_pTeknis'], 0, '.', ',') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="3%">-</td>
                    <td width="60%">Panitia proses sertifikasi</td>
                    <td width="30%">
                        <table width="100%">
                            <tr>
                                <td class="text-right">Rp.</td>
                                <td class="text-right">{{ number_format($price['b_sert'], 0, '.', ',') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td class="text-right"><b>Jumlah Biaya</b></td>
                    <td width="30%">
                        <table width="100%">
                            <tr>
                                <td width="15%" class="text-right"><b>Rp.</b></td>
                                <td class="text-right"><b>{{ number_format($price['b_total'], 0, '.', ',') }}</b></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div class="text-right" style="padding-top: -10px">
                <p><i>(tiga puluh sembilan juta enam ratus ribu rupiah)</i></p>
            </div>

            <br><br><br><br><br><br>

            <p class="text-center float-right">
                Kepala Balai Besar Keramik <br><br><br><br><br><br>
                <b>Gunawan</b>
            </p>

            <br><br><br><br><br><br><br><br><br><br><br>


            <div style="font-size: 12px;">
                Catatan:
                <ol>
                    <li>Biaya di atas belum termasuk biaya pengujian contoh uJi dan berlaku untuk I(satu) Lokasi pabrik.</li>
                    <li>Biaya Pengujian contoh uji berdasarkan ketentuan labolatorium uji BBK yang ditunjuk oleh LSPro- BBK.</li>
                    <li>Biaya Pengujian contoh uji berdasarkan ketentuan labolatorium uji BBK yang ditunjuk oleh LSPro- BBK.</li>
                    <li>Menyediakan tranportasi/menanggung biaya transportasi dari Balai Besar Keramik (Bandung) ke lokasi audit dan kembali ke Bandung.</li>
                    <li>Menyediakan konsumsi atau menanggung biaya konsumsi (makan pagi, makan siang, dan makan malam) mulai keberangkatan dari Bandung sampai dengan tiba kembali ke Bandung.</li>
                    <li>Menyediakan tiket pesawat dan melakukan konfirmasi terlebih dahulu dengan lead auditor/ketua tim sebelum issued, apabila tidak melakukan konfirmasi maka ketua tim berhak untuk membatalkan keberangkatan.</li>
                    <li>Asuransi perjalanan wajib disediakan oleh pihak importir (perusahaan)</li>
                    <li>Pengurusan visa menjadi tanggung jawab importer (audit ke luar negeri)</li>

                </ol>
            </div>

        </div>
    </div>

</div>

@endsection
