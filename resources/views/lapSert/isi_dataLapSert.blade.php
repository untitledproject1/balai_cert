@extends('home')

@section('card-header', 'Kelengkapan Laporan Hasil Sertifikasi')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @if(\Session::has('successMsg'))
            <center><p class="alert alert-success">{{ \Session::get('successMsg') }}</p></center>
        @endif
        @if(!is_null($lapSert) && !is_null($lapSert->laporan_hasil_sert) && $lapSert->status_timTeknis === 1)
            <center><p class="alert alert-success">Pengisian kelengkapan Laporan Hasil Sertifikasi selesai</p></center>
        @endif
        @if(!is_null($lapSert) && !is_null($lapSert->laporan_hasil_sert))
            <center><p class="alert alert-success">Laporan Hasil Sertifikasi telah dibuat.</p></center>
            <div class="text-center">
                <a href="{{ asset('storage/dok/lapSert/'.$lapSert->laporan_hasil_sert) }}" target="_blank">
                    <div class="download_file" style="margin-top: 0;">
                        <i class="fas fa-download"></i>&nbsp; Download Laporan Hasil Sertifikasi
                    </div>
                </a>
            </div>
            <br>
            {{-- <div class="mb-3"><b>List Pengisian Rekomendasi Evaluasi Rapat Teknis</b></div>
            <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
              <div class="row no-gutters">
                  <div class="col-lg-1">
                      <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                  </div>
                  <div class="col-lg-11 pl-2 pr-2">
                      <p style="color: #0D47A1;">Tim Teknis yang sudah mengisi <b>Rekomendasi Evaluasi Rapat Teknis</b> pada list ini ditandai dengan icon <span class="badge badge-primary badge-pill">&check;</span></p>
                  </div>
              </div>
            </div>
            <br>
            <ul class="list-group list-group-horizontal">
                @foreach($tim_teknis as $teknis)
                <li class="list-group-item" style="cursor: default;">
                    @if($cek($teknis->id, $lapSert, false))
                    <span class="badge badge-primary badge-pill">&check;</span> 
                    @endif 
                &nbsp; {{ $teknis->name }}</li>
                @endforeach
            </ul><br><br> --}}
        @endif

        @if(!is_null($lapSert) && !is_null($lapSert->laporan_hasil_sert) && $lapSert->status_timTeknis !== 1)
            <h5>Form isi dokumen Laporan Hasil Sertifikasi &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></h5>
            <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
              <div class="row no-gutters">
                  <div class="col-lg-1">
                      <img style="width: 30px;" src="{{ asset('images/icon/light-bulb-info.svg') }}" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                  </div>
                  <div class="col-lg-11 pl-2 pr-2">
                      <p style="color: #0D47A1;">Form ini akan aktif selama Ketua Tim Teknis belum men-submit <b>Form kelengkapan Laporan Hasil Sertifikasi.</b></p>
                  </div>
              </div>
            </div><br>
            <form id="isiLapSert" method="POST" action="{{ url('/isi_dataLapSert/'.$idProduk.'/'.$user->id) }}">
                @csrf
                {{-- <label>Tanggal Audit</label>
                <input type="date" class="form-control reqLp" name="tgl_audit" required="">
                <small class="form-text text-muted">Tanggal Audit wajib diisi</small><br> --}}
                <div class="alert alert-info text-center">
                    Keterangan: <b>MS</b> (Memenuhi Syarat), <b>TMS</b> (Tidak Memenuhi Syarat)
                </div>

                <label>Hasil Assesmen</label>
                <div class="row">
                    <div class="col-lg-2">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="hasilA" value="1" {{ !is_null($lapSert->hasil_assesmen) && $lapSert->hasil_assesmen == '1' ? 'checked' : '' }}><b>MS</b>
                        <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-lg">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="hasilA" value="0" {{ !is_null($lapSert->hasil_assesmen) && $lapSert->hasil_assesmen == '0' ? 'checked' : '' }}><b>TMS</b>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                {{-- <input type="text" class="form-control " name="hasilA" required="" placeholder="Penilaian" value="{{ !is_null($lapSert->hasil_assesmen) ? $lapSert->hasil_assesmen : '' }}"><br> --}}
                <label>Verifikasi</label>
                <div class="row">
                    <div class="col-lg-2">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="verif" value="1" {{ !is_null($lapSert->verifikasi) && $lapSert->verifikasi == '1' ? 'checked' : '' }}><b>MS</b>
                        <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-lg">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="verif" value="0" {{ !is_null($lapSert->verifikasi) && $lapSert->verifikasi == '0' ? 'checked' : '' }}><b>TMS</b>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                {{-- <input type="text" class="form-control " name="verif" required="" placeholder="Penilaian" value="{{ !is_null($lapSert->verifikasi) ? $lapSert->verifikasi : '' }}"><br> --}}
                <label>Berita Acara Pengambilan Contoh</label>
                <div class="row">
                    <div class="col-lg-2">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="bapc" value="1" {{ !is_null($lapSert->bapc_lap) && $lapSert->bapc_lap == '1' ? 'checked' : '' }}><b>MS</b>
                        <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-lg">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="bapc" value="0" {{ !is_null($lapSert->bapc_lap) && $lapSert->bapc_lap == '0' ? 'checked' : '' }}><b>TMS</b>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                {{-- <input type="text" class="form-control " name="bapc" required="" placeholder="Penilaian" value="{{ !is_null($lapSert->bapc_lap) ? $lapSert->bapc_lap : '' }}"><br> --}}
                <label>Hasil Pengujian</label>
                <div class="row">
                    <div class="col-lg-2">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="hasilP" value="1" {{ !is_null($lapSert->hasil_pengujian) && $lapSert->hasil_pengujian == '1' ? 'checked' : '' }}><b>MS</b>
                        <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-lg">
                        <label class="container_radio">
                            <input class="choice" type="radio" required name="hasilP" value="0" {{ !is_null($lapSert->hasil_pengujian) && $lapSert->hasil_pengujian == '0' ? 'checked' : '' }}><b>TMS</b>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                {{-- <input type="text" class="form-control " name="hasilP" required="" placeholder="Penilaian" value="{{ !is_null($lapSert->bapc_lap) ? $lapSert->bapc_lap : '' }}"><br> --}}
                <br>
                <label>Rekomendasi Evaluasi Rapat Teknis</label><br>
                <textarea class="form-control" name="rekomendasi" rows="5" placeholder="Isi rekomendasi disini..">{{ !is_null($lapSert->rekomendasi) ? $lapSert->rekomendasi : '' }}</textarea>
                <div class="validMsg"></div><br>
                <button type="reset" class="reset_btn mr-2">Reset</button>
                <button type="button" class="submit_btn" onclick="ValidateSize('', '.reqLp', '#isiLapSert', '.validMsg')">Simpan Data</button>
            </form>
            <br>
            <hr>
        @else
            <p class="alert alert-info">Dokumen Laporan Hasil Sertifikasi belum dibuat</p>
        @endif

        @if(!is_null($lapSert) && !is_null($lapSert->laporan_hasil_sert) && $lapSert->status_timTeknis !== 1)
            <center><p class="alert alert-primary">Form kelengkapan Laporan Hasil Sertifikasi telah aktif</p></center>
            <h5>Form kelengkapan Laporan Hasil Sertifikasi</h5>
            <form id="formLapSert" method="POST" action="{{ url('/kelengkapan_lapSert/'.$idProduk.'/'.$user->id) }}">
                @csrf
                <br>
                <label>Apakah pengisian form sudah selesai?</label><br>
                <button type="button" class="submit_btn mt-3" onclick="ValidateSize('', '', '#formLapSert', '')">Selesai</button>
            </form>
        @endif
    </div>
</div>
@endsection