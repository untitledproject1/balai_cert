<div class="row">
    <div class="col-lg">
        <div class="header_kuis">
            <h5>
                <center><b>{{ strtoupper('A. Info Tambahan') }}</b></center>
            </h5>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
        1. Apakah pernah mendapatkan Sertifikat tanda SNI?
    </div>
    {{-- <div class="col-lg-2">
        <label class="container_radio">
            <input  class="choice"  @if(!is_null($pesan)) {{ $cekOpsi('kuis1_opsi', $pesan[0]) !=1 ? 'checked' : '' }} @endif type="radio" required name="kuis1_opsi" value="1">Sesuai
        <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-2">
        <label class="container_radio">
            <input class="choice" {{ $cekOpsi('kuis1_opsi', $pesan[0])==1 ? 'checked' : '' }} type="radio" required name="kuis1_opsi" value="0">Belum Sesuai
            <span class="checkmark"></span>
        </label>
    </div> --}}
</div>
{{-- </td>
    </tr>
  	<tr>
  		<td></td>
  		<td> --}}
<div class="ml-4"><br>
    <b class="pr-2">Jawaban: </b>
    @if(!is_null($infoDB) && !is_null($infoDB->kuis1_opsi))
    <span class="{{ !is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ !is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? 'Ya' : 'Tidak' }}</span>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif
    @if(!is_null($infoDB) && $infoDB->kuis1_opsi == 1)
    <table width="100%">
        <tr>
            <td>Penerbit Sertifikat:</td>
            <td><input class="form-control" type="text" readonly="" value="{{ !is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? $infoIsi($infoDB->kuis1_isi)[0] : '' }}"></td>
        </tr>
        <tr>
            <td>Masa Berlaku:</td>
            <td><input class="form-control" type="text" readonly="" value="{{ !is_null($infoDB) && $infoDB->kuis1_opsi == 1 ? $infoIsi($infoDB->kuis1_isi)[1] : '' }}"></td>
        </tr>
    </table>
    @endif
</div>

<br>
<div class="row">
    <div class="col-lg-12">
        2. Apakah perusahaan anda bagian dari sebuah group?
    </div>
</div>

<div class="ml-4"><br>
    <b class="pr-2">Jawaban: </b>
    @if(!is_null($infoDB) && !is_null($infoDB->kuis2_opsi))
    <span class="{{ !is_null($infoDB) && $infoDB->kuis2_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ !is_null($infoDB) && $infoDB->kuis2_opsi == 1 ? 'Ya' : 'Tidak' }}</span>
    <div class="row mb-4">
        <div class="col-lg-4">
            Detail:
        </div>
        <div class="col-lg-8">
            <textarea class="form-control" readonly="">{{ !is_null($infoDB) && !is_null($infoDB->kuis2_isi) ? $infoDB->kuis2_isi : '' }}</textarea>
        </div>
    </div>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        3. Apakah diantara group perusahaan anda ada yang telah mendapat sertifikat SNI?
    </div>
</div>
<div class="ml-4"><br>
    <b class="pr-2">Jawaban: </b>
    @if(!is_null($infoDB) && !is_null($infoDB->kuis3_opsi))
    <span class="{{ !is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ !is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? 'Ya' : 'Tidak' }}</span>
    <table width="100%">
        @if(!is_null($infoDB) && $infoDB->kuis3_opsi == 1)
        <tr>
            <td>Nama dan Alamat Perusahaan:</td>
            <td>
                <textarea class="form-control" readonly="" style="height: 100px;">{{ !is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? strtoupper($infoIsi($infoDB->kuis3_isi)[0]) : '' }} - {{ !is_null($infoDB) && $infoDB->kuis3_opsi == 1 ? $infoIsi($infoDB->kuis3_isi)[1] : '' }}
                </textarea>
            </td>
        </tr>
        @endif
    </table>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        4. Apakah perusahaan Saudara telah mendapatkan sertifikat SNI ISO 9001?
    </div>
</div>
<div class="ml-4"><br>
    <b class="pr-2">Jawaban: </b>
    @if(!is_null($infoDB) && !is_null($infoDB->kuis4_opsi))
    <span class="{{ !is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ !is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? 'Ya' : 'Tidak' }}</span>
    <table width="100%">
        @if(!is_null($infoDB) && $infoDB->kuis4_opsi === 1)
        <tr>
            <td>Penerbit sertifikat ISO:</td>
            <td><input class="form-control" type="text" readonly="" value="{{ !is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? $infoIsi($infoDB->kuis4_isi)[0][0] : '' }}"></td>
        </tr>
        <tr>
            <td>Masa Berlaku:</td>
            <td><input class="form-control" type="text" readonly="" value="{{ !is_null($infoDB) && $infoDB->kuis4_opsi === 1 ? $infoIsi($infoDB->kuis4_isi)[0][1] : '' }}"></td>
        </tr>
        @elseif(!is_null($infoDB) && $infoDB->kuis4_opsi === 0)
        <tr>
            <td>Apakah perusahaan menerapkan dokumentasi SMM dan menerbitkan dokumen mutu/produk secara internal?:</td>
            <td><input class="form-control" type="text" readonly="" value="{{ !is_null($infoDB) && $infoDB->kuis4_opsi === 0 && $infoIsi($infoDB->kuis4_isi)[1] === 1 ? 'Ya' : 'Tidak' }}"></td>
        </tr>
        @endif
    </table>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif
