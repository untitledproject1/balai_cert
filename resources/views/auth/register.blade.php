@extends('layouts.app')

@section('content-navbar')


<section>
    <div class="regis_area">
        <div class="row no-gutters">
            <div class="col-lg-5 col-md">
                <div class="regis_left">
                    <img src="{{ asset('images/bg-regis-min.jpg') }}" alt="">
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="container mt-2">

                    <div class="regis_right">
                        <a class="back_btn_icon" href="{{ url('/') }}"><img src="{{ asset('images/icon/left-arrow.png') }}" alt="" title="Kembali ke home"></a>

                        <h1>Register</h1>
                        <h6>Selamat datang, silahkan isi data berikut ini</h6>
                        <br>
                        @if(!$errors->isEmpty())
                        <ul class="alert alert-danger">
                            @foreach($errors->getMessages() as $key => $error)
                            <li class="pl-2">{{ $error[0] }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form id="register" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control inptR" placeholder="Nama Perusahaan Anda" required="">
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="form-group mb-4">
                                <label>Nama CEO/Direktur</label>
                                <input type="text" name="pimpinan_perusahaan" class="form-control inptR" placeholder="Nama CEO/Direktur" required="">
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="form-group mb-4">
                                <label>Perusahaan</label>
                                <div class="row mt-2">
                                    <div class="col-lg-6">
                                        <label class="container_radio">
                                            <input type="radio" name="negeri" value="1" required="">Produsen
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="container_radio">
                                            <input type="radio" name="negeri" value="2" required="">Importir
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="form-group mb-4">
                                <label>Alamat Perusahaan</label>
                                <textarea class="form-control inptR" name="alamat_perusahaan" placeholder="Alamat Lengkap Perusahaan" required=""></textarea>
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>Kota</label>
                                        <input type="text" name="kota" class="form-control inptR" placeholder="Kota" required="">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>Provinsi</label>
                                        <input type="text" name="provinsi" class="form-control inptR" placeholder="Provinsi" required="">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label>Kode Pos</label>
                                <input type="number" name="kode_pos" min="0" class="form-control inptR" placeholder="Kode Pos" required="">
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="form-group mb-4">
                                <label>No Fax</label>
                                <input type="text" name="no_fax" class="form-control" placeholder="No Fax">
                            </div>

                            <div class="form-group mb-4">
                                <label>E-mail Pengguna</label>
                                <input type="email" name="email_pengguna" class="form-control inptR" placeholder="E-mail Pengguna" required="">
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>Jumlah Pegawai Tetap</label>
                                        <input type="number" name="jml_pegawai_tetap" min="0" class="form-control inptR" placeholder="Isi Jumlah Pegawai Tetap" required="">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>Jumlah Pegawai Tidak Tetap</label>
                                        <input type="number" name="jml_pegawai_tidak_tetap" min="0" class="form-control inptR" placeholder="Isi Jumlah Pegawai Tidak Tetap" required="">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label>Jumlah Line Produksi</label>
                                <input type="number" name="jml_line_produksi" min="0" class="form-control inptR" placeholder="Isi Jumlah Line Produksi" required="">
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="mt-4 mb-4">
                                <h5>Contact Person</h5>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Nama</label>
                                            <input type="text" name="contact_person" class="form-control inptR" placeholder="Nama" required="">
                                            <small class="form-text text-muted">Wajib diisi</small>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Nomor Telepon</label>
                                            <div class="input-group">
                                                <input type="number" name="cp_num" class="form-control inptR" style="width: 100%;" id="phone">
                                            </div>
                                            <small class="form-text text-muted">Wajib diisi</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>Telepon Perusahaan</label>
                                        <input type="text" name="no_telp" maxlength="13" class="form-control inptR" placeholder="Telepon Perusahaan" required="">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>Email Perusahaan</label>
                                        <input type="email" name="email_perusahaan" class="form-control inptR" placeholder="Email Perusahaan" required="">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label>Alamat Pabrik</label>
                                <textarea class="form-control inptR" name="alamat_pabrik" placeholder="Alamat Lengkap Pabrik" required=""></textarea>
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>No Telepon Pabrik</label>
                                        <input type="text" name="telp_pabrik" min="0" class="form-control inptR" placeholder="Nomor Telepon Pabrik" required="">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label>No Fax Pabrik</label>
                                        <input type="number" name="fax_pabrik" min="0" class="form-control" placeholder="Nomor Fax Pabrik">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label>No NPWP</label>
                                <input type="text" name="no_npwp" class="form-control" placeholder="Nomor NPWP">
                            </div>

                            <div class="form-group mb-4">
                                <label>Unggah NPWP</label>
                                <div class="custom-file" id="customFile" lang="es">
                                    <input type="file" name="npwp" class="custom-file-input">
                                    <label class="custom-file-label" for="inputGroupFile02">Pilih File..</label>
                                    <small id="fileHelp" class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                                    <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label>No NIB</label>
                                <input type="text" name="no_nib" class="form-control" placeholder="Nomor NIB">
                            </div>

                            <div class="form-group mb-4">
                                <label>Unggah NIB</label>
                                <div class="custom-file" id="customFile" lang="es">
                                    <input type="file" name="nib" class="custom-file-input">
                                    <label class="custom-file-label" for="inputGroupFile02">Pilih File..</label>
                                    <small id="fileHelp" class="form-text text-muted">Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b> </small>
                                    <small id="fileHelp" class="form-text text-muted">Maksimal ukuran file: <b>5 MB</b> </small>
                                </div>
                            </div>

                            <h5>Akun</h5>
                            <div class="form-group mb-4">
                                <label>Nama Penguna</label>
                                <input type="text" name="name" class="form-control inptR" placeholder="Nama Pengguna" required="">
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="form-group mb-4">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control inptR" placeholder="E-mail" required="">
                                <small id="emailHelp" class="form-text text-muted">Email ini akan digunakan untuk verifikasi akun setelah regristrasi selesai</small>
                                <small class="form-text text-muted">Wajib diisi</small>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control inptR" placeholder="Password" required="">
                                    <small class="form-text text-muted">Wajib diisi</small>
                                </div>
                                <div class="col-lg-6">
                                    <label>Ulangi Password</label>
                                    <input type="password" name="password-confirm" class="form-control inptR" placeholder="Ulangi Password" required="">
                                    <small class="form-text text-muted">Wajib diisi</small>
                                </div>
                            </div>
                            <br>
                            <div class="validMsg"></div>
                            <div class="mt-3">
                                <button type="reset" class="reset_btn_regis">Reset</button>
                                <button type="button" class="submit_btn_regis ml-3" onclick="ValidateSize('.flRg', '.inptR', '#register', '.validMsg');">Buat Akun</button>
                            </div>

                            <p class="text-center mt-5"><span style="font-weight: 500;">sudah punya akun ?</span> <b><a href="{{ route('login') }}">Login</a></b></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.querySelector("input").addEventListener("required",
        function(event) {
            event.preventDefault();
        });

</script>

@endsection
