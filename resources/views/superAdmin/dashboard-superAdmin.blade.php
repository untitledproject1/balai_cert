 {{-- @extends('home') --}}

 {{-- @section('card-header', 'Dasboard')  --}}

@extends('superAdmin.layouts.main')

@section('content-super-admin')
 
<div class="row container_card_data">
    <div class="col-lg-4 d-md-mb-3">
        <div class="card_data_left">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <img class="card_icon" src="{{ asset('images/icon/office-building.svg') }}" alt="">
                </div>
                <div class="col-lg-6 text-right">
                    <h4>Perusahaan</h4>
                    <h2>999</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card_data_middle">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <img class="card_icon" src="{{ asset('images/icon/certificate.svg') }}" alt="">
                </div>
                <div class="col-lg-6 text-right">
                    <h4>Sertifikasi</h4>
                    <h2>999</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card_data_right">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <img class="card_icon" src="{{ asset('images/icon/vases.svg') }}" alt="">
                </div>
                <div class="col-lg-6 text-right">
                    <h4>Produk</h4>
                    <h2>999</h2>
                </div>
            </div>
        </div>
    </div>
</div>
 
<div class="col-lg">
    <div class="wrap_content">
       <div class="card mt-3 p-3">
           <div class="card-body">
             <div class="text-center">
                 <img style="width: 300px;" src="{{ asset('images/empty-superAdmin.png') }}" alt="">
                <h5 class="mt-4">Beberapa konten akan ada di sini</h5>
             </div>
           </div>
       </div> 
    </div>
</div>
<br>
<br>

@endsection