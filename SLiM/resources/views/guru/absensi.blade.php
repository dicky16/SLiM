@extends('guru/layouts/master')
@section('judul', 'Absensi')
@section('content')
<div class="container">
<div style="padding-top: 6px;" id="content-absensi" class="background-siswa">
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
      <!-- content dasboard -->
      <?php
      date_default_timezone_set("Asia/Jakarta");
        $date = date("l");
        $hari = null;
        $time = date("h:i:s a");
        if($date == "Sunday") {
          $hari = "Minggu";
        } else if($date == "Monday") {
          $hari = "Senin";
        } else if($date == "Tuesday") {
          $hari = "Selasa";
        } else if($date == "Wednesday") {
          $hari = "Rabu";
        } else if($date == "Thursday") {
          $hari = "Kamis";
        } else if($date == "Friday") {
          $hari = "Jum'at";
        } else if($date == "Saturday") {
          $hari = "Sabtu";
        }
       ?>
      <h3 style="color: white;" align="center">{{ $info['status'] }}</h3>
      <div style="clear: both;"></div><br><br>

      <form action="{{ url('guru/absensi') }}" method="post">
        @csrf
      <div class="row text-absensi">
        <div class="col-sm-3 mx-auto">
          <div class="card">
            <div class="card-body">

              <h5 id="text-matkul">{{ $hari}}</h5>
              <h5>{{ $time }}</h5>
              <button type="submit" class="btn btn-success" value="1" name="btnIn" {{ $info['btnIn'] }}>Absen Masuk</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mx-auto">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">{{ $hari }}</h5>
              <h5>{{ $time }}</h5>
              <button type="submit" class="btn btn-danger" value="1" name="btnOut" {{ $info['btnOut'] }}>Absen Keluar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>


  <!-- Tabel -->
  <div style="padding-top: 6px;" id="content-absensi" class="table-responsive">
  <p></p><h2 style="float: left;">Tabel Absensi</h2><br>
  <button style="margin-top: -8px; float: right;" type="button" class="btn btn-outline-secondary">Export Absensi</button>
  <div style="clear: both;"></div><br>
  <table class="table">
    <thead>
    <tr style="background-color: #F6F9FC;">
      <th scope="col">Tanggal</th>
      <th scope="col">Absen Masuk</th>
      <th scope="col">Alpha</th>
      <th scope="col">Ijin</th>
      <th scope="col">Hadir</th>
      <th scope="col">Absen Keluar</th>
      <th scope="col">Tatap Muka</th>
      <th scope="col">Prosentase</th>
    </tr>
  </thead>
  <tbody>
    @foreach($dataAbsen as $absen)
    <tr>
      <td>{{ $absen->date }}</td>
      <td>{{ $absen->time_in }}</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>{{ $absen->time_out }}</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    @endforeach
  </tbody>
  </table>
  {!! $dataAbsen->links() !!}
</div>
<!-- end tabel -->

</div>
@endsection