</div>

<br>
<div class="row">
    <div class="col-lg-12">
        5. Apakah anda bekerja dengan menggunakan sistem shift?
    </div>
</div>
<div class="ml-4"><br>
    <b class="pr-2">Jawaban: </b>
    @if(!is_null($infoDB) && !is_null($infoDB->kuis5_opsi))
    <span class="{{ !is_null($infoDB) && $infoDB->kuis5_opsi == 1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ !is_null($infoDB) && $infoDB->kuis5_opsi == 1 ? 'Ya' : 'Tidak' }}</span>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        6. Kapan perusahaan Anda siap disertifikasi?
    </div>
</div>
<div class="ml-4"><br>
    <b class="pr-2">Jawaban:</b>
    @if(!is_null($infoDB) && !is_null($infoDB->kuis6))
    <input class="form-control" type="text" readonly="" value="{{ !is_null($infoDB) && !is_null($infoDB->kuis6) ? $infoDB->kuis6 : '' }}">
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif
</div>

<br>

<div class="row mt-3">
    <div class="col-lg">
        <div class="header_kuis">
            <h5>
                <center><b>{{ strtoupper('B. Kuesioner') }}</b></center>
            </h5>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
        1. Kapan contoh tersedia untuk kegiatan evaluasi
    </div>
</div>
<div class="ml-4 mt-3">
    <b>Jawaban: </b>

    @if(!is_null($kuesioner) && !is_null($kuesioner->kuis1))
    <input class="form-control" type="date" name="evalDate" value="{{ !is_null($kuesioner) && !is_null($kuesioner->kuis1) ? $kuesioner->kuis1 : '' }}" disabled="">
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif

</div>

<hr>

<div class="row">
    <div class="col-lg-12">
        2. Apakah merupakan contoh produksi atau contoh prototipe?
    </div>
</div>
<div class="ml-4 mt-3">
    <b>Jawaban:</b>

    @if(!is_null($kuesioner) && !is_null($kuesioner->kuis2))
    <span class="jawaban_ya">{{ !is_null($infoDB) && $kuesioner->kuis2 === 1 ? 'Contoh Produksi' : 'Contoh Prototipe' }}</span>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif

    {{-- <div class="col-lg-4">
        <label class="container_radio_disable">
            <input type="radio" {{ !is_null($kuesioner) && !is_null($kuesioner->kuis2) && $kuesioner->kuis2 === 1 ? 'checked' : '' }} name="contoh" value="1" disabled="">Contoh Produksi
    <span class="checkmark_disable"></span>
    </label>
</div>
<div class="col-lg-4">
    <label class="container_radio_disable">
        <input type="radio" {{ !is_null($kuesioner) && !is_null($kuesioner->kuis2) && $kuesioner->kuis2 !== 1 ? 'checked' : '' }} name="contoh" value="0" disabled="">Contoh Prototipe
        <span class="checkmark_disable"></span>
    </label>
</div> --}}
</div>
<hr>

<div class="row">
    <div class="col-lg">
        3. Apakah ini menjadi proses produksi atau proses contoh protipe?
    </div>
</div>
<div class="ml-4 mt-3">
    <b>Jawaban:</b>

    @if(!is_null($isi($kuesioner, 'kuis3' , 0)))
    <span class="jawaban_ya">{{ $isi($kuesioner, 'kuis3' , 0)===1 ? 'Proses Produksi' : 'Proses Contoh Prototipe' }}</span>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif

</div>

<div class="kuis_3 mt-3 {{ !is_null($isi($kuesioner, 'kuis3', 0)) && $isi($kuesioner, 'kuis3', 0) !== 1 ? '' : 'hid' }}">
    <div class="row ml-4 mt-2">
        <div class="col-lg">
            Jika <b>prototipe</b>, Kapan produksi dijadwalkan?
        </div>
        <div class="col-lg">
            <input class="inpt form-control" type="date" name="waktuProduksi" value="{{ !is_null($isi($kuesioner, 'kuis3', 1)) ? $isi($kuesioner, 'kuis3', 1) : '' }}" disabled="">
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        4. Sudahkah produk diuji sesuai dengan standar?<br>(bila sudah, harap dilamprikan laporannya)
    </div>
</div>

<div class="ml-4 mt-3">
    <b>Jawaban:</b>

    @if(!is_null($isi($kuesioner, 'kuis4' , 0)))
    <span class="{{ $isi($kuesioner, 'kuis4' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $isi($kuesioner, 'kuis4' , 0)===1 ? 'Sudah' : 'Belum' }}</span>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif

