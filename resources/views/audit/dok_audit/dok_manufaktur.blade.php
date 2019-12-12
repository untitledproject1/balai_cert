<p><b>Perusahaan Luar Negeri (Manufaktur)</b></p>
<div class="dok">
    <div class="row">
        <div class="col-lg-6">
            <label>1. Surat Permohonan F.46 dari Manufaktur</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[3]" required="" value="ada" onclick="{{ is_null($dokManufaktur->surat_permohonan_dari_manufaktur) || 
                    is_null( $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[0] ) ? 'return false' : '' }}" 
                    {{ $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[0] == 'ada' ? 'checked' : '' }}>Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[3]" required="" value="tidak_ada" onclick="{{ is_null($dokManufaktur->surat_permohonan_dari_manufaktur) || 
                    is_null( $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[0] ) ? 'return false' : '' }}"
                    {{ $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[0] == 'tidak_ada' ? 'checked' : '' }}>Tidak Ada
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="col-lg-4">
            <label class="container_radio">
                <input type="radio" name="dok[3]" required="" value="null" onclick="{{ is_null($dokManufaktur->surat_permohonan_dari_manufaktur) || 
                    is_null( $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[0] ) ? 'return false' : '' }}" 
                    {{ $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[0] == 'null' ? 'checked' : '' }}>Tidak Ada (Upload Ulang)
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-lg">
            <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_dari_manufaktur,dokManufaktur">
            @if(!is_null($dokManufaktur) && !is_null($dokManufaktur->surat_permohonan_dari_manufaktur))</p>
            <i>{{ $dokManufaktur->surat_permohonan_dari_manufaktur }}</i>
            <a href="{{ asset('storage/dok/dokManufaktur/'.$dokManufaktur->surat_permohonan_dari_manufaktur) }}" target="_blank">
                <div class="view_file">
                    <i class="fas fa-eye"></i>&nbsp; Lihat File
                </div>
            </a>
            <br><label>Review</label><br>
            <textarea class="form-control" name="review[3]" placeholder="Review di sini..">{{ $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[1] != 'null' ? $getVal($dokManufaktur->rvM_surat_permohonan_dari_manufaktur)[1] : '' }}</textarea>
            @else
            <center class="ml-4 ml-4">
                <p class="alert alert-warning">Dokumen belum ada</p>
            </center>
            @endif
        </div>
    </div>
</div>

<hr>