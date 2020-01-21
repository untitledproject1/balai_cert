<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script> 

    <!-- Scripts -->
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-messaging.js"></script>
    {{-- <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-auth.js"></script> --}}

    <link type="image/png" rel="icon" href="{{ asset('images/icon/logo-polos.ico') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
    <!-- Font Awesome -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!-- Data Table -->
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
    <!-- ====== BS-Stepper ====== -->
    <link rel="stylesheet" href="{{ asset('css/progress-wizard.min.css') }}">
    <!-- Datepicker -->
   <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
   <script src="{{ asset ('js/datepicker.min.js') }}"></script>
   <script src="{{ asset ('js/i18n/datepicker.en.js') }}"></script>
    <!-- International Tel Input -->
    <link type="text/css" rel="stylesheet" href="{{ asset('intl-tel-input-16/build/css/intlTelInput.css') }}">

    <title>Sistem Pengelolaan Sertifikasi</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Balai Besar Keramik') }}</title>

    <style type="text/css">
        .modal-lg {
            max-width: 90% !important;
        }

        .slim-table td,
        .slim-table th {
            padding: 5px;
        }

        .hid {
            display: none;
        }
    </style>

    <script>
        window.Laravel = {!! json_encode([
            'user' => Auth::user(),
            'csrfToken' => csrf_token(),
            'vapidPublicKey' => config('webpush.vapid.public_key'),
            'pusher' => [
                'key' => config('broadcasting.connections.pusher.key'),
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            ],
        ]) !!};
    </script>
</head>

<body style="background: #F9F9FB;">

    <!-- Notif Toast -->
    <div id="toast-notif" class="toast-container">
        
        <div id="toast-single" class="toast toast-notif mt-3 mr-3" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
          <div class="toast-header">
            <img style="width: 25px;" src="{{ asset('images/icon/logo-polos.ico') }}" alt="...">
            <strong class="mr-auto ml-2 toast-notif-title"></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
              <p class="toast-notif-text"></p>
          </div>
        </div>
    </div>

    <div class="d-none d-md-block d-lg-block d-xl-block">
        <div class="prUpload"></div>
        <div class="preloader">
            <div class="loading">
                <img src="{{ asset('images/preloader.gif') }}" width="80">
                <p>Harap Tunggu</p>
            </div>
        </div> 

        <div id="app">
            <div class="{{ isset($userAuth) && $role != 'client' ? : '' }}">

                @yield('content-navbar')

            </div>
        </div>
    </div>

    <!-- Active When Mobile View -->
    <div class="d-sm-block d-md-none">
        <div class="text-center pl-5 pr-5 pt-4">
            <div class="align-self-center">
                <img class="img-fluid pt-4" style="width: 200px;" src="{{ asset('images/Logo.svg') }}" alt="">
                <img class="img-fluid pt-5" src="{{ asset('images/person-handshake.png') }}" alt="">
                <br>
                <br>
                <a href="#"><img class="img-fluid pt-5" style="width: 200px;" src="{{ asset('images/googleplay.png') }}" alt=""></a>
            </div>
        </div>
    </div>

    {{-- @auth
    <script src="{{ asset('js/enable-push.js') }}"></script>
    @endauth --}}

    @auth
    {{-- <script src="{{ asset('js/enable-push.js') }}"></script> --}}
    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script type="text/javascript" src="{{ asset('js/push.js') }}"></script>
    @endauth

    <!-- Data Table -->
    <script src="{{ url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Nomor Telepon -->
    <script src="{{ asset('intl-tel-input-16/build/js/intlTelInput.js') }}"></script>

    <!-- Font Awesome -->
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/Jsscript.js') }}"></script>

    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    
    <script type="text/javascript">
        $('#toast-single').hide();
        
     // Datepicker
        $('.datepicker-here').datepicker({
            todayButton: new Date(),
            clearButton: true,
            autoClose: true,
        });
        
        $('.minDate').datepicker({
            todayButton: new Date(),
            clearButton: true,
            autoClose: true,
            minDate: new Date()
        });

        
        $( "#slide" ).click(function() {
            $( "#sidebar-wrapper" ).animate({
                 width:"toggle"
            // Animation complete.
            });
        });

        // Preloader
        $(document).ready(function() {
            $(".preloader").fadeOut();

            $('#example').DataTable();

            // Back To Top Button
            var btn = $('#button_to_top');
            $(window).scroll(function() {
                if ($(window).scrollTop() > 300) {
                    btn.addClass('show');
                } else {
                    btn.removeClass('show');
                }
            });

            btn.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, '300');
            });
            
            
            // Smooth scrollspy
            $("#save a[href^='#']").on('click', function(e) {

                // prevent default anchor click behavior
                e.preventDefault();

                // store hash
                var hash = this.hash;

                // animate
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                    }, 1000, function(){

                    // when done, add hash to url
                    // (default click behaviour)
                    window.location.hash = hash;
                    });

                });
            

            // Format mata uang.
            $( '.bpText' ).mask('000.000.000.000.000.000', {reverse: true});

            // Format nomor HP.
            $( '.no_hp' ).mask('0000−0000−0000');

            // Format tahun pelajaran.
            $( '.tapel' ).mask('0000/0000');

        });

        // toggle sidebar
        // Menu Toggle Script
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    
        // Toast
        $('.toast').toast('show')


        // Input File
        $('.custom-file-input').change(function(e) {
            var fileName = e.target.files[0].name;
            $(this).parent().find('.custom-file-label').html(fileName);
        });

        $('.reset_btn').click(function() {
            $.each($('.custom-file-label'), function(index, value) {
                $(this).html('Pilih File..');
            });
        });

        $('.reset_btn_regis').click(function() {
            $.each($('.custom-file-label'), function(index, value) {
                $(this).html('Pilih File..');
            });
        });


        // Nomor Telepon
        var input = document.querySelector("#phone");
        window.intlTelInput(input);
        window.intlTelInputGlobals.loadUtils("intl-tel-input-16/build/js/utils.js");
        
        intlTelInput(input, {
            initialCountry: "auto",
            
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    success(countryCode);
                });
            },
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                return "" + selectedCountryPlaceholder;
            },
            utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
        
    </script>

    <script type="text/javascript">
        function ajaxUpload(ajaxUrl, fileInput, kuisFileName = false, tinjauanPP = false, manufaktur = false) {
            var xhr = new XMLHttpRequest();
            var form_dataSupport = !! (xhr && ('upload' in xhr) && ('onprogress' in xhr.upload))
            if (!form_dataSupport && !(window.FileReader && window.File && window.FileList && window.Blob)) {
                swal("Tidak dapat memproses file!", "Harap update browser anda!", "error");
                return false;
            }
            var formData = new FormData();
            var fileU = fileInput[0].files[0];
            // console.log(fileU);
            // return false;
            var fileSize = fileU.size / 1024 / 1024; // file size dalam MB;
            var extFile = ['.jpg', '.jpeg', '.png', '.doc', '.docx', '.pdf'];
            var re = /(\.jpg|\.jpeg|\.doc|\.docx|\.png|\.pdf)$/i;

            if (fileSize > 5) {
                swal("Tidak dapat memproses file!", "Ukuran file tidak boleh lebih dari 2 megabytes!", "error");
                return false;
            }
            // if (fileU.type != 'application/pdf') {
            if (!re.exec(fileU.name)) {
                var msg = '';
                for (var i = 0; i < extFile.length; i++) {
                    msg +=extFile[i]+', ';
                }
                swal("Tidak dapat memproses file!", "Extensi file yang di perbolehkan: "+msg, "error");
                return false;
            }

            var elem = fileInput.parent();
            $('.prUpload').html('<div class="preloader-upload"><div class="loading"><center><img style="width: 80px" src="{{ asset('images/upload_file.svg') }}"><h3 style="color: #000;">Sedang memproses file.....</h3></center></div></div>');
            $('.prUpload').show();
            elem.find('.resUpload').text('');

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('produk_id', {{ !isset($idProduk) || is_null($idProduk) ? 'null' : $idProduk }});
            formData.append('user', {{ 
                isset($role) && $role == 'sertifikasi' ? (isset($user) ? $user->id : null) : (isset($userAuth) ? $userAuth->id : null) 
            }});
            formData.append('file', fileU);
            var fieldName = elem.find('.fileName').val().split(',');
            formData.append('fieldName', fieldName[0]);
            if (kuisFileName) {
                formData.append('kuisFileName', fieldName[1]);
                formData.append('kuisDirect', fieldName[2]);
            }
            if (tinjauanPP) {
                formData.append('tinjauanPP_id', {{ !isset($laporanAudit) || is_null($laporanAudit) ? 'null' : $laporanAudit->tinjauan_pp_id }});
            }
            $.ajax({
               url : window.location.origin+'/'+ajaxUrl,
               type : 'POST',
               data : formData,
               enctype : 'multipart/form-data', 
               processData: false,  // tell jQuery not to process the data
               contentType: false,  // tell jQuery not to set contentType
               success : function(data) {
                    setTimeout(function(){
                        $(".prUpload").fadeOut();
                        if (data.success) {
                            elem.find('.resUpload').text('File berhasil diupload!');
                            
                            if (data.audit) {
                                $('#btn_submit_audit').show();
                                $('#btn_submit_shu').show();
                            }
                        } else {
                            swal("Tidak dapat memproses file!", data.data, "error");
                            elem.find('.resUpload').text('');
                        }
                    }, 1500);
               },
               error : function(err) {
                    alert(err.responseText);
                    $(".prUpload").fadeOut();
                    elem.find('.resUpload').text('');
                    // console.log(err.responseText);
               }
            });
        }

        $('.saUpload').on('input', function() {
            ajaxUpload('async_sa_upload', $(this), false, true);
        });

        $('.kuisUpload').on('input', function() {
            ajaxUpload('async_kuis_upload', $(this), true);
        });

        $('.bHasilUpload').on('input', function() {
            ajaxUpload('async_bHasil_upload', $(this), true);
        });

        $('.tinjauanPP_upload').on('input', function() {
            ajaxUpload('async_tinjauanPP_upload', $(this), false, true);
        });

        $('.auditUpload').on('input', function() {
            ajaxUpload('async_audit_upload', $(this));
        });

        $('.shuUpload').on('input', function() {
            ajaxUpload('async_shu_upload', $(this));
        });

        function simpanBtn(fileInput, textInput, form) {
            $('#form_action').val('true');
            ValidateSize(fileInput, textInput, form, '.validMsg');
        };

        function submitBtn(fileInput, textInput, form) {
            $('#form_action').val('false');
            ValidateSize(fileInput, textInput, form, '.validMsg');
        };

    </script>
</body>

</html>
