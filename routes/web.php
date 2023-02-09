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


Route::resource('/piket/izin', 'App\Http\Controllers\PiketIzinController');

Route::get('/piket/murid', 'App\Http\Controllers\PiketMuridController@index')->name('murid.index');
Route::get('/piket/murid/tambah-murid', 'App\Http\Controllers\PiketMuridController@create')->name('murid.create');
Route::post('/piket/murid/', 'App\Http\Controllers\PiketMuridController@store')->name('murid.store');
Route::get('/piket/murid/{murid}', 'App\Http\Controllers\PiketMuridController@show')->name('murid.show');

Route::get('/piket/export-murid', 'App\Http\Controllers\PiketMuridController@export')->name('murid.export');
Route::post('/piket/import-murid/', 'App\Http\Controllers\PiketMuridController@import')->name('murid.import');

