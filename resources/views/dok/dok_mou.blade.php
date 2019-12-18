@extends('layouts.dok_header')

@section('card-header-dok', 'Dokumen MOU')

@section('content_dok')

<p class="small_txt_scnd" style="float: right; padding-top: -10px;">F-PJT-08-01</p>

<br><br>

<div class="header_title">
    <b class="text-center">
        SURAT PERJANJIAN KONTRAK <br>
        Antara <br>
        LEMBAGA SERTIFIKASI PRODUK - BBK <br>
        Dengan <br>
        {{ strtoupper($user->nama_perusahaan) }} <br>
    </b>
</div>

<hr class="hr_dok">
<p class="text-center">Nomor: {{ $no_surat }}</p>

<div class="mt-4 ml-4 mr-4">
    <p>Kontrak ini dibuat pada hari {{ $tgl_pembuatan->dayName }}, tanggal {{ $tgl_pembuatan->isoFormat('D') }}, bulan {{ $tgl_pembuatan->monthName }} tahun {{ date('Y') }} oleh dan antara:</p>
    
    <table>
        <tr>
            <td style="vertical-align: top;">1.</td>
            <td>Gunawan., bertindak untuk dan atas nama Lembaga Sertifikasi Produk-BBK, berkedudukan di JI. Jenderal. Ahmad Yani Nomor 392 Bandung 40272 Telepon (022) 7206296, 720622; Fax (022) 7205322; E-mail keramik@bbk.go.id untuk selanjutnya disebut Pihak Pertama, dan</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">2.</td>
            <td>{{ $user->pimpinan_perusahaan }}., dalam hal ini bertindak dalam kedudukannya selaku Direktur {{ $user->nama_perusahaan }} yang beralamat perusahaan di {{ $user->alamat_perusahaan }}, {{ $user->kota }} dan alamat pabrik di {{ $user->alamat_pabrik }},Telp : {{ $user->no_telp }}, Fax : {{ $user->no_fax }}; untuk selanjutnya disebut Pihak Kedua</td>
        </tr>
    </table>

    <p class="text-center mt-3">
        <b>
            Pasal 1 <br>
            Ruang Lingkup Pemberian Jasa
        </b>
    </p>
    
    <table>
        <tr>
            <td style="vertical-align: top;">1.1</td>
            <td rowspan="2">Atas permintaan Pihak Kedua, Pihak Pertama dengan ini sepakat untuk melakukan jasa sertifikasi produk tandas jongkok (SNI 03-0680-1998) Pihak Kedua berdasarkan Sistem Sertifikasi Tipe 5 dengan ruang lingkup SNI terkait guna memperoleh sertifikat produk penggunaan tanda SNI (SPPT SNI) berdasarkan syarat dan aturan sebagaimana diatur dalam kontrak ini.</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">1.2</td>
            <td rowspan="2">Dalam melaksanakan pekerjaannya, yaitu memberikan jasa sertifikasi produk, Pihak Pertama akan menggunakan auditor dan petugas pengambil contoh yang kompeten baik yang berasal dari lingkungan intern Pihak Pertama sendiri atau, bilamana diperlukan yang berasal dari luar lingkungan Pihak Pertama yang dalam hal ini akan bertindak sebagai sub-kontraktor bagi Pihak Pertama dan dijamin akan bisa menjaga kerahasiaan Pihak
                Kedua.</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">1.3</td>
            <td rowspan="2">Auditor akan melaksanakan penilaian kesesuaian dan Petugas Pengambil Contoh akan melaksanakan pengambilan contoh berdasarkan permohonan sertifikasi produk pemohon sesuai dengan prosedur LSPro-BBK dan SNI terkait. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut sapiente dolore iure quibusdam eligendi laborum accusamus. Officiis voluptate dignissimos animi doloremque, nisi eius ipsa mollitia unde aperiam at odit. Quod!</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">1.4</td>
            <td rowspan="2">Proses sertifikasi dimulai dengan tahap Audit kecukupan dan akan dilanjutkan dengan tahap audit kesesuaian/verifikasi setelah Pihak Pertama menerima kelengkapan dokumen dan dinyatakan cukup, serta pengambilan contoh produk.</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">1.5</td>
            <td rowspan="2">Audit kesesuaian/verifikasi dan pengambilan contoh oleh Pihak Pertama dilakukan ditempat Pihak Kedua maka Pihak Kedua wajib menyediakan semua sarana yang dibutuhkan termasuk personil untuk memungkinkan Pihak Pertama melaksanakan pekerjaannya dengan sebaik-baiknya sesuai dengan permintaan Pihak Pertama.</td>
        </tr>
    </table>

    <p class="text-center mt-3">
        <b>
            Pasal 2 <br>
            Sertifikasi
        </b>
    </p>

    <table>
        <tr>
            <td style="vertical-align: top;">2.1</td>
            <td rowspan="2">Dalam hal pemberian jasa sertifikasi dari Pihak Pertama, Pihak Kedua harus bersedia untuk memenuhi semua persyaratan termasuk syarat dan aturan yang ditetapkan oleh Pihak Pertama.</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">2.2</td>
            <td rowspan="2">Sertifikat produk hanya akan diberikan apabila berdasarkan hasil evaluasi yang dilakukan oleh Pihak Pertama ternyata sistem manajemen yang diterapkan oleh Pihak Kedua dan hasil uji contoh produk telah sepenuhnya sesuai dengan persyaratan dalam prosedur dan SNI terkait.</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">2.3</td>
            <td rowspan="2">Sertifikat tidak akan diberikan apabila berdasarkan evaluasi Pihak Pertama sistem manajemen yang diterapkan oleh Pihak Kedua dan hasil uji contoh produk tidak sesuai dengan persyaratan dalam prosedur dan SNI terkait.</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">2.4</td>
            <td rowspan="2">Pihak Kedua harus melaksanakan audit internal sebelum Pihak Pertama melakukan kunjungan pengawasan (survailen).</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">2.5</td>
            <td rowspan="2">Pihak Pertama akan melakukan evaluasi ulang apabila Pihak Kedua membuat perubahan besar terhadap operasinya atau apabila ada perubahan lainnya yang dapat berpengaruh pada hasil produksinya setelah disertifikasi.</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="vertical-align: top;">2.6</td>
            <td rowspan="2">Pihak Kedua harus menyimpan rekaman dokumen terkait dengan keluhan pelanggan dan penanganannya serta rekaman dokumen kepuasan pelanggan.</td>
        </tr>
    </table>

    <p class="text-center mt-3">
        <b>
            Pasal 3 <br>
            Masa Berlaku Sertifikat
        </b>
    </p>

    <table>
        <tr>
            <td style="vertical-align: top;">3.1</td>
            <td>Sertifikat berlaku untuk jangka waktu 4 (empat) tahun selama perusahaan memenuhi seluruh persyaratan sertifikasi produk LSPro-BBK dan SNI terkait terhitung sejak tanggal pemberiannya oleh Pihak Pertama kepada Pihak Kedua, dan sebelum berakhirnya jangka waktu tersebut, Pihak Kedua wajib disertifikasi ulang oleh Pihak Pertama.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">3.2</td>
            <td>Selama berlakunya sertifikat, Pihak Pertama melakukan pengawasan berkala (survailen) kepada Pihak Kedua dalam kurun waktu tidak lebih dari 12 (dua belas) bulan sejak Pihak Kedua disertifikasi dan dalam waktu maksimal 12 (dua belas) bulan untuk kunjungan berikutnya.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">3.3</td>
            <td>Ketidaksesuaian yang ditemukan saat survailen harus ditindaklanjuti Pihak Kedua dalam jangka waktu yang ditentukan.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">3.4</td>
            <td>Bilamana Pihak Kedua tidak dapat menyelesaikan tindakan perbaikan ketidaksesuaian sebagaimana dimaksud diatas dalam jangka waktu yang ditentukan, Pihak Pertama akan mengenakan sanksi berupa penundaan berlakunya sertifikat Pihak Kedua.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">3.5</td>
            <td>Selama periode penundaan, Pihak Kedua tidak boleh membuat pernyataan yang menyesatkan terhadap status sertifikasinya dan tidak boleh menggunakan tanda sertifikasi pada produk yang diproduksi sejak pemberitahuan penundaan.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">3.6</td>
            <td>Bilamana ternyata bahwa Pihak Kedua tidak juga melakukan perbaikan dalam periode penundaan tersebut maka Pihak Pertama dapat mencabut sertifikat yang diberikan kepada Pihak Kedua</td>
        </tr>
    </table>

    <p class="text-center mt-3">
        <b>
            Pasal 4 <br>
            Penyaksian Asesmen
        </b>
    </p>

    <table>
        <tr>
            <td style="vertical-align: top;">4.1</td>
            <td>Selama berlakunya sertifikat, Pihak Pertama melakukan penyaksian secara berkala oleh KAN terhadap kinerja auditor dan petugas pengambil contoh Pihak Pertama saat melaksanakan audit/survailen terhadap Pihak Kedua yang disertifikasi, dalam kurun waktu yang akan ditetapkan kemudian.</td>
        </tr>

        <tr>
            <td style="vertical-align: top;">4.2</td>
            <td>Pihak Pertama mensyaratkan Pihak Kedua untuk menandatangani dokumen kontrak yang membuat komitmennya untuk menerima tim penyaksian KAN untuk menyaksikan auditor dan petugas pengambil contoh Pihak Pertama.</td>
        </tr>
    </table>

    <p class="text-center mt-3">
        <b>
            Pasal 5 <br>
            Biaya
        </b>
    </p>

    <table>
        <tr>
            <td style="vertical-align: top;">5.1</td>
            <td>Pihak Kedua setuju untuk membayar biaya sertifikasi/survailen/penyaksian kepada Pihak Pertama sesuai Lampiran Surat Perjanjian Kontrak.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">5.2</td>
            <td>Biaya dibayarkan sebelum pelaksanaan sertifikasi/survailen.</td>
        </tr>
    </table>

    <p class="text-center mt-3">
        <b>
            Pasal 6 <br>
            Jaminan
        </b>
    </p>

    <p>Dalam melakukan jasa sertifikasi, Pihak Pertama tidak memberikan jaminan bahwa Pihak Kedua akan berhasil memperoleh sertifikat, kecuali Pihak Kedua dapat memenuhi semua persyaratan yang dinyatakan dalam kontrak ini dan prosedur serta SNI terkait.</p>

    <p class="text-center mt-3">
        <b>
            Pasal 7 <br>
            Logo
        </b>
    </p>

    <table>
        <tr>
            <td style="vertical-align: top;">7.1</td>
            <td>Pihak Pertama memberikan hak kepada Pihak Kedua yang telah disertifikasi untuk menerbitkan sertifikat dengan membubuhkan tanda sertifikasi atau logo LSPro-BBK dan Tanda SNI sesuai dengan ruang lingkup sertifikasi yang diberikan Pihak Pertama.Ketentuan mengenai penggunaan logo LSPro-BBK dan Tanda SNI oleh Pihak Kedua diatur dalam Prosedur LSPro-BBK dan Pedoman KAN 403 - 2011.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">7.2</td>
            <td>Pihak Pertama akan mengambil tindakan yang sesuai, bila ternyata Pihak Kedua yang telah disertifikasi menyalahgunakan logo LSPro- BBK dan Tanda SNI.</td>
        </tr>
    
        <tr>
            <td style="vertical-align: top;">7.3</td>
            <td>Pihak Pertama melarang penggunaan logo LSPro-BBK dan Tanda SNI sedemikian rupa, sehingga dapat diinterpretasikan bahwa Pihak Pertama telah menyetujui suatu produk, jasa atau proses yang dihasilkan oleh Pihak Kedua</td>
        </tr>
    </table>

    <p class="text-center mt-3">
        <b>
            Pasal 8 <br>
            Perselisihan
        </b>
    </p>

    <p>Semua sengketa yang timbul dari atau berkenaan dengan kontrak ini yang tidak dapat diselesaikan secara damai dalam waktu 28 (dua puluh delapan) hari setelah sengketa ini diberitahukan secara tertulis oleh Pihak yang satu kepada pihak lainnya, akan diselesaikan menurut prosedur yang ada pada Pihak Pertama.</p>

    <p class="text-center mt-3">
        <b>
            Pasal 9 <br>
            Keadaan Kahar/Force Majeure
        </b>
    </p>

    <p>Force majeure adalah pelaksanaan undang-undang, peraturan-peraturan atau instruksi-instruksi yang dikeluarkan oleh pemerintah Republik Indonesia, kebakaran, ledakan, banjir, gempa bumi, badai, peperangan, huru-hara, keributan, blokade, perselisihan perburuhan, pemogokan, wabah penyakit yang secara langsung berhubungan dengan perjanjian ini.</p>

    <p>Jika Pihak Pertama dan/atau Pihak Kedua merasa terhambat di dalam melaksanakan pekerjaan oleh karena adanya Force Majeure, maka Pihak Kedua harus segera melaporkan kepada Pihak Pertama atau sebaliknya secara tertulis selambat-lambatnya 7 (tujuh) hari kalender setelah kejadian sehingga masingmasing pihak dapat mengatasi keadaan, dan penundaan pekerjaan dapat ditekan ke tingkat minimum.</p>

    <p class="text-center mt-3">
        <b>
            Pasal 10 <br>
            Lain-lain
        </b>
    </p>

    <table>
        <tr>
            <td style="vertical-align: top;" width="10%">10.1</td>
            <td>Hal lain yang belum diatur dalam kontrak ini, apabila dipandang perlu akan diatur kemudian melalui kesepakatan.</td>
        </tr>

        <tr>
            <td style="vertical-align: top;">10.2</td>
            <td>Kontrak ini berlaku sejak tanggal ditandatangani oleh kedua belah pihak.</td>
        </tr>
    </table>

    <br>
    <br>
    <p class="text-right">Bandung, {{ $tgl_pembuatan->isoFormat('LL') }}</p>
    <br>

    <table width="100%">
        <tr style="text-align: center;">
            <td width="50%">
                Pihak Kedua <br>
                {{ $user->nama_perusahaan }} <br><br><br><br><br><br><br>
                {{ $user->pimpinan_perusahaan }}
            </td>
            <td width="50%">
                Pihak Pertama <br>
                LSPro - BBK <br><br><br><br><br><br><br>
                Gunawan
            </td>
        </tr>
    </table>

    <br><br><br><br><br><br>

    <p class="mt-5"><b>LAMPIRAN SURAT PERJANJIAN KONTRAK</b></p>
    {{-- <p class="small_txt mb-4" style="margin-top: -10px;">Nomor: ...........................</p> --}}
    <p class="small_txt mb-4" style="margin-top: -10px;">Nomor: {{ $no_surat }}</p>
    
    <ol>
        <li>Biaya sertifikasi produk untuk tanda SNI (SPPT SNI) dalam rangka sertifikasi awal {{ $user->nama_perusahaan }} adalah sebesar Rp. {{ number_format($biaya_sert, 0, ',', '.') }}, ({{ $harga_terbilang }}) untuk 1 (satu) lokasi dan 1 (satu) sertifikat SPPT SNI.</li>
        <li>Biaya survailen akan ditetapkan sebelum pelaksanaan survailen dimulai.</li>
        <li>Biaya tersebut di atas belum termasuk biaya pengujian contoh uji. Jumlah yang harus dibayarkan untuk biaya contoh uji sesuai dengan ketentuan laboratorium uji yang ditunjuk LSPro-BBK.</li>
        <li>Transportasi dan akomodasi tim audit serta biaya pengiriman contoh uji disediakan langsung oleh perusahaan</li>
        <li>LSPro-BBK akan melakukan pengambilan contoh pada saat asesmen awal dan setiap pelaksanaan pengawasan (survailen).</li>
    </ol>

    <br>
    <br>
    <br>


    <p class="text-center float-right">
        Bandung, {{ $tgl_pembuatan->isoFormat('LL') }} <br>
        Kepala LSPro-BBK <br><br><br><br><br>
        Gunawan
    </p>


</div>

@endsection