</div>

<div class="kuis_4 ml-4 mt-4 {{ !is_null($isi($kuesioner, 'kuis4', 0)) && $isi($kuesioner, 'kuis4', 0) === 1 ? '' : 'hid' }}">
    @if(!is_null($kuesioner) && !is_null($isi($kuesioner, 'kuis4', 1)))
    <a href="{{ asset('storage/dok/dokKuesioner/standarProduk/'.$isi($kuesioner, 'kuis4', 1)) }}" target="_blank">
        <div class="view_file mb-3" style="margin-top: 0;">
            <i class="fas fa-eye"></i>&nbsp;
            Lampiran
        </div>
    </a>
    @endif
</div>
<hr>

<center><i><b>B.1 - Organisasi Pabrik</b></i></center><br>

<b>1.1. Prosedur Produksi</b><br>
<b>Berikan Informasi tentang sistem secara garis besar</b><br><br>

<div class="ml-4">
    <div class="row">
        <div class="col-lg">
            1.1.1. Apakah anda memproduksi berdasarkan pesanan atau untuk persedian?
        </div>
    </div>
    {{-- <div class="row mt-2">
        <div class="col-lg-3">
            <label class="container_radio">
                <input  class="choice" @if(!is_null($pesan)) {{ $cekOpsi('kuis_111', $pesan[0]) !=1 ? 'checked' : '' }} @endif type="radio" required name="kuis_111" value="1">Sesuai
    <span class="checkmark"></span>
    </label>
</div>
<div class="col-lg-3">
    <label class="container_radio">
        <input class="choice" {{ $cekOpsi('kuis_111', $pesan[0])==1 ? 'checked' : '' }} type="radio" required name="kuis_111" value="0">Belum Sesuai
        <span class="checkmark"></span>
    </label>
</div>
</div> --}}

<div class="ml-4 mt-3">
    <b>Jawaban:</b>

    @if(!is_null($isi($kuesioner, 'kuis_111' , 0)))
    <span class="jawaban_ya">{{ $isi($kuesioner, 'kuis_111' , 0)===1 ? 'Pesanan' : 'Persediaan' }}</span>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif

</div>

<div class="kuis_111 {{ !is_null($isi($kuesioner, 'kuis_111', 0)) && $isi($kuesioner, 'kuis_111', 0) === 1 ? '' : 'hid' }}">
    <div class="row ml-4 mt-2">
        <div class="col-lg-12">Jika <b>Pesanan</b>, Apakah digunakan sebagai identifikasi kelompok produk yang terpisah?</div>
    </div>
    <div class="ml-5 mt-2">
        <b>Jawaban:</b>

        @if(!is_null($isi($kuesioner, 'kuis_111' , 1)))
        <span class="jawaban_ya">{{ $isi($kuesioner, 'kuis_111' , 1)===1 ? 'Ya' : 'Tidak' }}</span>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg">
        1.1.2. Apakah produk dan/atau kontainer menggunakan identifikasi order kerja dalam produksi?
    </div>
</div>

<div class="ml-4 mt-3">
    <b>Jawaban:</b>

    @if(!is_null($isi($kuesioner, 'kuis_112' , 1)))
    <span class="{{ $isi($kuesioner, 'kuis_112' , 1)===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $isi($kuesioner, 'kuis_112' , 1)===1 ? 'Ya' : 'Tidak' }}</span>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif

</div>

<div class="kuis_112 {{ !is_null($isi($kuesioner, 'kuis_112', 0)) && $isi($kuesioner, 'kuis_112', 0) === 1 ? '' : 'hid' }}">
    <div class="row ml-4 mt-2">
        <div class="col-lg">
            Jika <b>Ya</b>, Pada bagian manakah yang menggunakan identifikasi order kerja dalam produksi?<br>
        </div>
    </div>
    <div class="ml-5 mt-2">
        <b>Jawaban:</b>

        @if(!is_null($isi($kuesioner, 'kuis_112' , 1)))
        <span class="{{ $isi($kuesioner, 'kuis_112' , 1)===1 ? 'jawaban_tidak' : 'jawaban_ya' }}">
            @if($isi($kuesioner, 'kuis_112' , 1)===1)
            Tidak
            @elseif($isi($kuesioner, 'kuis_112' , 1)===2)
            Kotainer
            @else
            Produk dan Kontainer
            @endif
        </span>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>
