@extends('siswa.layouts.master')

@section('judul', 'detail kelas')

@section('content')
<div class="container">
<div style="padding-top: 6px;" id="content-detailkelas" class="background-siswa">
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
    <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Calender</p>

    <div style=" position: absolute;  padding-left: 700px; margin-top: -50px;">
    <img style="width:27%; padding-right: 20px;" src="img/bell.png">
    <img width="30%" src="img/akun.png"/>
    </div>
    <span class="text-nama"><p>Muchammad Muchib</p></span>
    <h1 class="text-white text-center">Bahasa Indonesia</h1>
    <div style="clear: both;"></div>
      <div class="form-group has-search">
        <div id="main-search">
        <span class="fa fa-search form-control-feedback"></span>
        <input type="text" class="form-control" placeholder="Search">
        </div>
      </div>
  </div>
    <div  id="content-detailkelas-01" >
      <div style="text-align: center; padding-top: 50px;">
        <button style="background: #103156;" type="button" class="btn btn-lg text-white">Materi</button>
        <button style="background: #11CDEF;" type="button" class="btn btn-lg text-white">Tugas Kelas</button>
      </div>
      <div style="margin: 40px; text-align: center;">
        <button id="btn-tugas" type="button" class="btn text-white bold">Tugas Kelas</button><br>
        <button style="background: #103156;" id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
      </div>
    </div>
</div>
@endsection
