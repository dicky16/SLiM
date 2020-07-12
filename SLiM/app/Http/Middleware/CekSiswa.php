<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CekSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(!Auth::check())
      {
        return redirect('login');
      }
      // $user = Auth::user();
      $role = Auth::user()->level;
      if($role == "siswa") {
        return $next($request);
      }
      return redirect()->back();

    }
}
