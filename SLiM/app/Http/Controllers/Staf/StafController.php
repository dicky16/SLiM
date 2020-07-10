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

    public function setStatus(Request $request)
    {
      $status = $request->input('jenis');
      if(!$status) {
        return response(['status' => 'invalid']);
      }
      if($status == 'ac') {
        session(['statusAc' => 'checked']);
        return response(['status' => '1']);
      } else if($status == 'ld') {
        session(['statusLd' => 'checked']);
        return response(['status' => '1']);
      }

    }
    public function destroyStatus(Request $request)
    {
      $status = $request->input('jenis');
      if(!$status) {
        return response(['status' => 'invalid']);
      }
      if($status == 'ac') {
        session(['statusAc' => 'unchecked']);
        return response(['status' => '0']);
      } else if($status == 'ld') {
        session(['statusLd' => 'unchecked']);
        return response(['status' => '0']);
      }
    }

    public function getAddUSer()
    {
      return view('staf/tambahUser');
    }

    public function addUser(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required',
        'username' => 'required|unique:posts',
        'password' => 'required',
        'level' => 'required',
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'level' => $request->level
      ]);
      return 'sukses tambah user';
    }

    public function destroy()
    {
      App\Flight::withTrashed()
                ->where('account_id', 1)
                ->get();
    }

    public function getAturSiswa()
    {
      return view('staf/aturSiswa');
    }

    public function getAturAdmin()
    {
      $admin = User::where('level', 'admin')->get();
      // dd($admin);
      return view('staf/aturAdmin', ['data' => $admin]);
    }
}
