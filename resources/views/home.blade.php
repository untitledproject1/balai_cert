@extends('layouts.main')

@section('content')
    @if(isset($user) || $role == 'client')
    <div class="row justify-content-center mb-1">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-12">
                <div class="wrap_content">
                   <div class="row">
                       <div class="col-lg-8">
                           <div class="text-left">
                               <h4>Perusahaan</h4>
                                <h6>
                                    @if(isset($user))
                                    {{ $user->nama_perusahaan }} <span class="{{ $user -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $user -> negeri == 1 ? 'produsen' : 'importir' }}</span>
                                    @else
                                    {{ $userAuth->nama_perusahaan }} <span class="{{ $userAuth -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $userAuth -> negeri == 1 ? 'produsen' : 'importir' }}</span>
                                    @endif
                                    @if(isset($produk))
                                    - {{ is_object($produk) ? $produk->produk : $produk }}
                                    @endif
                                </h6>
                           </div>
                       </div>
                       <div class="col-lg-4 align-self-center">
                           @if($role != 'client')
                            @include('modal_all_doc')
                            <div class="text-right">
                                <button type="button" class="modal_btn" data-toggle="modal" data-target=".modal-all-doc">Lihat Dokumen Pengajuan Sertifikasi</button>
                            </div>
                            @endif       
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    @endif

<div class="container-fluid">
    <div class="row justify-content-center mb-1">
        @yield('tahapan')
        @if( ($role == 'client' && isset($idProduk) && !is_null($idProduk)) || (isset($user) && isset($idProduk) ) )
        @include('tahap_sert')
        @include('pesan/add_messages')
        @endif

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        @yield('second-content')
    </div>
</div>

@endsection
