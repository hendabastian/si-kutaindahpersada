<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $brosur = App\Brosur::all();
    $infoPembangunan = App\InfoPembangunan::all();
    return view('welcome', [
        'brosur' => $brosur,
        'infoPembangunan' => $infoPembangunan,
        'title' => 'Home | ' . env('APP_NAME')
    ]);
});

Auth::routes();

// Route Admin
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::name('info-pembangunan-rumah.')->prefix('info-pembangunan-rumah')->group(function () {
        Route::get('index', 'Admin\InformasiPembangunanRumahController@index')->name('index');
        Route::get('detail/{id}', 'Admin\InformasiPembangunanRumahController@detail')->name('detail');
        Route::get('create', 'Admin\InformasiPembangunanRumahController@create')->name('create');
        Route::post('create', 'Admin\InformasiPembangunanRumahController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Admin\InformasiPembangunanRumahController@edit')->name('edit');
        Route::delete('delete/{id}', 'Admin\InformasiPembangunanRumahController@delete')->name('delete');
    });

    Route::name('brosur.')->prefix('brosur')->middleware('auth')->group(function () {
        Route::get('index', 'Admin\BrosurController@index')->name('index');
        Route::get('detail/{id}', 'Admin\BrosurController@detail')->name('detail');
        Route::get('create', 'Admin\BrosurController@create')->name('create');
        Route::post('create', 'Admin\BrosurController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Admin\BrosurController@edit')->name('edit');
        Route::delete('delete/{id}', 'Admin\BrosurController@delete')->name('delete');
    });

    Route::name('pemesanan.')->prefix('pemesanan')->middleware('auth')->group(function () {
        Route::get('index', 'Admin\PemesananController@index')->name('index');
        Route::get('detail/{id}', 'Admin\PemesananController@detail')->name('detail');
        Route::match(['get', 'post'], 'create', 'Admin\PemesananController@create')->name('create');
        Route::match(['get', 'put'], 'edit/{id}', 'Admin\PemesananController@edit')->name('edit');
        Route::delete('delete/{id}', 'Admin\PemesananController@delete')->name('delete');
    });
});


// Route Konsumen
Route::name('konsumen.')->prefix('konsumen')->middleware('auth')->group(function () {
    Route::name('info-pembangunan-rumah.')->prefix('info-pembangunan-rumah')->group(function () {
        Route::get('index', 'Konsumen\InformasiPembangunanRumahController@index')->name('index');
        Route::get('detail/{id}', 'Konsumen\InformasiPembangunanRumahController@detail')->name('detail');
        Route::get('create', 'Konsumen\InformasiPembangunanRumahController@create')->name('create');
        Route::post('create', 'Konsumen\InformasiPembangunanRumahController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Konsumen\InformasiPembangunanRumahController@edit')->name('edit');
        Route::delete('delete/{id}', 'Konsumen\InformasiPembangunanRumahController@delete')->name('delete');
    });

    Route::name('brosur.')->prefix('brosur')->middleware('auth')->group(function () {
        Route::get('index', 'Konsumen\BrosurController@index')->name('index');
        Route::get('detail/{id}', 'Konsumen\BrosurController@detail')->name('detail');
        Route::get('create', 'Konsumen\BrosurController@create')->name('create');
        Route::post('create', 'Konsumen\BrosurController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Konsumen\BrosurController@edit')->name('edit');
        Route::delete('delete/{id}', 'Konsumen\BrosurController@delete')->name('delete');
    });

    Route::name('pemesanan.')->prefix('pemesanan')->middleware('auth')->group(function () {
        Route::get('index', 'Konsumen\PemesananController@index')->name('index');
        Route::get('detail/{id}', 'Konsumen\PemesananController@detail')->name('detail');
        Route::match(['get', 'post'], 'create', 'Konsumen\PemesananController@create')->name('create');
        Route::match(['get', 'put'], 'edit/{id}', 'Konsumen\PemesananController@edit')->name('edit');
        Route::delete('delete/{id}', 'Konsumen\PemesananController@delete')->name('delete');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
