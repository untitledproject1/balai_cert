@extends('superAdmin.layouts.main')

@section('title_page', 'Format Dokumen')

@section('content-super-admin')

<div class="col-lg">
    <div class="wrap_content">
        <div class="card mt-3 p-3">
            <div class="card-body">
                <h5>Atur Format Dokumen</h5><br>

                <button type="button" class="tambah_data ubah_format" data-toggle="modal" data-target=".bd-example-modal-lg" data-url="{{ Route('format_file_ubah') }}" data-judul="Tambah Format File"><i class="fas fa-plus"></i> &nbsp; Tambah Data</button>
                <br><br>

                @if(\Session::has('msg'))
                <p class="alert alert-primary">{{ \Session::get('msg') }}</p> 
                @endif

                @if(!$errors->isEmpty())
                <ul class="alert alert-danger">
                    @foreach($errors->getMessages() as $key => $error)
                    <li class="pl-2">{{ $error[0] }}</li>
                    @endforeach
                </ul>
                @endif

                <table id="example" class="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <th width="22%">Format</th>
                            <th width="25%">Nama File</th>
                            <th width="18%">Tanggal Perubahan Dokumen</th>
                            <th width="27%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- {{{$key = 0}}} -->
                        @foreach($format as $data)
                        <tr class="table_data">
                            <td>{{$key+=1}}</td>
                            <td>{{ $data->format }}</td>
                            <td>{{ $data->file }}</td>
                            <td>{{ date('d-m-Y', strtotime($data->updated_at)) }}</td>
                            <td class="text-center align-middle">
                                <form class="HapusFormatFile" method="POST" action="{{ Route('format_file_hapus', ['id' => $data->id]) }}">
                                    @csrf
                                    <a class="pr-2" style="font-size: 13px;" href="{{ url('/doc/download/format_dok/'.$data->file) }}" title="Download">
                                        <div class="download_file">
                                            <i class="fas fa-download fa-lg"></i>
                                        </div>
                                    </a>
                                    <a class="ubah_format pr-2" style="font-size: 13px;" href="#" data-toggle="modal" data-target=".bd-example-modal-lg" data-format="{{ $data->format }}" data-url="{{ Route('format_file_ubah', ['id' => $data->id]) }}" data-judul="Ubah Format File" title="Edit">
                                        <div class="edit_file">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </div>
                                    </a>
                                    
                                    <button type="button" class="delete_file" style="font-size: 13px;" onclick="ValidateSize('', '', '.HapusFormatFile', '')" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

               <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="container p-3 pb-3">
                            {{-- <p class="alert alert-primary">Data form ini akan digunakan untuk data pembuatan sertifikat client.</p> --}}
                            <form id="UbahFormatFile" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                {{-- <label>Nama Dokumen</label>
                                <input type="text" class="form-control format" name="nama">
                                <small class="form-text text-muted">Wajib diisi</small><br> --}}
                                <label>Format</label>
                                <div class="selectInpt">
                                    <select class="form-control formatDok" name="formatDok">
                                        <option selected=""> -- Pilih Format -- </option>
                                        <option>Surat Permohonan F.03.01</option>
                                        <option>Surat Pemberitahuan Jadwal Audit</option>
                                        <option>Audit Plan</option>
                                        <option>Sampling Plan</option>
                                        <option>Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI</option>
                                    </select>
                                </div>
                                <small class="form-text text-muted">Wajib diisi</small><br>
                                <label>File</label>
                                <div class="custom-file">
                                    <input type="file" class="file_format custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file" required="">
                                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                                    <small class="form-text text-muted">Wajib diisi</small>
                                </div>
                                <br><br>
                                <div class="validMsg"></div><br>
                                <hr>
                                <button type="button" class="submit_btn" onclick="ValidateSize('.file_format', '.formatDok', '#UbahFormatFile', '.validMsg')">Submit</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection