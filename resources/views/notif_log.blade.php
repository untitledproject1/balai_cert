@extends('layouts.main')

@section('card-header', 'Log Notifikasi')

@section('content')
	
<div class="row no-gutters">
    <div class="container-fluid">
        <div class="wrap_content_messages">
            <table id="example" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th width="10%">Judul</th>
                        <th width="10%">Sub Judul</th>
                        <th width="20%">Data</th>
                        <th width="10%">Dibaca pada</th>
                        <th width="10%">Waktu terkirim</th>
                    </tr>
                </thead>

                <tbody style="font-size: 15px;">
                    @foreach($notif_user as $key => $data)
                    <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->subtitle }}</td>
                        <td>{{ $data->data }}</td>
                        <td>{{ is_null($data->read_at) ? '-' : date('Y-m-d H:i:s', strtotime($data->read_at)) }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($data->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection