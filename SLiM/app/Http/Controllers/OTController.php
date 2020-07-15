<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OTController extends Controller
{
    public function index()
    {
      $sesi = session('ortu');
      if($sesi == null) {
        return redirect('login');
      }
      $dataAbsen = DB::table('absen_siswa')
      ->where('user_id', $sesi)
      ->get();
      return view('ot/index', ['dataAbsen' => $dataAbsen]);
    }

    public function logout()
    {
      session()->forget('ortu');
      return redirect('login');
    }
}
