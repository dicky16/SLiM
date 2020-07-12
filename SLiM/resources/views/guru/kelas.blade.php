@extends('guru/layouts/master')
@section('judul', 'Kelas')
@section('content')
<div class="container">
  <div id="content" class="background-siswa">
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
      <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Tugas Siswa</p>
    <div style="clear: both;"></div><br><br>

    <!-- Content Paragraf 1-->
    <hr>
        <h2 style="color : white;" >Kelas Mengajar</h2>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 A</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Senin, 07.15 - 08.25</h5>
              </label>
              <a href="kelas2.html"><button type="button" class="btn btn-info float-right">Cek Kelas</button></a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 C</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Senin, 08.15 - 09.25</h5>
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
              <h5 align="center" class="card-title">Senin, 11.00 - 12.00</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Kelas</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 D</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Senin, 12.30 - 14.00</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Kelas</button>
            </div>
          </div>
        </div>
     </div><br><br>

     <!---Paragraf 2><-->
       <div class="row">
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
     </div>
     <br>

     </div>
     </div>
@endsection
