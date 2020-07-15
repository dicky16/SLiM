<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\DB;
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
        $data = DB::table('users')
        ->join('tabel_kelas', 'users.id_kelas', '=', 'tabel_kelas.id')
        ->join('tabel_semester', 'users.id_semester', '=', 'tabel_semester.id')
        ->where('id_kelas', auth()->user()->id_kelas)
        ->where('id_semester', auth()->user()->id_semester)
        ->get();
        // dd($data);
        \View::share(['user' => $data[0]]);
        return $next($request);
      }
      return redirect()->back();

    }
}
