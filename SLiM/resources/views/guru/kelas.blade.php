@extends('guru/layouts/master')
@section('judul', 'Kelas')
@section('content')
<div class="container">
  <div id="content" class="background-siswa">
    <div style="position: absolute; margin-left: -130px; margin-top: 1px;" class="row">
      <div class="col">
       <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
            <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
            <!-- <img src="img/menu_toggle.png" alt=""> -->
        </button>
        </div>
    </div>
     <!-- search box -->
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
            {{ $user }}
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('guru/profil')}}">Profile</a>
            <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Paragraf 1-->
    <hr>
        <h2 style="color : white;" >Kelas Mengajar</h2>
      <hr>
      <div class="row">
        @foreach($data as $kelas)
        <div class="col-sm-4" style="margin-top: 10px;">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">{{ $kelas->mata_pelajaran }}</h5>
              <h5 id="text-content" align="center" class="margin-top">{{ $kelas->kelas }}</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">{{ $kelas->hari}}, {{$kelas->jam}}</h5>
              </label>
              <a href="kelas-detail/{{$kelas->id}}/materi/{{$kelas->id_mapel}}"><button type="button" class="btn btn-info float-right">Cek Kelas</button></a>
            </div>
          </div>
        </div><br>
        @endforeach
     </div>
     <br><br>

     <!---Paragraf 2><-->
       <!-- <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 D</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Selasa, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Kelas</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 A</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Selasa, 08.15 - 09.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Kelas</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 C</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Selasa, 11.00 - 12.00</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Kelas</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 B</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Selasa, 12.30 - 14.00</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Kelas</button>
            </div>
          </div>
        </div>
     </div> -->
     <br>

     </div>
     </div>
@endsection