</div>
<div class="kuis_112_ {{ !is_null($isi($kuesioner, 'kuis_112', 0)) && $isi($kuesioner, 'kuis_112', 0) !== 1 ? '' : 'hid' }}">
    <div class="row ml-4 mt-2">
        <div class="col-lg">
            Jika <b>Tidak</b>, Bagaimana sistem mengisolasi produk dengan mutu yang digunakan?<br>
        </div>
    </div>
    <div class="row ml-5 mt-2">
        <div class="col-lg">
            <textarea class="inpt form-control" name="isolasiProduk" style="width: 100%;" disabled="">{{ !is_null($isi($kuesioner, 'kuis_112', 2)) ? $isi($kuesioner, 'kuis_112', 2) : ''  }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="row mt-2">
    <div class="col-lg">
        1.1.3. Berikan informasi lain yang relevan mengenai sistem yang digunakan?
    </div>
</div>
<div class="ml-4 mt-3">
    <b>Jawaban:</b>

    @if(!is_null($kuesioner) && !is_null($kuesioner->kuis_113))
    <textarea class="form-control" name="infoLain" disabled="">{{ !is_null($kuesioner) && !is_null($kuesioner->kuis_113) ? $kuesioner->kuis_113 : ''  }}</textarea>
    @else
    <span class="badge badge-secondary">Kosong</span>
    @endif

</div>
</div>

<hr>

<b>1.2. Prosedur pengendalian mutu/inspeksi</b><br>
<b>Berikan Informasi tentang organisasi personel pengendalian mutu pabrik</b><br><br>

<div class="ml-4">
    <div class="row">
        <div class="col-lg">
            1.2.1. Siapa kepala jaminan mutu?
        </div>
    </div>
    <div class="ml-4 mt-3">
        <b>Jawaban:</b>

        @if(!is_null($kuesioner) && !is_null($kuesioner->kuis_121))
        <textarea class="form-control" name="kepalaJaminan" disabled="">{{ !is_null($kuesioner) && !is_null($kuesioner->kuis_121) ? $kuesioner->kuis_121 : '' }}</textarea>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>
    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.2. Kepada siapa melapor?
        </div>
    </div>
    <div class="ml-4 mt-3">
        <b>Jawaban:</b>

        @if(!is_null($kuesioner) && !is_null($kuesioner->kuis_122))
        <textarea class="form-control" name="lapor" disabled="">{{ !is_null($kuesioner) && !is_null($kuesioner->kuis_122) ? $kuesioner->kuis_122 : '' }}</textarea>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>
    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.3. Apakah ada Departement QC/Inspeksi yang terpisah?
        </div>
    </div>
    <div class="ml-4 mt-3">
        <b>Jawaban:</b>

        @if(!is_null($isi($kuesioner, 'kuis_123' , 0)))
        <span class="{{ $isi($kuesioner, 'kuis_123' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $isi($kuesioner, 'kuis_123' , 0)===1 ? 'Ya' : 'Tidak' }}</span>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>

    <div class="kuis_123 {{ !is_null($isi($kuesioner, 'kuis_123', 0)) && $isi($kuesioner, 'kuis_123', 0) === 1 ? '' : 'hid' }}">
        <div class="row ml-4 mt-2">
            <div class="col-lg">
                Jika <b>Ya</b>, Jelaskan<br>
            </div>
        </div>
        <div class="ml-4 mt-3">
            <b>Jawaban:</b>

            <textarea class="inpt form-control" name="dt" style="width: 100%;" disabled="">{{ !is_null($isi($kuesioner, 'kuis_123', 1)) ? $isi($kuesioner, 'kuis_123', 1) : '' }}</textarea>

        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.4. Siapa Kepala inspektur jika berbeda dengan 1.2.1?
        </div>
    </div>
    <div class="ml-4 mt-3">
        <b>Jawaban:</b>

        @if(!is_null($kuesioner) && !is_null($kuesioner->kuis_124))
        <textarea class="form-control" name="kepalaInspek" style="width: 100%;" disabled="">{{ !is_null($kuesioner) && !is_null($kuesioner->kuis_124) ? $kuesioner->kuis_124 : '' }}</textarea>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>
    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.5. Apakah personel memahami pengujian yang termuat didalam standar yang relevan?
        </div>
    </div>

    <div class="ml-4 mt-3">
        <b>Jawaban:</b>

        @if(!is_null($kuesioner) && !is_null($kuesioner->kuis_125))
        <span class="{{ $kuesioner->kuis_125 === 1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $kuesioner->kuis_125 === 1 ? 'Ya' : 'Tidak' }}</span>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.6. Apakah petugas gudang/operator produksi bertanggungjawab atas inspeksi dan pengujian:
        </div>
    </div>
    <div class="ml-4 mt-3">
        <b>Jawaban:</b>

        @if(!is_null($kuesioner) && !is_null($kuesioner->kuis_125))
        <span class="{{ $kuesioner->kuis_125 === 1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $kuesioner->kuis_125 === 1 ? 'Ya' : 'Tidak' }}</span>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>

    <div class="pt-2">
        <div class="row ml-4 mt-2">
            <div class="col-lg-4">
                - 1.2.6.1. Material?
            </div>
            <div class="col-lg-8">
                @if(!is_null($isi($kuesioner, 'kuis_126' , 0)[0]))
                <span class="{{ $isi($kuesioner, 'kuis_126' , 0)[0]===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $isi($kuesioner, 'kuis_126' , 0)[0]===1 ? 'Ya' : 'Tidak' }}</span>
                @else
                <span class="badge badge-secondary">Kosong</span>
                @endif
            </div>
        </div>
        <div class="row ml-4 mt-2">
            <div class="col-lg-4">
                - 1.2.6.2. Proses operasi?
            </div>
            <div class="col-lg-8">
                @if(!is_null($isi($kuesioner, 'kuis_126' , 0)[1]))
                <span class="{{ $isi($kuesioner, 'kuis_126' , 0)[1]===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $isi($kuesioner, 'kuis_126' , 0)[1]===1 ? 'Ya' : 'Tidak' }}</span>
                @else
                <span class="badge badge-secondary">Kosong</span>
                @endif
            </div>
        </div>
        <div class="row ml-4 mt-2">
            <div class="col-lg-4">
                - 1.2.6.3. Produk akhir?
            </div>
            <div class="col-lg-8">
                @if(!is_null($isi($kuesioner, 'kuis_126' , 0)[2]))
                <span class="{{ $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $isi($kuesioner, 'kuis_126' , 0)[2]===1 ? 'Ya' : 'Tidak' }}</span>
                @else
                <span class="badge badge-secondary">Kosong</span>
                @endif
            </div>
        </div>

        <div class="kuis_126 {{ $isi($kuesioner, 'kuis_126' , 0)[0] === 1 || $isi($kuesioner, 'kuis_126' , 0)[1] === 1 || $isi($kuesioner, 'kuis_126' , 0)[2] === 1 ? '' : 'hid'
         }}">
            <div class="row ml-4 mt-2">
                <div class="col-lg">
                    Bila <b>Ya</b>, Apakah mereka diawasi oleh personel pengendali mutu?
                </div>
            </div>
            <div class="row ml-5 mt-2">
                <div class="col-lg-2"><b>Jawaban:</b></div>
                <div class="col-lg-10">
                    @if(!is_null($isi($kuesioner, 'kuis_126' , 1)))
                    <span class="{{ $isi($kuesioner, 'kuis_126' , 1)===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ $isi($kuesioner, 'kuis_126' , 1)===1 ? 'Ya' : 'Tidak' }}</span>
                    @else
                    <span class="badge badge-secondary">Kosong</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.7. Apakah dilakukan audit mutu?
        </div>
    </div>
    <div class="ml-4 mt-3">
        <b>Jawaban:</b>
        @if(!is_null($kuesioner) && !is_null($isi($kuesioner, 'kuis_127' , 0)))
        <span class="{{ $isi($kuesioner, 'kuis_127' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ !is_null($isi($kuesioner, 'kuis_127' , 0)) && $isi($kuesioner, 'kuis_127' , 0)===1 ? 'Ya' : 'Tidak' }}</span>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

    </div>

    <div class="kuis_127 mt-3 ml-4 {{ !is_null($isi($kuesioner, 'kuis_127', 0)) && $isi($kuesioner, 'kuis_127', 0) === 1 ? '' : 'hid' }}">
        <div class="row">
            <div class="col-lg">
                Jika <b>Ya</b>, Oleh siapa audit mutu dilakukan?
            </div>
            <div class="col-lg">
                <textarea class="inpt form-control" name="auditMutu2" style="width: 100%;" disabled="">{{ !is_null($isi($kuesioner, 'kuis_127', 1)) ? $isi($kuesioner, 'kuis_127', 1) : '' }}</textarea>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            1.2.8. Berikan informasi lebih lanjut tentang organisasi pengendalian mutu?
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        @if(!is_null($kuesioner) && !is_null($kuesioner->kuis_128))
        <textarea class="form-control" name="infoPengendalianMutu" style="width: 100%;" disabled="">{{ !is_null($kuesioner) && !is_null($kuesioner->kuis_128) ? $kuesioner->kuis_128 : '' }}</textarea>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif
    </div>
