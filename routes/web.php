<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>'verified'], function() {
	Route::get('/cek/{file}', 'HomeController@view_dok');
	Route::get('/sikat_bersih/{idProduk}', 'HomeController@deleteAll');
	Route::get('/doc/download/{directory}/{file}', 'HomeController@downloadDoc');
	Route::get('/manual/download/{role}', 'HomeController@manual');
	Route::post('/setting/company', 'HomeController@settingComp');
	Route::post('/setting/account', 'HomeController@settingAcc');

	Route::get('/sukses_register', function () {
	    return view('sukses_register');
	});

	Route::get('/sukses_verifikasi', function () {
	    return view('sukses_verifikasi');
	});

	Route::group(['middleware'=>'roles','roles'=>['client', 'pemasaran', 'kerjasama', 'kabidpjt', 'keuangan', 'sertifikasi', 'kabidpaskal', 'auditor', 'tim_teknis', 'komite_timTeknis', 'subag_umum', 'ketua_tim_teknis', 'ketua_sertifikasi', 'subag_umum']], function() {

		Route::post('/message_send/{idProduk}/{admin_id}/{client_id?}', 'ProdukController@send_message_client');
	});

	Route::group(['middleware'=>'roles','roles'=>['client', 'pemasaran', 'kerjasama', 'kabidpjt', 'keuangan', 'sertifikasi', 'kabidpaskal', 'auditor', 'tim_teknis', 'komite_timTeknis', 'subag_umum', 'ketua_tim_teknis', 'ketua_sertifikasi', 'subag_umum', 'super_admin']], function() {
		// Route::get('/editDok', 'HomeController@editDok');

		Route::get('/pesan', 'HomeController@pesan');
		Route::get('/messages', 'HomeController@messages');
		Route::get('/setting', 'HomeController@setting');
	});


	// route client	
	Route::group(['middleware'=>'roles','roles'=>'client'], function() {
		
		Route::get('/history', 'ProdukController@history');
		// dashboard
		Route::get('/dashboard', 'ProdukController@dashboard');
		Route::get('/profil', 'HomeController@profil');
		Route::get('/surat_sni/download/{negeri}', 'SAController@surat_sni');

		$url = explode('/', url()->current());
		$prefix = isset($url[3]) && $url[3] == 'history' ? 'history' : '';
		Route::prefix($prefix)->group(function() {
			// menampilkan list produk
			Route::get('/list_produk', 'SAController@list_produk');
			// apply SA
			// ---- ajax upload
			Route::post('/async_sa_upload', 'SAController@async_sa_upload');
			Route::post('/async_kuis_upload', 'SAController@async_kuis_upload');
			Route::post('/async_bHasil_upload', 'SAController@async_bHasil_upload');

			// dok audit
			// ---- ajax upload
			Route::post('/async_tinjauanPP_upload', 'JAController@async_tinjauanPP_upload');

			Route::get('/addNew/sa', 'SAController@newSA');
			Route::get('/sa/{idProduk}', 'SAController@sa');
			Route::post('/sa/{data}', 'SAController@applySA');
			Route::post('/saLuar', 'SAController@applySAluar');
			// mou
			Route::get('/mou/{idProduk}', 'MOUController@mou');
			Route::post('/mou_signed/{id}', 'MOUController@mou_signed');
			// form kapan bayar
			Route::get('/form_bayar/{idProduk}', 'BPController@getForm_bayar');
			Route::post('/form_bayar/{id}', 'BPController@form_bayar');
			// upload bukti bayar
			Route::get('/bukti_bayar/{idProduk}', 'BPController@getBukti');
			Route::post('/bukti_bayar/{id}', 'BPController@bukti_bayar');
			// upload dok audit
			Route::get('/verify_dokSert/{idProduk}', 'JAController@verify_dokSert');
			Route::post('/dokAudit/{idProduk}', 'JAController@dokAudit');
			// approval draft sert
			Route::get('/apprv_draftSert/{idProduk}', 'SertController@getApprv');
			Route::post('/apprv_draftSert_action/{idProduk}', 'SertController@postApprv');
			// request ambil/kirim sert
			Route::get('/req_sert/{idProduk}', 'SertController@req_sert');
			Route::post('/req_sert_action/{id}', 'SertController@postReq_sert');
			// verifikasi penerimaan sert
			Route::get('/verify_terimaSert/{idProduk}', 'SertController@verify_terimaSert');
			Route::post('/verify_terimaSert_post/{idProduk}', 'SertController@verify_terimaSert_post');
		});
		

	});

	// route seksi pemasaran, seksi kerjasama, kabidpjt, seksi keuangan, auditor, kabidPaskal, tim_teknis, komite_timTeknis
	Route::group(['middleware'=>'roles','roles'=>['pemasaran', 'kerjasama', 'kabidpjt', 'keuangan', 'sertifikasi', 'kabidpaskal', 'auditor', 'tim_teknis', 'komite_timTeknis', 'subag_umum', 'ketua_tim_teknis', 'ketua_sertifikasi']], function() {
		// menampilkan list produk
		Route::get('/company_list', 'CompanyController@list');
		Route::get('/company/{id}', 'CompanyController@single');
		Route::get('/cert_list/{status}', 'CompanyController@cert_list');
		// Route::get('/cert_list/history', 'CompanyController@cert_history');
	});

	// $url = explode('/', url()->current());
	// // $adminPrefix = 'cert_list';
	// if ($url[5] == 'cert_list' && isset($url[6])) {
	// 	$adminPrefix = $url[5].'/'.$url[6];
	// } else {
	// 	$adminPrefix = '';
	// }

	// Route::prefix($adminPrefix)->group(function() {

		// route seksi pemasaran
		Route::group(['middleware'=>'roles','roles'=>'pemasaran'], function() {
		    Route::get('cek_penawaran_harga', function() {
				return view('dok.dok_bidPrice');
			});
		    
			// verify SA
			Route::get('company/{id}/sert/{idProduk}', 'CompanyController@verifySA');
			Route::post('/verifySA/{id}', 'CompanyController@verSA');
			Route::post('/verifySALuar/{id}', 'CompanyController@verSALuar');
			// penawaran harga
			Route::get('/bidPrice/{id}/sert/{idProduk}', 'BPController@index');
			Route::post('/bidPrice_create/{id}/{user_id}', 'BPController@create');
			Route::post('/submit_bidPrice/{id}', 'BPController@submit');
			// pemberitahuan sertifikat jadi
			// Route::get('/sert_jadi/{id}/sert/{idProduk}', 'SertController@sert_jadi');
			// Route::post('/sert_jadi_action/{id}', 'SertController@postSert_jadi');
			// arrange schedule pengiriman/pengambilan
			Route::get('/jadwalSert/{id}/sert/{idProduk}', 'SertController@jadwalSert');
			Route::post('/jadwalSert_action/{id}', 'SertController@postJadwalSert');

			Route::post('/konfirmasi_resi/{idProduk}', 'SertController@konfirmasiSert');
			Route::post('/uploadBP_BBK/{idProduk}', 'BPController@uploadBP_BBK');
		});

	// });

	// route seksi kerjasama
	Route::group(['middleware'=>'roles','roles'=>'kerjasama'], function() {
		// mou
		Route::get('cek_mou_dn', function() {
			return view('dok.dok_mou');
		});
		Route::get('cek_mou_ln', function() {
			return view('dok.dok_mou_luarNegri');
		});
		Route::get('/company/{id}/cmou/{idProduk}', 'MOUController@cmou');
		Route::post('/mou_create/{id}/{user_id}', 'MOUController@create');
		Route::post('/unlock_mou/{id}', 'MOUController@unlock_mou');
		Route::post('/mou_bbk/{idProduk}', 'MOUController@uploadMou');
	});

	// route kabidpjt
	Route::group(['middleware'=>'roles','roles'=>'kabidpjt'], function() {
		// approval penawaran harga
		Route::get('/company/{id}/approval/{idProduk}', 'BPController@getApprove');
		Route::post('/bidPrice_approval/{id}', 'BPController@approve');
		Route::post('/edit_rincianHarga/{idProduk}/{user_id}', 'BPController@edit_rincianHarga');
	});

	// route seksi keuangan
	Route::group(['middleware'=>'roles','roles'=>'keuangan'], function() {
		// invoice
		Route::get('/company/{id}/invoice/{idProduk}', 'BPController@getInvoice_create');
		Route::post('/invoice_create/{id}/{user_id}', 'BPController@invoice_create');
		Route::post('/uploadKB/{id}', 'BPController@kbiling_upload');
		Route::post('/apprv_buktiB/{id}', 'BPController@apprv_buktiB');
		Route::post('/kode_biling_upload/{idProduk}/{user_id}', 'BPController@kode_biling_upload');
		Route::post('/upload_bpn/{idProduk}', 'BPController@upload_bpn');

		Route::post('/upload_invoiceBBK/{idProduk}', 'BPController@upload_invoiceBBK');
	});

	// route seksi sertifikasi
	Route::group(['middleware'=>'roles','roles' => 'sertifikasi'], function() {
		Route::post('/async_audit_upload', 'LaporanHasilSert@async_audit_upload');
		Route::post('/async_shu_upload', 'LaporanHasilSert@async_shu_upload');

		Route::get('/shu/download/{user_id}/{idProduk}', 'JAController@shuDownload');
		Route::get('/bapc/download/{user_id}/{idProduk}', 'JAController@bapcDownload');
		Route::get('/closed_ncr/download/{user_id}/{idProduk}', 'JAController@closed_ncrDownload');
		Route::get('/audit_plan/download/{user_id}/{idProduk}', 'JAController@apDownload');
		Route::get('/sampling_plan/download/{user_id}/{idProduk}', 'JAController@spDownload');
		Route::get('/dok_jadwal_audit/download/{user_id}', 'JAController@jaDownload');
		// surat pemberitahuan jadwal & tim audit
		Route::get('/company/{id}/audit/{idProduk}', 'JAController@index');
		Route::post('/suratJA_upload/{id}', 'JAController@upload');
		// upload audit plan dan sampling plan
		Route::get('/auditPlan/{id}/audit/{idProduk}', 'JAController@auditPlan');
		Route::post('/auditPlan_upload/{id}', 'JAController@auditPlan_upload');
		// upload shu, bapc, closed ncr
		// Route::get('/laporanSert/{id}/upload/{idProduk}', 'LaporanHasilSert@index');
		Route::post('/laporanSert_upload/{id}', 'LaporanHasilSert@upload');
		Route::post('/lapSert_create/{id}/{user_id}', 'LaporanHasilSert@create');
		// draft sert
		Route::get('/draftSert/{id}/audit/{idProduk}', 'SertController@index'); 
		Route::post('/draftSert_create/{id}/{user_id}', 'SertController@create');
		// cetak sert
		Route::post('/cetak_sert/{id}', 'SertController@cetak_sert');

		Route::post('/konfirmasiSert_dok/{idProduk}/{user_id}', 'SertController@konfirmasiSert_dok');
		Route::post('/kelengDatSert/{idProduk}', 'LaporanHasilSert@kelengDatSert');
	});

	// ketua seksi sertifikasi
	Route::group(['middleware'=>'roles','roles'=>'ketua_sertifikasi'], function() {
		Route::get('/company/{id}/verify_lembarKonSert/{idProduk}', 'SertController@verify_lembarKonSert');
		Route::post('/verify_lembarKonSert/{idProduk}/{user_id}', 'SertController@post_verify_lembarKonSert');
	});

	// route kabid paskal
	Route::group(['middleware'=>'roles','roles'=>'kabidpaskal'], function() {
		Route::get('/company/{id}/apprv_jadwalAudit/{idProduk}', 'JAController@apprv_jadwalAudit');
		Route::post('/apprv_jadwalAudit', 'JAController@apprvPost');
	});

	// route auditor
	Route::group(['middleware'=>'roles','roles'=>'auditor'], function() {
		// laporan audit kecukupan sertifikasi produk
		Route::get('/company/{id}/dokSert/{idProduk}', 'JAController@getDokSert');
		Route::post('/dok_sert_produk', 'JAController@dok_sert_produk');
	});

	// route tim_teknis
	Route::group(['middleware'=>'roles','roles'=>'tim_teknis'], function() {
		// input rekomendasi evaluasi rapat teknis
		Route::get('/company/{id}/rekomendasiRapatTeknis/{idProduk}', 'LaporanHasilSert@getRekomendasi');
		Route::post('/rekomendasiRapatTeknis/{idProduk}/{user_id}', 'LaporanHasilSert@rekomendasi');
	});

	// route ketua tim teknis
	Route::group(['middleware'=>'roles','roles'=>'ketua_tim_teknis'], function() {
		Route::get('/company/{id}/isi_dataLapSert/{idProduk}', 'LaporanHasilSert@isi_dataLapSert');
		Route::post('/isi_dataLapSert/{idProduk}/{user_id}', 'LaporanHasilSert@post_dataLapSert');
		Route::post('/kelengkapan_lapSert/{idProduk}/{user_id}', 'LaporanHasilSert@kelengkapan_lapSert');
	});

	// route komite_timTeknis
	Route::group(['middleware'=>'roles','roles'=>'komite_timTeknis'], function() {
		// input keputusan komite evaluasi teknis
		Route::get('/company/{id}/keputusanTeknis/{idProduk}', 'LaporanHasilSert@getKeputusan');
		Route::post('/keputusanTeknis/{idProduk}/{user_id}', 'LaporanHasilSert@keputusan');
		Route::post('/signedLapSert/{idProduk}/{user_id}', 'LaporanHasilSert@signedLapSert');
	});

	// route subag
	Route::group(['middleware'=>'roles','roles'=>'subag_umum'], function() {
		Route::get('/company/{id}/pengirimanSert/{idProduk}', 'SertController@pengirimanSert');
		Route::post('/upload_resi/{idProduk}/{user_id}', 'SertController@upload_resi');
	});

	// super admin
	Route::group(['middleware'=>'roles','roles'=>'super_admin'], function() {
		Route::prefix('bc_admin/super')->group(function() {

			// dashboard
			Route::get('/dashboard', 'SuperAdmin\HomeAdminController@index')->name('dashboard_superAdmin');

			// pengaturan
			Route::get('/pengaturan/format_dok', 'SuperAdmin\HomeAdminController@format_file')->name('format_dok');
			Route::post('/format_file_ubah/{id?}', 'SuperAdmin\HomeAdminController@format_file_ubah')->name('format_file_ubah');
			Route::post('/format_file_hapus/{id}', 'SuperAdmin\HomeAdminController@format_file_hapus')->name('format_file_hapus');
			Route::get('/pengaturan/manual_user', 'SuperAdmin\HomeAdminController@manual')->name('manual_book');
			Route::post('/manual_user/{id}', 'SuperAdmin\HomeAdminController@manual_edit')->name('ubah_manual');

			// serifikasi
			Route::get('/cert_list', 'SuperAdmin\CertController@index')->name('sertifikasi_produk');
			Route::get('/cert_list/{company_id}', 'SuperAdmin\CertController@detail_produk')->name('detail_produk');

			// pengaturan akun
			Route::get('/pengaturan_akun', 'SuperAdmin\HomeAdminController@pengaturan_akun')->name('pengaturan_akun');

		});
	});

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');
