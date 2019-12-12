@extends('home')

@section('card-header', 'List Perusahaan')

@section('second-content')

<div class="col">
    <div class="wrap_content">
       
        <div class="row title_list pt-2 pb-2">
            <div class="col-lg">
              {{-- <h4 class="mb-2">List Perusahaan yang mengajukan sertifikasi produk</h4> --}}
                <!-- <h4 class="mb-2">List Perusahaan</h4> -->
               {{-- <b>Tahap Sertifikasi Terakhir: </b><br>
                <div class="mt-2">
                    <div class="tahap_sert_pending"></div>&nbsp;Tahap Sertifikasi Awal
                    <div class="tahap_sert_on ml-3"></div>&nbsp; Tahap Selesai
                    <div class="tahap_sert_off ml-3"></div>&nbsp; Belum memulai tahap sertifikasi
                </div> --}}
            </div>
        </div>
        
        <br>
        
        @if(!$client->isEmpty())
        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="24%" style="align-self: center;">Perusahaan</th>
                    <th width="35%">Kontak Perusahaan</th>
                    {{-- <th width="18%">Kontak</th> --}}
                    <th width="18%">Jumlah Produk</th>
                    {{-- <th width="10%">Lihat Produk</th> --}}
                </tr>
            </thead>
            <tbody style="font-size: 15px;">
                @foreach($client as $key => $data)
                <tr class="table_data">
                    <td >{{ $key+=1 }}</td>
                    <td ><h6>{{ $data->nama_perusahaan }} <span style="font-size: 13px;" class="{{ $data->negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $data->negeri == 1 ? 'produsen' : 'importir' }}</span></h6><span>{{ $data->pimpinan_perusahaan }}</span></td>
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
                        {{ $data->jumlah_produk }}            
                    </td>
                    {{-- <td class="text-center align-middle"><a class="view_produk" href="{{ url('/company/'.$data->id) }}"><i class="fas fa-eye"></i></a></td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        
        <div class="text-center p-5">
             <img style="width: 400px;" src="{{ asset('images/empty-data.png') }}" alt="">
             <br>
             <h6 class="info_text mt-4">Data perusahaan kosong</h6>
         </div>
        
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
