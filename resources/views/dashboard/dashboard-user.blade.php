@extends('layouts.main')

@section('card-header', 'Dashboard')

@section('content')

<!-- Toast -->
@if(isset($flashInfo) && !empty($flashInfo))
    @foreach($flashInfo as $data)
        @if(!is_null($data))
        <div class="toast position-fixed mt-3 mr-3" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
          <div class="toast-header py-2">
            <img src="{{ asset('images/icon/info-button.png') }}" alt="...">
            <strong class="mr-auto ml-2">Info</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
              <p><b>{{ $data }}</b>
              <br><br>
              <br><br>
              <button type="button" class="btn-footer" data-dismiss="toast" aria-label="Close">Mengerti</button></p>
          </div>
        </div>
        @endif
    @endforeach 
@endif


<div class="dashboard_wrapper">
    {{-- <div class="row">
        <div class="col-lg-4">
            <div class="wrap_content_colored" style="background: #FFC048;">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>{{ count($certifiedProduct) }}</h2>
                    </div>
                    <div class="col-lg-8">
                        Sertifikasi Produk (LSPro)
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="wrap_content_colored" style="background: #575FCF;">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>0</h2>
                    </div>
                    <div class="col-lg-8">
                        Sertifikasi Sistem Management Mutu
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="wrap_content_colored" style="background: #05C46B;">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>0</h2>
                    </div>
                    <div class="col-lg-8">
                        Sertifikasi Industri Hijau
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="wrap_content mt-5"> --}}
    <div class="wrap_content">
        @if(!is_null($produk) && count($produk) > 0)
        <h3>Daftar Produk</h3>
            @if($jml_produk_berjalan > 0)
            <div class="mt-4">
                <a href="{{ url('/addNew/sa') }}" class="add_btn"><i class="fas fa-plus"></i>&nbsp; Sertifikasi Baru</a>
            </div>
            <br>
            @endif
        <br>

        {{-- <b>Tahap Sertifikasi: </b><br>
        <div class="mt-2">
            <div class="tahap_sert_pending ml-3"></div>&nbsp; Sedang Berjalan
            <div class="tahap_sert_on ml-3"></div>&nbsp; Sudah Selesai
        </div>
        <br> --}}
        
        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="27%">Produk</th>
                    <th width="25%">Kategori</th>
                    <th width="30%">Tahap Sertifikasi</th>
                    <th width="10%">Lihat Produk</th>
                </tr>
            </thead>
            <tbody>
                <!-- {{{$key = 0}}} -->
                @foreach($produk as $data)
                <tr class="table_data">
                    <td>{{ $key+=1 }}</td>
                    <td><h6>{{ $data->produk }}</h6></td>
                    <td>{{ $data->jenis_produk }}</td>
                    <td>
                        {{-- <span class="{{ $data->kode_tahap == 24 ? 'sert_done' : 'sert_going' }}">{{ $data->kode_tahap == 24 ? 'Sertifikasi Selesai' : 'Sedang Berjalan' }}</span> --}}
                        
                        <div class="
                                @if(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 24)
                                    tahap_sert_on
                                @else
                                    tahap_sert_pending
                                @endif
                        ">
                        
                        @if(!is_null($data->kode_tahap) && intval($data->kode_tahap) !== 10)
                            @if(intval($data->kode_tahap) === 23)
                                @foreach($tahap_sert as $tahap)
                                    @if( intval($data->kode_tahap) == intval($tahap->kode_tahap) )
                                    {{ $tahap->tahapan }}<br><small>(Menunggu penerimaan sertifikat oleh client)</small>
                                    @endif
                                @endforeach
                            @elseif(intval($data->kode_tahap) === 24)
                                &nbsp;Sertifikat telah diterima
                            @else
                                @foreach($tahap_sert as $tahap)
                                    @if( intval($data->kode_tahap)+1 == intval($tahap->kode_tahap) )
                                    {{ $tahap->tahapan }}
                                    @endif
                                @endforeach
                            @endif
                        @elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10)
                            @foreach($tahap_sert as $tahap)
                                @if(intval($data->kode_tahap) == intval($tahap->kode_tahap))
                                {{$tahap->tahapan}}
                                @endif
                            @endforeach
                        @else
                        Tidak ada sertifikasi produk yang berjalan
                        @endif
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <a class="view_produk" href="{{ url('/'.$page($data->kode_tahap).'/'.$data->id) }}">Tinjau</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <img src="{{ asset('images/empty-sertifikasi.png')  }}" alt="">
        <br>
        <div class="text-center pt-4 pb-4">
            <h4>Anda belum memiliki sertifikasi apapun</h4>
            <br>
            <a href="{{ url('/addNew/sa') }}" class="register_btn">Buat Sertifikasi</a>
        </div>
        @endif
    </div>
{{-- </div> --}}

@endsection
