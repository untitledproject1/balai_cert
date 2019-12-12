@extends('layouts.app')

@section('card-header', 'Sukses Register')

@section('content-navbar')
    <div class="container">
        <div class="row">
            <div class=" col-md-6 col-sm-12" style="margin-top: 150px;">
               <img src="images/sukses-register.png " class="sukses_regis_inner img-fluid">
            </div>

            <div class="col-sm-12 col-md-6" style="margin-top: 250px;">
                <div class="text-center align-middle">
                    <h2>Registrasi Berhasil!</h2>
                    <h4>Silahkan cek E-mail anda untuk verifikasi</h4>
                    <br>
                    <p>Tidak menerima E-mail atau link verifikasi expired? <a href="#"><b>Kirim Ulang</b></a></p> 
                </div>
            </div>
        </div>
    </div>

@endsection