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
    return view('welcome');
});


Route::resource('/izin', 'App\Http\Controllers\PiketIzinController');

Route::get('/murid', 'App\Http\Controllers\PiketMuridController@index')->name('murid.index');
Route::get('/murid/tambah-murid', 'App\Http\Controllers\PiketMuridController@create')->name('murid.create');
Route::post('/murid/', 'App\Http\Controllers\PiketMuridController@store')->name('murid.store');
Route::get('/murid/{murid}', 'App\Http\Controllers\PiketMuridController@show')->name('murid.show');
Route::get('/murid/{murid}/ubah-murid', 'App\Http\Controllers\PiketMuridController@edit')->name('murid.edit');
Route::put('/murid/{murid}', 'App\Http\Controllers\PiketMuridController@update')->name('murid.update');
Route::delete('/murid/{murid}', 'App\Http\Controllers\PiketMuridController@destroy')->name('murid.destroy');
Route::delete('/murid/{murid}', 'App\Http\Controllers\PiketMuridController@destroy')->name('murid.destroy');
Route::delete('/murid', 'App\Http\Controllers\PiketMuridController@deleteAll')->name('murid.deleteall');

Route::get('/export-murid', 'App\Http\Controllers\PiketMuridController@export')->name('murid.export');
Route::post('/import-murid/', 'App\Http\Controllers\PiketMuridController@import')->name('murid.import');

Route::post('/jurusan/', 'App\Http\Controllers\PiketJurusanController@store')->name('jurusan.store');
Route::put('/jurusan/{jurusan}', 'App\Http\Controllers\PiketJurusanController@update')->name('jurusan.update');
Route::delete('/jurusan/{jurusan}', 'App\Http\Controllers\PiketJurusanController@destroy')->name('jurusan.destroy');