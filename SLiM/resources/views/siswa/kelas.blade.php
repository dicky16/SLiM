@extends('siswa/layouts/master')
@section('judul', 'kelas')
@section('content')
<div class="container">
<div style="padding-top: 6px;" id="content" class="background-siswa">
  <div style="position: absolute; margin-left: -130px; margin-top: 15px;" class="row">
    <div class="col">
     <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
          <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
          <!-- <img src="img/menu_toggle.png" alt=""> -->
      </button>
      </div>
    </div>
<!-- icon home  -->
   <div class="row">
      <div class="col-1">
        <h2 style="color : white; ">Home</h2>
      </div>
      <div class="col-1 ml-4">
        <img id="icon-home" src="{{ asset('siswa/img/home_icon.png') }}">
      </div>
      <div class="col ml-4">
        <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Kelas</p></span>
      </div>
      <div class="col">
        <div class="btn-group float-right" style="margin-top: 10px;">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $user->name }}
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('siswa/profil')}}">Profile</a>
            <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
      <!-- content dasboard -->

      <h3 style="color : white;">Kelas</h3>

      <div class="row text-siswa">
        @foreach($data as $kelas)
        <div class="col-sm-4" style="margin-top: 10px;">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">{{ $kelas->mata_pelajaran }}</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">{{ $kelas->hari}}, {{$kelas->jam}}</h5>
              </label>
              <a href="kelas-detail/{{$kelas->id}}/materi/{{$kelas->id_mapel}}"><button type="button" class="btn btn-info float-right">Cek Kelas</button></a>

            </div>
          </div>
        </div><br>
        @endforeach
      </div>
  </div>
</div>
@endsection
