@extends('siswa/layouts/master')
@section('judul', 'profil')
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
      <h2 style="color : white; ">Profil</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="{{ asset('siswa/img/home_icon.png') }}">
    </div>
    <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Profil &nbsp; - &nbsp; Siswa</p></span>
    <div style=" position: absolute;  padding-left: 840px; margin-top: -35px;">
    	<!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ $user }}
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Profil</a>
    <a class="dropdown-item" href="#">Logout</a>
  </div>
</div>
    </div>
    <div style="clear: both;"></div>
      <!-- content dasboard -->
      <div class="row">
        <p>profil ng kene</p>
      </div>
  </div>
</div>
@endsection
