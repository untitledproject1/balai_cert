@extends('superAdmin.layouts.main')

@section('title_page', 'Pengaturan Akun')

@section('content-super-admin')

<div class="col-lg">
    <div class="wrap_content">
        <div class="card mt-3 p-3">
            <div class="card-body">
            	<h5>Pengaturan Akun</h5>
            	@if(!$errors->isEmpty())
                <ul class="alert alert-danger">
                    @foreach($errors->getMessages() as $key => $error)
                    <li class="pl-2">{{ $error[0] }}</li>
                    @endforeach
                </ul>
                @endif
                @if(\Session::has('success'))
                <center>
                    <p class="alert alert-success">{{ \Session::get('success') }}</p>
                </center>
                @endif
            	<div class="form_settings">
            	    <form id="setAkunForm" method="POST" action="{{ url('/setting/account') }}">
                    @csrf
                    <div class="form-group ml-3 mt-4">
                        <label for="exampleInputPassword1">Nama Akun</label>
                        <input type="text" name="name" class="form-control setAcc" placeholder="Nama Akun" required="" value="{{ $userAuth->name }}">
                    </div>

                    <div class="form-group ml-3 mt-4">
                        <label for="password">Password Lama</label>
                        <input id="password" type="password" class="form-control setAcc" name="password" required autocomplete="new-password" placeholder="Password">
                    </div>

                    <div class="form-group ml-3 mt-4">
                        <label for="password-new">Password Baru</label>
                        <input id="password-new" type="password" class="form-control setAcc" name="new_password" required autocomplete="new-password" placeholder="Password ">
                    </div>

                    <div class="form-group ml-3 mt-4">
                        <label for="password-confirm">Konfirmasi Password Baru</label>
                        <input id="password-confirm" type="password" class="form-control setAcc" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                    </div>
                    <div class="validMsg2"></div>

                    <div class="mt-4">
                        <button type="reset" class="reset_btn">Reset</button>
                        <button type="button" class="submit_btn ml-3" onclick="ValidateSize('null', '.setAcc', '#setAkunForm', '.validMsg2')">Simpan</button>
                    </div>
                </form>
            	</div>
            </div>
        </div>
    </div>
</div>

@endsection