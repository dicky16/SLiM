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

Route::group(['middleware' => ['cekAdmin']], function () {
  Route::prefix('staf')->group(function () {
    Route::get('/', 'Staf\StafController@index')->name('staf');
    Route::get('add', 'Staf\StafController@getAddUSer');
    Route::post('add', 'Staf\StafController@addUser');
    Route::get('siswa', 'Staf\StafController@getAturSiswa');
    Route::get('guru', 'Staf\StafController@getAturGuru');
    Route::get('admin', 'Staf\StafController@getAturAdmin');
    Route::get('pelajaran', 'Staf\StafController@pelajaran');
    Route::get('delete/{id}', 'Staf\StafController@destroy');
    Route::get('update/{id}', 'Staf\StafController@update');
    Route::post('update', 'Staf\StafController@postUpdate');
    //set sesi status
    Route::post('setstatus', 'Staf\StafController@setStatus');
    Route::post('destroystatus', 'Staf\StafController@destroyStatus');

    Route::get('set-ac', 'Staf\StafController@setAc');
    Route::get('del-ac', 'Staf\StafController@delAc');
    Route::get('set-ld', 'Staf\StafController@setLD');
    Route::get('del-ld', 'Staf\StafController@delLD');
    Route::get('set-lt', 'Staf\StafController@setLT');
    Route::get('del-lt', 'Staf\StafController@delLT');
    Route::get('set-lb', 'Staf\StafController@setLB');
    Route::get('del-lb', 'Staf\StafController@delLB');
  });
});

Route::prefix('siswa')->group(function () {
  Route::get('/', 'Siswa\SiswaController@index');
  Route::get('absensi', 'Siswa\SiswaController@absensi');
});

// Route::get('tesdb', 'Staf\StafController@tesdb');
Route::get('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@cekLogin');

Route::get('/{any}', function () {
    return view('welcome');
});
