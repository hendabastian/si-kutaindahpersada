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
    return view('welcome', [
        'title' => 'Home | ' . env('APP_NAME')
    ]);
});

Auth::routes();

Route::name('info-pembangunan-rumah.')->prefix('info-pembangunan-rumah')->middleware('auth')->group(function() {
    Route::get('index', 'InformasiPembangunanRumahController@index')->name('index');
    Route::get('detail/{id}', 'InformasiPembangunanRumahController@detail')->name('detail');
    Route::get('create', 'InformasiPembangunanRumahController@create')->name('create');
    Route::post('create', 'InformasiPembangunanRumahController@create')->name('save');
    Route::match(['get', 'put'], 'edit/{id}', 'InformasiPembangunanRumahController@edit')->name('edit');
    Route::delete('delete/{id}', 'InformasiPembangunanRumahController@delete')->name('delete');
});

Route::name('brosur.')->prefix('brosur')->middleware('auth')->group(function() {
    Route::get('index', 'BrosurController@index')->name('index');
    Route::get('detail/{id}', 'BrosurController@detail')->name('detail');
    Route::get('create', 'BrosurController@create')->name('create');
    Route::post('create', 'BrosurController@create')->name('save');
    Route::match(['get', 'put'], 'edit/{id}', 'BrosurController@edit')->name('edit');
    Route::delete('delete/{id}', 'BrosurController@delete')->name('delete');
});
Route::get('/home', 'HomeController@index')->name('home');
