<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class SiswaController
{
    public function index()
    {
      $kelas = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'jadwal.id', 'mapel.id as id_mapel')
      ->where('jadwal.id_kelas', $this->getId())
      ->get();

      // $tugas = DB::table('tugas')
      // ->join('tabel_mata_pelajaran as mapel', 'tugas.id_mata_pelajaran', '=', 'mapel.id')
      // ->select('tugas.*', 'mapel.mata_pelajaran', 'mapel.id as id_mapel')
      // ->where('id_kelas', auth()->user()->id_kelas)->get();

      $tugas = DB::table('status_tugas')
      ->join('tabel_mata_pelajaran as mpl' ,'status_tugas.id', '=', 'mpl.id')
      ->select('status_tugas.*', 'mpl.mata_pelajaran')
      ->where('status_tugas', 'finish')
      ->where('status_tugas.id_user', auth()->user()->id)
      ->get();
      $cek = DB::table('status_tugas')->where('id_tugas', $tugas[0]->id)->get();
      // dd($cek);
      if($cek) {
        $tugas = null;
      }

      $jadwal = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->where('jadwal.hari', $this->hari_ini())
      ->where('jadwal.id_kelas', $this->getId())
      ->get();
      // dd($jadwal);
      return view('siswa/index', compact('tugas', 'kelas', 'jadwal'));
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
      $this->timeZone('Asia/Jakarta');
      $tugas = DB::table('tugas')
      ->join('tabel_mata_pelajaran as mapel', 'tugas.id_mata_pelajaran', '=', 'mapel.id')
      ->select('tugas.*', 'mapel.mata_pelajaran', 'mapel.id as id_mapel')
      ->where('id_kelas', auth()->user()->id_kelas)->get();

      $cek = DB::table('status_tugas')->where('id_tugas', $tugas[0]->id)->get();

      $telat = null;

      if($cek) {
        $tugas = null;
        $date = date("Y-m-d");
        $cekTelat = DB::table('tugas')->where('deadline', '<=', $date)->get();

        if($cekTelat) {
          $telat = $cekTelat;
        }

        $telat = null;

      }

      $selesai = DB::table('status_tugas')
      ->join('tabel_mata_pelajaran as mpl' ,'status_tugas.id', '=', 'mpl.id')
      ->select('status_tugas.*', 'mpl.mata_pelajaran')
      ->where('status_tugas', 'finish')
      ->where('status_tugas.id_user', auth()->user()->id)
      ->get();
      // dd($telat);
      return view('siswa/tugas', ['tugas' => $tugas, 'telat' => $telat, 'selesai' => $selesai]);
    }

    public function kumpulTugas($id)
    {
      $tugas = DB::table('tugas')
      ->join('tabel_mata_pelajaran as mapel', 'tugas.id_mata_pelajaran', '=', 'mapel.id')
      ->select('tugas.*', 'mapel.mata_pelajaran', 'mapel.id as id_mapel')
      // ->where('id_kelas', auth()->user()->id_kelas)
      ->where('tugas.id', $id)
      ->get();
      // dd($tugas[0]);
      $cek = DB::table('status_tugas')->where('id_user', auth()->user()->id)->get();
      $info = null;
      if($cek) {
        $info = array ([
          'status' => 'disabled'
          ]);
      } else {
        $info = array ([
          'status' => ''
          ]);
      }

      return view('siswa/kumpulTugas', ['tugas' => $tugas[0], 'info' => $info[0]]);
    }

    public function postKumpulTugas(Request $request)
    {
      $data = $request->validate([
        'keterangan' => 'required'
      ]);
      $id_tugas = $request->id_tugas;

      if($file = $request->file('fileUp')) {
        $up = $this->uploadFile($file, './assets/user/tugas/sisswa', 'tugas-siswa');
        if($up) {
          $kumpulkan = DB::table('status_tugas')->insert([
            'status_tugas' => 'finish',
            'file_path' => $up,
            'id_user' => auth()->user()->id,
            'id_tugas' => $id_tugas,
            'judul_tugas' => $request->judul_tugas,
            'id_mapel' => $request->id_mapel
          ]);
          if($kumpulkan) {
            return redirect()->back()->with('status', 'success upload tugas!');
          } else {
            return redirect()->back()->with('status', 'gagal upload tugas!');
          }
        } else {
          return redirect()->back()->with('status', 'gagal upload tugas!');
        }
      } else {
        return redirect()->back()->with('status', 'tidak ada file');
      }

    }

    public function kelas()
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name', 'jadwal.id', 'mapel.id as id_mapel')
      ->where('jadwal.id_kelas', $this->getId())
      ->get();
      // dd($data);

      return view('siswa/kelas', ['data' => $data]);
    }

    public function calender()
    {
      return view('siswa/calender');
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

    public function detailMateri($id, $id_mapel)
    {
      // $data = DB::table('jadwal_pelajaran as jadwal')
      // ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      // ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      // ->join('users', 'jadwal.id_guru', '=', 'users.id')
      // ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      // ->where('jadwal.id', $id)
      // ->get();
      // // dd($data);
      // $materi = DB::table('materi')
      // ->where('id_mata_pelajaran', $id_mapel)
      // ->get();
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
      // dd($materi);
      return view('siswa/detailKelasMateri', ['data' => $data, 'materi' => $materi]);
    }

    public function detailTugas($id, $id_mapel)
    {
      // $data = DB::table('jadwal_pelajaran as jadwal')
      // ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      // ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      // ->join('users', 'jadwal.id_guru', '=', 'users.id')
      // ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      // ->where('jadwal.id', $id)
      // ->get();
      //
      // // $tugas = DB::table('tugas')
      // // ->join('tabel_mata_pelajaran as mapel', 'tugas.id_mata_pelajaran', '=', 'mapel.id')
      // // ->select('tugas.*', 'mapel.mata_pelajaran', 'mapel.id as id_mapel')
      // // ->where('id_kelas', auth()->user()->id_kelas)->get();
      // $tugas = DB::table('tugas')
      // ->join('tabel_mata_pelajaran as mapel', 'tugas.id_mata_pelajaran', '=', 'mapel.id')
      // ->select('tugas.*', 'mapel.mata_pelajaran')
      // ->where('id_kelas', auth()->user()->id_kelas)
      // ->where('id_mata_pelajaran', $id_mapel)
      // ->get();
      // dd($tugas);
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
      return view('siswa/detailKelasTugas', ['data' => $data, 'tugas' => $tugas]);
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

    function hari_ini() {

    	$hari = date ("D");

    	switch($hari){
    		case 'Sun':
    			$hari_ini = "Minggu";
    		break;

    		case 'Mon':
    			$hari_ini = "Senin";
    		break;

    		case 'Tue':
    			$hari_ini = "Selasa";
    		break;

    		case 'Wed':
    			$hari_ini = "Rabu";
    		break;

    		case 'Thu':
    			$hari_ini = "Kamis";
    		break;

    		case 'Fri':
    			$hari_ini = "Jumat";
    		break;

    		case 'Sat':
    			$hari_ini = "Sabtu";
    		break;

    		default:
    			$hari_ini = "Tidak di ketahui";
    		break;
    	}

	return $hari_ini;

  }

}
