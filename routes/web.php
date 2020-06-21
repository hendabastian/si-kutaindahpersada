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
Route::name('info-pembangunan-rumah.')->prefix('info-pembangunan-rumah')->group(function() {
    Route::get('index', 'InformasiPembangunanRumahController@index')->name('index');
    Route::get('view', 'InformasiPembangunanRumahController@view')->name('view');
    Route::get('create', 'InformasiPembangunanRumahController@create')->name('create');
    Route::post('create', 'InformasiPembangunanRumahController@create')->name('save');
    Route::get('edit/{id}', 'InformasiPembangunanRumahController@edit')->name('edit');
    Route::delete('delete', 'InformasiPembangunanRumahController@delete')->name('delete');
});

Route::get('/home', 'HomeController@index')->name('home');
