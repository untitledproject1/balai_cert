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
                        <div class="col-lg-10 col-md-10">Sudah Dikerjakan</div>
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
            <a href="{{ url('/messages') }}" class="list-group-item ">
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

            <h5 class="mb-0" style="margin-left: 24px; ">@yield('card-header')</h5>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <!--
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="#home"><i class="fas fa-search fa-lg"></i></a>
                    </li>
-->
                    {{-- <li class="nav-item mr-3">

                        <a class="nav-link" href="" id="notifDropdown" role="button" data-toggle="dropdown" data-target="#navbarDropdownNotif" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell fa-lg"></i><span class="badge badge-danger-notif">3</span></a>
                        <div class="dropdown-menu dropdown-menu-right" style="margin-right: 100px" aria-labelledby="notifDropdown">
                            <table width="100%">
                                <tr>
                                    <td width="25%"><span class="dropdown-item-img"><img src="{{ asset('images/icon/success.svg') }}" alt=""></span></td>
                                    <td><span class="dropdown-item-text">Ini adalah contoh success messages</span></td>
                                </tr>
                            </table>
                            <div class="dropdown-divider"></div>
                            <table width="100%">
                                <tr>
                                    <td width="25%"><span class="dropdown-item-img"><img src="{{ asset('images/icon/error.svg') }}" alt=""></span></td>
                                    <td><span class="dropdown-item-text">Ini adalah contoh error message</span></td>
                                </tr>
                            </table>
                            <div class="dropdown-divider"></div>
                            <table width="100%">
                                <tr>
                                    <td width="25%"><span class="dropdown-item-img"><img src="{{ asset('images/icon/warning.svg') }}" alt=""></span></td>
                                    <td><span class="dropdown-item-text">Ini adalah contoh warning message</span></td>
                                </tr>
                            </table>
                        </div>
                    </li> --}}
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
 $(this).toggleClass("down")  ; 
})
    
</script>

@endsection
