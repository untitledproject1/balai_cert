 @extends('layouts.app')

@section('card-header', 'Sukses verifikasi')

@section('content-navbar')

<div class="container">
        <div class="row">
    <div class=" col-md-6 col-sm-12" style="margin-top: 150px;">
       <img src="images/sukses-verifikasi.png "height="400px" width="400px" class="sukses_regis_inner img-fluid">
    </div>

    <div class="col-sm-12 col-md-6" style="margin-top: 250px;">
        <div class="text-center">
                <h2><b>Terimakasih !</b></h2>
                <br>
                <p>Perusahaan Anda Telah terverifikasi.<br>Silahkan Login Untuk Melanjutkan</p>
                <br>    
                  <div class="text-center">
                    <a href="login.html" class="login_verifikasi_btn">Login</a>
                  </div>
            </div>
    </div>
    </div>
    </div>

@endsection