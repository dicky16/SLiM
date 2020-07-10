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

// Route::get('siswa', 'UserController@index');
Route::prefix('staf')->group(function () {
  Route::get('/', 'Staf\StafController@index');
  Route::get('add', 'Staf\StafController@getAddUSer');
  Route::post('add', 'Staf\StafController@addUser');
  Route::get('siswa', 'Staf\StafController@getAturSiswa');
  Route::get('guru', 'Staf\StafController@getAturGuru');
  Route::get('admin', 'Staf\StafController@getAturAdmin');
  //set sesi status
  Route::post('setstatus', 'Staf\StafController@setStatus');
  Route::post('destroystatus', 'Staf\StafController@destroyStatus');
});

// Route::get('tesdb', 'Staf\StafController@tesdb');
Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@cekLogin');

Route::get('/{any}', function () {
    return view('welcome');
});
