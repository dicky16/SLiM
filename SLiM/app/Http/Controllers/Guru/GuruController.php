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
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.id','jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'mapel.id as id_mapel')
      ->where('id_guru', Auth::user()->id)
      ->get();
      // dd($data);

      return view('guru/kelas', ['data' => $data]);
    }

    public function tugas()
    {
      return view('guru/tugas');
    }

    public function jadwal()
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->where('id_guru', Auth::user()->id)
      ->get();
      // dd($data);
      return view('guru/jadwal', ['data' => $data]);
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
      return view('guru/kelasDetail', ['data' => $data]);
    }

    public function detailMateri($id, $id_mapel)
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'jadwal.id', 'mapel.id as id_mapel')
      ->where('jadwal.id', $id)
      ->get();

      $materi = DB::table('materi')
      ->where('id_mata_pelajaran', $id_mapel)
      ->get();

      // dd($materi[0]->id_mata_pelajaran);

      return view('guru/kelasDetailMateri', ['data' => $data, 'materi' => $materi]);
    }

    public function detailTugas($id, $id_mapel)
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.id', 'jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'mapel.id as id_mapel')
      ->where('jadwal.id', $id)
      ->get();
      // dd($data);
      $tugas = DB::table('tugas')
      ->join('tabel_mata_pelajaran as mapel', 'tugas.id_mata_pelajaran', '=', 'mapel.id')
      ->select('tugas.*', 'mapel.mata_pelajaran')
      ->where('id_mata_pelajaran', $id_mapel)
      ->get();
      // dd($tugas);
      return view('guru/kelasDetailTugas', ['data' => $data, 'tugas' => $tugas] );
    }

    public function tambahTugas($id)
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'kelas.id as id_kelas', 'mapel.id as id_mapel')
      ->where('jadwal.id', $id)
      ->get();
      // dd($data[0]);
      return view('guru/tambahTugas', ['data' => $data]);
    }

    public function tambahMateri($id)
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'kelas.id as id_kelas', 'mapel.id as id_mapel')
      ->where('jadwal.id', $id)
      ->get();

      // dd($data[0]);
      return view('guru/tambahMateri', ['data' => $data]);
    }

    public function postTambahMateri(Request $request)
    {
      $this->timeZone('Asia/Jakarta');

      $file = $request->file('fileUp');

      $nama_guru = Auth::user()->name;
      $judul_tugas = $request->nama;
      $deskripsi = $request->deskripsi;
      $file_path = $this->uploadFile($file, './assets/user/materi', 'materi');
      $deadline = $request->deadline;
      // dd($deadline);
      $id_kelas = $request->id_kelas;
      $id_mata_pelajaran = $request->id_mapel;
      $tanggal_buat = date('d:m:y H:m:i');

      $data = DB::table('materi')->insert([
        'nama_guru' => $nama_guru,
        'judul_materi' => $judul_tugas,
        'file_path' => $file_path,
        'id_kelas' => $id_kelas,
        'id_mata_pelajaran' => $id_mata_pelajaran,
      ]);
      if($data) {
        session()->flash('status', 'success upload tugas!');
        return redirect()->back();
      } else {
        session()->flash('status', 'gagal upload tugas!');
        return redirect()->back();
      }
    }

    public function profil()
    {
      return view('guru/profil');
    }

    public function postTambahTugas(Request $request)
    {
      $this->timeZone('Asia/Jakarta');

      $file = $request->file('fileUp');

      $nama_guru = Auth::user()->name;
      $judul_tugas = $request->nama;
      $deskripsi = $request->deskripsi;
      $file_path = $this->uploadFile($file, './assets/user/tugas', 'tugas');
      $deadline = $request->deadline;
      // dd($deadline);
      $id_kelas = $request->id_kelas;
      $id_mata_pelajaran = $request->id_mapel;
      $tanggal_buat = date('d:m:y H:m:i');

      $data = DB::table('tugas')->insert([
        'nama_guru' => $nama_guru,
        'judul_tugas' => $judul_tugas,
        'deskripsi' => $deskripsi,
        'file_path' => $file_path,
        'deadline' => $deadline,
        'id_kelas' => $id_kelas,
        'id_mata_pelajaran' => $id_mata_pelajaran,
        'tanggal_buat' => $tanggal_buat,
      ]);
      if($data) {
        session()->flash('status', 'success upload tugas!');
        return redirect()->back();
      } else {
        session()->flash('status', 'gagal upload tugas!');
        return redirect()->back();
      }
    }

    function uploadFile($file, $destinationPath, $frontName)
    {
        // $file = $request->file($filePost);
        $fileName = $file->getClientOriginalName();
        $fileNameArr = explode('.', $fileName);
        $file_ext = end($fileNameArr);
        // $destinationPath = './assets/user/img';
        $image = $frontName . time() . '.' . $file_ext;

        if($file->move($destinationPath, $image)) {
          return $image;
        } else {
          return false;
        }
    }
}
