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
    <div style="float: left;">
      <h2 style="color : white; ">Home</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="img/home_icon.png">
    </div>
    <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Kelas</p>

    <div style=" position: absolute;  padding-left: 700px; margin-top: -50px;">
    <img style="width:27%; padding-right: 20px;" src="img/bell.png">
    <img width="30%" src="img/akun.png"/>
    </div>
    <span class="text-nama"><p>Muchammad Muchib</p></span>
    <div style="clear: both;"></div>
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
              <a href="kelas-detail/{{$kelas->id}}/materi"><button type="button" class="btn btn-info float-right">Cek Kelas</button></a>
            </div>
          </div>
        </div><br>
        @endforeach
      </div>
  </div>
</div>
@endsection
