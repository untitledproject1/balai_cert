@extends('layouts.app')

@section('content-navbar')

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div style="background: #fff; border-right: 2px solid #E0E0E0; " id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
            <img style="width: 150px;" src="{{asset('images/Logo.svg')}}" title="Logo Sistem Pengelolaan Sertifikasi" alt="">
        </div>
        <div class="list-group list-group-flush sticky-top">

            @if($role == 'client')

            <a href="{{ url('/dashboard') }}" class="list-group-item">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <i class="fas fa-home fa-lg"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        Dashboard
                    </div>
                </div>
            </a>

            <a href="{{ url('/history') }}" class="list-group-item">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <i class="fas fa-history fa-lg "></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        Riwayat Sertifikasi Produk
                    </div>
                </div>
            </a>

           <a href="{{ url('messages') }}" class="list-group-item">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <i class="fas fa-envelope fa-lg"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        Pesan
                    </div>
                </div>
            </a>

            @elseif($role != 'client' && $role != 'super_admin')
            {{-- {{ $uri == 'cert_list/on_going' ? 'list_active' : '' }} --}}
            <div class="list-group-item default" href="#">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        {{-- {{ $uri == 'cert_list/on_going' ? 'faicon_active' : '' }} --}}
                        <i class="fas fa-file-alt fa-lg"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        Sertifikasi <span class="float-right"></span>
                    </div>
                </div>
            </div>
            <div class="sub-menu">
                <div class="list"><a href="{{ url('/cert_list/on_going') }}">
                    <div class="row">
                        <div class="col-lg-2 col-md-2"><i class="fas fa-spinner fa-lg"></i></div>
                        <div class="col-lg-10 col-md-10">Dalam Proses Pengerjaan &nbsp; 
                            {{-- <span class="badge badge-danger-sidebar"><small></small></span> --}}
                        </div>
                    </div>
                </a></div>
                <div class="list"><a href="{{ url('/cert_list/all') }}">
                    <div class="row">
                        <div class="col-lg-2 col-md-2"><i class="fas fa-check-circle fa-lg"></i></div>
                        <div class="col-lg-10 col-md-10">Sedang Berjalan</div>
                    </div>
                </a></div>
            </div>

            {{-- {{ $uri == 'cert_list/history' ? 'list_active' : '' }} --}}
            <a class="list-group-item " href="{{ url('/cert_list/history') }}">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        {{-- {{ $uri == 'cert_list/history' ? 'faicon_active' : '' }} --}}
                        <i class="fas fa-history fa-lg "></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        Riwayat Sertifikasi Produk
                    </div>
                </div>
            </a>

            {{-- {{ $uri == 'company_list' ? 'list_active' : '' }} --}}
            <a class="list-group-item " href="{{ url('/company_list') }}">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        {{-- {{ $uri == 'company_list' ? 'faicon_active' : '' }} --}}
                        <i class="fas fa-list-alt fa-lg " href="{{ url('/company_list') }}"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        List Perusahaan
                    </div>
                </div>
            </a>


            {{-- {{ $uri == 'pesan' ? 'list_active' : '' }} --}}
            <a href="{{ url('/messages_client') }}" class="list-group-item ">
                <div class="row">
                    <div class="col-lg-2">
                        {{-- {{ $uri == 'pesan' ? 'faicon_active' : '' }} --}}
                        <i class="fas fa-envelope fa-lg "></i>
                    </div>
                    <div class="col-lg-10">
                        Pesan
                    </div>
                </div>
            </a>

            @else
            <a href="{{ Route('dashboard_superAdmin') }}" class="list-group-item">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <i class="fas fa-home fa-lg" style="color: #002B51; margin-right: 20px;"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        Dashboard
                    </div>
                </div>
            </a>

            <a class="list-group-item" href="#" data-toggle="collapse" data-target="#sett_admin" class="collapsed">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <i class="fas fa-gear fa-lg"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        Pengaturan <span class="float-right"><div class="fas fa-chevron-down"></div></span>
                    </div>
                </div>
            </a>
            <div class="sub-menu collapse" id="sett_admin">
                <div class="list"><a href="{{ Route('format_file') }}">
                    <div class="row">
                        <div class="col-lg-2 col-md-2"><i class="fas fa-file-alt fa-lg"></i></div>
                        <div class="col-lg-10 col-md-10">Format Dokumen</div>
                    </div>
                </a></div>
                <div class="list"><a href="{{ Route('manual_book') }}">
                    <div class="row">
                        <div class="col-lg-2 col-md-2"><i class="fas fa-file-alt fa-lg"></i></div>
                        <div class="col-lg-10 col-md-10">Manual Book User</div>
                    </div>
                </a></div>
            </div>

            @endif

            {{-- @if(isset($idProduk) && $role != 'client' )
            <a class="list-group-item" href="{{ url('/company/'.$user_id) }}"><i class="fas fa-bars fa-lg" style="color: #002B51; margin-right: 20px;"></i>List Produk</a>
            @endif --}}

        </div>
    </div>


    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar sticky-top navbar-expand-lg" style="background: #fff; border-bottom: 2px solid #E0E0E0;">

            <button style="background: none; outline: none;" id="slide"><img style="width: 30px;" src="{{ asset('images/icon/menu.svg') }}" alt=""></button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <h6 class="mb-0" style="margin-left: 24px; ">@yield('card-header')</h6>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <!--
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="#home"><i class="fas fa-search fa-lg"></i></a>
                    </li>
