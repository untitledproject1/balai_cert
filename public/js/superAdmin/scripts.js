// Format File
    $(document).on("click", ".ubah_format", function() {
        $('#UbahFormatFile').prop('action', $(this).data('url'));
        $('.formatDok').val($(this).data('format'));
        $('.modal-title').html($(this).data('judul'));
    });

// Validate Size
function ValidateSize(inputFile, inputText, formElem, target, radio = null) {
    let total = 0;
    let totalText = 0;
    if (typeof inputText != 'undefined') {
        totalText = $(inputText).length;
        let choiceTrue = 0;
        let lanjut = 1;
        $.each($(inputText), function (index, value) {
            if ($(this).is(':checked')) {
                choiceTrue+=1;
            }
            if (value.value == '') {lanjut = 0;}
        });
        if (lanjut != 1 || (radio != null && choiceTrue < 1)) {
            $(target).html('<p class="alert alert-danger">Harap cek kembali field input yang wajib diisi!</p>');
            totalText--;
            return false;
        }
    }

    if (inputFile != 'null') {
        total = $(inputFile).length;
        let lanjut2 = 1;
        $.each($(inputFile), function (index, value) {
            if (window.FileReader && window.File && window.FileList && window.Blob) {
                // File API Supported
                if (value.files[0]) {
                    let fileSize = value.files[0].size / 1024 / 1024; // file size dalam MB;
                    if (fileSize > 5) {
                        swal("Oh Tidak!", "Ukuran file tidak boleh lebih dari 5 Megabytes", "warning");
                        total--;
                        lanjut2 = 0;
                    }
                } else {
                    $(target).html('<p class="alert alert-danger">Harap cek kembali file yang wajib diupload!</p>');
                    total--;
                    lanjut2 = 0;
                }
            } else {
                // Not Supported File API
                swal("Warning!", "File API not supported on this browser", "warning");
                // $(formElem).submit();
            }
        });
        if (lanjut2 != 1) {
            return false;
        }
    }
    if (  (total == $(inputFile).length) || (totalText == $(inputText).length) ) {
        $(target).html('');
        if (formElem !== '#message_send') {
            swal({
                title: "Apakah Anda Yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data Berhasil Diinput!", {
                        icon: "success",
                    });

                    $(formElem).submit();
                } else {
                    
                }
            });
        } else {
            $(formElem).submit();
        }
    }
}


(function($) {
    "use strict";

    /*================================ 
    Preloader
    ==================================*/

    var preloader = $('#preloader');
    $(window).on('load', function() {
        preloader.fadeOut('slow', function() { $(this).remove(); });
    });

    /*================================
    sidebar collapsing
    ==================================*/
    $('.nav-btn').on('click', function() { 
        $('.page-container').toggleClass('sbar_collapsed');
    });

    /*================================
    Start Footer resizer
    ==================================*/
    var e = function() {
        var e = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
        (e -= 67) < 1 && (e = 1), e > 67 && $(".main-content").css("min-height", e + "px")
    };
    $(window).ready(e), $(window).on("resize", e);

    /*================================
    sidebar menu 
    ==================================*/
    $("#menu").metisMenu();

    /*================================
    slimscroll activation
    ==================================*/
    $('.menu-inner').slimScroll({
        height: 'auto'
    });
    $('.nofity-list').slimScroll({
        height: '435px'
    });
    $('.timeline-area').slimScroll({
        height: '500px'
    });
    $('.recent-activity').slimScroll({
        height: 'calc(100vh - 114px)'
    });
    $('.settings-list').slimScroll({
        height: 'calc(100vh - 158px)'
    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover()

    /*------------- Start form Validation -------------*/
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    /*================================
    datatable active
    ==================================*/
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
    if ($('#dataTable2').length) {
        $('#dataTable2').DataTable({
            responsive: true
        });
    }
    if ($('#dataTable3').length) {
        $('#dataTable3').DataTable({
            responsive: true
        });
    }


    /*================================
    Slicknav mobile menu
    ==================================*/
    $('ul#nav_menu').slicknav({
        prependTo: "#mobile_menu"
    });

    /*================================
    login form
    ==================================*/
    $('.form-gp input').on('focus', function() {
        $(this).parent('.form-gp').addClass('focused');
    });
    $('.form-gp input').on('focusout', function() {
        if ($(this).val().length === 0) {
            $(this).parent('.form-gp').removeClass('focused');
        }
    });

    /*================================
    slider-area background setting
    ==================================*/
    $('.settings-btn, .offset-close').on('click', function() {
        $('.offset-area').toggleClass('show_hide');
        $('.settings-btn').toggleClass('active');
    });

    /*================================
    Owl Carousel
    ==================================*/
    function slider_area() {
        var owl = $('.testimonial-carousel').owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1360: {
                    items: 1
                },
                1600: {
                    items: 2
                }
            }
        });
    }
    slider_area();

    /*================================
    Fullscreen Page
    ==================================*/

    if ($('#full-view').length) {

        var requestFullscreen = function(ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var exitFullscreen = function() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var fsDocButton = document.getElementById('full-view');
        var fsExitDocButton = document.getElementById('full-view-exit');

        fsDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $('body').addClass('expanded');
        });

        fsExitDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            exitFullscreen();
            $('body').removeClass('expanded');
        });
    }

})(jQuery);