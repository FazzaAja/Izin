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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// Murid Access
Route::middleware(['auth:murid'])->group(function() {

    Route::get('/profile', 'App\Http\Controllers\HomeController@profile')->name('profile');
    Route::get('/profile/{izin}', 'App\Http\Controllers\HomeController@detail')->name('detail');   
    Route::put('/profile/{izin}', 'App\Http\Controllers\HomeController@foto')->name('foto');   

});

// Piket Access
Route::middleware(['auth:piket'])->group(function () {
    // Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\AuthController@dash')->name('dash');
    
    // Murid Route
    Route::get('/murid', 'App\Http\Controllers\PiketMuridController@index')->name('murid.index');
    Route::get('/murid/tambah-murid', 'App\Http\Controllers\PiketMuridController@create')->name('murid.create');
    Route::post('/murid/', 'App\Http\Controllers\PiketMuridController@store')->name('murid.store');
    Route::get('/murid/{murid}', 'App\Http\Controllers\PiketMuridController@show')->name('murid.show');
    Route::get('/murid/{murid}/ubah-murid', 'App\Http\Controllers\PiketMuridController@edit')->name('murid.edit');
    Route::put('/murid/{murid}', 'App\Http\Controllers\PiketMuridController@update')->name('murid.update');
    Route::delete('/murid/{murid}', 'App\Http\Controllers\PiketMuridController@destroy')->name('murid.destroy');
    Route::delete('/murid', 'App\Http\Controllers\PiketMuridController@deleteAll')->name('murid.deleteall');
    
    Route::get('/export-murid', 'App\Http\Controllers\PiketMuridController@export')->name('murid.export');
    Route::post('/import-murid/', 'App\Http\Controllers\PiketMuridController@import')->name('murid.import');
    
    // Jurusan Route
    Route::post('/jurusan/', 'App\Http\Controllers\PiketJurusanController@store')->name('jurusan.store');
    Route::put('/jurusan/{jurusan}', 'App\Http\Controllers\PiketJurusanController@update')->name('jurusan.update');
    Route::delete('/jurusan/{jurusan}', 'App\Http\Controllers\PiketJurusanController@destroy')->name('jurusan.destroy');
    
    // Piket Route
    Route::get('/piket', 'App\Http\Controllers\PiketController@index')->name('piket.index');
    Route::post('/piket/', 'App\Http\Controllers\PiketController@store')->name('piket.store');
    Route::delete('/piket/{piket}', 'App\Http\Controllers\PiketController@destroy')->name('piket.destroy');
    
    // Izin Route
    Route::get('/izin', 'App\Http\Controllers\PiketIzinController@index')->name('izin.index');
    Route::get('/tambah-izin', 'App\Http\Controllers\PiketIzinController@create')->name('izin.create');
    Route::post('/izin/', 'App\Http\Controllers\PiketIzinController@store')->name('izin.store');
    Route::get('/izin/{izin}', 'App\Http\Controllers\PiketIzinController@show')->name('izin.show');
    Route::get('/izin/{izin}', 'App\Http\Controllers\PiketIzinController@show')->name('izin.show');
    Route::put('/izin/{izin}', 'App\Http\Controllers\PiketIzinController@update')->name('izin.update');
    Route::delete('/izin/{izin}', 'App\Http\Controllers\PiketIzinController@destroy')->name('izin.destroy');
});



// Authentication
Route::get('/login', 'App\Http\Controllers\AuthController@index')->name('login')->middleware('guest');
Route::post('/login-piket/', 'App\Http\Controllers\AuthController@loginPiket')->name('login.piket');
Route::post('/login-murid/', 'App\Http\Controllers\AuthController@loginMurid')->name('login.murid');
Route::post('/logout/', 'App\Http\Controllers\AuthController@logout')->name('logout');

// Public View
Route::get('/{izin}', 'App\Http\Controllers\HomeController@show')->name('show');

