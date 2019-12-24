 {{-- @extends('home') --}}

 {{-- @section('card-header', 'Dasboard')  --}}

@extends('superAdmin.layouts.main')

@section('title_page', 'Dashboard')

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
 
 {{-- Dashboard Content --}}
<div class="col-lg">
    <div class="wrap_content">
       <div class="card mt-3 p-3">
           <div class="card-body">

                {{-- @if()
                <div class="text-center">
                    <img style="width: 300px;" src="{{ asset('images/empty-superAdmin.png') }}" alt="">
                    <h5 class="mt-4">Beberapa konten akan ada di sini</h5>
                </div> --}}
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Produk</th>
                            <th width="15%">Tanggal Apply</th>
                            <th width="20%" style="align-self: center;">Perusahaan</th>
                            <th width="25%">Kontak Perusahaan</th>
                            <th width="28%">Tahap Sertifikasi</th>
                            <th width="10%">Lihat Produk</th>
                        </tr>
                    </thead>

                    <tbody style="font-size: 15px;">
                        <!-- {{{$key = 0}}} -->
                        @foreach($client as $data)
                        <tr class="table_data">
                            <td >{{ $key+=1 }}</td>
                            <td><h6>{{ ucfirst($data->produk) }}</h6>{{ $data->jenis_produk }}</td>
                            <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                            <td ><h6>{{ $data->nama_perusahaan }} <span style="font-size: 12px;" class="{{ $data->negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $data->negeri == 1 ? 'produsen' : 'importir' }}</span></h6><span class="mt-4">{{ $data->pimpinan_perusahaan }}</span></td>
                            <td>
                                <div class="row no-gutters">
                                    <div class="col-lg-1 col-md-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="col-lg-11 col-md-11">
                                        {{ $data->provinsi }}, {{ $data->kota }}, {{ $data->alamat_perusahaan }}
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-lg-1 col-md-1">
                                        <i class="fas fa-at"></i>
                                    </div>
                                    <div class="col-lg-11 col-md-11">
                                        {{ $data->email_perusahaan }}
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-lg-1 col-md-1">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="col-lg-11 col-md-11">
                                        {{ $data->no_telp }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="
                                      @if(is_null($data->tahapan))
                                          tahap_sert_off
                                      @elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10)
                                          tahap_sert_on
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
                                        @foreach($tahap_sert as $tahap)
                                            @if( intval($data->kode_tahap)+1 == $tahap->kode_tahap )
                                            {{ $tahap->tahapan }}
                                            @endif
                                        @endforeach
                                      @endif
                                  @elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10)
                                  {{ $data->tahapan }}<br>
                                  @else
                                  Tidak ada sertifikasi produk yang berjalan
                                  @endif
                              </div>
                            </td>
                            <td class="text-center align-middle"><a class="view_produk" href="{{ url('/'.$page($role, $data->kode_tahap).'/'.$data->id.'/'.$link($role).'/'.$data->produk_id) }}">Tinjau</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

           </div>
       </div> 
    </div>
</div>
<br>
<br>

@endsection