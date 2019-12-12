@extends('layouts.main')

@section('card-header', 'Profil')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7">
            <div class="wrap_content mt-5">
                <div class="row">
                    <div class="col-lg align-self-center">
                        <h4 class="text-center">Sistem Pengeloaan Sertifikasi &nbsp; <span class="{{ $userAuth -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $userAuth -> negeri == 1 ? 'produsen' : 'importir' }}</span></h4>
                        <p class="text-center">{{ $user->pimpinan_perusahaan }}</p>
                    </div>
                </div>

                <hr width="100%">

                <!-- Details Here -->

                <div class="ml-4 mr-4">
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-map-marker-alt fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Alamat Perusahaan</span> <br>
                            <span class="text-left">
                                {{ $user->alamat_perusahaan }}, {{ $user->kota }}, {{ $user->provinsi }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-phone fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Telepon Perusahaan</span> <br>
                            <span class="text-left">{{ $user->no_telp }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-envelope-open-text fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Email Perusahaan</span> <br>
                            <span class="text-left">{{ $user->email_perusahaan }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Kode Pos </span> <br>
                            <span class="text-left">{{ $user->kode_pos }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">No Fax </span> <br>
                            <span class="text-left">{{ $user->no_fax }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Email Penngguna </span> <br>
                            <span class="text-left">{{ $user->email_pengguna }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Alamat Pabrik </span> <br>
                            <span class="text-left">{{ $user->alamat_pabrik }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">No Telepon Pabrik </span> <br>
                            <span class="text-left">{{ $user->telp_pabrik }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">No Fax Pabrik </span> <br>
                            <span class="text-left">{{ $user->fax_pabrik }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Jumlah Pegawai Tetap </span> <br>
                            <span class="text-left">{{ $user->jml_pegawai_tetap }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Jumlah Pegawai Tidak Tetap </span> <br>
                            <span class="text-left">{{ $user->jml_pegawai_tidak_tetap }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Jumlah Line Produksi </span> <br>
                            <span class="text-left">{{ $user->jml_line_produksi }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">Contact Person </span> <br>
                            <span class="text-left">{{ $user->contact_person }}<br>{{ $user->cp_num }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">NPWP </span> <br>
                            <span class="text-left">
					            <a href="{{ url('/doc/download/npwp/'.$user->npwp) }}" target="_blank">
					                <div class="view_file">
					                    <i class="fas fa-download"></i>&nbsp; Download NPWP
					                </div>
					            </a>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-1 align-self-center">
                            <i class="fas fa-test fa-lg" style="color: #002b51;"></i>
                        </div>
                        <div class="col-lg-11">
                            <span style="font-color: #002b51; font-weight: 600;" class="text-left">NIB </span> <br>
                            <span class="text-left">
					            <a href="{{ url('/doc/download/nib/'.$user->nib) }}" target="_blank">
					                <div class="view_file">
					                    <i class="fas fa-download"></i>&nbsp; Download NPWP
					                </div>
					            </a>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-5">
            <div class="wrap_content mt-5">
                    @if($produk->isEmpty())
                        <img src="images/empty-state.png" alt="" style="width: 214px;">
                        <p class="mt-5 text-center">Sertifikasi terbaru anda akan muncul di sini</p>
                    @else
                        <h5>Sertifikasi produk terbaru</h5><hr>
                        @foreach($produk as $data)
                        <div class="row">
                            <div class="col-lg-6">
                                <b>{{ strtoupper($data->produk) }}</b>
                            </div>
                            <div class="col-lg-6">
                                <span class="float-right {{ $data->kode_tahap == 23 ? 'sert_done' : 'sert_going' }}">{{ $data->kode_tahap == 23 ? 'Sertifikasi Selesai' : 'Sedang Berjalan' }}</span>
                            </div>
                        </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
</div>

@endsection
