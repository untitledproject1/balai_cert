@extends('home')

@section('card-header', 'Pembuatan Draft Sertifikasi')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') sertifikasi,3,{{ $user->id }},{{ $idProduk }},{{ $kode_tahap }} @endcomponent
        <hr>

        @if(!is_null($produk) && !is_null($produk->lembar_konSert) && !is_null($produk->verify_konSert))
        <center><p class="alert alert-success">Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI telah lolos verifikasi.</p></center>
        <div class="text-center">
            <a href="{{ url('doc/download/format_dok/lembar_konfirmasi_penerbitan_sertifikat_sppt_sni.docx') }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Format Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI
                </div>
            </a>
        </div>
        <br>
        @endif

        @if(!is_null($produk) && !is_null($dok) && !is_null($dok->signed_lapSert) && is_null($produk->draft_sert))
            <div class="modal fade bd-example-modal-lg dataSert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Kelengkapan Data Sertifikat Client</h5>	
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="body">
                            <div class="container p-3">
                                <center><p class="alert alert-primary">Data form ini akan digunakan untuk data pembuatan sertifikat client.</p></center>
                                @if(!is_null($data_sert))
                                <center><p class="alert alert-success">Form telah diisi</p></center>
                                @endif
                                <form id="kelengDatSert" method="POST" action="{{ url('/kelengDatSert/'.$idProduk) }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Nomor</label>
                                            <input type="text" name="no_sert" class="form-control sert_data" required="" value="{{ !is_null($data_sert) ? $data_sert->nomor : '' }}">
                                            <small class="form-text text-muted">Wajib diisi</small>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Merek</label>
                                            <input type="text" name="merek" class="form-control sert_data" required="" value="{{ !is_null($data_sert) ? $data_sert->merek : '' }}">
                                            <small class="form-text text-muted">Wajib diisi</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe/Jenis</label>
                                        <textarea class="form-control sert_data" name="tipe" required="" rows="5">{{ !is_null($data_sert) ? $data_sert->tipe_jenis : '' }}</textarea>
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Regulasi/Skema</label>
                                        <textarea class="form-control sert_data" name="regulasi" required="">{{ !is_null($data_sert) ? $data_sert->regulasi_skema : '' }}</textarea>
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Skema Sertifikasi Produk</label>
                                        <input type="text" name="skema_sert" class="form-control sert_data" required="" value="{{ !is_null($data_sert) ? $data_sert->skema_sert : '' }}">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                    <div class="validMsg"></div><br>
                                    <div class="modal-footer">
                                        <button type="button" class="submit_btn" onclick="ValidateSize('', '.sert_data', '#kelengDatSert', '.validMsg')">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-2 mb-2 p-3">
              <div class="row no-gutters">
                  <div class="col-lg-1">
                      <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                  </div>
                  <div class="col-lg-11 pl-2 pr-2">
                      <p style="color: #0D47A1;">Form Kelengkapan Data Sertifikat Client akan aktif sampai pembuatan draft sertifikat selesai</p>
                  </div>
              </div>
            </div>
            <br>
            <h5>Form Kelengkapan Data Sertifikat Client</h5>
            <button type="button" class="modal_btn" data-toggle="modal" data-target=".dataSert">
            {{ !is_null($data_sert) && !is_null($data_sert->pengisian_data) ? 'Edit form' : 'Isi form di sini' }}</button>
            @if(is_null($data_sert) || (!is_null($data_sert) && !is_null($data_sert->pengisian_data)))
            <small class="form-text text-muted">Isi form terlebih dahulu</small>
            @endif
            <br><br><br>
        @endif

        @if(!is_null($produk) && !is_null($dok) && !is_null($dok->signed_lapSert) && is_null($produk->lembar_konSert))
            <br>
            <h5>Pembuatan Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></h5>
            @if(is_null($produk->verify_konSert) && !is_null($produk->verify_msg))
                <br>
                <center><p class="alert alert-primary">Dokumen telah ditolak oleh Ketua Seksi Sertifikasi. <br>Harap buat ulang dokumen</p></center>
                <label>Pesan: </label>
                <textarea disabled="" class="form-control">{{ $produk->verify_msg }}</textarea>
            <br>
            @endif
            <div class="text-center">
	            <a href="{{ url('doc/download/format_dok/lembar_konfirmasi_penerbitan_sertifikat_sppt_sni.docx') }}" target="_blank">
	                <div class="download_file">
	                    <i class="fas fa-download"></i>&nbsp; Download Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI
	                </div>
	            </a>
	        </div>
	        @if(!$errors->isEmpty())
	        <ul class="alert alert-danger">
	            @foreach($errors->getMessages() as $key => $error)
	            <li class="pl-2">{{ $error[0] }}</li>
	            @endforeach
	        </ul>
	        @endif
            <p class="alert alert-info">Harap upload Dokumen Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI yang sudah diisi</p>
            <form id="konfirmasiSert" method="POST" action="{{ url('/konfirmasiSert_dok/'.$idProduk.'/'.$user_id) }}" enctype="multipart/form-data">
                @csrf
                <div class="custom-file mt-2">
                    <input type="file" class="file_format custom-file-input fileKonSert" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="kon_sert_file" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Wajib diisi</small>
                    <small class="form-text text-muted">Format file yang diperbolehkan <b>.pdf</b></small>
                </div>
                {{-- @if($user->negeri == 1)
                <label>No NPWP</label>
                <input type="text" name="no_npwp" class="form-control konSert" placeholder="No NPWP" value="{{ $user->no_npwp }}">
                <small class="form-text text-muted">Wajib diisi</small><br>
                @else
                <label>No API</label>
                <input type="text" name="no_api" class="form-control konSert" placeholder="No API">
                <small class="form-text text-muted">Wajib diisi</small><br>
                <label>No NPWP</label>
                <input type="text" name="no_npwp" class="form-control konSert" placeholder="No NPWP" value="{{ $user->no_npwp }}">
                <small class="form-text text-muted">Wajib diisi</small><br>
                @endif

                <label>Tanggal Permohonan Lengkap</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="tgl_permohonan" class="datepicker-here form-control konSert"  data-language="en" data-date-format="dd/mm/yyyy" onkeydown="return false;" placeholder="dd/mm/yyyy" />
                </div>
                <small class="form-text text-muted">Wajib diisi</small><br>
                <label>Tanggal Permohonan Penerbit</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="tgl_penerbitan" class="datepicker-here form-control konSert"  data-language="en" data-date-format="dd/mm/yyyy" onkeydown="return false;" placeholder="dd/mm/yyyy" />
                </div>
                <small class="form-text text-muted">Wajib diisi</small><br>
                <label>Tanggal Penerbitan SHU</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="tgl_penerbitan_shu" class="datepicker-here form-control konSert"  data-language="en" data-date-format="dd/mm/yyyy" onkeydown="return false;" placeholder="dd/mm/yyyy" />
                </div>
                <small class="form-text text-muted">Wajib diisi</small><br>
                <label>Kelengkapan</label>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="container_radio">
                            <input type="checkbox" name="bapc" value="1" required="">BAPC
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="container_radio">
                            <input type="checkbox" name="lapSert" value="1" required="">Laporan Hasil Sertifikasi (komite evaluasi teknis)
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="container_radio">
                            <input type="checkbox" name="copy_sert" value="1" required="">Copy-an Sertifikat
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="container_radio">
                            <input type="checkbox" name="shu" value="1" required="">SHU No.
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div> --}}

                <div class="validMsg"></div><br>
                {{-- <button type="reset" class="reset_btn mr-3">Reset</button> --}}
                <button type="button" class="submit_btn" onclick="ValidateSize('.fileKonSert', '', '#konfirmasiSert', '.validMsg')">Upload</button>
            </form>
        @elseif( !is_null($produk) && !is_null($dok) && !is_null($dok->signed_lapSert) && !is_null($produk->lembar_konSert) && is_null($produk->verify_konSert) )
            <center><p class="alert alert-success">Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI telah dibuat. <br>Tunggu verifikasi dari Ketua Seksi Sertifikasi</p></center>
            <div class="text-center">
                <a href="{{ asset('storage/dok/konfirmasiSert/'.$produk->lembar_konSert) }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI
                    </div>
                </a>
            </div>
        @elseif( !is_null($produk) && !is_null($dok) && ( (is_null($produk->status_sert_jadi) && is_null($produk->draft_sert) ) || ($produk->status_sert_jadi === 4 && !is_null($produk->draft_sert)) ) )

            @if(\Session::has('errors'))
            <ul class="alert alert-danger pl-10">
                @foreach($errors->getMessages() as $key => $error)
                    <li class="pl-2">{{ $error[0] }}</li>
                @endforeach
            </ul>
            @endif

            @if(!is_null($produk->draft_sert))
                @if($produk->status_sert_jadi === 4)
                <center><p class="alert alert-primary">Draft Sertifikat telah ditolak oleh client. <br>Harap buat ulang draft</p></center>
                <b>Pesan dari client : </b>
                <textarea class="form-control" disabled="">{{ $produk->pesan_sert }}</textarea>
                @endif
                <div class="text-center">
                    <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                        <div class="view_file">
                            <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat Lama
                        </div>
                    </a>
                </div>
            @endif

            <p><b>Pembuatan Draft Sertifikat</b></p>
            <div class="text-center">
                <a href="{{ asset('storage/dok/format_dok/sertifikat_akhir.docx') }}" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Format Draft Sertifikasi
                    </div>
                </a>
            </div>
            <p class="alert alert-info">Harap untuk men-upload Draft Sertifikat dari format dokumen</p>
            <form id="CreateSert" method="POST" action="{{ url('/draftSert_create/'.$idProduk.'/'.$user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <input type="file" class="custom-file-input file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="sert" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Format file yang diperbolehkan: <b>.pdf</b></small>  
                    <small class="form-text text-muted">Wajib diisi</small>
                </div><br><br>
                <div class="validMsg"></div><br>
                <input type="hidden" name="user" value="{{ $user->nama_perusahaan }}" required="">
                <button class="submit_btn" type="button" onclick="ValidateSize('.file', '', '#CreateSert', '.validMsg')">Upload Draft</button>
            </form>
        @elseif( !is_null($produk) && !is_null($dok) && !is_null($dok->signed_lapSert) && !is_null($produk->lembar_konSert) && !is_null($produk->verify_konSert) && !is_null($produk->draft_sert) && is_null($produk->status_sert_jadi) )
        
            <center><p class="alert alert-primary">Draft Sertifikasi telah dibuat. Tunggu approval dari client.</p></center>
            <div class="text-center">
                <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat
                    </div>
                </a>
            </div>

        @elseif( !is_null($produk) && !is_null($dok) && !is_null($dok->signed_lapSert) && !is_null($produk->lembar_konSert) && !is_null($produk->verify_konSert) && !is_null($produk->draft_sert) && $produk->status_sert_jadi === 1 )
        
            <center><p class="alert alert-primary">Draft Sertifikasi telah disetujui client.</p></center>
            <div class="text-center">
            <a href="{{ asset('storage/dok/draftSert/'.$produk->draft_sert) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat Draft Sertifikat
                    </div>
                </a>
            </div>
            @if($produk->status_sert_jadi == 1)
            <form method="POST" action="{{ url('/cetak_sert/'.$idProduk) }}">
                @csrf
                <button class="submit_btn" type="submit">Cetak Sertifikat</button>
            </form>
            @else
            <center><p class="alert alert-primary">Draft Sertifikasi telah dicetak.</p></center>
            @endif

        @elseif( (!is_null($produk) && !is_null($dok) && is_null($dok->signed_lapSert)) || (is_null($dok) || is_null($produk)) )
            <br>

            <div style="background: #f0f0f2; padding: 20px; border-radius: 7px;">
                <img style="width: 100px;" src="{{ asset('images/icon/lock.svg') }}" alt="">
                <center>
                    <p class="alert alert-warning mt-3">Form Pembuatan Draft Sertifikat masih dikunci. <br>Pembuatan Laporan Hasil Sertifikasi belum selesai</p>
                </center>
            </div>

        @else
            <center>
                <p class="alert alert-success">
                    @if(!is_null($produk) && !is_null($produk->draft_sert))
                    Draft Sertifikat telah dibuat.<br>
                    @if(!is_null($produk->status_sert_jadi))
                    Approval Draft Sertifikat telah disetujui oleh Client.
                    @else
                    Tunggu Approval sertifikat dari client.
                    @endif
                    @if($produk->status_sert_jadi == 2) <br>
                    Informasi Cetak Sertifikat telah dikirim
                    @endif
                    @elseif(!is_null($produk) && ($produk->status_sert_jadi == 2 || $produk->status_sert_jadi == 3))
                    Sertifikat telah dicetak.
                    @endif
                </p>
            </center>
        @endif
        <br>

        <div class="row mt-4 mb-4">
            <div class="col-lg">
                <a href="{{ url('/auditPlan/'.$user_id.'/audit/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
        </div>

    </div>
    @endsection
