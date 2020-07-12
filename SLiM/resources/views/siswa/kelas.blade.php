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
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
              <a href="{{ url('siswa/kelas-detail') }}"><h5 style="color: red;">Lihat</h5></a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
