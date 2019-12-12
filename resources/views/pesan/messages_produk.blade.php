@extends('layouts.main')

@section('card-header', 'Pesan')

@section('content')



<div class="container-fluid">
    <div class="wrap_content">
        <h5>List Produk</h5>
        <a href="{{ url('messages') }}">
            <div class="messages_list_produk">
                <h6>Keramik</h6>
            </div>
        </a>
        <a href="#">
            <div class="messages_list_produk">
                <h6>Ubin</h6>
            </div>
        </a>
    </div>
</div>

@endsection
