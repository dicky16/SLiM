@extends('siswa/layouts/master')
@section('judul', 'jadwal pelajaran')
@section('content')
<div class="container">
<div style="padding-top: 6px;" id="content-jadwal" class="background-siswa">
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
        <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Absensi</p></span>
      </div>
      <div class="col">
        <div class="btn-group float-right" style="margin-top: 10px;">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $user }}
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('siswa/profil')}}">Profile</a>
            <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Tabel -->
  <div style="padding-top: 6px;" id="content-absensi" class="table-responsive">
  <p></p><h2 style="float: left;">Jadwal Pelajaran</h2><br>
  <button style="margin-top: -8px; float: right;" type="button" class="btn btn-outline-secondary">Export Jadwal</button>
  <div style="clear: both;"></div><br>
  <table class="table container">
    <thead>
    <tr style="background-color: #F6F9FC;">
      <th scope="col">Hari</th>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jam</th>
      <th scope="col">Guru</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $dt)
    <tr>
      <td>{{$dt->hari}}</td>
      <td>{{$dt->mata_pelajaran}}</td>
      <td>{{$dt->kelas}}</td>
      <td>{{$dt->jam}}</td>
      <td>{{$dt->name}}</td>
    </tr>
    @endforeach
  </tbody>
  </table>
</div>
<!-- end tabel -->

</div>
@endsection