</div>

<hr>

<center><b><i>B.2 - Bahan-bahan Komponen dan Pelayanan</i></b></center><br>

<div class="row">
    <div class="col-lg">
        <b>2.1. Spesifikasi pembelian/jaminan mutu bahan.</b>
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran" class="{{ !is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? '' : 'hid' }}">
        @if(!is_null($bahanHasil) && !is_null($bahanHasil->form_21))
        <a href="{{ asset('storage/dok/dokKuesioner/spekPembelian/'.$bahanHasil->form_21) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        @endif
    </div>
    <div id="manual" class="mt-2 {{ !is_null($bahanHasil) && !is_null($bahanHasil->form_21) ? 'hid' : '' }}">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".spek-mutu">Pengisian Manual</button>

        <div class="modal fade bd-example-modal-lg spek-mutu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Spesifikasi pembelian/jaminan mutu bahan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="body">
                        <div class="container-fluid p-3">
                            <table border="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Jenis bahan</th>
                                        <th class="text-center">Spesifikasi</th>
                                        <th class="text-center">Nama Pemasok</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @if(!is_null($spekP))
                                    @foreach($spekP as $data)
                                    <tr class="bodyContent">
                                        <td><input class="jenisbahan form-control" type="text" name="jenisbahan[]" value="{{ $data->jenis_bahan }}" disabled=""></td>
                                        <td><input class="spek form-control" type="text" name="spek[]" value="{{ $data->spesifikasi }}" disabled=""></td>
                                        <td><input class="namaPemasok form-control" type="text" name="namaPemasok[]" value="{{ $data->pemasok }}" disabled=""></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="bodyContent">
                                        <td><input class="jenisbahan form-control" type="text" name="jenisbahan[]" disabled=""></td>
                                        <td><input class="spek form-control" type="text" name="spek[]" disabled=""></td>
                                        <td><input class="namaPemasok form-control" type="text" name="namaPemasok[]" disabled=""></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>2.2. Berikan juga metode jaminan mutu yang diadopsi dalam penerimaan bahan baku, komponen atau pelayanan, dan tunjukkan langkah-langkah yang diambil terhadap barang yang tidak memenuhi syarat. (dapat menggunakan lampiran)</b>
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran1" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? '' : 'hid' }}">
        @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)))
        <a href="{{ asset('storage/dok/dokKuesioner/jaminanMutu/'.$isi($bahanHasil, 'form_22', 0)) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        @endif
    </div>
    <div id="manual1" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_22', 0)) ? 'hid' : '' }}">
        <textarea class="form-control" name="metodeJaminanMutu" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_22', 1)) ? $isi($bahanHasil, 'form_22', 1) : '' }}</textarea>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>3.1. Sistem</b>
    </div>
