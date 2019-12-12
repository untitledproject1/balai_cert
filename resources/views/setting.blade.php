@extends('layouts.main')

@section('card-header', 'Pengaturan')

@section('content')

<div class="dashboard_wrapper">


    <div class="edit_profil">
        <div class="row">
            {{-- @if(!is_null($userAuth->negeri)) --}}
            <div class="col-3">
                <div class="wrap_content_setting" style="padding: 0;">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            Profil
                        </a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            Akun
                        </a>
                    </div>

                </div>
            </div>
            {{-- @endif --}}

            <div class="col">
                <div class="wrap_content">
                    <div class="tab-content" id="v-pills-tabContent">
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
                        {{-- @if(!is_null($userAuth->negeri)) --}}
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                            <h5><b>Pengaturan Profil</b></h5>

                            <form id="setCompanyForm" method="POST" action="{{ url('/setting/company') }}" enctype="multipart/form-data">
                                @csrf
                                @if(!is_null($userAuth->negeri))
                                <div class="form-group mt-4">
                                    <label>Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" class="form-control setComp" placeholder="Nama Perusahaan" required="" value="{{ $user->nama_perusahaan }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama CEO/Direktur</label>
                                    <input type="text" name="pimpinan_perusahaan" class="form-control setComp" placeholder="Nama CEO/Direktur" required="" value="{{ $user->pimpinan_perusahaan }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label>No Telepon</label>
                                    <input type="text" name="no_telp" maxlength="13" class="form-control setComp" placeholder="No Telepon" required="" value="{{ $user->no_telp }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Perusahaan</label>
                                    <textarea name="alamat_perusahaan" class="form-control setComp" placeholder="Alamat Perusahaan" required="">{{ $user->alamat_perusahaan }}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Perusahaan</label>
                                    <div class="row mt-2">
                                        <div class="col-lg-3">
                                            <label class="container_radio">
                                                <input type="radio" name="negeri" value="1" required="" {{ $user->negeri == '1' ? 'checked' : '' }}>Perusahaan Dalam Negeri
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="container_radio">
                                                <input type="radio" name="negeri" value="2" required="" {{ $user->negeri == '2' ? 'checked' : '' }}>Perusahaan Luar Negeri
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <input type="text" name="kota" class="form-control setComp" placeholder="Kota" required="" value="{{ $user->kota }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <input type="text" name="provinsi" class="form-control setComp" placeholder="Provinsi" required="" value="{{ $user->provinsi }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" class="form-control setComp" placeholder="Kode Pos" required="" value="{{ $user->kode_pos }}">
                                </div>
                                <div class="form-group">
                                    <label>No Fax</label>
                                    <input type="text" name="no_fax" class="form-control setComp" placeholder="No Fax" required="" value="{{ $user->no_fax }}">
                                </div>
                                <div class="form-group">
                                    <label>E-mail Pengguna</label>
                                    <input type="email" name="email_pengguna" class="form-control setComp" placeholder="E-mail Pengguna" required="" value="{{ $user->email_pengguna }}">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Jumlah Pegawai Tetap</label>
                                            <input type="number" name="jml_pegawai_tetap" min="0" class="form-control setComp" placeholder="Isi Jumlah Pegawai Tetap" required="" value="{{ $user->jml_pegawai_tetap }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Jumlah Pegawai Tidak Tetap</label>
                                            <input type="number" name="jml_pegawai_tidak_tetap" min="0" class="form-control setComp" placeholder="Isi Jumlah Pegawai Tidak Tetap" required="" value="{{ $user->jml_pegawai_tidak_tetap }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Jumlah Line Produksi</label>
                                    <input type="number" name="jml_line_produksi" min="0" class="form-control setComp" placeholder="Isi Jumlah Line Produksi" required="" value="{{ $user->jml_line_produksi }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label>Contact Person</label>
                                    <input type="text" name="contact_person" maxlength="13" class="form-control setComp" placeholder="Contact Person" required="" value="{{ $user->contact_person }}">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Telepon Perusahaan</label>
                                            <input type="text" name="no_telp" maxlength="13" class="form-control setComp" placeholder="Telepon Perusahaan" required="" value="{{ $user->no_telp }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email Perusahaan</label>
                                            <input type="email" name="email_perusahaan" class="form-control setComp" placeholder="Email Perusahaan" required="" value="{{ $user->email_perusahaan }}">
                                        </div>
                                    </div>
                                </div>
                                @if(!is_null($user->npwp))
                                <br>
                                <a href="{{ asset('storage/dok/npwp/'.$user->npwp) }}" class="mb-3" target="_blank">
                                    <div class="view_file" style="margin-top: 0;">
                                        <i class="fas fa-eye"></i>&nbsp;
                                        Lihat NPWP Lama
                                    </div>
                                </a><br>
                                @endif
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label>Unggah NPWP Baru?</label>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-3">
                                            <label class="container_radio">
                                                <input onclick="slideOpt('.npwp', 'ya', false, true)" type="radio" name="npwp" value="1">Ya
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="container_radio">
                                                <input onclick="slideOpt('.npwp', 'tidak', false, true)" type="radio" name="npwp" value="0">Tidak
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="custom-file npwp hid" id="customFile" lang="es">
                                        <input type="file" name="npwp" class="custom-file-input fileR" id="inputGroupFile02" disabled="">
                                        <label class="custom-file-label" for="inputGroupFile02">Pilih File..</label>
                                    </div>
                                </div>
                                @if(!is_null($user->nib))
                                <br>
                                <a href="{{ asset('storage/dok/nib/'.$user->nib) }}" target="_blank">
                                    <div class="view_file" style="margin-top: 0;">
                                        <i class="fas fa-eye"></i>&nbsp;
                                        Lihat NIB Lama
                                    </div>
                                </a><br>
                                @endif
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-lg">
                                            <label>Unggah NIB Baru?</label>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-3">
                                            <label class="container_radio">
                                                <input onclick="slideOpt('.domisili', 'ya', false, true)" type="radio" name="dom" value="1">Ya
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="container_radio">
                                                <input onclick="slideOpt('.domisili', 'tidak', false, true)" type="radio" name="dom" value="0">Tidak
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="custom-file domisili hid" id="customFile" lang="es">
                                        <input type="file" name="nib" class="custom-file-input fileR" id="inputGroupFile02" disabled="">
                                        <label class="custom-file-label" for="inputGroupFile02">Pilih File..</label>
                                    </div>
                                </div>
                                @else
                                <div class="form-group mb-4">
                                    <label>No Telepon</label>
                                    <input type="text" name="no_telp" maxlength="13" class="form-control setComp" placeholder="No Telepon" required="" value="{{ $user->no_telp }}">
                                </div>
                                @endif

                                <div class="validMsg"></div>
                                <button type="reset" class="reset_btn_regis mr-3">Reset</button>
                                <button type="button" class="submit_btn mt-2" onclick="ValidateSize('.fileregis', '.setComp', '#setCompanyForm', '.validMsg')">Simpan</button>
                            </form>

                        </div>
                        {{-- @endif --}}

                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                            <h5><b>Pengaturan Akun</b></h5>
                            <form id="setAkunForm" method="POST" action="{{ url('/setting/account') }}">
                                @csrf
                                <div class="form-group ml-3 mt-4">
                                    <label for="exampleInputPassword1">Nama Akun</label>
                                    <input type="text" name="name" class="form-control setAcc" placeholder="Nama Akun" required="" value="{{ $user->name }}">
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
    </div>
</div>

@endsection
