<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page Expired</title>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/all.css') }}">
</head>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Lato:400,700&display=swap');

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
    
    h3 {
        font-family: 'Lato', sans-serif;
        font-weight: bold;
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
        padding: 12px 35px;
        color: #fff;
        font-size: 18px;
        background: #61bcea;
        border-radius: 5px;
        box-shadow: 0 3px 7px 0 rgba(0, 0, 0, 0.1);
    }

</style>

<body>
    <div class="flex-center position-ref full-height">
        <div class="row">
            <div class="col-lg-7 align-self-center">
                <div class="title">
                    <h1>419</h1> 
                    <h1 class="error-shadow">419</h1>
                    <p>Silahkan login kembali untuk melanjutkan</p>
                    <br>
                    <a href="{{ route('login') }}"><button class="btn-back">Kembali</button></a>
                </div>
            </div>
            <div class="col-lg-5">
                <img style="width: 500px;" src="{{ asset('images/expired.png') }}" alt="">
            </div>
        </div>
    </div>


    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/Jsscript.js') }}"></script>
</body>

</html>
