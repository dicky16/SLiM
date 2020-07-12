@extends('guru/layouts/master')
@section('judul', 'Kelas Detail')
@section('content')
<div class="container">
 <div style="padding-top: 6px;" id="content-detailkelas" class="background-siswa">
     <!-- search box -->
    <div style="padding-left: 700px; top: 13px; position: absolute;" >
    <img style="width:27%; padding-right: 20px;" src="img/bell.png"/>
    <img class="rounded-circle"width="30%" src="img/1.jpeg"/>
    </div>
    <span style="position: absolute; top: 20px; padding-left: 75%;"><p>Muhammad Farraseka</p></span>
    <div style="clear: both;"></div>
<!-- icon home  -->
    <div style="float: left;">
      <h2 style="color : white; ">Home</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="img/home_icon.png">
    </div>
      <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Kelas 12 A</p>
      <h1 class="text-white text-center">Matematika</h1>
      <h3 class="text-white text-center">Kelas 12 A</h3>
    <div style="clear: both;"></div>

    <!--Content-->
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
        <button style="background: #103156;" id="btn-tugas" type="button" class="btn text-white">Materi</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
      </div>
    </div>
</div>
@endsection
