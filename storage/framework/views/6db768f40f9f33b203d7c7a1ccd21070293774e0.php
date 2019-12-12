<?php $__env->startSection('content-navbar'); ?>

    <header class="header_area">
        <div class="main_menu" id="mainNav"> 
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <img src="images/Logo.svg" class="navbar-brand logo_img" alt="">
                    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <a class="nav-link" href="">
<!--                                <a href="" class="login_header_btn">Saya Admin</a>-->
                            </a>
                        </ul>
                    </div>
                </div>
            </nav> 
        </div>
    </header>
 
    <section class="banner_area">
        <div class="banner_inner">
            <div class="container">
                <div class="row banner_content">
                    <div class="col-lg-6 align-self-center">
                        <h1>Kini Sertifikasi Produk Keramik Menjadi Lebih Mudah</h1>
                        <p>Membuat Sertifikasi Produk (LSPro), Sertifikasi Sistem Management Mutu, Sertifikasi Industri Hijau di mana pun kapan pun</p>
                        <div class="banner_btn">
                            <a class="login_banner_btn" href="<?php echo e(route('login')); ?>">Login</a>
                            <a class="register_btn" href="<?php echo e(route('register')); ?>">Register</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="banner_img" src="images/person-handshake.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/welcome.blade.php ENDPATH**/ ?>