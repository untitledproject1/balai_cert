@extends('home')

@section('card-header', 'Peninjauan Surat Pemberitahuan Jadwal dan Tim Audit')

@section('second-content')
<div class="col-lg-9">
    <div class="wrap_content">
        @if(!is_null($jadwalAudit) && is_null($jadwalAudit->apprv))
        <center>
            <p class="alert alert-success">Surat Pemberitahuan Jadwal dan Tim Audit sudah dibuat</p>
        </center>
        <div class="text-center">
            <a href="{{ url('/doc/download/jadwalAudit/'.$jadwalAudit->jadwal_audit) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Dokumen
                </div>
            </a>
        </div>
        <form id="apprvJadwal" method="POST" action="{{ url('/apprv_jadwalAudit') }}">
            @csrf
            <input type="hidden" name="produkId" value="{{ $idProduk }}">
            <input class="apprvJadwalChoice" type="hidden" name="choice" value="">
            <label class="mt-4"><b>Persetujuan Surat Pemberitahuan Jadwal dan Tim Audit</b></label><br>
            <div class="mt-2">
                <button class="reset_btn mr-3" type="button" onclick="apprvJadwalAct(false)">Tolak</button>
                <button class="submit_btn" type="button" onclick="apprvJadwalAct(true)">Terima</button>
            </div>
        </form>
        @elseif(!is_null($jadwalAudit) && $jadwalAudit->apprv == 2)
        <center>
            <p class="alert alert-primary">Surat Pemberitahuan Jadwal dan Tim Audit tidak disetujui</p>
        </center>
        @elseif(!is_null($jadwalAudit) && $jadwalAudit->apprv == 1)
        <center>
            <p class="alert alert-success">Surat Pemberitahuan Jadwal Audit telah disetujui</p>
        </center>
        <div class="text-center">
            <a href="{{ url('/doc/download/jadwalAudit/'.$jadwalAudit->jadwal_audit) }}" target="_blank">
                <div class="download_file">
                    <i class="fas fa-download"></i>&nbsp; Download Surat Pemberitahuan Jadwal Audit
                </div>
            </a>
        </div>
        @else
        <center>
            <p class="alert alert-primary">Surat Pemberitahuan Jadwal dan Tim Audit belum dibuat</p>
        </center>
        @endif
        <br>
    </div>
</div>

<script type="text/javascript">
    function apprvJadwalAct(choice) {
        let value = "";
        let title = "";
        let textTolak = "";
        if (choice) {
            value = "1";
            title = "Setujui Surat Pemberitahuan Jadwal dan Tim Audit";
        } else {
            value = "2";
            title = "Tolak Surat Pemberitahuan Jadwal dan Tim Audit";
            // textTolak = ", Dokumen akan dihapus, Permintaan pembuatan dokumen baru akan dikirim ke Seksi Pemasaran";
        }
        $('.apprvJadwalChoice').val(value);
        swal({
            title: title,
            text: "Apakah anda yakin?"+textTolak,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((ok) => {
            if (ok) {
                $('#apprvJadwal').submit();
            } else {
                return false;
            }
        });
    }
</script>
@endsection
