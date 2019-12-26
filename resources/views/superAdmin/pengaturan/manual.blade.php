@extends('superAdmin.layouts.main')

@section('title_page', 'Manual Book User')

@section('content-super-admin')
<div class="col-lg">
    <div class="wrap_content">
        <div class="card mt-3 p-3">
            <div class="card-body">

                <h5>Atur Manual Book User</h5><br>

                {{-- <button type="button" class="btn btn-primary ubah_manual" data-toggle="modal" data-target=".bd-example-modal-lg" data-url="{{ Route('format_file_ubah') }}" data-judul="Tambah Format File">+ Tambah Data</button>
                <br><br> --}}

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
                            <th width="27%">Role User</th>
                            <th width="30%">Nama File</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- {{{$key = 0}}} -->
                        @foreach($manual as $data)
                        @if($data->role != 'super_admin')
                        <tr class="table_data">
                            <td>{{$key+=1}}</td>
                            <td>{{ $data->role_name }}</td>
                            <td>
                                <div class="{{ !is_null($data->manual) ? $data->manual : 'alert_warning' }}">
                                    {{ !is_null($data->manual) ? $data->manual : 'File belum ada' }}
                                </div>
                            </td>
                            <td class="text-left align-left">
                                <form class="HapusFormatFile" method="POST" action="">
                                    @csrf
                                    @if(!is_null($data->manual))
                                    <a class="pr-2" style="font-size: 13px;" href="{{ url('/manual/download/'.$data->role) }}" title="Download">
                                        <div class="download_file">
                                            <i class="fas fa-download fa-lg"></i>
                                        </div>
                                    </a>
                                    @endif
                                    <a class="ubah_manual pr-2" style="font-size: 13px;" href="#" data-toggle="modal" data-target=".ubah_manual_modal" data-role="{{ $data->role_name }}" data-url="{{ Route('ubah_manual', ['id' => $data->id]) }}" data-judul="Ubah Manual" title="Edit">
                                        <div class="edit_file">
                                            <i class="fas fa-edit fa-lg" style="color: #000;"></i>
                                        </div>
                                    </a>

                                    {{-- <button type="button" class="delete_file" style="font-size: 13px;" onclick="ValidateSize('', '', '.HapusFormatFile')" title="Hapus"><i class="fas fa-trash"></i></button> --}}
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade bd-example-modal-lg ubah_manual_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" z-index="9999">
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
                                    <form id="UbahManual" method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <label>Role</label>
                                        <input type="text" class="form-control roleName" disabled="">
                                        <small class="form-text text-muted">Wajib diisi</small><br>
                                        <label>File</label>
                                        <div class="custom-file">
                                            <input type="file" class="file_manual custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file" required="">
                                            <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                                            <small class="form-text text-muted">Wajib diisi</small>
                                        </div>
                                        <br><br>
                                        <div class="validMsg"></div><br>
                                        <button type="button" class="submit_btn" onclick="ValidateSize('.file_manual', '', '#UbahManual', '.validMsg')">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
