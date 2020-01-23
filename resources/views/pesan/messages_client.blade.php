@extends('layouts.main')

@section('card-header', 'Pesan')

@section('content')

<style>
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    .lengit {
        display: none;

    }

    .hilang {
        font-size: 40px;
        padding: auto;
        margin: auto;
        text-align: center;
    }

</style>

<div class="row no-gutters">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <div class="wrap_content_messages">
                    <h5>Pesan Client</h5><br>
                    <div class="mb-3">
                        <a class="btn btn-outline-secondary mr-2" href="{{ url('/messages_admin') }}"><i class="fa fa-user-tie"></i> &nbsp;Pesan Jabatan</a>
                    </div>
                    
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20%" style="align-self: center;">Perusahaan</th>
                                <th width="20%">Pimpinan Perusahaan</th>
                                <th width="10%">Lihat Produk</th>
                            </tr>
                        </thead>

                        <tbody style="font-size: 15px;">
                            @foreach($client as $key => $data)
                            <tr>
                                <td>{{ $data->nama_perusahaan }} <span style="font-size: 12px;" class="{{ $data->negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $data->negeri == 1 ? 'produsen' : 'importir' }}</span></td>
                                <td><span>{{ $data->pimpinan_perusahaan }}</span></td>
                                <td><a class="view_produk" href="{{ url('/messages_client/'.$data->id) }}">Tinjau</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection