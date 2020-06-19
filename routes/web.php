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
    Route::get('view', 'InformasiPembangunanRumahController@create')->name('view');
    Route::get('create', 'InformasiPembangunanRumahController@create')->name('create');
    Route::post('save', 'InformasiPembangunanRumahController@save')->name('save');
    Route::get('edit', 'InformasiPembangunanRumahController@create')->name('edit');
    Route::get('delete', 'InformasiPembangunanRumahController@create')->name('delete');
});

Route::get('/home', 'HomeController@index')->name('home');
