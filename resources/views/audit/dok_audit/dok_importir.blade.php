<p><b>Perusahaan Dalam Negeri (Importir)</b></p>
<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>1. Surat Permohonan Importir F.03.01</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[0]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->surat_permohonan_sertifikat_sni) || 
                    is_null( $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[0] == 'ada' || !is_null($dokImportir->surat_permohonan_sertifikat_sni) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[0]" required="" value="tidak_ada"  {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[0]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[0] == 'null') ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_sertifikat_sni,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->surat_permohonan_sertifikat_sni))
            </p>
            <i>{{ $dokImportir->surat_permohonan_sertifikat_sni }}</i> 
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->surat_permohonan_sertifikat_sni) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[0]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[1] !== 'null' ? $getVal($dokImportir->rvI_surat_permohonan_sertifikat_sni)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>2. Daftar Isian dan Kuesioner F.48.01</label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[1]" required="" value="ada" checked="">Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-3">
            <label class="container_radio">
                <input type="radio" name="dok[1]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_daftar_isian_dan_kuesioner)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <input class="fileName" type="hidden" name="fileName[]" value="daftar_isian_dan_kuesioner,dokImportir">
            <button class="toggle_btn mr-2" type="button" data-toggle="collapse" data-target="#dok_sa" aria-expanded="false" aria-controls="kuesioner">
                Daftar Isian dan Kuesioner F.48.01 &nbsp; <i class="fas fa-chevron-down"></i>
            </button>
            <div class="collapse" id="dok_sa">
                @include('applySA.kuesionerSNI')
            </div><br>
            <label>Review</label><br>
            <textarea class="form-control" name="review[1]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_daftar_isian_dan_kuesioner)[1] != 'null' ? $getVal($dokImportir->rvI_daftar_isian_dan_kuesioner)[1] : ''  }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>3. Copy IUI</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[2]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->copy_iui) || 
                    is_null( $getVal($dokImportir->rvI_copy_iui)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_copy_iui)[0] == 'ada' || !is_null($dokImportir->copy_iui) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[2]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_copy_iui)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[2]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_copy_iui)[0] == 'null') || (is_null($dokImportir->copy_iui) && is_null($dokImportir->rvI_copy_iui)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_iui,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->copy_iui))</p>
            <i>{{ $dokImportir->copy_iui }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->copy_iui) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[2]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_copy_iui)[1] != 'null' ? $getVal($dokImportir->rvI_copy_iui)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>4. Copy Akte Notaris Perusahaan</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[3]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->copy_akte_notaris_perusahaan) || 
                    is_null( $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[0] == 'ada' || !is_null($dokImportir->copy_akte_notaris_perusahaan) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[3]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[3]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[0] == 'null') || (is_null($dokImportir->copy_akte_notaris_perusahaan) && is_null($dokImportir->rvI_copy_akte_notaris_perusahaan)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_akte_notaris_perusahaan,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->copy_akte_notaris_perusahaan))</p>
            <i>{{ $dokImportir->copy_akte_notaris_perusahaan }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->copy_akte_notaris_perusahaan) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[3]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[1] != 'null' ? $getVal($dokImportir->rvI_copy_akte_notaris_perusahaan)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>5. Copy TDP/Ijin Prinsip/SIUP</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[4]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->copy_tdp) || 
                    is_null( $getVal($dokImportir->rvI_copy_tdp)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_copy_tdp)[0] == 'ada' || !is_null($dokImportir->copy_tdp) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[4]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_copy_tdp)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[4]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_copy_tdp)[0] == 'null') || (is_null($dokImportir->copy_tdp) && is_null($dokImportir->rvI_copy_tdp)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_tdp,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->copy_tdp))</p>
            <i>{{ $dokImportir->copy_tdp }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->copy_tdp) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[4]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_copy_tdp)[1] != 'null' ? $getVal($dokImportir->rvI_copy_tdp)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>6. Copy NPWP</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[5]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->copy_npwp) || 
                    is_null( $getVal($dokImportir->rvI_copy_npwp)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_copy_npwp)[0] == 'ada' || !is_null($dokImportir->copy_npwp) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[5]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_copy_npwp)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[5]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_copy_npwp)[0] == 'null') || (is_null($dokImportir->copy_npwp) && is_null($dokImportir->rvI_copy_npwp)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_npwp,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->copy_npwp))</p>
            <i>{{ $dokImportir->copy_npwp }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->copy_npwp) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[5]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_copy_npwp)[1] != 'null' ? $getVal($dokImportir->rvI_copy_npwp)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>7. Copy Angka Pengenal Importir (API)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[6]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->copy_api) || 
                    is_null( $getVal($dokImportir->rvI_copy_api)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_copy_api)[0] == 'ada' || !is_null($dokImportir->copy_api) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[6]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_copy_api)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[6]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_copy_api)[0] == 'null') || (is_null($dokImportir->copy_api) && is_null($dokImportir->rvI_copy_api)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>

    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_api,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->copy_api))</p>
            <i>{{ $dokImportir->copy_api }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->copy_api) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[6]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_copy_api)[1] != 'null' ? $getVal($dokImportir->rvI_copy_api)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>8. Copy Sertifikat Patent Merek/TandaBuktiPendaftaran Paten Merek</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[7]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->copy_sert_patent_merek) || 
                    is_null( $getVal($dokImportir->rvI_copy_sert_patent_merek)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_copy_sert_patent_merek)[0] == 'ada' || !is_null($dokImportir->copy_sert_patent_merek) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[7]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_copy_sert_patent_merek)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[7]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_copy_sert_patent_merek)[0] == 'null') || (is_null($dokImportir->copy_sert_patent_merek) && is_null($dokImportir->rvI_copy_sert_patent_merek)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_sert_patent_merek,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->copy_sert_patent_merek))</p>
            <i>{{ $dokImportir->copy_sert_patent_merek }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->copy_sert_patent_merek) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[7]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_copy_sert_patent_merek)[1] != 'null' ? $getVal($dokImportir->rvI_copy_sert_patent_merek)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>9. Penunjukan Distributor <i>(contract agreement manufacturer & importer)</i></label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[8]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->penunjukkan_distributor) || 
                    is_null( $getVal($dokImportir->rvI_penunjukkan_distributor)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_penunjukkan_distributor)[0] == 'ada' || !is_null($dokImportir->penunjukkan_distributor) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[8]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_penunjukkan_distributor)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[8]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_penunjukkan_distributor)[0] == 'null') || (is_null($dokImportir->penunjukkan_distributor) && is_null($dokImportir->rvI_penunjukkan_distributor)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="penunjukkan_distributor,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->penunjukkan_distributor))</p>
            <i>{{ $dokImportir->penunjukkan_distributor }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->penunjukkan_distributor) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[8]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_penunjukkan_distributor)[1] != 'null' ? $getVal($dokImportir->rvI_penunjukkan_distributor)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>10. Struktur Organisasi</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[9]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->struktur_organisasi) || 
                    is_null( $getVal($dokImportir->rvI_struktur_organisasi)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_struktur_organisasi)[0] == 'ada' || !is_null($dokImportir->struktur_organisasi) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[9]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_struktur_organisasi)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[9]" required="" value="null" {{ (!is_null($dokImportir) &&  $getVal($dokImportir->rvI_struktur_organisasi)[0] == 'null') || (is_null($dokImportir->struktur_organisasi) && is_null($dokImportir->rvI_struktur_organisasi)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="struktur_organisasi,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->struktur_organisasi))</p>
            <i>{{ $dokImportir->struktur_organisasi }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->struktur_organisasi) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[9]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_struktur_organisasi)[1] != 'null' ? $getVal($dokImportir->rvI_struktur_organisasi)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>11. Ilustrasi Pembubuhan Tanda SNI</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[10]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->ilustrasi_pembubuhan_tanda_sni) || 
                    is_null( $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[0] == 'ada' || !is_null($dokImportir->ilustrasi_pembubuhan_tanda_sni) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[10]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[10]" required="" value="null" {{ (!is_null($dokImportir) && $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[0] == 'null') || (is_null($dokImportir->ilustrasi_pembubuhan_tanda_sni) && is_null($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="ilustrasi_pembubuhan_tanda_sni,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->ilustrasi_pembubuhan_tanda_sni))</p>
            <i>{{ $dokImportir->ilustrasi_pembubuhan_tanda_sni }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->ilustrasi_pembubuhan_tanda_sni) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[10]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[1] != 'null' ? $getVal($dokImportir->rvI_ilustrasi_pembubuhan_tanda_sni)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>12. Tabel Daftar Tipe/ kategori produk yang akan di SNI-kan</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[11]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->tabel_daftar_tipe_produk) || 
                    is_null( $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[0] == 'ada' || !is_null($dokImportir->tabel_daftar_tipe_produk) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[11]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[11]" required="" value="null" {{ (!is_null($dokImportir) && $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[0] == 'null') || (is_null($dokImportir->tabel_daftar_tipe_produk) && is_null($dokImportir->rvI_tabel_daftar_tipe_produk)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="tabel_daftar_tipe_produk,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->tabel_daftar_tipe_produk))</p>
            <i>{{ $dokImportir->tabel_daftar_tipe_produk }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->tabel_daftar_tipe_produk) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[11]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[1] != 'null' ? $getVal($dokImportir->rvI_tabel_daftar_tipe_produk)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>13. Gambar dan spesifikasi produk yang akan di SNI-kan (katalog)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[12]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->gambar_dan_spesifikasi_produk) || 
                    is_null( $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[0] == 'ada' || !is_null($dokImportir->gambar_dan_spesifikasi_produk) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[12]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[12]" required="" value="null" {{ (!is_null($dokImportir) && $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[0] == 'null') || (is_null($dokImportir->gambar_dan_spesifikasi_produk) && is_null($dokImportir->rvI_gambar_dan_spesifikasi_produk)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="gambar_dan_spesifikasi_produk,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->gambar_dan_spesifikasi_produk))</p>
            <i>{{ $dokImportir->gambar_dan_spesifikasi_produk }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->gambar_dan_spesifikasi_produk) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[12]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[1] != 'null' ? $getVal($dokImportir->rvI_gambar_dan_spesifikasi_produk)[1] : '' }}</textarea>
        </div>
    </div>
