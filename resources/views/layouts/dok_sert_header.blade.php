<!DOCTYPE html>
<html>

<head>

    <title>@yield('card-header-dok')</title>
    <link rel="stylesheet" href="https://use.typekit.net/sfl8mhp.css">

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
            font-size: 14px;
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
</head>

<body>

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


    <div style="text-align: justify">
        @yield('content_dok_sert')
    </div>

</body>


</html>
