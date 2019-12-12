<div class="row">
    <div class="col-lg-7">
        <label>1. Surat Permohonan F.03.01</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[0]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->surat_permohonan_sertifikat_sni)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->surat_permohonan_sertifikat_sni) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[0]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->surat_permohonan_sertifikat_sni)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->surat_permohonan_sertifikat_sni)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>

<div class="row ml-3 mb-4">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="surat_permohonan_sertifikat_sni">
            @if(!is_null($dok) && !is_null($dok->surat_permohonan_sertifikat_sni))
            {{ $dok->surat_permohonan_sertifikat_sni }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->surat_permohonan_sertifikat_sni) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>2. Copy IUI</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[1]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->copy_iui)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->copy_iui) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[1]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->copy_iui)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->copy_iui)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>

<div class="row ml-3 mb-4">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_iui">
            @if(!is_null($dok) && !is_null($dok->copy_iui))
            {{ $dok->copy_iui }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->copy_iui) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>3. Copy Akte Notaris Perusahaan</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[2]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->copy_akte_notaris_perusahaan)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->copy_akte_notaris_perusahaan) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>

        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[2]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->copy_akte_notaris_perusahaan)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->copy_akte_notaris_perusahaan)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-4">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_akte_notaris_perusahaan">
            @if(!is_null($dok) && !is_null($dok->copy_akte_notaris_perusahaan))
            {{ $dok->copy_akte_notaris_perusahaan }}</p>
        <a href="{{ asset('storage/dok/sa/'.$dok->copy_akte_notaris_perusahaan) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>4. Copy TDP</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[3]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->copy_tdp)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->copy_tdp) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[3]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->copy_tdp)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->copy_tdp)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_tdp">
            @if(!is_null($dok) && !is_null($dok->copy_tdp))
            {{ $dok->copy_tdp }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->copy_tdp) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>5. Copy NPWP</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[4]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->copy_npwp)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->copy_npwp) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[4]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->copy_npwp)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->copy_npwp)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_npwp">
            @if(!is_null($dok) && !is_null($dok->copy_npwp))
            {{ $dok->copy_npwp }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->copy_npwp) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>6. Copy Sertifikat Patent Merek</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[5]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->copy_sert_patent_merek)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->copy_sert_patent_merek) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[5]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->copy_sert_patent_merek)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->copy_sert_patent_merek)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_sert_patent_merek">
            @if(!is_null($dok) && !is_null($dok->copy_sert_patent_merek))
            {{ $dok->copy_sert_patent_merek }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->copy_sert_patent_merek) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>7. Copy Sertifikat ISO 9001</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[6]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->copy_sert_iso_9001)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->copy_sert_iso_9001) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[6]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->copy_sert_iso_9001)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->copy_sert_iso_9001)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="copy_sert_iso_9001">
            @if(!is_null($dok) && !is_null($dok->copy_sert_iso_9001))
            {{ $dok->copy_sert_iso_9001 }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->copy_sert_iso_9001) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>8. Laporan Audit Sistem Mutu Terakhir</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[7]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->laporan_audit_sistem_mutu_terakhir)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->laporan_audit_sistem_mutu_terakhir) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[7]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->laporan_audit_sistem_mutu_terakhir)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->laporan_audit_sistem_mutu_terakhir)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="laporan_audit_sistem_mutu_terakhir">
            @if(!is_null($dok) && !is_null($dok->laporan_audit_sistem_mutu_terakhir))
            {{ $dok->laporan_audit_sistem_mutu_terakhir }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->laporan_audit_sistem_mutu_terakhir) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>9. Panduan Mutu</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[8]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->panduan_mutu)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->panduan_mutu) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[8]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->panduan_mutu)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->panduan_mutu)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="panduan_mutu">
            @if(!is_null($dok) && !is_null($dok->panduan_mutu))
            {{ $dok->panduan_mutu }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->panduan_mutu) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>10. Daftar Induk Dokumen</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[9]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->daftar_induk_dok)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->daftar_induk_dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[9]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->daftar_induk_dok)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->daftar_induk_dok)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="daftar_induk_dok">
            @if(!is_null($dok) && !is_null($dok->daftar_induk_dok))
            {{ $dok->daftar_induk_dok }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->daftar_induk_dok) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>11. Struktur Organisasi</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[10]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->struktur_organisasi)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->struktur_organisasi) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[10]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->struktur_organisasi)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->struktur_organisasi)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="struktur_organisasi">
            @if(!is_null($dok) && !is_null($dok->struktur_organisasi))
            {{ $dok->struktur_organisasi }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->struktur_organisasi) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>12. Diagram Alir Proses Produksi</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[11]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->diagram_alir_proses_produksi)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->diagram_alir_proses_produksi) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[11]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->diagram_alir_proses_produksi)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->diagram_alir_proses_produksi)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="diagram_alir_proses_produksi">
            @if(!is_null($dok) && !is_null($dok->diagram_alir_proses_produksi))
            {{ $dok->diagram_alir_proses_produksi }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->diagram_alir_proses_produksi) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>13. Surat Pertujukkan Wakil Manajemen</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[12]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->surat_pertunjukkan_wakil_manajemen)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->surat_pertunjukkan_wakil_manajemen) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[12]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->surat_pertunjukkan_wakil_manajemen)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->surat_pertunjukkan_wakil_manajemen)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="surat_pertunjukkan_wakil_manajemen">
            @if(!is_null($dok) && !is_null($dok->surat_pertunjukkan_wakil_manajemen))
            {{ $dok->surat_pertunjukkan_wakil_manajemen }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->surat_pertunjukkan_wakil_manajemen) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>14. Ilustrasi Pembubuhan Tanda SNI</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[13]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->ilustrasi_pembubuhan_tanda_sni)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->ilustrasi_pembubuhan_tanda_sni) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[13]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->ilustrasi_pembubuhan_tanda_sni)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->ilustrasi_pembubuhan_tanda_sni)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="ilustrasi_pembubuhan_tanda_sni">
            @if(!is_null($dok) && !is_null($dok->ilustrasi_pembubuhan_tanda_sni))
            {{ $dok->ilustrasi_pembubuhan_tanda_sni }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->ilustrasi_pembubuhan_tanda_sni) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>15. Tabel Daftar Tipe Produk</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[14]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->tabel_daftar_tipe_produk)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->tabel_daftar_tipe_produk) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[14]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->tabel_daftar_tipe_produk)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->tabel_daftar_tipe_produk)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="tabel_daftar_tipe_produk">
            @if(!is_null($dok) && !is_null($dok->tabel_daftar_tipe_produk))
            {{ $dok->tabel_daftar_tipe_produk }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->tabel_daftar_tipe_produk) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>16. Gambar dan Spesifikasi Produk</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[15]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->gambar_dan_spesifikasi_produk)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->gambar_dan_spesifikasi_produk) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[15]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->gambar_dan_spesifikasi_produk)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->gambar_dan_spesifikasi_produk)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="gambar_dan_spesifikasi_produk">
            @if(!is_null($dok) && !is_null($dok->gambar_dan_spesifikasi_produk))
            {{ $dok->gambar_dan_spesifikasi_produk }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->gambar_dan_spesifikasi_produk) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>17. Tata Letak Pabrik</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[16]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->tata_letak_pabrik)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->tata_letak_pabrik) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[16]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->tata_letak_pabrik)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->tata_letak_pabrik)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="tata_letak_pabrik">
            @if(!is_null($dok) && !is_null($dok->tata_letak_pabrik))
            {{ $dok->tata_letak_pabrik }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->tata_letak_pabrik) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-7">
        <label>18. Peta Rute Pabrik Dari Bandara Terdekat</label>
    </div>
    <div class="col-lg-5">
        <label class="container_radio d-inline">Lengkap
            <input type="radio" name="dok[17]" required="" value="ada" onclick="{{ (!is_null($dok) && is_null($dok->peta_rute_pabrik_dari_bandara_terdekat)) || is_null($dok) ? 'return false' : '' }}" {{ !is_null($dok) && !is_null($dok->peta_rute_pabrik_dari_bandara_terdekat) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
        <label class="container_radio d-inline">Tidak Lengkap
            <input type="radio" name="dok[17]" required="" value="null" onclick="{{ (!is_null($dok) && is_null($dok->peta_rute_pabrik_dari_bandara_terdekat)) || is_null($dok) ? 'return false' : '' }}" {{ (!is_null($dok) && is_null($dok->peta_rute_pabrik_dari_bandara_terdekat)) || is_null($dok) ? 'checked' : '' }}>
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row ml-3 mb-3">
    <div class="col-lg">
        <p>Nama File: <input class="fileName" type="hidden" name="fileName[]" value="peta_rute_pabrik_dari_bandara_terdekat">
            @if(!is_null($dok) && !is_null($dok->peta_rute_pabrik_dari_bandara_terdekat))
            {{ $dok->peta_rute_pabrik_dari_bandara_terdekat }}</p>

        <a href="{{ asset('storage/dok/sa/'.$dok->peta_rute_pabrik_dari_bandara_terdekat) }}" target="_blank">
            <div class="view_file">
                <i class="fas fa-eye"></i>&nbsp; Lihat File
            </div>
        </a>

        @else
        <center>
            <p class="alert alert-warning">Dokumen belum ada</p>
        </center>
        @endif
    </div>
</div>

<br>
