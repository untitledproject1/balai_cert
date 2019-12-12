<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Not Found</title>
    <script src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">
</head>

<style type="text/css">
    @import  url('https://fonts.googleapis.com/css?family=Lato&display=swap');

    html,
    body {
        background-color: #F8FAFB;
        height: 100vh;
        margin: 0;
    }
    
    p {
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        font-size: 20px;
        color: #000;
        opacity: 0.7;
    }

    h1 {
        font-family: 'Lato', sans-serif;
        font-size: 120px;
        font-weight: 800;
        color: #61bcea;
    }
    
    .error-shadow {
        position: relative;
        margin-top: -145px;
        margin-left: 8px;
        color: rgba(97, 188, 234, 0.3);
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .title {
        font-size: 36px;
        padding: 20px;
    }
    
    .btn-back {
        outline: none;
        border: none;
        padding: 10px 40px;
        color: #fff;
        font-size: 18px;
        background: rgba(97, 188, 234, 1.0);
        box-shadow: 0 3px 7px 0 rgba(0, 0, 0, 0.1);
        transition: all 300ms ease;
    }
    
    .btn-back:hover {
        background: #4da5d1; 
    }

</style>

<body>
    <div class="flex-center position-ref full-height">
        <div class="row">
            <div class="col-lg-7 align-self-center">
                <div class="title">
                    <h1>404</h1> 
                    <h1 class="error-shadow">404</h1>
                    <p>Halaman yang anda tuju tidak ditemukan</p>
                    <br>
                    <a href="<?php echo e(route('login')); ?>"><button class="btn-back">Login</button></a>
                </div>
            </div>
            <div class="col-lg-5">
                <img style="width: 500px;" src="<?php echo e(asset('images/not_found.png')); ?>" alt="">
            </div>
        </div>
    </div>


    <script src="<?php echo e(asset('js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Font Awesome -->
    <script src="<?php echo e(asset('js/all.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Jsscript.js')); ?>"></script>
</body>

</html>
<?php /**PATH /var/www/html/balai-cert/resources/views/errors/404.blade.php ENDPATH**/ ?>