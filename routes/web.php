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
Route::name('admin.')->prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    Route::name('info-pembangunan-rumah.')->prefix('info-pembangunan-rumah')->group(function () {
        Route::get('index', 'Admin\InformasiPembangunanRumahController@index')->name('index');
        Route::get('detail/{id}', 'Admin\InformasiPembangunanRumahController@detail')->name('detail');
        Route::get('create', 'Admin\InformasiPembangunanRumahController@create')->name('create');
        Route::post('create', 'Admin\InformasiPembangunanRumahController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Admin\InformasiPembangunanRumahController@edit')->name('edit');
        Route::delete('delete/{id}', 'Admin\InformasiPembangunanRumahController@delete')->name('delete');
    });

    Route::name('brosur.')->prefix('brosur')->group(function () {
        Route::get('index', 'Admin\BrosurController@index')->name('index');
        Route::get('detail/{id}', 'Admin\BrosurController@detail')->name('detail');
        Route::get('create', 'Admin\BrosurController@create')->name('create');
        Route::post('create', 'Admin\BrosurController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Admin\BrosurController@edit')->name('edit');
        Route::delete('delete/{id}', 'Admin\BrosurController@delete')->name('delete');
    });

    Route::name('pemesanan.')->prefix('pemesanan')->group(function () {
        Route::get('index', 'Admin\PemesananController@index')->name('index');
        Route::get('detail/{id}', 'Admin\PemesananController@detail')->name('detail');
        Route::match(['get', 'post'], 'create', 'Admin\PemesananController@create')->name('create');
        Route::match(['get', 'put'], 'edit/{id}', 'Admin\PemesananController@edit')->name('edit');
        Route::delete('delete/{id}', 'Admin\PemesananController@delete')->name('delete');
        Route::post('proses/{id}', 'Admin\PemesananController@proses')->name('proses');
    });

    Route::name('pemeriksaan-lokasi.')->prefix('pemeriksaan-lokasi')->group(function () {
        Route::get('index', 'Admin\PemeriksaanLokasiController@index')->name('index');
        Route::get('detail/{id}', 'Admin\PemeriksaanLokasiController@detail')->name('detail');
        Route::match(['get, put'], 'edit/{id}', 'Admin\PemeriksaanLokasiController@edit')->name('edit');
        Route::delete('delete/{id}', 'Admin\PemeriksaanLokasiController@delete')->name('delete');
    });

    Route::name('surat-perintah-kerja.')->prefix('surat-perintah-kerja')->group(function () {
        Route::get('index', function () {
            return 'test';
        })->name('index');
    });

    Route::name('jadwal-pembuatan.')->prefix('jadwal-pembuatan')->group(function() {
        Route::get('index', function() {
            return 'test';
        })->name('index');
    });

});


// Route Konsumen
Route::name('konsumen.')->prefix('konsumen')->middleware(['auth', 'role:5'])->group(function () {
    Route::name('info-pembangunan-rumah.')->prefix('info-pembangunan-rumah')->group(function () {
        Route::get('index', 'Konsumen\InformasiPembangunanRumahController@index')->name('index');
        Route::get('detail/{id}', 'Konsumen\InformasiPembangunanRumahController@detail')->name('detail');
        Route::get('create', 'Konsumen\InformasiPembangunanRumahController@create')->name('create');
        Route::post('create', 'Konsumen\InformasiPembangunanRumahController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Konsumen\InformasiPembangunanRumahController@edit')->name('edit');
        Route::delete('delete/{id}', 'Konsumen\InformasiPembangunanRumahController@delete')->name('delete');
    });

    Route::name('brosur.')->prefix('brosur')->group(function () {
        Route::get('index', 'Konsumen\BrosurController@index')->name('index');
        Route::get('detail/{id}', 'Konsumen\BrosurController@detail')->name('detail');
        Route::get('create', 'Konsumen\BrosurController@create')->name('create');
        Route::post('create', 'Konsumen\BrosurController@create')->name('save');
        Route::match(['get', 'put'], 'edit/{id}', 'Konsumen\BrosurController@edit')->name('edit');
        Route::delete('delete/{id}', 'Konsumen\BrosurController@delete')->name('delete');
    });

    Route::name('pemesanan.')->prefix('pemesanan')->group(function () {
        Route::get('index', 'Konsumen\PemesananController@index')->name('index');
        Route::get('detail/{id}', 'Konsumen\PemesananController@detail')->name('detail');
        Route::match(['get', 'post'], 'create', 'Konsumen\PemesananController@create')->name('create');
        Route::match(['get', 'put'], 'edit/{id}', 'Konsumen\PemesananController@edit')->name('edit');
        Route::delete('delete/{id}', 'Konsumen\PemesananController@delete')->name('delete');
    });

    Route::name('pemeriksaan-lokasi.')->prefix('pemeriksaan-lokasi')->group(function () {
        Route::get('index', function () {
            return 'test';
        })->name('index');
    });


    Route::name('surat-perintah-kerja.')->prefix('surat-perintah-kerja')->group(function () {
        Route::get('index', function () {
            return 'test';
        })->name('index');
    });

    Route::name('jadwal-pembuatan.')->prefix('jadwal-pembuatan')->group(function() {
        Route::get('index', function() {
            return 'test';
        })->name('index');
    });
});

// Route Pelaksana
Route::name('pelaksana.')->prefix('pelaksana')->middleware(['auth', 'role:3'])->group(function() {
    Route::name('pemeriksaan-lokasi.')->prefix('pemeriksaan-lokasi')->group(function() {
        Route::get('index', 'Pelaksana\PemeriksaanLokasiController@index')->name('index');
        Route::get('detail/{id}', 'Pelaksana\PemeriksaanLokasiController@detail')->name('detail');
        Route::post('proses-lokasi/{id}', 'Pelaksana\PemeriksaanLokasiController@prosesLokasi')->name('proses-lokasi');
    });

    Route::name('rab.')->prefix('rab')->group(function () {
        Route::get('index', 'Pelaksana\RABController@index')->name('index');
        Route::get('detail/{id}', 'Pelaksana\RABController@detail')->name('detail');
        Route::get('create/{pemesanan_id}', 'Pelaksana\RABController@create')->name('create');
        Route::post('save-barang/{rab_id}', 'Pelaksana\RABController@saveBarang')->name('save-barang');
        Route::post('save-rab/{rab_id}', 'Pelaksana\RABController@saveRAB')->name('save-rab');
    });
});

// Route Drafter
Route::name('drafter.')->prefix('drafter')->middleware(['auth', 'role:2'])->group(function() {
    Route::name('rancangan-rumah.')->prefix('rancangan-rumah')->group(function () {
        Route::get('index', 'Drafter\RancanganRumahController@index')->name('index');
        Route::get('detail/{id}', 'Drafter\RancanganRumahController@detail')->name('detail');
        Route::post('upload-rancangan/{id}', 'Drafter\RancanganRumahController@uploadRancangan')->name('upload-rancangan');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
