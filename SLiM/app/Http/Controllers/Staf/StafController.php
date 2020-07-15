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
      $valid = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'level' => 'required',
        'imageUser' => 'required',
      ]);

      if($request->hasFile('imageUser')) {
        $file = $request->file('imageUser');
        $fileName = $file->getClientOriginalName();
        $fileNameArr = explode('.', $fileName);
        $file_ext = end($fileNameArr);
        $destinationPath = './assets/user/img';
        $image = 'user-' . time() . '.' . $file_ext;

        if($file->move($destinationPath, $image)) {
          $this->compressImage($image);

          $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'level' => $request->input('level'),
            'img_path' => $image
          ]);
          if(!$user) {
            session()->flash('status', 'Gagal tambah data');
            return redirect()->back();
          } else {
            session()->flash('status', 'Berhasil tambah data');
            return redirect()->back();
          }
        } else {
          session()->flash('status', 'Gagal tambah data');
          return redirect()->back();
        }
      } else {
        session()->flash('status', 'Tidak ada file ada gambar terlalu besar');
        return redirect()->back();
      }

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
        $user->password = bcrypt($request->input('password'));
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
      $jam = $request->jam .' - '. $request->jamAkhir;
      // dd($jam);
      if($id_mapel == "" || $id_kelas == "" || $id_guru == "" || $jam == "") {
        return redirect()->back();
      }
      $mapel = DB::table('jadwal_pelajaran')->insert(
        [
          'hari' => $request->input('hari'),
          'id_mata_pelajaran' => $id_mapel,
          'id_kelas' => $id_kelas,
          'jam' => $jam,
          'id_guru' => $id_guru,
        ]
      );
      if($mapel) {
        return redirect('staf/add-mapel')->with(['status', 'berhasil tambah data']);
      } else {
        return redirect('staf/add-mapel')->with(['status', '0']);
      }
    }

    public function tambahSiswa()
    {
      $kelas = DB::table('tabel_kelas')->get();
      $smt = DB::table('tabel_semester')->get();
      // dd($smt);
      return view('staf/tambahSiswa', compact(['kelas', 'smt']));
    }

    public function getSiswa(Request $request)
    {
      $key = $request->input('key');
      // dd($key);
      $data = DB::table('users')->where('name', 'LIKE', '%'.$key.'%')
      ->get();
      // dd($data);
      return view('staf/aturSiswa', ['data' => $data]);
    }

    public function postTambahSiswa(Request $request)
    {
      $valid = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'imageUser' => 'required',
      ]);

      if($request->hasFile('imageUser')) {
        $file = $request->file('imageUser');
        $fileName = $file->getClientOriginalName();
        $fileNameArr = explode('.', $fileName);
        $file_ext = end($fileNameArr);
        $destinationPath = './assets/user/img';
        $image = 'user-' . time() . '.' . $file_ext;

        if($file->move($destinationPath, $image)) {
          $this->compressImage($image);

          $id_kelas = DB::table('tabel_kelas')->select('id')->where('kelas', $request->input('kelas'))->value('id');
          $id_semester = null;

          if($request->input('semester') == "Ganjil") {
            $id_semester = 1;
          } else if($request->input('semester') == "Genap") {
            $id_semester = 2;
          }

          $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'id_kelas' => $id_kelas,
            'id_semester' => $id_semester,
            'level' => 'siswa',
            'img_path' => $image
          ]);
          if(!$user) {
            session()->flash('status', 'Gagal tambah data');
            return redirect()->back();
          } else {
            session()->flash('status', 'Berhasil tambah data');
            return redirect()->back();
          }
        } else {
          session()->flash('status', 'Gagal tambah data');
          return redirect()->back();
        }
      } else {
        session()->flash('status', 'Tidak ada file ada gambar terlalu besar');
        return redirect()->back();
      }
    }

    function compressImage($source)
    {
      $filepath = public_path('assets/user/img/'.$source);
      $mime = mime_content_type($filepath);
      $output = new \CURLFile($filepath, $mime, $source);
      $data = ["files" => $output];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'http://api.resmush.it/?qlty=70');
      curl_setopt($ch, CURLOPT_POST,1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      $result = curl_exec($ch);
      if (curl_errno($ch)) {
          $result = curl_error($ch);
      }
      curl_close ($ch);

      $arr_result = json_decode($result);

      // store the optimized version of the image
      $ch = curl_init($arr_result->dest);
      $fp = fopen($filepath, 'wb');
      curl_setopt($ch, CURLOPT_FILE, $fp);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_exec($ch);
      curl_close($ch);
      fclose($fp);
    }
}
