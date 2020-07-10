<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
  public function login()
  {
    return view('login');
  }

  public function cekLogin(Request $request)
  {
    // $this->validate($request, [
    //   'username' => 'required|string',
    //   'password' => 'required|string',
    // ]);
    // $credentials = request(['email', 'password']);

    if($user = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      // dd($user);
      return redirect('staf');
    } else {
      return redirect()->back();
    }
  }
}
