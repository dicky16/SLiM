@extends('guru/layouts/master')
@section('judul', 'guru')
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

    <div style="clear: both;"></div>
<!-- icon home  -->
    <div style="float: left;">
      <h2 style="color : white; ">Home</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="{{ asset('guru/img/home_icon.png') }}">
    </div>
      <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Tugas Siswa</p>
    <div style="clear: both;"></div>
       <!-- Example single danger button -->
<!-- Example single danger button -->
	<div style="position: relative; padding-left: 840px;">
	    <div class="btn-group">
	      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        {{ $user }}
	      </button>
	      <div class="dropdown-menu">
	        <a class="dropdown-item" href="{{ url('guru/profil')}}">Profile</a>
	        <a class="dropdown-item" href="">Logout</a>
	      </div>
	    </div>
    </div>

    <!-- content dasboard -->
      <hr>
      <h2 style="color : white;">Kelas Mengajar</h2>
      <hr>
      <div class="row">

        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 A</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Senin, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Selanjutnya</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 B</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Selasa, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Selanjutnya</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 C</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Rabu, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Selanjutnya</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KELAS 12 D</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Kamis, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Selanjutnya</button>
            </div>
          </div>
        </div>
     </div>

     <br>
      <hr>
      <h2 style="color : white;">Jadwal Mengajar</h2>
      <hr>
      <table class="table" style="background-color: white;">
              <thead>
              <tr>
                <th scope="col">Hari</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">kelas</th>
                <th scope="col">Jam</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Senin</th>
                <td>MTK</td>
                <td>12 A</td>
                <td>07.00 - 09.15</td>
              </tr>
              <tr>
                <th scope="row">Selasa</th>
                <td>MTK</td>
                <td>12 C</td>
                <td>10.00 - 11.00</td>
              </tr>
              <tr>
                <th scope="row">Rabu</th>
                <td>FISIKA</td>
                <td>12 B</td>
                <td>07.00 - 09.15</td>
              </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-info float-right"><a href="jadwal.html">Lihat Jadwal</a></button>
      <br>

       <hr>
        <h2 style="color: white;">Tugas Siswa</h2>
      <hr>
        <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">MTK</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Senin, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Tugas</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">BIOLOGI</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Selasa, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Tugas</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">FISIKA</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Rabu, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Tugas</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">KIMIA</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">Kamis, 07.15 - 08.25</h5>
              </label>
              <button type="button" class="btn btn-info float-right">Cek Tugas</button>
            </div>
          </div>
        </div>
     </div>

  </div>
</div>
@endsection