</div>

{{-- <hr> --}}

<div class="dok hid">
    <div class="row">
        <div class="col-lg-12">
            <label>14. Sertifikat SMM</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                {{-- {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_sert_smm)[0] == 'ada' || !is_null($dokImportir->sert_smm) ) ? 'checked' : '' }} --}}
                <input type="radio" name="dok[13]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->sert_smm) || 
                    is_null( $getVal($dokImportir->rvI_sert_smm)[0] )) ? 'return false' : '' }}" 
                    >Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                {{-- {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_sert_smm)[0] == 'tidak_ada' ? 'checked' : '' }} --}}
                <input type="radio" name="dok[13]" required="" value="tidak_ada" checked="">Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                {{-- {{ (!is_null($dokImportir) && $getVal($dokImportir->rvI_sert_smm)[0] == 'null') || (is_null($dokImportir->sert_smm) && is_null($dokImportir->rvI_sert_smm)) ? 'checked' : '' }} --}}
                <input type="radio" name="dok[13]" required="" value="null" >Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="sert_smm,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->sert_smm))</p>
            <i>{{ $dokImportir->sert_smm }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->sert_smm) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[13]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_sert_smm)[1] != 'null' ? $getVal($dokImportir->rvI_sert_smm)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>

<div class="dok">
    <div class="row">
        <div class="col-lg-12">
            <label>14. Laporan pengawasan ISO 9001 terakhir / Audit Internal</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[14]" required="" value="ada" onclick="{{ !is_null($dokImportir) && (is_null($dokImportir->laporan_pengawasan_iso_9001_terakhir) || 
                    is_null( $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[0] )) ? 'return false' : '' }}" 
                    {{ !is_null($dokImportir) && ( $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[0] == 'ada' || !is_null($dokImportir->laporan_pengawasan_iso_9001_terakhir) ) ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[14]" required="" value="tidak_ada" {{ !is_null($dokImportir) && $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[14]" required="" value="null" {{ (!is_null($dokImportir) && $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[0] == 'null') || (is_null($dokImportir->laporan_pengawasan_iso_9001_terakhir) && is_null($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)) ? 'checked' : '' }}>Upload Ulang
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="laporan_pengawasan_iso_9001_terakhir,dokImportir">
            @if(!is_null($dokImportir) && !is_null($dokImportir->laporan_pengawasan_iso_9001_terakhir))</p>
            <i>{{ $dokImportir->laporan_pengawasan_iso_9001_terakhir }}</i>
            <div class="text-center">
                <a href="{{ asset('storage/dok/sa/'.$dokImportir->laporan_pengawasan_iso_9001_terakhir) }}" target="_blank">
                    <div class="view_file">
                        <i class="fas fa-eye"></i>&nbsp; Lihat File
                    </div>
                </a>
            </div>
            @else
            <center class="ml-4 mr-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
            <label>Review</label><br>
            <textarea class="form-control" name="review[14]" placeholder="Review di sini.." 
                {{ !is_null($tinjauanPP) && !is_null($dokImportir) && $dokImportir->sni !== 3 ? 'disabled' : '' }} >{{ $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[1] != 'null' ? $getVal($dokImportir->rvI_laporan_pengawasan_iso_9001_terakhir)[1] : '' }}</textarea>
        </div>
    </div>
</div>

<hr>