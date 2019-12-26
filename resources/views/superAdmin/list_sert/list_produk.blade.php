@extends('superAdmin.layouts.main')

@section('title_page', 'List Sertifikasi')

@section('content-super-admin')
	
<div class="col-lg">
    <div class="wrap_content">
        <div class="card mt-3 p-3">
            <div class="card-body">
            	<h5>List Sertifikasi Produk Perusahaan</h5><br>
            	<h6>
            		<b>{{ $user->nama_perusahaan }} </b>
            		<span style="font-size: 12px;" class="{{ $user->negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $user->negeri == 1 ? 'produsen' : 'importir' }}</span>
            	</h6>
            	<br>
            	<table id="example" class="table" style="width:100%">
	              <thead>
	                  <tr>
	                      <th width="5%">No</th>
	                      <th width="20%">Produk</th>
	                      <th width="25%">Tanggal Apply</th>
	                      <th width="25%">Tahap Sertifikasi</th>
	                      {{-- <th width="10%">Lihat Produk</th> --}}
	                  </tr>
	              </thead>

	              <tbody style="font-size: 15px;">
	                <!-- {{{$key = 0}}} -->
	                  @foreach($list_produk as $data)
	                  <tr class="table_data">
	                      <td >{{ $key+=1 }}</td>
	                      <td ><h6>{{ ucfirst($data->produk) }}</h6>{{ $data->jenis_produk }}</td>
	                      <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
	                      <td>
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
	                  </tr>
	                  @endforeach
	              </tbody>
	          </table>

            </div>
        </div>
    </div>
</div>

@endsection