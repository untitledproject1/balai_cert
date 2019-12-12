@extends('layouts.app')

@section('content-navbar')

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <section class="login_content">
            <div class="login_inner">
                <div class="row">

                    <div class="col-lg-4">
                    <!-- ===== Image Here ====== -->
                    </div>

                    <div class="col-lg-8 align-self-center">
                        @error('email')
                            <script>
                                swal({
                                    title: "Login Gagal!",
                                    text: "Harap cek kembali email dan password anda!",
                                    icon: "warning",
                                });
                            </script>
                        @enderror
                        <a class="back_btn_icon" href="{{ url('') }}"><img src="{{ asset('images/icon/left-arrow.png') }}" alt="" title="Kembali ke home"></a>
                        <div class="container">
                            <h1>Login</h1>
                            <h6>Selamat Datang Kembali</h6>
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="bebas1@gmail.com" required autocomplete="email" autofocus>

                                    {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}

                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password" value="12345678">

                                    {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}

                                </div>

                                <div class="form-group">

                                    <label class="container_checkbox" for="remember">
                                        {{ __('Ingatkan saya') }}
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark_checkbox"></span>
                                    </label>

                                    {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password Anda?') }}
                                    </a>
                                    @endif --}}
                                </div>

                                <button type="submit" class="full_btn">
                                    {{ __('Login') }}
                                </button>

                                <p class="text-center mt-5"><span style="font-weight: 500;">Tidak punya akun ?</span> <b><a href="{{ route('register') }}">Register</a></b></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
