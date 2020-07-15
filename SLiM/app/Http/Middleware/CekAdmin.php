<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CekAdmin
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
      if($role == "admin") {
        \View::share(['user' => auth()->user()]);
        return $next($request);
      }
      return redirect()->back();
    }
}
