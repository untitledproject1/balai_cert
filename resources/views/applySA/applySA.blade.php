@extends('home')

@section('card-header', 'Apply Sertifikasi Awal')

@section('second-content')


<div class="col">
    <div class="wrap_content">
       
        @component('stepper') client,1,{{ $idProduk }},{{ $kode_tahap }} @endcomponent

        <hr>
        @if(\Session::has('msg'))
        <center><p class="alert alert-success">{{ \Session::get('msg') }}</p></center>
        @endif

        @if( ( !is_null($dok) && ($dok->sni == 1 || $kode_tahap >= 11) ) && (!is_null($infoDB) && $infoDB->lengkap == 1) )
            @if($kode_tahap < 13)
            <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="p-3">
              <div class="row no-gutters">
                  <div class="col-lg-1">
                      <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                  </div>
                  <div class="col-lg-11 pl-2 pr-2">
                    <p style="color: #0D47A1;"> 
                        @if($kode_tahap === 12)
                        Lanjut ketahap selanjutnya untuk <b>Sign Mou</b>
                        @else
                        Tunggu <b>Pembuatan MOU oleh Seksi Kerjasama</b> sebelum lanjut ke tahap selanjutnya untuk <b>Sign MOU</b>
                        @endif
                    </p>
                  </div>
              </div>
            </div>
            <br>
            @endif
            <center>
                <p class="alert alert-success">Dokumen dan form persyaratan sertifikat SNI sudah lengkap</p>
            </center>
        @else
            @if(!is_null($dok) && $dok->sni == 1)
            <center>
                <p class="alert alert-success">Dokumen sudah lengkap</p>
            </center>
            @endif
            @if(!is_null($infoDB) && $infoDB->lengkap == 1)
            <center>
                <p class="alert alert-success">Daftar Isian dan Kuesioner F.48.01 sudah lengkap</p>
            </center>
            @elseif(!is_null($infoDB) && $infoDB->lengkap == 2 && !($kode_tahap >= 11) )
            <center>
                <p class="alert alert-danger">Daftar Isian dan Kuesioner F.48.01 belum lengkap</p>  
            </center>
            @endif
        @endif
        @if(!is_null($dok) && $dok->sni == 2 && !($kode_tahap >= 11) )
        <center>
            <p class="alert alert-danger">Harap untuk mengupload dokumen - dokumen yang kurang dibawah ini</p>
        </center>
        @elseif(!is_null($dok) && $dok->sni == 3 && !($kode_tahap >= 11) )
        <center>
            <p class="alert alert-warning">Tunggu verifikasi dokumen</p>
        </center>
        @endif

        {{-- @if(\Session::has('errors'))
        <ul class="alert alert-danger pl-10">
            @foreach($errors->getMessages() as $key => $error)
            @if($key == "dok.0")
            <li class="pl-2"><b>Copy IUI:</b> {{ $error[0] }}</li>
            @endif
            @if($key == "dok.1")
            <li class="pl-2"><b>Copy Akte Notaris Perusahaan:</b> {{ $error[0] }}</li>
            @endif
            @if($key == "dok.2")
            <li class="pl-2"><b>Copy TDP:</b> {{ $error[0] }}</li>
            @endif
            @endforeach
        </ul>
        @endif --}}

        @if($kode_tahap == 17)
        <br>
        <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="p-3">
          <div class="row no-gutters">
              <div class="col-lg-1">
                  <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
              </div>
              <div class="col-lg-11 pl-2 pr-2">
                  <p style="color: #0D47A1;"><span class="font-weight-bold">Perhatian:</span> Beberapa data di Form Apply Sertifiakasi Awal ini digunakan pada tahap Laporan Audit Kecukupan Sertifikasi Produk. Data - data dalam form ini bisa saja berubah selama tahap Laporan Audit Kecukupan Sertifikasi Produk berjalan.</p>
              </div>
          </div>
        </div>
        <br><br>
        @endif

        <form id="applySA_upload" method="POST" action="{{ $userAuth->negeri == '1' ? url('/sa') : url('saLuar') }}">
            @csrf

                <h5>Produk <span class="badge badge-danger">Wajib Diisi</span></h5>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input class="form-control produk" type="text" name="produk" placeholder="Nama Produk Anda" required="" value="{{ !is_null($produk) ? $produk->produk : '' }}" 
                    {{ (!is_null($dok) && $dok->sni !== 2 && !is_null($dok->sni)) && (!is_null($infoDB) && $infoDB->lengkap !== 2 && !is_null($infoDB->lengkap) ) ? 'disabled' : '' }}>
                    <small class="form-text text-muted">Produk wajib diisi</small>
                    <br>
                    <label>Kategori Produk</label>
                    <input class="form-control produk" type="text" name="jenis_produk" placeholder="Kategori Produk Anda" required="" value="{{ !is_null($produk) ? $produk->jenis_produk : '' }}" 
                    {{ (!is_null($dok) && $dok->sni !== 2 && !is_null($dok->sni)) && (!is_null($infoDB) && $infoDB->lengkap !== 2 && !is_null($infoDB->lengkap) ) ? 'disabled' : '' }}>
                    <small class="form-text text-muted">Jenis Produk wajib diisi</small>
                </div>

                @if( ((is_null($dok) && !is_null($produk)) || (!is_null($dok) && is_null($dok->sni))) && !is_null($produk) )
                <center>
                    <p class="alert alert-primary">Harap Untuk Upload Dokumen - dokumen dan mengisi Form Kuesioner terlebih dahulu</p>
                </center>
                @endif

                @if(!is_null($idProduk) && 
                    (
                        ( (!is_null($dok) && $dok->sni != 3 && $dok->sni != 1) || is_null($dok) ) ||
                        ( (!is_null($infoDB) && $infoDB->lengkap != 3 && $infoDB->lengkap != 1) || is_null($infoDB) )
                    ) && 
                    $kode_tahap < 11
                )
                
                    <div style="background: #E3F2FD;" class="p-3">
                        <div class="row no-gutters">
                            <div class="col-lg-1">
                                <img style="width: 30px;" src="{{ asset('images/icon/light-bulb.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                            </div>
                            <div class="col-lg-11 pl-2">
                                <h5>Simpan Data Form Apply Sertifikasi Awal</h5>
                                <p>Tidak perlu khawatir kehilangan file. <br> Anda bisa menyimpan perubahan data anda sebelum men-submit bila data belum lengkap.</p>
                                <button class="mt-3 simpan_btn simpan_btn" type="button" onclick="simpanBtn('', '.produk', '#applySA_upload')">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                
                @endif
                
                @if($userAuth->negeri == 2)
                    <!-- stepper apply sa luar negeri -->
                    <ul class="progress-indicator">
                        <li class="completed">
                            <a href="" style="display:block;"><span class="bubble"></span> Importer</a>
                        </li>
                        <li class="">
                            <a href="" style="display:block;"> <span class="bubble"></span> Manufacturer</a>
                        </li>
                    </ul>
                @endif

                @if(!is_null($produk))
                    {{-- @if( ($dok->sni == 2 || is_null($dok->sni)) && $kode_tahap < 11 )
                    <div class="info_file">
                        <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.png, .jpeg, .jpg, .pdf, .docx, .doc</b>
                    </div>
                    @endif --}}

                <br>

                <div class="mb-2">
                    <button class="toggle_btn mr-3" type="button" data-toggle="collapse" data-target="#dok_sa" aria-expanded="false" aria-controls="dok_sa">
                        Form Apply Sertifikasi Awal &nbsp; <i class="fas fa-chevron-down fa-lg" style="color: #002b51;"></i>
                    </button>
                    <small class="form-text text-muted" style="margin-top: -15px;">Klik untuk melihat form</small>
                </div>
                <br>
                <div class="collapse" id="dok_sa">
                    @if($userAuth->negeri == 1)
                        <h5>Dokumen Sertifikasi Awal <span class="badge badge-danger">Wajib Diisi</span></h5>
                        {{-- @if( 
                            ((!is_null($dok) && $dok->sni === 1) && (!is_null($infoDB) && $infoDB->sni === 1)) ||
                            ((!is_null($dok) && $dok->sni === 3) || (!is_null($infoDB) && $infoDB->sni === 3)) ||  
                            $kode_tahap >= 11 
                        ) --}}
                        @if( (!is_null($dok) && ($dok->sni != 2 && !is_null($dok->sni))) || $kode_tahap >= 11 )
                            @include('applySA.dalamNegeriSNI')
                        @else
                            @include('applySA.dalamNegeri')
                        @endif
                        <br>

                        <h5>Daftar Isian dan Kuesioner F.48.01 <span class="badge badge-secondary">Tidak Wajib Diisi</span></h5>
                        @if( (!is_null($infoDB) && $infoDB->lengkap != 2 && !is_null($infoDB->lengkap))  || $kode_tahap >= 11 )
                            @if($infoDB->lengkap == 1)
                            <center>
                                <p class="alert alert-success">Form sudah lengkap</p>
                            </center>
                            @endif
                            @include('applySA.kuesionerSNI')
                        @else
                            {{-- @if( (!is_null($infoDB) && $infoDB->lengkap != 1) || is_null($infoDB)) --}}
                                <center>
                                    <p class="alert alert-warning">Harap untuk mengisi form sesuai kebutuhan</p>
                                </center>
                                @include('applySA.info_tambahan')
                                @include('applySA.kuesioner1')
                                @include('applySA.kuesioner2')
                            {{-- @else
                                <center>
                                    <p class="alert alert-success">Form sudah lengkap</p>
                                </center>
                            @endif --}}
                        @endif
                    @else
                        <h5>Dokumen Sertifikasi Awal</h5>
                        @include('applySA.luarNegeri.luarNegeriImportir')
                        <br>

                        <h5>Daftar Isian dan Kuesioner F.48.01</h5>
                        @include('applySA.luarNegeri.kuisImporter')                    
                    @endif
                   @if(!is_null($idProduk) && 
                        (
                            ( (!is_null($dok) && $dok->sni != 3 && $dok->sni != 1) || is_null($dok) ) ||
                            ( (!is_null($infoDB) && $infoDB->lengkap != 3 && $infoDB->lengkap != 1) || is_null($infoDB) )
                        ) && 
                        $kode_tahap < 11
                    )
                    
                    <div id="save">
                        <a href="#save_file">
                            <div class="save_file_link">
                                <span id="save_file_txt"><i class="fas fa-save fa-lg"></i> &nbsp; Simpan Data</span>
                            </div>
                        </a>
                    </div>
                    
                    <section id="save_file">
                        <div style="background: #E3F2FD;" class="p-3">
                            <div class="row no-gutters">
                                <div class="col-lg-1">
                                    <img style="width: 30px;" src="{{ asset('images/icon/light-bulb.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                                </div>
                                <div class="col-lg-11 pl-2">
                                    <h5>Simpan Data Form Apply Sertifikasi Awal</h5>
                                    <p>Tidak perlu khawatir kehilangan file. <br> Anda bisa menyimpan perubahan data anda sebelum men-submit bila data belum lengkap.</p>
                                    <button class="mt-3 simpan_btn simpan_btn" type="button" onclick="simpanBtn('', '.produk', '#applySA_upload')">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                </div>
                @endif

                @if( ((!is_null($dok) && $dok->sni === 2) || (!is_null($infoDB) && $infoDB->lengkap === 2)) && $kode_tahap < 11 )
                    @if(!is_null($pesan))
                    <div class="row mt-3">
                        <div class="col-lg">
                            <b>Pesan dari Seksi Pemasaran :</b>
                            <textarea class="form-control mt-3" rows="4" readonly="">{{ $pesan }}</textarea>
                        </div>
                    </div><br>
                    @endif
                @endif

            @if(
            ( (!is_null($dok) && $dok->sni != 1 && $dok->sni != 3) ||
            	(!is_null($infoDB) && $infoDB->lengkap != 1 && $infoDB->lengkap != 3) || is_null($dok) ) &&
	            !($kode_tahap >= 11)
            )
            <input id="form_action" type="hidden" name="form_action" value="">
            
            <hr>
            <div class="validMsg"></div>
            
            <button class="reset_btn mr-3 mt-4" type="reset">Reset</button>
            <button class="submit_btn smbt_btn" type="button" onclick="submitBtn('', '.produk', '#applySA_upload')">Kirim</button>  
            @endif
        </form>
        <br>

        @if($kode_tahap >= 12 && !is_null($idProduk))
        <div class="row mt-4 mb-4">
            <div class="col-lg text-right">
                <a href="{{ url('/mou/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
