<style type="text/css">
    /*
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-top: 1cm;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.1);
        }

        page[size="A4"] {
            width: 21cm;
            height: auto;
            padding: 20px 40px 300px 40px;
        }
*/



    body {
        font-family: 'Arial', sans-serif;
        font-size: 15px;
    }

    page img {
        width: 200px;
        height: auto;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        color: #000;
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


    .header h1 {
        margin: 0;
    }

    .small_txt {
        font-size: 13px;
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

    td {
        vertical-align: top;
    }



    /* Checkbox */
    /* The container */
    .container {
        display: block;
        position: relative;
        padding-left: 25px;
        margin-bottom: 5px;
        cursor: pointer;
        font-size: 15px -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 16px;
        width: 16px;
        background-color: #BDBDBD;
        border: 1px solid black;
    }

    /* When the checkbox is checked, add a blue background */
    .container .checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container .checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

</style>



@section('card-header-dok', 'Closed NCR')

<table width="100%" style="margin-top: -30px;">
    <tr>
        <td width="25%" class="text-center"><img style="width: 80px;" src="{{ asset('images/balai-besar-keramik.png') }}" alt=""></td>
        <td width="50%" class="text-center p-5">
            <p style="padding-bottom: -15px"><b>LAPORAN AUDIT</b></p>
            <hr width="50%"> <i>
                <p style="padding-top: -15px"><b><i>(AUDIT REPORT)</i></b></p>
            </i>
        </td>
        <td width="25%" class="text-right">F.04.08 Rev.1</td>
    </tr>
</table>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: -10px;">
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%">Nama Perusahaan <p class="small_txt" style="margin: 0;"><i>(Company Name)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td>{{ $user->nama_perusahaan }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%">Alamat Perusahaan <p class="small_txt" style="margin: 0;"><i>(Company Address)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td>{{ $user->alamat_perusahaan }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%">Alamat Pabrik <p class="small_txt" style="margin: 0;"><i>(Factory Address)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td>{{ $user->alamat_pabrik }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%"><i>Contact Person / E-mail</i></td>
                    <td width="5%">:</td>
                    <td>{{ $user->email_perusahaan }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td>Jumlah karyawan <p class="small_txt" style="margin: 0;"><i>(amount of employee)</i></p>
        </td>
        <td width="5%" class="text-center">:</td>
        <td width="25%">{{ $user->jumlah_karyawan }}</td>
        <td rowspan="2" width="20%">Jumlah realisasi produksi <p class="small_txt" style="margin: 0;"><i>(amount of product realization)</i></p>
        </td>
        <td rowspan="2" width="5%" class="text-center">:</td>
        <td rowspan="2"></td>
    </tr>
    <tr>
        <td>Kapasitas produksi <p class="small_txt" style="margin: 0;"><i>(production capacity)</i></p>
        </td>
        <td class="text-center">:</td>
        <td>..</td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse;">
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%">Nama Importir <p class="small_txt" style="margin: 0;"><i>(Importer)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%">Alamat Importir <p class="small_txt" style="margin: 0;"><i>(Importer Address)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%"><i>Contact Person / E-mail</i></td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="30%">Tanggal Audit<i>(Date of Audit)</i></td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse;">
    <tr>
        <td colspan="2" style="background: #eee" class="text-center">Sertifikasi Produk <i>(Product Certification)</i></td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="25%">No. Ref. <p class="small_txt" style="margin: 0;"><i>(Ref. Number)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td width="20%">.. / ..</td>
                </tr>
            </table>
        </td>
        <td rowspan="2" width="70%">
            <table width="100%">
                <tr>
                    <td width="20%">Tipe Audit <p class="small_txt" style="margin: 0;"><i>(Type of Audit)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td>
                        <label class="container">Sertifikasi Awal <i>(Initial Certification)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Surveilan ke ... <i>( … Surveillance)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Sertifikasi Ulang <i>(Recertification)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Perluasan Ruang Lingkup <i>(Expanding Scope)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Audit tambahan <i>(additional audit)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Lain-lain <i>(others): …..</i>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="25%">Standard Acuan <p class="small_txt" style="margin: 0;"><i>(Reference Standard)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td width="20%">..</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%">
                <tr>
                    <td width="50%">Skema Sertifikasi LSPro BBK/Regulasi Teknis <p class="small_txt" style="margin: 0;"><i>(LSPro BBK Certification Scheme/Technical Regulation)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td width="30%"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%">
                <tr>
                    <td width="30%">Lingkup Sertifikasi Produk <p class="small_txt" style="margin: 0;"><i>(Scope of Product Certification)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td width="30%"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse;">
    <tr>
        <td colspan="2" style="background: #eee" class="text-center">Sertifikasi Sistem Manajemen Mutu <i>(Quality Management System Certification)</i></td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="25%">No. Ref. <p class="small_txt" style="margin: 0;"><i>(Ref. Number)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td width="20%">.. / ..</td>
                </tr>
            </table>
        </td>
        <td rowspan="2" width="70%">
            <table width="100%">
                <tr>
                    <td width="20%">Tipe Audit <p class="small_txt" style="margin: 0;"><i>(Type of Audit)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td>
                        <label class="container">Sertifikasi Awal <i>(Initial Certification)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Surveilan ke ... <i>( … Surveillance)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Sertifikasi Ulang <i>(Recertification)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Perluasan Ruang Lingkup <i>(Expanding Scope)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Audit tambahan <i>(additional audit)</i>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Lain-lain <i>(others): …..</i>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="25%">Standard Acuan <br> <i>(Reference Standard)</i></td>
                    <td width="5%">:</td>
                    <td width="20%">..</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%">
                <tr>
                    <td width="50%">Lingkup Sertifikasi Sistem Manajemen Mutu <p class="small_txt" style="margin: 0;"><i>(Scope of Quality Management System Certification)</i></p>
                    </td>
                    <td width="5%">:</td>
                    <td width="30%">..</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- =============================================================================== -->

<table width="100%" style="margin-top: -30px;">
    <tr>
        <td width="25%" class="text-center"><img style="width: 80px;" src="{{ asset('images/balai-besar-keramik.png') }}" alt=""></td>
        <td width="50%" class="text-center p-5">
            <p style="padding-bottom: -15px"><b>LAPORAN AUDIT</b></p>
            <hr width="50%"> <i>
                <p style="padding-top: -15px"><b><i>(AUDIT REPORT)</i></b></p>
            </i>
        </td>
        <td width="25%" class="text-right">F.04.08 Rev.1</td>
    </tr>
</table>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: -10px;">
    <tr>
        <td class="text-center" style="background: #eee">Tim Audit <span class="small_txt"><i>(Audit Team)</i></span></td>
        <td colspan="2" class="text-center" style="background: #eee">Tanda tangan <span class="small_txt"><i>(sign)</i></span></td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="45%">1. Ketua <span class="small_txt"><i>(Leader)</i></span>
                    </td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
        <td rowspan="2">1.</td>
        <td rowspan="2" style="vertical-align: bottom;">2.</td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="45%">2. Anggota <span class="small_txt"><i>(Member)</i></span>
                    </td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="45%">3. Anggota <span class="small_txt"><i>(Member)</i></span></td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
        <td rowspan="2">3.</td>
        <td rowspan="2" style="vertical-align: bottom;">4.</td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="45%">4. PPC <span class="small_txt"><i>(Sampling Officer)</i></span></td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse:collapse">
    <tr>
        <td style="background: #eee">Tujuan Audit <span class="small_txt"><i>(audit objectives)</i></span></td>
    </tr>
    <tr>
        <td style="padding-top: -15px; padding-bottom: -15px;">
            <ol>
                <li>Menentukan kesesuaian sistem manajemen dengan kriteria audit. <span class="small_txt"><i>(Determination of the conformity of the management system with audit criteria)</i></span></li>
                <li>Evaluasi kemampuan sistem manajemen untuk memastikan bahwa sistem tersebut memenuhi persyaratan hukum, peraturan dan kontrak yang berlaku. <span class="small_txt"><i>(Evaluation of the ability of the management system to ensure that it meets the applicable statutory, regulatory and contractual requirements)</i></span></li>
                <li>Evaluasi efektivitas sistem manajemen untuk memastikan organisasi klien terus-menerus memenuhi tujuan yang ditentukan. <span class="small_txt"><i>(Evaluation of the effectiveness of the management system to ensure the client organization is continually meeting its specified objectives)</i></span></li>
            </ol>
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: -10px;">
    <tr>
        <td colspan="2" style="background: #eee"><b>Perubahan signifikan yang terjadi sejak audit terakhir <span class="small_txt"><i>(Significant changes which took place since the last audit)</i></span></b></td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">Sistem manajemen/informasi terdokumentasi <span class="small_txt"><i>(Management System/documented information)</i></span>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table width="100%">
                <tr>
                    <td>
                        <label class="container">Tidak (none)
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Ya (yes):
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">Ruang lingkup sertifikasi <span class="small_txt"><i>(scope certification)</i></span>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td>
                        <label class="container">Tidak (none)
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Ya (yes):
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">Jumlah karyawan <span class="small_txt"><i>(number of employees)</i></span></td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td>
                        <label class="container">Tidak (none)
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Ya (yes):
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="40px">
            <table width="100%">
                <tr>
                    <td width="50%">Lain-lain <span class="small_txt"><i>(Others)</i></span></td>
                </tr>
            </table>
        </td>
        <td width="50%" class="pl-3">

        </td>
    </tr>
</table>

<table width="100%" border="1" style="border-collapse: collapse; padding-top: 10px;">
    <tr>
        <td colspan="2" style="background: #eee"><b>Hal-hal khusus dalam audit <span class="small_txt"><i>(Particularities of this audit)</i></span></b></td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">Penyimpangan dari rencana audit dan alasannya <span class="small_txt"><i>(Any deviation from the audit plan and their reasons)</i></span>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td>
                        <label class="container">Tidak (none)
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Ya (yes):
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">Masalah signifikan yang berdampak pada program audit <span class="small_txt"><i>(Significant issues impacting on audit programme)</i></span>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td>
                        <label class="container">Tidak (none)
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Ya (yes):
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">Masalah yang belum terselesaikan, jika teridentifikasi <span class="small_txt"><i>(Any unresolved issues, if identified)</i></span></td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td>
                        <label class="container">Tidak (none)
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Ya (yes):
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="40px">
            <table width="100%">
                <tr>
                    <td width="50%">Lain-lain <span class="small_txt"><i>(Others)</i></span></td>
                </tr>
            </table>
        </td>
        <td width="50%" class="pl-3">

        </td>
    </tr>
</table>

<br><br><br><br><br><br><br><br>

<!-- ============================================================================================================== -->

<table width="100%" style="margin-top: -30px;">
    <tr>
        <td width="25%" class="text-center"><img style="width: 80px;" src="{{ asset('images/balai-besar-keramik.png') }}" alt=""></td>
        <td width="50%" class="text-center p-5">
            <p style="padding-bottom: -15px"><b>LAPORAN AUDIT</b></p>
            <hr width="50%"> <i>
                <p style="padding-top: -15px"><b><i>(AUDIT REPORT)</i></b></p>
            </i>
        </td>
        <td width="25%" class="text-right">F.04.08 Rev.1</td>
    </tr>
</table>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td width="20%" style="background: #eee" class="text-center">LKS No. (NCR)</td>
        <td width="25%" style="background: #eee" class="text-center">Auditor</td>
        <td style="background: #eee" class="text-center">Kegiatan / Departemen <span class="small_txt"><i>(Activity / Department)</i></span></td>
    </tr>
    <tr>
        <td height="50px" class="text-center"><b>1 dari (of) …</b></td>
        <td class="text-center">..</td>
        <td class="text-center">..</td>
    </tr>
    <tr>
        <td height="170px" colspan="3">Rincian Ketidaksesuaian <span class="small_txt"><i>(Description of Nonconfomity)</i></span>: <br> .. <br><br></td>
    </tr>
    <tr>
        <td width="20%" style="background: #eee" class="text-center">Klausul Ketidaksesuaian <span class="small_txt"><i>(Nonconformity Clause)</i></span></td>
        <td width="25%" style="background: #eee" class="text-center">Kategori <br> <span class="small_txt"><i>(Category of Nonconformity)</i></span></td>
        <td style="background: #eee" class="text-center">Target tanggal penyelesaian <br> <span class="small_txt"><i>(Target completion date)</i></span></td>
    </tr>
    <tr>
        <td class="text-center">..</td>
        <td class="text-center">Major / Minor</td>
        <td class="text-center">..</td>
    </tr>
    <tr>
        <td colspan="3">
            <table width="100%">
                <tr>
                    <td width="20%">Analisis Penyebab <br> <span class="small_txt"><i>(Analysis of Cause)</i></span></td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="70%" height="80px" colspan="2">
            <table width="100%">
                <tr>
                    <td width="28%">Koreksi <br> <span class="small_txt"><i>(Correction)</i></span></td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </td>
        <td class="text-center">
            Bukti <span class="small_txt"><i>(Evidence)</i></span>: <br> ..
        </td>
    </tr>
    <tr>
        <td width="70%" height="80px" colspan="2">
            <table width="100%">
                <tr>
                    <td width="28%">Tindakan korektif <br> <span class="small_txt"><i>(Corrective Action)</i></span></td>
                    <td width="5%">:</td>
                    <td>..</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </td>
        <td class="text-center">
            Bukti <span class="small_txt"><i>(Evidence)</i></span>: <br> ..
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: -10px;">
    <tr>
        <td colspan="2" style="background: #eee" class="text-center"><b>Verifikasi Auditor <span class="small_txt"><i>(Auditor Verification)</i></span></b></td>
    </tr>
    <tr>
        <td rowspan="2">
            <table width="100%">
                <tr>
                    <td width="50%">Uraian <span class="small_txt"><i>(Description)</i> :</span> <br> ..
                    </td>
                </tr>
            </table>
        </td>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="50%">LKS ditutup</td>
                    <td>:</td>
                    <td>Ya / Tidak</td>
                </tr>
                <tr>
                    <td><span class="small_txt"><i>NCR is closed out </i></span></td>
                    <td></td>
                    <td><span class="small_txt"><i>Yes / No</i></span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="50%">Tanggal penyelesaian</td>
                    <td>:</td>
                    <td>.. / .. / 20..</td>
                </tr>
                <tr>
                    <td><span class="small_txt"><i>(Completion date) </i></span></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br>

<!-- ===================================================================================================== -->

<table width="100%" style="margin-top: -30px;">
    <tr>
        <td width="25%" class="text-center"><img style="width: 80px;" src="{{ asset('images/balai-besar-keramik.png') }}" alt=""></td>
        <td width="50%" class="text-center p-5">
            <p style="padding-bottom: -15px"><b>LAPORAN AUDIT</b></p>
            <hr width="50%"> <i>
                <p style="padding-top: -15px"><b><i>(AUDIT REPORT)</i></b></p>
            </i>
        </td>
        <td width="25%" class="text-right">F.04.08 Rev.1</td>
    </tr>
</table>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td style="background: #eee"><b>Observasi <span class="small_txt"><i>(Observation)</i></span></b></td>
    </tr>
    <tr>
        <td class="pl-4" style="height: 50px; padding-bottom: 100px">1.</td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td style="background: #eee"><b>Ringkasan Audit <span class="small_txt"><i>(Audit Summary)</i></span> :</b></td>
    </tr>
    <tr>
        <td class="pl-4" style="padding-bottom: 80px">..</td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: -10px;">
    <tr>
        <td colspan="2" style="background: #eee" class="text-center"><b>Status Laporan Ketidaksesuaian <span class="small_txt"><i>(Status of Nonconformity Report)</i></span></b></td>
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="50%">LKS audit sebelumnya yang sudah diverifikasi <br> <span class="small_txt"><i>(Previous NCr that has been verified)</i></span>
                    </td>
                </tr>
            </table>
        </td>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="50%">LKS saat ini <br> <span class="small_txt"><i>(Outstanding Nonconformity)</i></span> </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="30%">Major</td>
                    <td width="5%">:</td>
                    <td>.. (..)</td>
                </tr>
            </table>
        </td>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="30%">Major</td>
                    <td width="5%">:</td>
                    <td>.. (..)</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="30%">Minor</td>
                    <td width="5%">:</td>
                    <td>.. (..)</td>
                </tr>
            </table>
        </td>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="30%">Minor</td>
                    <td width="5%">:</td>
                    <td>.. (..)</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="30%">Total</td>
                    <td width="5%">:</td>
                    <td>.. (..)</td>
                </tr>
            </table>
        </td>
        <td width="50%" class="pl-2">
            <table width="100%">
                <tr>
                    <td width="30%">Total</td>
                    <td width="5%">:</td>
                    <td>.. (..)</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td style="background: #eee"><b>Kesimpulan Audit <span class="small_txt"><i>(Audit Conclusion)</i></span> :</b></td>
    </tr>
    <tr>
        <td class="pl-4" style="padding-bottom: 80px">..</td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td style="background: #eee"><b>Pernyataan penolakan <span class="small_txt"><i>(disclaimer statement)</i></span> :</b></td>
    </tr>
    <tr>
        <td class="pl-2">Audit berdasarkan pada proses pengambilan sampel dari informasi yang tersedia. Setiap rekomendasi audit berdasar pada tinjauan independen sebelum keputusan tentang pemberian atau pembaruan sertifikasi. <span class="small_txt"><i>(Auditing is based on a sampling process of the available information. Any audit recommendations are subject to an independent review prior to a decision concerning the awarding or renewal of certification).</i></span></td>
    </tr>
</table>

<br><br><br><br><br><br><br><br><br><br><br>

<!-- ======================================================================================================================= -->

<table width="100%" style="margin-top: -30px;">
    <tr>
        <td width="25%" class="text-center"><img style="width: 80px;" src="{{ asset('images/balai-besar-keramik.png') }}" alt=""></td>
        <td width="50%" class="text-center p-5">
            <p style="padding-bottom: -15px"><b>LAPORAN AUDIT</b></p>
            <hr width="50%"> <i>
                <p style="padding-top: -15px"><b><i>(AUDIT REPORT)</i></b></p>
            </i>
        </td>
        <td width="25%" class="text-right">F.04.08 Rev.1</td>
    </tr>
</table>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td style="background: #eee"><b>Tambahan <span class="small_txt"><i>(additional remarks)</i></span> :</b></td>
    </tr>
    <tr>
        <td class="pl-2">
            <ol>
                <li>Lembaga Sertifikasi akan diberitahu oleh klien tanpa penundaan semua perubahan yang dapat berdampak pada kemampuan sistem manajemen untuk terus memenuhi persyaratan standar yang relevan sekarang dan di masa depan. <span class="small_txt"><i>(The Certification Body shall be notified by the client without delay of all changes that may impact on the management system's capability to continue to fulfil the requirements of the relevant standard now and in the future)</i></span></li>
                <li>Lembaga Sertifikasi akan memperlakukan semua informasi yang terdokumentasi yang diterima terkait dengan proses sertifikasi sebagai suatu rahasia. <span class="small_txt"><i>(The Certification Body will treat all received documented information related to the certification process as strictly confidential)</i></span></li>
            </ol>
        </td>
    </tr>
</table>

<br>

<table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <td colspan="2" class="text-center pt-2 pb-2">Tanggal <span class="small_txt"><i>(Date)</i></span> : ................................ 20..</td>
    </tr>
    <tr>
        <td class="text-center">
            Diketahui oleh <span class="small_txt"><i>(Known by),</i></span> <br>
            Wakil Perusahaan <span class="small_txt"><i>(Company Representatives)</i></span> <br><br><br><br><br>
            .................................
        </td>
        <td class="text-center">
            Dilaporkan oleh <span class="small_txt"><i>(Reported by),</i></span> <br>
            Ketua Tim Audit <span class="small_txt"><i>(Audit Team Leader)</i></span> <br><br><br><br><br>
            .................................
        </td>
    </tr>
</table>
