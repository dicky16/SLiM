<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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
