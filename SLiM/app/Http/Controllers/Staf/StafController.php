<?php
namespace App\Http\Controllers\Staf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;

class StafController
{
    public function index()
    {
      return view('staf/index');
    }

    public function tesdb()
    {
      $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('Subjects');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
            'SubjectName' => 'Laravel'
        ]);
        return $key;
    }

    public function setAc()
    {
      session(['statusAc' => 'checked']);
      return redirect('staf');
    }
    public function delAc()
    {
      session(['statusAc' => 'unchecked']);
      return redirect('staf');
    }
    //lampu depan
    public function setLD()
    {
      session(['statusLd' => 'checked']);
      return redirect('staf');
    }
    public function delLD()
    {
      session(['statusLd' => 'unchecked']);
      return redirect('staf');
    }
    //lampu tengah
    public function setLT()
    {
      session(['statusLt' => 'checked']);
      return redirect('staf');
    }
    public function delLT()
    {
      session(['statusLt' => 'unchecked']);
      return redirect('staf');
    }
    //lampu belakang
    public function setLB()
    {
      session(['statusLb' => 'checked']);
      return redirect('staf');
    }
    public function delLB()
    {
      session(['statusLb' => 'unchecked']);
      return redirect('staf');
    }

    public function getAddUSer()
    {
      return view('staf/tambahUser');
    }

    public function addUser(Request $request)
    {
      $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'level' => $request->input('level')
      ]);
      if(!$user) {
        return response(['status' => '0']);
      }
      return response(['status' => '1']);
    }

    public function destroy($id)
    {
      $del = User::destroy($id);
      if($del) {
        // return response([
        //   'status' => '1',
        //   'msg' => 'success delete'
        // ]);
        return redirect()->back();
      } else {
        // return response([
        //   'status' => '0',
        //   'msg' => 'failed delete'
        // ]);
        return redirect()->back()->with(['delete' => 'failed hapus data']);
      }
    }

    public function getAturSiswa()
    {
      $siswa = User::where('level', 'siswa')->get();
      return view('staf/aturSiswa', ['data' => $siswa]);
    }

    public function getAturAdmin()
    {
      $admin = User::where('level', 'admin')->get();
      // dd($admin);
      return view('staf/aturAdmin', ['data' => $admin]);
    }
    public function getAturGuru()
    {
      $guru = User::where('level', 'guru')->get();
      // dd($admin);
      return view('staf/aturGuru', ['data' => $guru]);
    }

    public function update($id)
    {
      $user = User::where('id', $id)->get();
      return view('staf/editUser', ['data' => $user]);
    }
    public function postUpdate(Request $request)
    {
      $id = $request->input('id');
      if(!$request->input('password')) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        if($user) {
          return response(['status' => '1']);
        } else {
          return response(['status' => '0']);
        }
      } else {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        if($user) {
          return response(['status' => '1']);
        } else {
          return response(['status' => '0']);
        }
      }
      return view('staf/editUser', ['data' => $user]);
    }

    public function pelajaran()
    {
      $data = DB::table('jadwal_pelajaran as jadwal')
      ->join('tabel_kelas as kelas', 'jadwal.id_kelas', '=', 'kelas.id')
      ->join('tabel_mata_pelajaran as mapel', 'jadwal.id_mata_pelajaran', '=', 'mapel.id')
      ->join('users', 'jadwal.id_guru', '=', 'users.id')
      ->select('jadwal.hari','kelas.kelas','mapel.mata_pelajaran','jadwal.jam','users.name')
      ->get();
      // dd($data);
      return view('staf/pelajaran', ['data' => $data]);
    }

    public function mapel()
    {
      $user = User::select('name')->where('level', 'guru')->get();
      // dd($user);
      $kelas = DB::table('tabel_kelas')->pluck('kelas');
      $mapel = DB::table('tabel_mata_pelajaran')->pluck('mata_pelajaran');
      return view('staf/tambahMapel', compact('user', 'kelas', 'mapel'));
    }

    public function postMapel(Request $request)
    {
      $id_mapel = DB::table('tabel_mata_pelajaran')
      ->select('id')->where('mata_pelajaran', '=', $request->mapel)->value('id');
      // dd($id_mapel);
      $id_kelas = DB::table('tabel_kelas')
      ->select('id')->where('kelas', '=', $request->kelas)->value('id');
      $id_guru = DB::table('users')
      ->select('id')->where('name', '=', $request->guru)->value('id');
      $mapel = DB::table('jadwal_pelajaran')->insert(
        [
          'hari' => $request->input('hari'),
          'id_mata_pelajaran' => $id_mapel,
          'id_kelas' => $id_kelas,
          'jam' => $request->input('jam'),
          'id_guru' => $id_guru,
        ]
      );
      if($mapel) {
        return redirect('staf/add-mapel')->with(['status', 'berhasil tambah data']);
      } else {
        return redirect('staf/add-mapel')->with(['status', '0']);
      }
    }
}
