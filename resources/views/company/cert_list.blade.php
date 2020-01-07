@extends('home')

@section('card-header', $card_header)

@section('second-content')

<div class="col">
    <div class="wrap_content">
        
        @if(!$client->isEmpty())
        <div class="row title_list pt-2 pb-2">
            <div class="col-lg">
                <h6 class="mb-4">
                    List Sertifikasi Produk Yang 
                    @if($status == 'history')
                    Sudah Selesai
                    @else
                      @if($status == 'all')
                      Sudah Dikerjakan 
                      @else
                      Sedang Dalam Proses Pengerjaan
                      @endif
                    @endif
                </h6>
                {{-- <b>Tahap Sertifikasi Terakhir: </b><br>
                <div class="mt-2">
                    @if($status == 'on_going')
                    <div class="tahap_sert_pending ml-3"></div>&nbsp; Tahap Sertifikasi Awal
                    @endif
                    <div class="tahap_sert_on ml-3"></div>&nbsp; Tahap Selesai
                </div> --}}
            </div>
        </div>
        
        
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
                      <td ><h6>{{ $data->nama_perusahaan }} <span style="font-size: 12px;" class="{{ $data->negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $data->negeri == 1 ? 'produsen' : 'importir' }}</span></h6><span>{{ $data->pimpinan_perusahaan }}</span></td>
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
        @else
            @if($status == 'history')
             <div class="text-center p-5">
                 <img style="width: 400px;" src="{{ asset('images/empty-data.png') }}" alt="">
                 <br>
                 <h6 class="info_text mt-4">Tidak ada sertifikasi yang sudah selesai</h6>
             </div>
              @elseif($status == 'all')
              <div class="text-center p-5">
                 <img style="width: 400px;" src="{{ asset('images/no-action.png') }}" alt="">
                 <br>
                 <h6 class="info_text mt-4">Tidak ada sertifikasi yang sedang berjalan</h6>
             </div>
             @else
             <div class="text-center p-5">
                 <img style="width: 400px;" src="{{ asset('images/no-action.png') }}" alt="">
                 <br>
                 <h6 class="info_text mt-4">Tidak ada sertifikasi yang harus dikerjakan</h6>
             </div>
             @endif
        @endif
    </div>
</div>

<script>
    {{-- $(window).scroll(function() {
        $('.title_list').toggleClass('title_list_scrolled', $(this).scrollTop() > 120);
    }); --}}
    
    $(document).ready(function() {
  $('.device-table').DataTable({
    "fixedHeader": {
      header: true,
    },
    "bLengthChange": false,
    "Filter": false,
    "Info": false,
  });

});
</script>

@endsection
