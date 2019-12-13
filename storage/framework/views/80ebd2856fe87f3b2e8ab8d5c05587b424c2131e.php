<!DOCTYPE html>
<html>

<head>

    <title><?php echo $__env->yieldContent('card-header-dok'); ?></title>

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
            vertical-align: top
        }

    </style>
</head>

<body>

    <div class="header">
        <table>
            <tr>
                <td width="25px;">
                    <img style="width: 160px; padding-top: 0;" src="<?php echo e(asset('images/kemenperin-logo.png')); ?>" alt="...">
                </td>
                <td class="text-center">
                    BADAN PENELITIAN DAN PENGEMBANGAN INDUSTRI <br>
                    <h1><b>BALAI BESAR KERAMIK</b></h1>
                    <p class="small_txt" style="padding-top: -10px; padding-bottom: -10px;">
                        Jln. Jend. A. Yani No. 392 Bandung 40272 Telp. (022) 7206221, 7207115, 7206296
                        Fax. (022) 7205322, E-mail : keramik@bbk.go.id, lspcencera@yahoo.com
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <hr class="hr_dok_bold">
    <hr class="hr_dok_bold_scnd">


    <div style="text-align: justify">
        <?php echo $__env->yieldContent('content_dok'); ?>
    </div>

</body>


</html>
<?php /**PATH /var/www/html/balai-cert/resources/views/layouts/dok_header.blade.php ENDPATH**/ ?>