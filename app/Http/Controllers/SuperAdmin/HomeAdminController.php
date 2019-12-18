<?php 
namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FormatFile;
use App\Role;

class HomeAdminController extends Controller
{
	public function index() {
		return view('superAdmin.dashboard-superAdmin');
	}

	public function format_file() {
		$dbFormat = FormatFile::all();

		return view('superAdmin.format_file', ['format' => $dbFormat]);
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
        return view('superAdmin.manual', ['manual' => $manual]);
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
}