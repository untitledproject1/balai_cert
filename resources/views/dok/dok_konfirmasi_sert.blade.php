<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LEMBAR KONFIRMASI PENERBITAN SERTIFIKAT SPPT SNI</title>

    <style>
        
        body {
            font-family: 'Calibri', sans-serif;
        }
        
        td {
            padding: 2px 4px;
        }

        h2,
        h3,
        h4 {
            text-align: center;
        }

        /* Checkbox */
        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 25px;
            margin-bottom: 5px;
            cursor: pointer;
            font-size: 15px -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 16px;
            width: 16px;
            border: 1px solid black;
        }

        /* When the checkbox is checked, add a blue background */
        .container .checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container .checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

    </style>
</head>

<body>

    <h3>LEMBAR KONFIRMASI PENERBITAN SERTIFIKAT <br> SPPT SNI</h3>

    <table border="1" width="100%" style="border-collapse: collapse;">
        <tr>
            <td width="45%">Nama Perusahaan</td>
            <td width="2%">:</td>
            <td colspan="2">{{ $user->nama_perusahaan }}</td>
        </tr>
        <tr>
            <td>Alamat pabrik</td>
            <td>:</td>
            <td colspan="2">{{ $user->alamat_perusahaan }}, {{ $user->kota }}</td>
        </tr>
        {{-- <tr>
            <td>Nama Importir</td>
            <td>:</td>
            <td colspan="2">PT. Niro Ceramic Sales Indonesia</td>
        </tr>
        <tr>
            <td>Alamat Importir</td>
            <td>:</td>
            <td colspan="2">Jln. Raya Mercedes, Desa Cicadas, Kec. Gunung Putri, Kab. Bogor 16964</td>
        </tr> --}}
        <tr>
            <td>No API</td>
            <td>:</td>
            {{-- <td colspan="2">{{ $data['no_api'] }}</td> --}}
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Komoditi/ lingkup</td>
            <td>:</td>
            <td colspan="2">Ubin Keramik</td>
        </tr>
        <tr>
            <td>Tanggal Permohonan Lengkap</td>
            <td>:</td>
            <td colspan="2">{{ $data['tgl_permohonan']->isoFormat('LL') }}</td>
        </tr>
        <tr>
            <td>Tanggal Audit</td>
            <td>:</td>
            <td colspan="2">{{ $lapSert->tanggal_audit }}</td>
        </tr>
        <tr>
            <td>Tim Audit dan PPC</td>
            <td>:</td>
            <td width="30%">Jumadi Maulid Purnawan</td>
            <td>Usep Saefudin</td>
        </tr>
        <tr>
            <td>Alamat email</td>
            <td>:</td>
            <td colspan="2">{{ $user->email_perusahaan }}</td>
        </tr>
        <tr>
            <td>Contact person dan no HP</td>
            <td>:</td>
            <td colspan="2">{{ $user->contact_person }} / {{ $user->cp_num }}</td>
        </tr>
        <tr>
            <td>Tanggal permohonan penerbitan</td>
            <td>:</td>
            <td colspan="2">{{ $data['tgl_penerbitan']->isoFormat('LL') }}</td>
        </tr>
        <tr>
            <td>Nama dan paraf yang mengajukan</td>
            <td>:</td>
            <td width="25%"></td>
            <td>{{ $user->name }}</td>
            {{-- <td>{{ $user->pemimpin_perusahaan }}</td> --}}
        </tr>
        <tr>
            <td>Kelengkapan</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="4">
                <table width="100%">
                    <tr>
                        <td width="45%">
                            <label class="container">BAPC
                                <span class="checkmark">{{ !is_null($data['bapc']) ? $data['bapc'] : '' }}</span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Laporan Hasil Sertifikasi (komite evaluasi teknis)
                                <span class="checkmark">{{ !is_null($data['lapSert']) ? $data['lapSert'] : '' }}</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Copyan sertifikat
                                <span class="checkmark">{{ !is_null($data['copy_sert']) ? $data['copy_sert'] : '' }}</span>
                            </label>
                        </td>
                        <td>
                            <label class="container">SHU No. 400-1 s/d 401-1/BBK/JU-12/2018
                                <span class="checkmark">{{ !is_null($data['shu']) ? $data['shu'] : '' }}</span>
                            </label>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Jenis penerbitan</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="4">
                <table width="100%">
                    <tr>
                        <td>
                            <label class="container">Sertifikasi awal
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container"><strike>Resertifikasi</strike>
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container"><strike>Revisi/Update</strike>
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">Keterangan:</td>
        </tr>
        <tr>
            <td>Tanggal pembuatan draft</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Tanggal pengiriman draft</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Tanggal konfirmasi persetujuan draft</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Tanggal pencetakan sertifikat</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Tanggal paraf KaBid Paskal</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Tanggal tandatangan Ka BBK</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>

        <tr>
            <td>Tanggal penyerahan sertifikat ke Sie Kerjasama</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Nama dan paraf penerima sertifikat</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Tanggal pemberitahuan ke klien</td>
            <td>:</td>
            <td colspan="2">
                <table width="100%" style="margin-left: 80px">
                    <tr>
                        <td style="vertical-align: top">via:</td>
                        <td>
                            <label class="container">email
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">telepon
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Tanggal penyerahan sertifikat ke klien</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Nama dan paraf penerima sertifikat</td>
            <td>:</td>
            <td colspan="2"></td>
        </tr>
    </table>

</body>

</html>
