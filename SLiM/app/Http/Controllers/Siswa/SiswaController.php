<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;

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
}
