@extends('home')

@section('card-header', 'List Produk')

@section('perusahaan')
<div class="row justify-content-center mb-1">
    <div class="col-md-12">
        <div class="col-lg-12">
            <div class="wrap_content">
                <h4 class="mb-3">Perusahaan</h4>
                <h6><b>{{ $user->nama_perusahaan }}</b> <span class="{{ $userAuth -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $userAuth -> negeri == 1 ? 'produsen' : 'importir' }}</span></h6>
            </div>
        </div>
    </div>
</div>
@endsection

@section('second-content')
<div class="col-md-12">
    <div class="wrap_content">
        <h4 class="mb-3">List Produk Pengajuan Sertifikasi</h4>
        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th width="30%">Nama Produk</th>
                    <th width="20%">Tahap Sertifikasi Terakhir</th>
                    <th width="15%">Lihat Tahap Sertifikasi</th>
                </tr>
            </thead>
            <tbody>
                @if(!$produk->isEmpty())
                @foreach($produk as $key => $data)
                <tr class="table_data">
                    <td>{{ $key+=1 }}</td>
                    <td>
                        <h6>{{ $data->produk }}</h6>
                    </td>
                    <td>
                        <div class="
                                @if(is_null($data->tahapan))
                                    tahap_sert_off
                                @elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10)
                                    tahap_sert_pending
                                @else
                                    tahap_sert_on
                                @endif
                            ">
                            @if(!is_null($data->kode_tahap) && intval($data->kode_tahap) !== 10)
                                @if(intval($data->kode_tahap === 23))
                                {{ $data->tahapan }}<br><small>(Menunggu penerimaan sertifikat oleh client)</small>
                                @elseif(intval($data->kode_tahap === 24))
                                &nbsp;Client sudah menerima sertifikat
                                @else
                                {{ $data->tahapan }}
                                @endif
                            @elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10)
                            {{ $data->tahapan }}<br>
                            @else
                            Tidak ada sertifikasi produk yang berjalan
                            @endif
                        </div>
                    </td>
                    <td class="text-center align-middle"><a class="view_produk" href="{{ url('/'.$page($role, $data->kode_tahap).'/'.$user->id.'/'.$link($role).'/'.$data->id) }}"><i class="fas fa-eye"></i></a>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">
                        <p class="alert alert-info text-center mt-2"><b>Data Kosong</b></p>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
        <br>
    </div>
</div>
@endsection
