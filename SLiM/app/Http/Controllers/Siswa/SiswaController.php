<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController
{
    public function index()
    {
      return view('siswa/index');
    }

    public function absensi()
    {
      return view('siswa/absensi');
    }

    public function jadwal()
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->get();
      // dd($data);
      return view('siswa/jadwal', ['data' => $data]);
    }

    public function tugas()
    {
      return view('siswa/tugas');
    }

    public function kelas()
    {
      return view('siswa/kelas');
    }

    public function calender()
    {
      return view('calender');
    }

    public function detailKelas()
    {
      return view('siswa/detailKelas');
    }
}
