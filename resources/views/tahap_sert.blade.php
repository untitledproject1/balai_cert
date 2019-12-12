<div class="col-lg-3 col-md">
    <div class="wrap_content font-tahap">
        <h4 class="mb-3">Tahap Sertifikasi</h4>
        {{-- {{{ $tahap = \AppHelper::instance()->tahap($id_produk) }}} --}}

        {{-- di ambil di middleware --}}
        @foreach($tahap_sert as $tahap)
            @if($tahap->kode_tahap !== 10)
                @if(( $kode_tahap == 10 && $tahap->kode_tahap == 10 ) || ( $tahap->kode_tahap == $kode_tahap + 1 ))
                <label class="container_checkbox_display on_process">{{ $tahap->tahapan }}
                    <img class="img_process" style="width: 25px;" src="{{ asset('images/process.svg') }}" data-toggle="tooltip" data-placement="top" title="Sedang Berjalan" alt="">
                </label>
                @else
                <label class="container_checkbox_display">{{ $tahap->tahapan }}
                    <div style="margin-right: 10px;">
                        <input class="font-tahap-icon" type="checkbox" {{ $tahap->kode_tahap <= $kode_tahap ? 'checked' : '' }} disabled>
                        <span class="checkmark_display"></span>
                    </div>
                </label>
                @endif
            @endif
        @endforeach
        
        {{-- <label class="container_checkbox_display">Pembuatan Mou
            <div style="margin-right: 10px;">
                <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->mou == 1 ? 'checked' : '' }} disabled>
        <span class="checkmark_display"></span>
    </div>
    </label>
    <label class="container_checkbox_display">Sign Mou
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->sign_mou == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Form Penawaran Harga
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->bid_price == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Pembuatan Invoice
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->invoice == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Upload Bukti Pembayaran
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->bukti_bayar == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Surat Pemberitahuan Jadwal dan Tim Audit
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->jadwal_audit == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Laporan Audit Kecukupan Sertifikasi Produk
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->dokSert == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Upload Audit Plan dan Sampling Plan
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->sampling_plan == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">
        <div style="margin-right: 10px;">Pembuatan Dokumen Laporan Hasil Sertifikasi
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->lapSert == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Pembuatan Draft Sertifikat
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->draftSert == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Cetak Draft Sertifikat
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->cetakSert == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label>
    <label class="container_checkbox_display">Penjadwalan Ambil/Kirim Sertifikat
        <div style="margin-right: 10px;">
            <input class="font-tahap-icon" type="checkbox" {{ !is_null($tahap) && $tahap->jadwalSert == 1 ? 'checked' : '' }} disabled>
            <span class="checkmark_display"></span>
        </div>
    </label> --}}


</div>
</div>

<!-- Tooltip -->
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
