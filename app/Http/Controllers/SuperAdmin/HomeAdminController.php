<?php 
namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FormatFile;
use App\Role;
use App\Produk;
use App\Persyaratan_dalam_negeri;

class HomeAdminController extends Controller
{
	public function index() {
        $client = \DB::table('users')
            ->leftJoin('produk', 'produk.user_id', '=', 'users.id')
            ->leftJoin('master_tahap', 'master_tahap.kode_tahap', '=', 'produk.kode_tahap')
            ->where('produk', '!=', null)
            ->select('users.id', 'users.nama_perusahaan', 'users.negeri', 'users.pimpinan_perusahaan', 'users.provinsi', 'users.kota', 'users.alamat_perusahaan', 'users.email_perusahaan', 'users.no_telp', 'master_tahap.tahapan', 'master_tahap.kode_tahap', 'produk.produk', 'produk.jenis_produk', 'produk.id as produk_id', 'produk.updated_at', 'produk.created_at')->limit(5)->get();
        
        // filter data unique
        $unique = collect([]);
        foreach ($client as $key => $value) {
            $double = 0;
            foreach ($unique as $key2 => $item) {
                if ($value->id == $item->id && $value->kode_tahap == 24) {
                    $double += 1;
                }
            }
            if ( $double == 0 ) {
                $unique->push($value);
            }
        }

        $result = $unique->sortByDesc('created_at');

		return view('superAdmin.dashboard-superAdmin', ['client' => $result]);
	}

	public function format_file() {
		$dbFormat = FormatFile::all();

		return view('superAdmin.pengaturan.format_file', ['format' => $dbFormat]);
	}

	public function format_file_ubah(Request $request, $id = null) {
		$d = \Validator::make($request->file(), [
            'file' => 'required|max:5000|mimes:docx,doc',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 5 megabytes',
            'mimes'      => 'Extensi file harus: .doc, .docx',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        if (!is_null($id)) {
        	$aksi = 'diubah!';
			$dbFormat = FormatFile::find($id);
        } else {
        	$aksi = 'ditambah!';
        	$dbFormat = new FormatFile;
        }

        if ($request->formatDok == 'Surat Permohonan F.03.01') {
        	$file = 'surat_permohonan_F.03.01';
        } elseif ($request->formatDok == 'MOU') {
        	$file = 'mou';
        } elseif ($request->formatDok == 'Surat Pemberitahuan Jadwal Audit') {
            $file = 'surat_pemberitahuan_jadwal_audit';
        } elseif ($request->formatDok == 'Audit Plan') {
            $file = 'audit_plan';
        } elseif ($request->formatDok == 'Samping Plan') {
            $file = 'sampling_plan';
        } elseif ($request->formatDok == 'Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI') {
            $file = 'lembar_konfirmasi_penerbitan_sertifikat_sppt_sni';
        } else {
        	return redirect()->back()->with('msg', 'Tolong pilih format dokumen yang tersedia!');
        }
        
        $fileName = $file.'.'.$request->file('file')->getClientOriginalExtension();
        $request->file('file')->storeAs('dok/format_dok', $fileName);
        if (\Storage::exists('dok/format_dok/'.$dbFormat->file)) {
        	\Storage::delete('dok/format_dok/'.$dbFormat->file);
        }

        $dbFormat->format = $request->formatDok;
        $dbFormat->file = $fileName;
        $dbFormat->save();

        return redirect()->back()->with('msg', 'Format Dokumen '.$request->format.' berhasil '.$aksi);
	}

	public function format_file_hapus(Request $request, $id) {
		$dbFormat = FormatFile::find($id);
		$format = $dbFormat->format;
		if (\Storage::exists('dok/format_dok/'.$dbFormat->file)) {
        	\Storage::delete('dok/format_dok/'.$dbFormat->file);
        }

		$dbFormat->delete();

		return redirect()->back()->with('msg', 'Format Dokumen '.$format.' berhasil dihapus!');
	}

    public function manual() {
        $manual = Role::all();
        return view('superAdmin.pengaturan.manual', ['manual' => $manual]);
    }

    public function manual_edit(Request $request, $id) {
        $d = \Validator::make($request->file(), [
            'file' => 'required|max:5000|mimes:docx,doc,pdf',
        ],[
            'max'    => 'Ukuran tidak boleh melebihi 5 megabytes',
            'mimes'      => 'Extensi file harus: .doc, .docx, .pdf',
        ]);
        if ($d->fails()) {return redirect()->back()->withErrors($d);}

        $manual = Role::find($id);
        $fileName = 'manual_book_'.$manual->role_name.'.'.$request->file('file')->getClientOriginalExtension();
        $request->file('file')->storeAs('dok/format_dok', $fileName);
        
        if (\Storage::exists('dok/format_dok/'.$manual->manual)) {
            \Storage::delete('dok/format_dok/'.$manual->manual);
        }

        $manual->manual = $fileName;
        $manual->save();

        return redirect()->back()->with('msg', 'Manual User '.$manual->role_name.' berhasil diubah!');
    }

    public function pengaturan_akun() {
        return view('superAdmin.set_akun');
    }
}