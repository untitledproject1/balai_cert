<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Super Admin Sistem Pengelolaan Sertifikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon/logo-polos.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/superAdmin/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/superAdmin/font-awesome.min.css') }}">
    <script src="https://kit.fontawesome.com/aef3211dfe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/superAdmin/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superAdmin/slicknav.min.css') }}">
    <!-- Data Table -->
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
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
    <div class="d-none d-md-block d-lg-block d-xl-block">
        @yield('main-super-admin')
    </div>

    <!-- Active When Mobile View -->
    <div class="d-sm-block d-md-none">
        <div class="mobile_view text-center">
            <img src="{{ asset('images/mobile_view.png') }}" alt="">
            <p class="header_txt">Mohon maaf, website ini tidak tersedia untuk perangkat anda.</p>
            <p class="small_txt">Silahkan akses menggunakan <b>Laptop</b> atau <br> <b>PC (personal computer)</b>.</p>
        </div>
    </div>

    <!-- jquery latest version -->
    <script src="{{ asset('js/superAdmin/jquery-2.2.4.min.js') }}"></script>

    <!-- bootstrap 4 js -->
    <script src="{{ asset('js/superAdmin/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/superAdmin/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/superAdmin/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/superAdmin/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/superAdmin/jquery.slicknav.min.js') }}"></script>
    
    <!-- others plugins -->
    <script src="{{ asset('js/superAdmin/plugins.js') }}"></script>
    <script src="{{ asset('js/superAdmin/scripts.js') }}"></script>

    <!-- Data Table -->
    <script src="{{ url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js') }}"></script>

     <!-- Sweet Alert -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script> 

    <script type="text/javascript">
        //Navbar scrolled
        $(window).scroll(function() {
            $('.page-title-area').toggleClass('page-title-area-scrolled', $(this).scrollTop() > 50);
        });

        //Datatables
        $('#example').DataTable( {
            "paging":   false,
            "info":     false
        } );

    </script>


</body>

</html>
