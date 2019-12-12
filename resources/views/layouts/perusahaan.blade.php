{{--@extends('layouts.main')

@section('perusahaan')
	<div class="row justify-content-center mb-3">
        <div class="col-md-12">
			<div class="col-lg-12">
   				<div class="wrap_content">
                <h4>Perusahaan</h4>
                <h6>
                    {{ $user->nama_perusahaan }} <sup class="{{ $userAuth -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor' }}">{{ $userAuth -> negeri == 1 ? 'produsen' : 'importir' }}</sup>
                    @if(isset($produk))
                    - {{$produk}}
                    @endif
                </h6>
            </div>
	        </div>
        </div>
    </div>
@endsection--}}

