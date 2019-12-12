@extends('home')

@section('card-header', 'Upload Audit Plan dan Sampling Plan')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @component('stepper') sertifikasi,2,{{ $user->id }},{{ $idProduk }},{{ $kode_tahap }} @endcomponent

        <br>
        @if(!$errors->isEmpty())
        <ul class="alert alert-danger">
            @foreach($errors->getMessages() as $key => $error)
            <li class="pl-2">{{ $error[0] }}</li>
            @endforeach
        </ul>
        @endif

        @if(\Session::has('msg'))
        <center><p class="alert alert-success">{{ \Session::get('msg') }}</p></center>
        @endif

        <div class="modal fade bd-example-modal-lg dataSert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Kelengkapan Data Sertifikat Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="container p-3">
                            <center><p class="alert alert-primary">Data form ini akan digunakan untuk data pembuatan sertifikat client.</p></center>
                            @if(!is_null($data_sert))
                            <center><p class="alert alert-success">Form telah diisi</p></center>
                            @endif
                            <form id="kelengDatSert" method="POST" action="{{ url('/kelengDatSert/'.$idProduk) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Nomor</label>
                                        <input type="text" name="no_sert" class="form-control sert_data" required="" value="{{ !is_null($data_sert) ? $data_sert->nomor : '' }}">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Merek</label>
                                        <input type="text" name="merek" class="form-control sert_data" required="" value="{{ !is_null($data_sert) ? $data_sert->merek : '' }}">
                                        <small class="form-text text-muted">Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tipe/Jenis</label>
                                    <textarea class="form-control sert_data" name="tipe" required="" rows="5">{{ !is_null($data_sert) ? $data_sert->tipe_jenis : '' }}</textarea>
                                    <small class="form-text text-muted">Wajib diisi</small>
                                </div>
                                <div class="form-group">
                                    <label>Regulasi/Skema</label>
                                    <textarea class="form-control sert_data" name="regulasi" required="">{{ !is_null($data_sert) ? $data_sert->regulasi_skema : '' }}</textarea>
                                    <small class="form-text text-muted">Wajib diisi</small>
                                </div>
                                <div class="form-group">
                                    <label>Skema Sertifikasi Produk</label>
                                    <input type="text" name="skema_sert" class="form-control sert_data" required="" value="{{ !is_null($data_sert) ? $data_sert->skema_sert : '' }}">
                                    <small class="form-text text-muted">Wajib diisi</small>
                                </div>
                                <div class="validMsg"></div><br>
                                <div class="modal-footer">
                                    <button type="button" class="submit_btn" onclick="ValidateSize('', '.sert_data', '#kelengDatSert', '.validMsg')">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(!is_null($formatFileAp) && !is_null($formatFileSp))
            @if( (!is_null($dokImportir) && $dokImportir->sni == 1) && (!is_null($tinjauanPP) && $tinjauanPP->sni == 1) && (is_null($samplingPlan) || is_null($samplingPlan->doc_maker)) )

                @if(is_null($samplingPlan) || (!is_null($samplingPlan) && is_null($samplingPlan->doc_maker)))
                <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
                  <div class="row no-gutters">
                      <div class="col-lg-1">
                          <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                      </div>
                      <div class="col-lg-11 pl-2 pr-2">
                          <p style="color: #0D47A1;">File Audit Plan dan Sampling Plan yang sudah diupload akan otomatis tersimpan</p>
                      </div>
                  </div>
                </div>
                @endif
                
                <p><b>Upload Audit Plan dan Sampling Plan</b></p><br>
                <div class="info_file">
                    <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.pdf</b>
                </div>
                <br>
                
                <form id="samplingPlan_upload" method="POST" action="{{ url('/auditPlan_upload/'.$idProduk) }}">
                    @csrf
                    <div class="text-center">
                        <a href="{{ url('/doc/download/format_dok/'.$formatFileAp->file) }}">
                            <div class="download_file" style="margin-top: 0;">
                                <i class="fas fa-download"></i>&nbsp;
                                Download Format Dokumen Audit Plan
                            </div>
                        </a>
                    </div>
                    <div class="form-group">
                        <label>Audit Plan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input auditUpload file1 @error('file[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]" required="">
                            <input class="fileName" type="hidden" name="fileName[]" value="audit_plan">
                            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($samplingPlan) && !is_null($samplingPlan->audit_plan) ? $samplingPlan->audit_plan : 'Pilih File..' }}</label>
                            <small class="form-text text-muted">Upload Dokumen Audit Plan yang sudah diisi</small>
                            <i class="resUpload">{{ !is_null($samplingPlan) && !is_null($samplingPlan->audit_plan) ? 'File telah diupload' : '' }}</i>
                        </div>
                    </div><br>
                    <div class="text-center">
                        <a href="{{ url('/doc/download/format_dok/'.$formatFileSp->file) }}">
                            <div class="download_file" style="margin-top: 0;">
                                <i class="fas fa-download"></i>&nbsp;
                                Download Format Dokumen Sampling Plan
                            </div>
                        </a>
                    </div>    
                    <div class="form-group">
                        <label>Sampling Plan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input auditUpload file1 @error('file[]') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file[]" required="">
                            <input class="fileName" type="hidden" name="fileName[]" value="sampling_plan">
                            <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($samplingPlan) && !is_null($samplingPlan->sampling_plan) ? $samplingPlan->sampling_plan : 'Pilih File..' }}</label>
                            <small class="form-text text-muted">Upload Dokumen Sampling Plan yang sudah diisi</small>
                            <i class="resUpload">{{ !is_null($samplingPlan) && !is_null($samplingPlan->sampling_plan) ? 'File telah diupload' : '' }}</i>
                        </div>
                    </div>
                    {{-- <div class="validMsg"></div> --}}

                    <div id="btn_submit_audit" class="{{ !is_null($samplingPlan) && !is_null($samplingPlan->audit_plan) && !is_null($samplingPlan->sampling_plan) ? '' : 'hid' }}">
                        <br>
                        {{-- <button type="reset" class="reset_btn mr-3">Reset</button> --}}
                        <button type="button" class="submit_btn" onclick="ValidateSize('', '', '#samplingPlan_upload', '')">Submit</button>
                    </div>
                </form>
                 <br>
                <br>
            @elseif( ((!is_null($dokImportir) && $dokImportir->sni !== 1) && (!is_null($tinjauanPP) && $tinjauanPP->sni !== 1)) || (is_null($dokImportir) || is_null($tinjauanPP)) )
                <center>
                    <p class="alert alert-warning">Laporan audit kecukupan sertifikasi produk client belum lengkap</p>
                </center>
            @endif
        @else
        <center>
            <p class="alert alert-primary">Fitur Upload <b>Audit Plan</b> dan <b>Sampling Plan</b> masih dikunci.<br>Dikarenakan format file <b>Audit Plan</b> dan <b>Sampling Plan</b> belum ada</p>
        </center>
        @endif


        @if(!is_null($samplingPlan) && !is_null($samplingPlan->doc_maker))
        <center>
            <p class="alert alert-success">Audit Plan dan Sampling Plan telah diupload</p>
        </center>
        <div class="row">
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="{{ url('/doc/download/auditPlan/'.$samplingPlan->audit_plan) }}" target="_blank">
                        <div class="download_file" style="margin-top: 0;">
                            <i class="fas fa-download"></i>&nbsp; Download Audit Plan
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="{{ url('/doc/download/samplingPlan/'.$samplingPlan->sampling_plan) }}" target="_blank">
                        <div class="download_file" style="margin-top: 0;">
                            <i class="fas fa-download"></i>&nbsp; Download Sampling Plan
                        </div>
                    </a>
                </div>    
            </div>
        </div>
        @endif

        @if( (!is_null($dok) || is_null($dok)) && (!is_null($samplingPlan) && !is_null($samplingPlan->doc_maker) && !is_null($samplingPlan->sampling_plan) && !is_null($samplingPlan->audit_plan))  )
	        @if($kode_tahap < 20)
		        <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
		          <div class="row no-gutters">
		              <div class="col-lg-1">
		                  <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
		              </div>
		              <div class="col-lg-11 pl-2 pr-2">
		                  <p style="color: #0D47A1;">Form Kelengkapan Data Sertifikat Client akan aktif sampai pembuatan draft sertifikat selesai</p>
		              </div>
		          </div>
		        </div>
		        <br>
		        <h5>Form Kelengkapan Data Sertifikat Client</h5>
		        <button type="button" class="modal_btn" data-toggle="modal" data-target=".dataSert">
		        {{ !is_null($data_sert) && !is_null($data_sert->pengisian_data) ? 'Edit form' : 'Isi form di sini' }}</button>
		        @if(is_null($data_sert) || (!is_null($data_sert) && !is_null($data_sert->pengisian_data)))
		        <small class="form-text text-muted">Isi form terlebih dahulu</small>
		        @endif
		        <br><br>
	        @endif

	        @if( is_null($dok) || (!is_null($dok) && is_null($dok->kelengkapan_dok))  )
	            <br>
	            <p><b>Upload SHU, BAPC, dan Closed NCR</b></p>
	            {{-- <div class="info_file">
	                <i class="fas fa-info-circle fa-lg" style="color: #42A5F5;"></i>&nbsp; Format file yang diizinkan <b>.pdf</b>
	            </div> --}}
	            <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
	              <div class="row no-gutters">
	                  <div class="col-lg-1">
	                      <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
	                  </div>
	                  <div class="col-lg-11 pl-2 pr-2">
	                      <p style="color: #0D47A1;">File SHU, BAPC, dan Closed NCR yang sudah diupload akan otomatis tersimpan</p>
	                  </div>
	              </div>
	            </div>
	            <br>
	            
	            <form id="laporanSert_upload" method="POST" action="{{ url('/laporanSert_upload/'.$idProduk) }}" enctype="multipart/form-data">
	                @csrf
	                {{-- <div class="text-center">
	                    <a href="{{ url('/shu/download/'.$user->id.'/'.$idProduk) }}">
    	    	            <div class="download_file" style="margin-top: 0;">
    	    	               <i class="fas fa-download"></i>&nbsp; Download Format Dokumen SHU
    	    	            </div>
    	    	        </a>
	                </div> --}}
	                <div class="form-group">
	                    <label>SHU</label>
	                    <div class="custom-file">
	                        <input type="file" class="custom-file-input shuUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="shu" required="">
	                        <input class="fileName" type="hidden" name="fileName[]" value="shu">
	                        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->shu) ? $dok->shu : 'Pilih File..' }}</label>
	                        <small class="form-text text-muted">Format file yang diizinkan <b>.pdf</b></small>
	                        <small class="form-text text-muted">Upload dokumen SHU yang sudah diisi</small>
	                        <i class="resUpload">{{ !is_null($dok) && !is_null($dok->shu) ? 'File telah diupload' : '' }}</i>
	                    </div>
	                </div>
	                {{-- <div class="text-center">
	                    <a href="{{ url('/bapc/download/'.$user->id.'/'.$idProduk) }}">
	    	                <div class="download_file" style="margin-top: 0;">
	    	                   <i class="fas fa-download"></i>&nbsp; Download Format Dokumen BAPC
	    	                </div>
	    	            </a>
	                </div> --}}
	                <div class="form-group">
	                    <label>BAPC</label>
	                    <div class="custom-file">
	                        <input type="file" class="custom-file-input shuUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="bapc" required="">
	                        <input class="fileName" type="hidden" name="fileName[]" value="bapc">
	                        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->bapc) ? $dok->bapc : 'Pilih File..' }}</label>
	                        <small class="form-text text-muted">Format file yang diizinkan <b>.pdf</b></small>
	                        <small class="form-text text-muted">Upload dokumen BAPC yang sudah diisi</small>
	                        <i class="resUpload">{{ !is_null($dok) && !is_null($dok->bapc) ? 'File telah diupload' : '' }}</i>
	                    </div>
	                </div>
	                {{-- <div class="text-center">
	                    <a href="{{ url('/closed_ncr/download/'.$user->id.'/'.$idProduk) }}">
	    	                <div class="download_file" style="margin-top: 0;">
	    	                   <i class="fas fa-download"></i>&nbsp; Download Format Dokumen Closed NCR
	    	                </div>
	    	            </a>
	                </div> --}}
	                <div class="form-group">
	                    <label>Closed NCR</label>
	                    <div class="custom-file">
	                        <input type="file" class="custom-file-input shuUpload file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="cncr" required="">
	                        <input class="fileName" type="hidden" name="fileName[]" value="closed_ncr">
	                        <label class="custom-file-label" for="inputGroupFile01">{{ !is_null($dok) && !is_null($dok->closed_ncr) ? $dok->closed_ncr : 'Pilih File..' }}</label>
	                        <small class="form-text text-muted">Format file yang diizinkan <b>.pdf</b></small>
	                        <small class="form-text text-muted">Upload dokumen Closed NCR yang sudah diisi</small>
	                        <i class="resUpload">{{ !is_null($dok) && !is_null($dok->closed_ncr) ? 'File telah diupload' : '' }}</i>
	                    </div>
	                </div>
	                <br>

	                <div id="btn_submit_shu" class="{{ !is_null($dok) && !is_null($dok->shu) && !is_null($dok->bapc) && !is_null($dok->closed_ncr) ? '' : 'hid' }}">
	                    <div id="validMsg"></div>
	                    <button type="reset" class="reset_btn mr-3">Reset</button>
	                    <button type="button" class="submit_btn" class="reset_btn" onclick="ValidateSize('', '', '#laporanSert_upload', '#validMsg');">Submit</button>
	                </div>

	            </form>
	            <br>
	        @elseif(!is_null($dok) && !is_null($dok->kelengkapan_dok))
		        <center>
		            <p class="alert alert-success">SHU, BAPC, dan Closed NCR telah diupload.<br>
		                @if(!is_null($dok) && !is_null($dok->laporan_hasil_sert))
		                Laporan Hasil Sertifikasi telah dibuat.
		                @endif
		            </p>
		        </center>
		        <div class="row">
		            <div class="col-lg">
		                <div class="text-center">
		                    <a href="{{ url('/doc/download/shu/'.$dok->shu) }}" target="_blank">
		                        <div class="view_file">
		                            <i class="fas fa-eye"></i>&nbsp;
		                            Lihat SHU
		                        </div>
		                    </a>
		                </div>
		            </div>
		            <div class="col-lg">
		                <div class="text-center">
		                    <a href="{{ url('/doc/download/bapc/'.$dok->bapc) }}" target="_blank">
		                        <div class="view_file">
		                            <i class="fas fa-eye"></i>&nbsp;
		                             Lihat BAPC
		                        </div>
		                    </a>
		                </div>      
		            </div>
		            <div class="col-lg">
		                <div class="text-center">
		                    <a href="{{ url('/doc/download/closedNCR/'.$dok->closed_ncr) }}" target="_blank">
		                        <div class="view_file">
		                             <i class="fas fa-eye"></i>&nbsp;
		                              Lihat Closed NCR
		                        </div>
		                    </a>
		                </div>      
		            </div>
		        </div>
	        @endif
	    @endif
	         <hr>
        @if(!is_null($dok) && !is_null($dok->kelengkapan_dok) && is_null($dok->laporan_hasil_sert))
	        <p><b>Buat Laporan Hasil Sertifikasi</b> &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></p>
	        <form id="lapHasilSertForm" method="POST" action="{{ url('/lapSert_create/'.$idProduk.'/'.$user->id) }}">
	            @csrf
	            <div class="form-group">
	                <label>Tanggal Audit</label>
	                <div class="row">
	                    <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input id="tgl_audit1" type="text" name="tgl1" class="datepicker-here form-control tgl_audit" data-language="en" data-date-format="dd/mm/yyyy" onkeydown="return false;" placeholder="dd/mm/yyyy" autocomplete="off" />
                            </div>
	                    </div>
	                    <div class="col-lg-2 text-center">
	                        sampai
	                    </div>
	                    <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input id="tgl_audit2" type="text" name="tgl2" class="datepicker-here form-control tgl_audit"  data-language="en" data-date-format="dd/mm/yyyy" onkeydown="return false;" placeholder="dd/mm/yyyy" autocomplete="off" />
                            </div>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label>Tim Audit</label>
	                <textarea class="form-control textI" name="tim_audit" rows="3" required="" placeholder="Contoh: Tim Audit1, Tim Audit2, ..."></textarea><br>
	            </div>
	            <div id="validMsg2"></div>
	            <button type="reset" class="reset_btn mr-3">Reset
	            </button>
	            <button type="button" class="submit_btn" onclick="formDateRange('null', '.tgl_audit', '#lapHasilSertForm', '#validMsg2');">Submit
	            </button>
	        </form><br>
       
        @elseif(!is_null($dok) && !is_null($dok->laporan_hasil_sert))
	        <center>
	        	<p class="alert alert-success">
	        		Laporan Hasil Sertifikasi telah dibuat. <br>
	        		@if(is_null($dok->signed_lapSert))
	        		Untuk melanjutkan ke tahap selanjutnya tunggu kelengkapan dokumen Laporan Hasil Sertifikasi dari Ketua Tim Teknis.
	        		@else
	        		Pengisian Laporan Hasil Sertifikasi telah selesai.
	        		@endif
	        	</p>
	        </center>
	        <div class="text-center">
	            <a href="{{ url('/doc/download/lapSert/'.$dok->laporan_hasil_sert) }}" target="_blank">
	                <div class="view_file">
	                    <i class="fas fa-eye"></i>&nbsp;
	                    Lihat Laporan Hasil Sertifikasi
	                </div>
	            </a>
	        </div>
        @endif
        
        <div class="row mt-4 mb-4">
            <div class="col-lg-6">
                <a href="{{ url('/company/'.$user_id.'/audit/'.$idProduk) }}" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            @if($kode_tahap >= 20)
            <div class="col-lg-6 text-right">
                <a href="{{ url('/draftSert/'.$user_id.'/audit/'.$idProduk) }}" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>
        
    </div>
</div>

<script type="text/javascript">
    $('#tgl_audit1').datepicker({
        onSelect: function(formattedDate, date, inst) {
            $('#tgl_audit2').datepicker({
                'minDate': date
            });
        }
    });
</script>
@endsection
