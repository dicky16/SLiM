@extends('siswa/layouts/master')
@section('judul', 'siswa')
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
        <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Dashboard</p></span>
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
    <br>
      <!-- content dasboard -->

      <h3 style="color : white;">Kelas</h3>

      <div class="row text-siswa">
        <div class="col-md-3 col-sm-6 mt-3 col-xs-6">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mt-3 col-xs-6">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 sm-6 mt-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 sm-6 mt-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
            </div>
          </div>
        </div>
      </div>

      <h3 style="color : white;">Jadwal Hari Ini</h3>
      <div class="row text-siswa">
        <div class="col-sm-12">
          <div class="table-responsive">
            <table class="table table-bordered bg-white">
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
                <tr>
                  <th scope="row">KD001</th>
                  <td>Bahasa Indonesia</td>
                  <td>12A</td>
                  <td>07.00-08.00</td>
                  <td>Pak Guru</td>
                </tr>
                <tr>
                  <th scope="row">KD001</th>
                  <td>Bahasa Indonesia</td>
                  <td>12A</td>
                  <td>07.00-08.00</td>
                  <td>Pak Guru</td>
                </tr>
                <tr>
                  <th scope="row">KD001</th>
                  <td>Bahasa Indonesia</td>
                  <td>12A</td>
                  <td>07.00-08.00</td>
                  <td>Pak Guru</td>
                </tr>
              </tbody>
            </table>

        </div>
        </div>
      </div>

      <div style="float: left;"><h3 style="color : white;">Tugas Belum Selesai</h3></div>
      <!-- <h3><a style="text-decoration: none; float: right;" href="" class="btn btn-primary">Lihat Semua</a></h3>  -->
      <div style="clear: both;"></div>
      <div class="row text-siswa">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
              <a href="" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
