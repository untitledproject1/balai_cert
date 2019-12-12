<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Super Admin Sistem Pengelolaan Sertifikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon/logo-polos.ico') }}">
    <!-- jquery latest version -->
    <script src="{{ asset('js/superAdmin/jquery-2.2.4.min.js') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/superAdmin/font-awesome.min.css') }}">
    <script src="https://kit.fontawesome.com/aef3211dfe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/superAdmin/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> 
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('css/superAdmin/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('js/superAdmin/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- preloader area end -->
    <!-- page container area start -->
    
    <!-- Content Here -->
    @yield('main-super-admin')
    
    <!-- bootstrap 4 js -->
    <script src="{{ asset('js/superAdmin/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/superAdmin/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/superAdmin/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/superAdmin/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('js/superAdmin/line-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('js/superAdmin/plugins.js') }}"></script>
    <script src="{{ asset('js/superAdmin/scripts.js') }}"></script>

    <script type="text/javascript">
        //Navbar scrolled
        $(window).scroll(function() {
        $('.page-title-area').toggleClass('page-title-area-scrolled', $(this).scrollTop() > 50);
    });
        
        
    </script>
</body>

</html>