-->
                    <li class="nav-item mr-3">

                        <a class="nav-link" href="" id="notifDropdown" role="button" data-toggle="dropdown" data-target="#navbarDropdownNotif" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell fa-lg"></i>
                            <span id="notif-count" class="badge badge-danger-notif">{{ $notif_amount == 0 ? '' : $notif_amount }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right p-3" style="margin-right: 100px;width: 450px;" aria-labelledby="notifDropdown">

                            <a href="{{ url('/notif_log') }}" class="btn btn-outline-secondary mb-3" style="font-size: 14px;">Lihat log notifikasi</a>

                            <div id="notif-container">
                                @if($notif_amount == 0)
                                <p>Tidak ada notifikasi terbaru</p>
                                @else
                                    @foreach($new_notif as $key => $notif)
                                        @if($key != 0)
                                        <hr>
                                        @endif
                                    <div class="row">
                                        <div class="notif_id" style="display: none;">{{ $notif->id }}</div>
                                        <div class="col-1"><i class="fas fa-envelope-square" style="font-size: 25px;"></i></div>
                                        <div class="col-11">
                                            <p>
                                                <div style="font-size: 14px;float: left;">
                                                    <!-- title -->
                                                    <b class="notif-title">{{ ucfirst($notif->title) }}</b> &nbsp;-&nbsp;
                                                    <!-- subtitle -->
                                                    <div class="notif-subtitle" style="display: contents;">{{ ucfirst($notif->subtitle) }}</div><br>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- content -->
                                        <div class="col-11 offset-1 notif-content" style="font-size: 14px;">{{ substr($notif->data, 0, 50) }}...</div>
                                    </div>
                                    <div style="float: right;">
                                        <div class="notif-time" style="font-size: 12px;">{{ date('Y-m-d H:i:s', strtotime($notif->created_at)) }}</div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- element notif yang dibutuhkan saat push notif masuk (hide) -->
                            <div id="notif-row">
                                <div class="row">
                                    <div class="col-1"><i class="fas fa-envelope-square" style="font-size: 25px;"></i></div>
                                    <div class="col-11">
                                        <p>
                                            <div style="font-size: 14px;float: left;">
                                                <!-- title -->
                                                <b class="notif-title"></b> &nbsp;-&nbsp;
                                                <!-- subtitle -->
                                                <div class="notif-subtitle" style="display: contents;"></div><br>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- content -->
                                    <div class="col-11 offset-1 notif-content" style="font-size: 14px;"></div>
                                </div>
                                <div style="float: right;">
                                    <div class="notif-time" style="font-size: 12px;"></div>
                                </div>
                            <!-- end notif -->

                        </div>
                    </li>
                    
                    @if($role != 'super_admin')
                    <li class="nav-item dropdown mr-3">
                        <a href="{{ url('/manual/download/'.$role) }}" class="btn btn-success" target="_blank"> 
                            <div class="btn-success-text">
                                <i class="fas fa-download"></i> &nbsp; Download Manual Book
                            </div> 
                        </a> 
                    </li>
                    @endif

                    <li class="nav-item dropdown">


                        <!--
                       <div class="dropdown">
  <button onclick="myFunctionUser()" class="dropbtn">Dropdown</button>
  <div id="myDropdownUser" class="dropdown-content">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div>
-->

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-target="#navbarDropdown" aria-haspopup="true" aria-expanded="false">
                            {{ isset($userAuth) ? $userAuth->name : Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(!is_null($userAuth->negeri))
                            <a class="dropdown-item" href="{{ url('/profil') }}"><i class="fas fa-user-tie fa-lg" style="color: #002B51; margin-right: 20px;"></i>Profil</a>
                            <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item" href="{{ url('/setting') }}"><i class="fas fa-cog fa-lg" style="color: #002B51; margin-right: 20px;"></i>Pengaturan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ __('Logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-lg" style="color: #002B51; margin-right: 20px;"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>

                    </li>
                </ul>
            </div>
        </nav>

        <div class="animate_all">
            @yield('content')
        </div>
        <br>
        <br>
         @include('layouts.footer') 

    </div>

    <a id="button_to_top"><i class="fas fa-chevron-up fa-lg" style="align-self: center; color:#fff; margin-top: 13px;"></i></a>

    <!-- /#page-content-wrapper -->
</div>

<script>

    $(".rotate").click(function(){
     $(this).toggleClass("down"); 
    });

    // hide notif element
    $('#notif-row').hide();

    $('#notifDropdown').on('click', function() {
        if ($('#notif-count').html() != '') {
            $.post('/read_notifications', {
                'user_id': '{{ $userAuth->id }}'
            }).done(function(data) {
                $('#notif-count').html('');
            }).fail(function(err) {
                return ;
            });
        }
    });
</script>

@endsection
