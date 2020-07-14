<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class SiswaController
{
    public function index()
    {
      return view('siswa/index');
    }

    public function absensi()
    {
      $this->timeZone('Asia/Jakarta');
      $user_id = Auth::user()->id;
      $date = date("Y-m-d");
      $cekAbsen = DB::table('absen_siswa')->where([
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

      $dataAbsen = DB::table('absen_siswa')
      ->where('user_id', $user_id)
      ->orderBy('time_out', 'desc')
      ->paginate(20);

      return view('siswa/absensi', compact('dataAbsen', 'info'));
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
        $cekDouble = DB::table('absen_siswa')
        ->where(['date' => $date, 'user_id' => $user_id])->count();
        // dd($cekDouble);
        if($cekDouble > 0) {
          return redirect()->back();
        }

        DB::table('absen_siswa')->insert([
          'user_id' => $user_id,
          'date' => $date,
          'time_in' => $time
        ]);
        return redirect()->back();
      } else if(isset($request->btnOut)) {
        DB::table('absen_siswa')->update([
          'time_out' => $time,
        ]);
        return redirect()->back();
      }
      return $request->all();
    }

    public function jadwal()
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->where('jadwal.id_kelas', $this->getId())
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
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'jadwal.id')
      ->where('jadwal.id_kelas', $this->getId())
      ->get();
      // dd($data);

      return view('siswa/kelas', ['data' => $data]);
    }

    public function calender()
    {
      return view('calender');
    }

    public function detailKelas($id)
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->where('jadwal.id', $id)
      ->get();
      // dd($data);
      return view('siswa/detailKelas', ['data' => $data]);
    }

    public function detailMateri($id)
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->where('jadwal.id', $id)
      ->get();
      // dd($data);
      return view('siswa/detailKelasMateri', ['data' => $data]);
    }

    public function detailTugas($id)
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->where('jadwal.id', $id)
      ->get();
      // dd($data);
      return view('siswa/detailKelasTugas', ['data' => $data]);
    }

    public function profil()
    {
      return view('siswa/profil');
    }

    function getId()
    {
      $id = DB::table('users')->select('id_kelas')->where('id', Auth::user()->id)->value('id');
      // dd($id);
      return $id;
    }

    function timeZone($location)
    {
      return date_default_timezone_set($location);
    }
}
