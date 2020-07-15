<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function login()
  {
    if(Auth::user()) {
      $role = Auth::user()->level;
      if($role == "admin") {
        return redirect('staf');
      } else if($role == "guru") {
        // dd($role);
        return redirect('guru');
      } else if($role == "siswa") {
        return redirect('siswa');
      }
    }

    $sesi = session('ortu');
    if($sesi == "login") {
      return redirect('ot');
    }

    return view('login');
  }

  public function cekLogin(Request $request)
  {
    $username = $request->email;
    $password = $request->password;

    $cek = DB::table('orangtua')
    ->where('username', $username)->value("id_siswa");
    // dd($cek > 0);
    if($cek > 0) {
      $passwd = DB::table('orangtua')
      ->where('username', $username)->value("password");
      $pass = Hash::check($password, $passwd);
      session()->put('ortu', $cek);
      return redirect('ot');
    }

    if($user = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect('staf');
    } else {
      return redirect()->back()->with('status', 'salah!');;
    }

  }

  public function logout()
  {
    Auth::logout();
    return redirect('login');
  }

  public function calender()
  {
    // Auth::logout();
    return view('calender');
  }

  public function tes()
  {
    // Auth::logout();
    return view('tes');
  }
}
