<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
  
// Route::post('login', 'UsersApiController@login');
// Route::post('register', 'UsersApiController@register');
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details', 'UsersApiController@details')->middleware('verified');
// }); // will work only when user has verified the email

Route::get('email/verify/{id}', 'VerificationApiController@verify')->name('verificationapi.verify');
Route::get('email/resend', 'VerificationApiController@resend')->name('verificationapi.resend');

// Route::get('/applySa','APIController@getSA');
// Route::post('/applySa','APIController@verifSA');

Route::post('login', 'APIController@login');
Route::post('register', 'APIController@register');

Route::group(['middleware' => ['auth.jwt']], function () {
    Route::post('logout', 'APIController@logout');
    Route::post('changepassword', 'APIController@changepassword');
    Route::post('user', 'APIController@getAuthUser');
    Route::post('updateProfile', 'APIController@updateProfile');


    // Route::get('/applySa','APIController@getSA');
    // Route::post('/applySa','APIController@verifSA');

    Route::post('notif', 'APIController@notif');

    Route::post('pesan', 'APIController@pesan');
    Route::post('pesan/detail', 'APIController@pesan_detail');
    Route::post('pesan/send', 'APIController@pesanSend');


    Route::post('pesan/load', 'APIController@pesan_load');
    Route::post('pesan/load/all', 'APIController@pesan_load_all');

    Route::post('perusahaan', 'APIController@perusahaan');
    Route::post('produk', 'APIController@produk');
    Route::post('produk/monitoring', 'APIController@produk_monitoring');


    Route::post('produk/detail', 'APIController@produk_detail');
    Route::post('produk/notifproduk', 'APIController@notifproduk');
});
