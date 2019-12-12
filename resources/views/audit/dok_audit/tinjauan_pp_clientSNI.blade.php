<p><b>Tinjauan Proses Produksi</b></p>

<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>1. Struktur Organisasi (Bhs. Inggris atau Bhs. Indonesia)</label>
        </div>
        <div class="col-lg-6">
            <b>Keterangan: </b> &nbsp; 
            @if(!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_struktur_organisasi)[0] == 'ada' || !is_null($tinjauanPP->struktur_organisasi) ))
            <span class="jawaban_ya">Ada</span>
            @elseif(!is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_struktur_organisasi)[0] == 'tidak_ada')
            <span class="jawaban_tidak">Tidak Ada</span>
            @else
            <span class="badge badge-secondary">Kosong</span>
            @endif
        </div>
        {{-- <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[15]" required="" value="ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->struktur_organisasi) || 
                    is_null( $getVal($tinjauanPP->rvT_struktur_organisasi)[0] )) ? 'return false' : '' }}" {{ !is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_struktur_organisasi)[0] == 'ada' || !is_null($tinjauanPP->struktur_organisasi) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[15]" required="" value="tidak_ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->struktur_organisasi) || 
                    is_null( $getVal($tinjauanPP->rvT_struktur_organisasi)[0] )) ? 'return false' : '' }}"
                    {{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_struktur_organisasi)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div> --}}
        {{-- <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[15]" required="" value="null" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->struktur_organisasi) || 
                    is_null( $getVal($tinjauanPP->rvT_struktur_organisasi)[0] )) ? 'return false' : '' }}" {{ (!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_struktur_organisasi)[0] == 'null' || is_null($tinjauanPP->struktur_organisasi) )) || is_null($tinjauanPP) ? 'checked' : '' }}>Tidak Ada (Upload Ulang)
                <span class="checkmark"></span>
            </label>
        </div> --}}
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[15]" value="struktur_organisasi,tinjauanPP">
            @if(!is_null($tinjauanPP) && !is_null($tinjauanPP->struktur_organisasi))</p>
            <i>{{ $tinjauanPP->struktur_organisasi }}</i>
            <br>
            <a href="{{ asset('storage/dok/tinjauanPP/'.$tinjauanPP->struktur_organisasi) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat File
                </div>
            </a>
            <br><label>Review</label><br>
            <textarea class="form-control" name="review[]" placeholder="Review di sini" disabled="">{{ $getVal($tinjauanPP->rvT_struktur_organisasi)[1] != 'null' ? $getVal($tinjauanPP->rvT_struktur_organisasi)[1] : '' }}</textarea>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>2. Diagram Alir Produksi/ Prosedur Operasi <i>(Bhs. Inggris atau Bhs. Indonesia)</i></label>
        </div>
        <div class="col-lg-6">
            <b>Keterangan: </b> &nbsp; 
            @if(!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] == 'ada' || !is_null($tinjauanPP->diagram_alir_produksi) ))
            <span class="jawaban_ya">Ada</span>
            @elseif(!is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] == 'tidak_ada')
            <span class="jawaban_tidak">Tidak Ada</span>
            @else
            <span class="badge badge-secondary">Kosong</span>
            @endif
        </div>
        {{-- <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[16]" required="" value="ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->diagram_alir_produksi) || 
                    is_null( $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] )) ? 'return false' : '' }}" {{ !is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] == 'ada' || !is_null($tinjauanPP->diagram_alir_produksi) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[16]" required="" value="tidak_ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->diagram_alir_produksi) || 
                    is_null( $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] )) ? 'return false' : '' }}"
                    {{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div> --}}
        {{-- <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[16]" required="" value="null" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->diagram_alir_produksi) || 
                    is_null( $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] )) ? 'return false' : '' }}" {{ (!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_diagram_alir_produksi)[0] == 'null' || is_null($tinjauanPP->diagram_alir_produksi) )) || is_null($tinjauanPP) ? 'checked' : '' }}>Tidak Ada (Upload Ulang)
                <span class="checkmark"></span>
            </label>
        </div> --}}
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[16]" value="diagram_alir_produksi,tinjauanPP">
            @if(!is_null($tinjauanPP) && !is_null($tinjauanPP->diagram_alir_produksi))</p>
            <i>{{ $tinjauanPP->diagram_alir_produksi }}</i>
            <br>
            <a href="{{ asset('storage/dok/tinjauanPP/'.$tinjauanPP->diagram_alir_produksi) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat File
                </div>
            </a>
            <br><label>Review</label><br>
            <textarea class="form-control" name="review[]" placeholder="Review di sini" disabled="">{{ $getVal($tinjauanPP->rvT_diagram_alir_produksi)[1] != 'null' ? $getVal($tinjauanPP->rvT_diagram_alir_produksi)[1] : '' }}</textarea>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>3. Daftar Peralatan</label>
        </div>
        <div class="col-lg-6">
            <b>Keterangan: </b> &nbsp; 
            @if(!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_daftar_peralatan)[0] == 'ada' || !is_null($tinjauanPP->daftar_peralatan) ))
            <span class="jawaban_ya">Ada</span>
            @elseif(!is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_daftar_peralatan)[0] == 'tidak_ada')
            <span class="jawaban_tidak">Tidak Ada</span>
            @else
            <span class="badge badge-secondary">Kosong</span>
            @endif
        </div>
        {{-- <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[17]" required="" value="ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->daftar_peralatan) || 
                    is_null( $getVal($tinjauanPP->rvT_daftar_peralatan)[0] )) ? 'return false' : '' }}" {{ !is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_daftar_peralatan)[0] == 'ada' || !is_null($tinjauanPP->daftar_peralatan) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[17]" required="" value="tidak_ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->daftar_peralatan) || 
                    is_null( $getVal($tinjauanPP->rvT_daftar_peralatan)[0] )) ? 'return false' : '' }}"
                    {{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_daftar_peralatan)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div> --}}
        {{-- <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[17]" required="" value="null" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->daftar_peralatan) || 
                    is_null( $getVal($tinjauanPP->rvT_daftar_peralatan)[0] )) ? 'return false' : '' }}" {{ (!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_daftar_peralatan)[0] == 'null' || is_null($tinjauanPP->daftar_peralatan) )) || is_null($tinjauanPP) ? 'checked' : '' }}>Tidak Ada (Upload Ulang)
                <span class="checkmark"></span>
            </label>
        </div> --}}
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[17]" value="daftar_peralatan,tinjauanPP">
            @if(!is_null($tinjauanPP) && !is_null($tinjauanPP->daftar_peralatan))</p>
            <i>{{ $tinjauanPP->daftar_peralatan }}</i>
            <br>
            <a href="{{ asset('storage/dok/tinjauanPP/'.$tinjauanPP->daftar_peralatan) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat File
                </div>
            </a>
            <br><label>Review</label><br>
            <textarea class="form-control" name="review[]" placeholder="Review di sini" disabled="">{{ $getVal($tinjauanPP->rvT_daftar_peralatan)[1] != 'null' ? $getVal($tinjauanPP->rvT_daftar_peralatan)[1] : '' }}</textarea>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>4. Spesifikasi bahan baku</label>
        </div>
        <div class="col-lg-6">
            <b>Keterangan: </b> &nbsp; 
            @if(!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] == 'ada' || !is_null($tinjauanPP->spesifikasi_peralatan) ))
            <span class="jawaban_ya">Ada</span>
            @elseif(!is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] == 'tidak_ada')
            <span class="jawaban_tidak">Tidak Ada</span>
            @else
            <span class="badge badge-secondary">Kosong</span>
            @endif
        </div>
        {{-- <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[18]" required="" value="ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->spesifikasi_peralatan) || 
                    is_null( $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] )) ? 'return false' : '' }}" {{ !is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] == 'ada' || !is_null($tinjauanPP->spesifikasi_peralatan) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[18]" required="" value="tidak_ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->spesifikasi_peralatan) || 
                    is_null( $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] )) ? 'return false' : '' }}"
                    {{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div> --}}
        {{-- <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[18]" required="" value="null" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->spesifikasi_peralatan) || 
                    is_null( $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] )) ? 'return false' : '' }}" {{ (!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[0] == 'null' || is_null($tinjauanPP->spesifikasi_peralatan) )) || is_null($tinjauanPP) ? 'checked' : '' }}>Tidak Ada (Upload Ulang)
                <span class="checkmark"></span>
            </label>
        </div> --}}
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[18]" value="spesifikasi_peralatan,tinjauanPP">
            @if(!is_null($tinjauanPP) && !is_null($tinjauanPP->spesifikasi_peralatan))</p>
            <i>{{ $tinjauanPP->spesifikasi_peralatan }}</i>
            <br>
            <a href="{{ asset('storage/dok/tinjauanPP/'.$tinjauanPP->spesifikasi_peralatan) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat File
                </div>
            </a>
            <br><label>Review</label><br>
            <textarea class="form-control" name="review[]" placeholder="Review di sini" disabled="">{{ $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[1] != 'null' ? $getVal($tinjauanPP->rvT_spesifikasi_peralatan)[1] : '' }}</textarea>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>5. Tata Letak/ layout pabrik <i>(Bhs. Inggris atau Bhs. Indonesia)</i></label>
        </div>
        <div class="col-lg-6">
            <b>Keterangan: </b> &nbsp; 
            @if(!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] == 'ada' || !is_null($tinjauanPP->tata_letak_pabrik) ))
            <span class="jawaban_ya">Ada</span>
            @elseif(!is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] == 'tidak_ada')
            <span class="jawaban_tidak">Tidak Ada</span>
            @else
            <span class="badge badge-secondary">Kosong</span>
            @endif
        </div>
        {{-- <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[19]" required="" value="ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->tata_letak_pabrik) || 
                    is_null( $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] )) ? 'return false' : '' }}" {{ !is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] == 'ada' || !is_null($tinjauanPP->tata_letak_pabrik) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[19]" required="" value="tidak_ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->tata_letak_pabrik) || 
                    is_null( $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] )) ? 'return false' : '' }}"
                    {{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div> --}}
        {{-- <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[19]" required="" value="null" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->tata_letak_pabrik) || 
                    is_null( $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] )) ? 'return false' : '' }}" {{ (!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_tata_letak_pabrik)[0] == 'null' || is_null($tinjauanPP->tata_letak_pabrik) )) || is_null($tinjauanPP) ? 'checked' : '' }}>Tidak Ada (Upload Ulang)
                <span class="checkmark"></span>
            </label>
        </div> --}}
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[19]" value="tata_letak_pabrik,tinjauanPP">
            @if(!is_null($tinjauanPP) && !is_null($tinjauanPP->tata_letak_pabrik))</p>
            <i>{{ $tinjauanPP->tata_letak_pabrik }}</i>
            <br>
            <a href="{{ asset('storage/dok/tinjauanPP/'.$tinjauanPP->tata_letak_pabrik) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat File
                </div>
            </a>
            <br><label>Review</label><br>
            <textarea class="form-control" name="review[]" placeholder="Review di sini" disabled="">{{ $getVal($tinjauanPP->rvT_tata_letak_pabrik)[1] != 'null' ? $getVal($tinjauanPP->rvT_tata_letak_pabrik)[1] : '' }}</textarea>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>6. Peta rute pabrik dari bandara terdekat</label>
        </div>
        <div class="col-lg-6">
            <b>Keterangan: </b> &nbsp; 
            @if(!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] == 'ada' || !is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) ))
            <span class="jawaban_ya">Ada</span>
            @elseif(!is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] == 'tidak_ada')
            <span class="jawaban_tidak">Tidak Ada</span>
            @else
            <span class="badge badge-secondary">Kosong</span>
            @endif
        </div>
        {{-- <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[20]" required="" value="ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) || 
                    is_null( $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] )) ? 'return false' : '' }}" {{ !is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] == 'ada' || !is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[20]" required="" value="tidak_ada" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) || 
                    is_null( $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] )) ? 'return false' : '' }}"
                    {{ !is_null($tinjauanPP) && $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div> --}}
        {{-- <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[20]" required="" value="null" onclick="{{ !is_null($tinjauanPP) && (is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) || 
                    is_null( $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] )) ? 'return false' : '' }}" {{ (!is_null($tinjauanPP) && ( $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[0] == 'null' || is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) )) || is_null($tinjauanPP) ? 'checked' : '' }}>Tidak Ada (Upload Ulang)
                <span class="checkmark"></span>
            </label>
        </div> --}}
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[20]" value="peta_letak_pabrik_dari_bandara_terdekat,tinjauanPP">
            @if(!is_null($tinjauanPP) && !is_null($tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat))</p>
            <i>{{ $tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat }}</i>
            <br>
            <a href="{{ asset('storage/dok/tinjauanPP/'.$tinjauanPP->peta_letak_pabrik_dari_bandara_terdekat) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat File
                </div>
            </a>
            <br><label>Review</label><br>
            <textarea class="form-control" name="review[]" placeholder="Review di sini" disabled="">{{ $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[1] != 'null' ? $getVal($tinjauanPP->rvT_peta_letak_pabrik_dari_bandara_terdekat)[1] : '' }}</textarea>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
        </div>
    </div>
</div>

<hr>

<br>