</div>

<div class="row">
    <div class="col-lg">
        Berikan rincian berbagai tahap dalam peroduksi, jadwal produksi dan atau tambahan dalam bentuk diagram untuk memudahkan pemahaman. (dapat menggunakan lampiran)
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran2" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? '' : 'hid' }}">
        @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)))
        <a href="{{ asset('storage/dok/dokKuesioner/rincianProduksi/'.$isi($bahanHasil, 'form_31', 0)) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        @endif
    </div>
    <div id="manual2" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_31', 0)) ? 'hid' : '' }}">
        <textarea class="form-control" name="rincianProduksi" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_31', 1)) ? $isi($bahanHasil, 'form_31', 1) : '' }}</textarea>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>3.2. Sistem pemeliharaan pabrik dan perolehan</b>
    </div>
</div>

<div class="row">
    <div class="col-lg">
        <b>Sebutkan jenis sistem pemeliharaan yang diterapkan?. (dapat menggunakan lampiran)</b>
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran3" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? '' : 'hid' }}">
        @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)))
        <a href="{{ asset('storage/dok/dokKuesioner/jenisPemeliharaan/'.$isi($bahanHasil, 'form_32', 0)) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        @endif
    </div>
    <div id="manual3" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_32', 0)) ? 'hid' : '' }}">
        <textarea class="form-control" name="jenisPemeliharaan" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_32', 1)) ? $isi($bahanHasil, 'form_32', 1) : '' }}</textarea>
    </div>
</div>

<hr>

<center><b><i>B.4 - Pengendalian Mutu Pengujian</i></b></center><br>

<div class="row">
    <div class="col-lg">
        <b>4.1. Sistem</b>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        Berikan rincian sistem pengendalian mutu, termasuk sistem pengalihan contoh yang diikuti dengan acuan tertentu sesuai degan standar yang relevan. Penggunaan jadwal pengendalian mutu atau suplemen acuan sialng terhadap diagram yang disebutkan di 3.1 akan lebih menguntungkan. Lampirkan panduan atau instruksi pengendalian mutu yang diterbitkan untuk personel.
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <br>
    @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_41', 0)))
    <a href="{{ asset('storage/dok/dokKuesioner/pengendalianMutu/'.$isi($bahanHasil, 'form_41', 0)) }}" target="_blank">
        <div class="view_file">
            <i class="fas fa-eye"></i> &nbsp; Lampiran
        </div>
    </a><br>
    @endif
    <textarea class="form-control" name="pengendalianMutu" style="width: 100%;" disabled="">{{ !is_null($isi($bahanHasil, 'form_41', 1)) ? $isi($bahanHasil, 'form_41', 1) : '' }}</textarea>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>4.2. Peralatan/Instrumen pengujian, gauge, atau perkakas.</b>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        Berikan rincian peralatan yang digunakan, nama pembuat dan acuan atau dan tunjukkan sistem dan frekuensi pemeriksaan dan sertifikat, jika ada. (dapat menggunakan lampiran)
    </div>
</div>

