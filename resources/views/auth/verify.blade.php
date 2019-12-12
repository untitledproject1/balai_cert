@extends('layouts.app')

@section('card-header', 'Sukses Register')

@section('content-navbar')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi baru telah dikirim ke email anda.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container all_center">
    <div class="row">
        <div class=" col-md-6 col-sm-12" style="margin-top: 150px;">
           <img src="{{ asset('images/sukses-register.png') }}" class="sukses_regis_inner img-fluid">
        </div>

        <div class="col-sm-12 col-md-6" style="margin-top: 250px;">
            <div class="text-center align-middle">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Link verifikasi baru telah dikirim ke email anda.') }}
                    </div><br>
                @endif
                <h2>Registrasi Berhasil!</h2>
                <h4>Silahkan cek E-mail anda untuk verifikasi</h4>
                <br>
                <p>Tidak menerima E-mail atau link verifikasi tidak bekerja? <a href="{{ route('verification.resend') }}"><b>Kirim Ulang</b></a></p>
            </div>
        </div>
    </div>
</div>
@endsection
