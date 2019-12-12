@extends('home')

@section('card-header', 'Approval Penawaran Harga')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @if(!is_null($model) && !is_null($model->bid_price) && $model->status === 2)
        <center>
            <p class="alert alert-success">Penawaran harga telah dibuat oleh Seksi Pemasaran</p>
        </center>
        	@if(\Session::has('successMsg'))
        	<center>
	            <p class="alert alert-success">{{ \Session::get('successMsg') }}</p>
	        </center>
	        @endif
        
        <div class="text-center">
            <a href="{{ url('/doc/download/bidPrice/'.$model->bid_price) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                </div>
            </a>
        </div>

        <br>

        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target=".ubahHarga">Edit Dokumen Penawaran Harga</button>
        <small class="form-text text-muted mb-3">Ubah jika di perlukan</small>

        <div class="modal fade bd-example-modal-lg ubahHarga" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen Penawaran Harga &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></h5>
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span>
	                        </button>
	                </div>
	                <div class="body">
	                    <div class="container p-3">
	                        <h5>Edit Rincian Harga</h5>
	                        <form id="ediRincianHarga" method="POST" action="{{ url('/edit_rincianHarga/'.$idProduk.'/'.$user->id) }}">
				                @csrf
				                <div class="form-group">
				                    
				                    <label>Biaya Permohonan</label>
				                    <div class="input-group mb-3">
				                        <div class="input-group-prepend">
				                            <span class="input-group-text">Rp</span>
				                        </div>
				                        <input class="form-control bpText" type="text" name="b_permohonan" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)" value="{{ json_decode($model->harga, true)['b_permohonan'] }}">
				                    </div>
				                    <label>Audit Stage-I (Audit Kecukupan)</label>
				                    <div class="input-group mb-3">
				                        <div class="input-group-prepend">
				                            <span class="input-group-text">Rp</span>
				                        </div>
				                        <input class="form-control bpText" type="text" name="b_audit1" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)" value="{{ json_decode($model->harga, true)['b_audit1'] }}">
				                    </div>
				                    
				                    <p><b>Audit Kesesuaian</b></p>
				                    <div class="row ml-2 mr-2">
				                        <div class="col-lg-6">
				                            <label>Auditor Kepala dan Auditor</label>
				                            <div class="input-group mb-3">
				                                <div class="input-group-prepend">
				                                    <span class="input-group-text">Rp</span>
				                                </div>
				                                <input class="form-control bpText" type="text" name="b_kepala" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)" value="{{ json_decode($model->harga, true)['b_kepala'] }}">
				                            </div>
				                        </div>
				                        <div class="col-lg-6">
				                            <label>PPC</label>
				                            <div class="input-group mb-3">
				                                <div class="input-group-prepend">
				                                    <span class="input-group-text">Rp</span>
				                                </div>
				                                <input class="form-control bpText" type="text" name="b_ppc" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)" value="{{ json_decode($model->harga, true)['b_ppc'] }}">
				                            </div>
				                        </div>
				                    </div>
				                    
				                    <p><b>Biaya jasa proses sertifikasi</b></p>
				                    <div class="row ml-2 mr-2">
				                        <div class="col-lg-6">
				                            <label>Panitia Teknis dan Tim Penilai</label>
				                            <div class="input-group mb-3">
				                                <div class="input-group-prepend">
				                                    <span class="input-group-text">Rp</span>
				                                </div>
				                                <input class="form-control bpText" type="text" name="b_pTeknis" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)" value="{{ json_decode($model->harga, true)['b_pTeknis'] }}">
				                            </div>
				                        </div>
				                        <div class="col-lg-6">
				                            <label>Panitia Proses Sertifikasi</label>
				                            <div class="input-group mb-3">
				                                <div class="input-group-prepend">
				                                    <span class="input-group-text">Rp</span>
				                                </div>
				                                <input class="form-control bpText" type="text" name="b_sert" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)" value="{{ json_decode($model->harga, true)['b_sert'] }}">	
				                            </div>
				                        </div>
				                    </div>
				                    <div id="validMsg"></div>
				                    <div class="mt-4">
				                        <button class="reset_btn mr-3" type="reset">Reset</button>
				                        <button class="submit_btn" type="button" onclick="ValidateSize('null', '.reqText', '#ediRincianHarga', '#validMsg')">Submit</button>
				                    </div>
				                </div>
				            </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

        <p><b>Approval Penawaran harga</b></p>
        <br>
        <form id="apprvPriceForm" method="POST" action="{{ url('/bidPrice_approval/'.$idProduk) }}">
            @csrf
            <input class="apprvBPchoice" type="hidden" name="choice" value="">
            <button class="reject_btn mr-3" type="button" onclick="apprvPrice2(false)" value="tolak">Tolak</button>
            <button class="acc_btn mr-2" type="button" onclick="apprvPrice2(true)" value="terima">Terima</button>
        </form>
        @elseif(!is_null($model) && $model->status == 1)
        <center>
            <p class="alert alert-success">Penawaran harga telah disetujui</p>
        </center>
        <div class="text-center">
            <a href="{{ url('/doc/download/bidPrice/'.$model->bid_price) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                </div>
            </a>
        </div>
        <br>
        @else
        <center>
            <p class="alert alert-primary">Penawaran harga belum dibuat</p>
        </center>
        @endif
    </div>
</div>

<script type="text/javascript">
    function apprvPrice2(choice) {
        let value = "";
        let title = "";
        let textTolak = "";
        if (choice) {
            value = "terima";
            title = "Setujui Penawaran Harga";
        } else {
            value = "tolak";
            title = "Tolak Penawaran Harga";
            textTolak = ", Dokumen Penawaran Harga akan dihapus, Permintaan pembuatan dokumen baru akan dikirim ke Seksi Pemasaran";
        }
        $('.apprvBPchoice').val(value);
        swal({
            title: title,
            text: "Apakah anda yakin?"+textTolak,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((ok) => {
            if (ok) {
                $('#apprvPriceForm').submit();
            } else {
                return false;
            }
        });
    }
</script>
@endsection