<div class="mt-3 ml-4">
    <b>Jawaban:</b>
    <div id="lampiran11" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_42', 0)) ? '' : 'hid' }}">
        @if(!is_null($bahanHasil) && !is_null($bahanHasil->form_42))
        <a href="{{ asset('storage/dok/dokKuesioner/rincianPeralatan/'.$bahanHasil->form_42) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        @endif
    </div>
    <div id="manual11" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_42', 0)) ? 'hid' : '' }}">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".rinciAlat">Pengisian Manual</button>

        <div class="modal fade bd-example-modal-lg rinciAlat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Spesifikasi pembelian/jaminan mutu bahan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="body">
                        <div class="container-fluid p-3">
                            <table border="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Alat</th>
                                        <th class="text-center">Nama Pembuat</th>
                                        <th class="text-center">Acuan</th>
                                        <th class="text-center">Sistem dan Frekuensi pemeriksaan</th>
                                        <th class="text-center">Sertifikat</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody11">
                                    @if(!is_null($alat))
                                    @foreach($alat as $data2)
                                    <tr class="bodyContent11">
                                        <td><input class="form-control namaAlat" type="text" name="namaAlat[]" value="{{ $data2->nama_alat }}" disabled=""></td>
                                        <td><input class="form-control namaPembuat" type="text" name="namaPembuat[]" value="{{ $data2->nama_pembuat }}" disabled=""></td>
                                        <td><input class="form-control acuan" type="text" name="acuan[]" value="{{ $data2->acuan }}" disabled=""></td>
                                        <td><input class="form-control sistemP" type="text" name="sistemP[]" value="{{ $data2->sistem }}" disabled=""></td>
                                        <td><input class="form-control sert" type="text" name="sert[]" value="{{ $data2->sertifikat }}" disabled=""></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="bodyContent11">
                                        <td><input class="form-control namaAlat" type="text" name="namaAlat[]" disabled=""></td>
                                        <td><input class="form-control namaPembuat" type="text" name="namaPembuat[]" disabled=""></td>
                                        <td><input class="form-control acuan" type="text" name="acuan[]" disabled=""></td>
                                        <td><input class="form-control sistemP" type="text" name="sistemP[]" disabled=""></td>
                                        <td><input class="form-control sert" type="text" name="sert[]" disabled=""></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<center><b><i>B.5 - Rekaman dan dokumentasi</i></b></center><br>

<div class="row">
    <div class="col-lg">
        <b>5.1. Umum</b>
    </div>
</div>

<div class="ml-4 mt-3">
    <div class="row">
        <div class="col-lg">
            5.1.1. Tunjukkan betuk spesifikasi utama, seperti gambar teknik produk/bagian-bagian jadwal, contoh acuan, dsb. Tunjukkan juga rekaman umum ang tersedia. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran4">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/spekUtama/'.$isi($bahanHasil, 'form_511', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual4">
            <textarea class="form-control" name="spekUtama" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_511', 1)) ? $isi($bahanHasil, 'form_511', 1) : '' }}</textarea>
        </div>
        {{-- <div id="lampiran4" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0)) ? '' : 'hid' }}">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/spekUtama/'.$isi($bahanHasil, 'form_511', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual4" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_511', 0))  ? 'hid' : '' }}">
            <textarea class="form-control" name="spekUtama" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_511', 1)) ? $isi($bahanHasil, 'form_511', 1) : '' }}</textarea>
        </div> --}}
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.1.2. Tunjukkan sistem yang digunakan untuk memebuat desain/speksifikasi. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran5">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/jenisSistem/'.$isi($bahanHasil, 'form_512', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual5">
            <textarea class="form-control" name="jenisSistem" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_512', 1)) ? $isi($bahanHasil, 'form_512', 1) : '' }}</textarea>
        </div>
        {{-- <div id="lampiran5" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0)) ? '' : 'hid' }}">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/jenisSistem/'.$isi($bahanHasil, 'form_512', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual5" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_512', 0)) ? 'hid' : '' }}">
            <textarea class="form-control" name="jenisSistem" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_512', 1)) ? $isi($bahanHasil, 'form_512', 1) : '' }}</textarea>
        </div> --}}
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg">
        <b>5.2. Kesesuaian spesifikasi</b>
    </div>
</div>

