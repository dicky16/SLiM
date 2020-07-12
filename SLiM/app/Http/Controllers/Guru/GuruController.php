<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class GuruController
{
    public function index()
    {
      return view('guru/index');
    }

    public function absensi()
    {
      $this->timeZone('Asia/Jakarta');
      $user_id = Auth::user()->id;
      $date = date("Y-m-d");
      $cekAbsen = DB::table('absen_guru')->where([
        'user_id' => $user_id,
        'date' => $date
      ])->get()->first();

      if(!$cekAbsen) {
        $info = array(
          "status" => "",
          "btnIn" => "",
          "btnOut" => "disabled"
        );
      } else if($cekAbsen->time_out == NULL) {
        $info = array(
                "status" => "Jangan lupa absen keluar",
                "btnIn" => "disabled",
                "btnOut" => "");
      } else {
        $info = array(
                "status" => "Absensi hari ini telah selesai!",
                "btnIn" => "disabled",
                "btnOut" => "disabled");
      }

      $dataAbsen = DB::table('absen_guru')
      ->where('user_id', $user_id)
      ->orderBy('time_out', 'desc')
      ->paginate(20);

      return view('guru/absensi', compact('dataAbsen', 'info'));
    }

    public function postAbsen(Request $request)
    {
      $this->timeZone('Asia/Jakarta');
      $user_id = Auth::user()->id;
      $date = date("Y-m-d"); // 2020-02-01
      $time = date("H:i:s"); // 12:31:20
      $note = $request->note;
      //absen masuk
      if(isset($request->btnIn)) {
        $cekDouble = DB::table('absen_guru')
        ->where(['date' => $date, 'user_id' => $user_id])->count();
        // dd($cekDouble);
        if($cekDouble > 0) {
          return redirect()->back();
        }

        DB::table('absen_guru')->insert([
          'user_id' => $user_id,
          'date' => $date,
          'time_in' => $time
        ]);
        return redirect()->back();
      } else if(isset($request->btnOut)) {
        DB::table('absen_guru')->update([
          'time_out' => $time,
        ]);
        return redirect()->back();
      }
      return $request->all();
    }

    function timeZone($location)
    {
      return date_default_timezone_set($location);
    }

    public function kelas()
    {
      return view('guru/kelas');
    }

    public function tugas()
    {
      return view('guru/tugas');
    }

    public function jadwal()
    {
      return view('guru/jadwal');
    }

    public function detalKelas()
    {
      return view('guru/kelasDetail');
    }
}
