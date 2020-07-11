<?php
namespace App\Http\Controllers\Staf;

use Illuminate\Http\Request;
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
}
