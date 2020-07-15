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
    Route::get('add-mapel', 'Staf\StafController@mapel');
    Route::post('add-mapel', 'Staf\StafController@postMapel');
    Route::get('siswa', 'Staf\StafController@getAturSiswa');
    Route::get('siswa-tambah', 'Staf\StafController@tambahSiswa');
    Route::post('siswa-tambah', 'Staf\StafController@postTambahSiswa');
    Route::get('guru', 'Staf\StafController@getAturGuru');
    Route::get('profil', 'Staf\StafController@profil');
    Route::get('admin', 'Staf\StafController@getAturAdmin');
    Route::get('pelajaran', 'Staf\StafController@pelajaran');
    Route::get('delete/{id}', 'Staf\StafController@destroy');
    Route::get('update/{id}', 'Staf\StafController@update');
    Route::post('update', 'Staf\StafController@postUpdate');
    Route::get('calender', 'Staf\StafController@calender');
    //search
    Route::get('cari-siswa', 'Staf\StafController@getSiswa');
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

Route::group(['middleware' => ['cekSiswa']], function () {
  Route::prefix('siswa')->group(function () {
    Route::get('/', 'Siswa\SiswaController@index');
    Route::get('absensi', 'Siswa\SiswaController@absensi');
    Route::post('absensi', 'Siswa\SiswaController@postAbsen');
    Route::get('jadwal', 'Siswa\SiswaController@jadwal');
    Route::get('tugas', 'Siswa\SiswaController@tugas');
    Route::get('kelas', 'Siswa\SiswaController@kelas');
    Route::get('tambah-ortu', 'Siswa\SiswaController@ortu');
    Route::post('tambah-ortu', 'Siswa\SiswaController@postOrtu');
    Route::get('profil', 'Siswa\SiswaController@profil');
    Route::get('kumpul-tugas/{id}', 'Siswa\SiswaController@kumpulTugas');
    Route::post('kumpul-tugas', 'Siswa\SiswaController@postKumpulTugas');
    // Route::get('kelas-detail/{id}', 'Siswa\SiswaController@detailKelas');
    Route::get('kelas-detail/{id}/materi/{id_mapel}', 'Siswa\SiswaController@detailMateri');
    Route::get('kelas-detail/{id}/tugas/{id_mapel}', 'Siswa\SiswaController@detailTugas');
    Route::get('calender', 'Siswa\SiswaController@calender');
  });
});

Route::group(['middleware' => ['cekGuru']], function () {
  Route::prefix('guru')->group(function () {
    Route::get('/', 'Guru\GuruController@index');
    Route::get('absensi', 'Guru\GuruController@absensi');
    Route::post('absensi', 'Guru\GuruController@postAbsen');
    Route::get('jadwal', 'Guru\GuruController@jadwal');
    Route::get('profil', 'Guru\GuruController@profil');
    Route::get('tugas', 'Guru\GuruController@tugas');
    Route::get('kelas', 'Guru\GuruController@kelas');
    // Route::get('kelas-detail/{id}', 'Guru\GuruController@detailKelas');
    Route::get('kelas-detail/{id}/materi/{id_mapel}', 'Guru\GuruController@detailMateri');
    Route::get('kelas-detail/{id}/tugas/{id_mapel}', 'Guru\GuruController@detailTugas');
    Route::get('kelas-detail/{id}/tugas-tambah', 'Guru\GuruController@tambahTugas');
    Route::get('kelas-detail/{id}/materi-tambah', 'Guru\GuruController@tambahMateri');
    Route::post('tugas-tambah', 'Guru\GuruController@postTambahTugas');
    Route::post('materi-tambah', 'Guru\GuruController@postTambahMateri');
    Route::get('calender', 'Guru\GuruController@calender');
  });
});

// Route::group(['middleware' => ['cekGuru']], function () {
  Route::prefix('ot')->group(function () {
    Route::get('/', 'OTController@index');
    Route::get('logout', 'OTController@logout');
  });
// });

// Route::get('tesdb', 'Staf\StafController@tesdb');
Route::get('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@cekLogin');

Route::get('calender', 'LoginController@calender');

Route::get('tes', 'LoginController@tes');

Route::get('/{any}', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});
