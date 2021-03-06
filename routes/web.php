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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');  

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {    
    Route::resource('foto', 'FotoController');
    Route::resource('merk', 'MerkController');
    Route::resource('tipe', 'TipeController');
    Route::resource('lokasi', 'LokasiController');
    Route::resource('berita', 'BeritaController');
    Route::resource('mobil', 'MobilController');
    });
Auth::routes();