<div class="ml-4 mt3-3">
    <div class="row">
        <div class="col-lg">
            5.2.1. Tunjukkan tingkat cacat dari temuan ketidaksesuaian dalam 6 bulan terakhir. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran6">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/tingkatCacat/'.$isi($bahanHasil, 'form_521', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual6">
            <textarea class="form-control" name="tingkatCacat" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_521', 1)) ? $isi($bahanHasil, 'form_521', 1) : '' }}</textarea>
        </div>
        {{-- <div id="lampiran6" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0)) ? '' : 'hid' }}">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/tingkatCacat/'.$isi($bahanHasil, 'form_521', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual6" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_521', 0)) ? 'hid' : '' }}">
            <textarea class="form-control" name="tingkatCacat" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_521', 1)) ? $isi($bahanHasil, 'form_521', 1) : '' }}</textarea>
        </div> --}}
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.2.2. Jika pengujian dilakukan sesuai dengan standar yang relevan telah dilaksanakan, lampirkan hasil uji jika ada
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <br>
        @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_522', 0)))
        <a href="{{ asset('storage/dok/dokKuesioner/lampiranPengujian/'.$isi($bahanHasil, 'form_522', 0)) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i> &nbsp; Lampiran
            </div>
        </a><br>
        @endif
        <textarea class="form-control" name="pengujian" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_522', 1)) ? $isi($bahanHasil, 'form_522', 1) : '' }}</textarea>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.2.3. Tunjukkan tingkat keluhan yang diterima selama masa jaminan dan berikan presentasi dari jumlah keluaran. (dapat menggunakan lampiran)
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>
        <div id="lampiran7">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/tingkatKeluhan/'.$isi($bahanHasil, 'form_523', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual7">
            <textarea class="form-control" name="tingkatKeluhan" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_523', 1)) ? $isi($bahanHasil, 'form_523', 1) : '' }}</textarea>
        </div>
        {{-- <div id="lampiran7" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0)) ? '' : 'hid' }}">
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0)))
            <a href="{{ asset('storage/dok/dokKuesioner/tingkatKeluhan/'.$isi($bahanHasil, 'form_523', 0)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a><br>
            @endif
        </div>
        <div id="manual7" class="{{ !is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_523', 0)) ? 'hid' : '' }}">
            <textarea class="form-control" name="tingkatKeluhan" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_523', 1)) ? $isi($bahanHasil, 'form_523', 1) : '' }}</textarea>
        </div> --}}
    </div>

    <hr>

    <div class="row">
        <div class="col-lg">
            5.2.4. Apakah telah dilakukan pengujian independen pada produk sesuai standar?
        </div>
    </div>

    <div class="mt-3 ml-4">
        <b>Jawaban:</b>

        @if(!is_null($kuesioner) && !is_null($isi($bahanHasil, 'form_524' , 0)))
        <span class="{{ !is_null($isi($bahanHasil, 'form_524' , 0)) && $isi($bahanHasil, 'form_524' , 0)===1 ? 'jawaban_ya' : 'jawaban_tidak' }}">{{ !is_null($isi($bahanHasil, 'form_524' , 0)) && $isi($bahanHasil, 'form_524' , 0)===1 ? 'Ya' : 'Tidak' }}</span>
        @else
        <span class="badge badge-secondary">Kosong</span>
        @endif

        <div class="kuis_524 {{ !is_null($isi($bahanHasil, 'form_524', 0)) && $isi($bahanHasil, 'form_524', 0) === 1 ? '' : 'hid' }}">
            Jika <b>Ya</b>, oleh siapa? Lampirkan salinan jika ada<br>
            @if(!is_null($bahanHasil) && !is_null($isi($bahanHasil, 'form_524', 1)))
            <a href="{{ asset('storage/dok/dokKuesioner/pengujiIndependen/'.$isi($bahanHasil, 'form_524', 1)) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i> &nbsp; Lampiran
                </div>
            </a>
            @endif
            <textarea class="form-control inpt" name="pengujiIndependen" style="width: 100%" disabled="">{{ !is_null($isi($bahanHasil, 'form_524', 2)) ? $isi($bahanHasil, 'form_524', 2) : '' }}</textarea>
        </div>
    </div>
    <hr>
</div>
<br>

<h5>Kelengkapan Daftar Isian dan Kuesioner F.48.01</h5>
<div class="row">
    <div class="col-lg-6">
        <label class="container_radio">
            <input class="choice" onclick="slideOpt('.pesan', 'tidak', false)" type="radio" required name="kuis_opsi" value="1" {{ !is_null($infoDB) && $infoDB->lengkap === 1 ? 'checked' : '' }} {{ $kode_tahap >= 11 || (!is_null($infoDB) && ($infoDB->lengkap == 2 || is_null($infoDB->lengkap))) ? 'disabled' : '' }}><b>Sesuai</b>
        <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-lg-6">
        <label class="container_radio">
            <input class="choice" onclick="slideOpt('.pesan', 'ya', false)" type="radio" required name="kuis_opsi" value="0" {{ !is_null($infoDB) && $infoDB->lengkap === 2 ? 'checked' : '' }} {{ $kode_tahap >= 11 || (!is_null($infoDB) && ($infoDB->lengkap == 2 || is_null($infoDB->lengkap))) ? 'disabled' : '' }}><b>Belum Sesuai</b>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<small class="form-text text-muted mb-3">Wajib diisi</small>
<div class="pesan {{ !is_null($infoDB) && $infoDB->lengkap === 2 ? '' : 'hid' }}">
    <div class="row">
        <div class="col-lg">
            <b>Pesan:</b>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg">
            <textarea class="form-control inpt" rows="4" name="pesan" placeholder="Isi pesan di sini.." {{ $kode_tahap >= 11 || (!is_null($infoDB) && ($infoDB->lengkap == 2 || is_null($infoDB->lengkap))) ? 'disabled' : '' }}>{{ !is_null($pesan) ? $pesan : '' }}</textarea>
            <small class="form-text text-muted">Pesan tidak wajib diisi</small>
        </div>
    </div>
</div>
<br>