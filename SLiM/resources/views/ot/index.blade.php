@extends('ot/master')
@section('judul', 'Absensi Siswa')

@section('content')
<div class="container">
  <div id="content" class="background-siswa">
     <!-- search box -->

    <span style="position: absolute; top: 20px; padding-left: 75%;"><p>OrangTua</p></span>
    <div style="clear: both;"></div>
<!-- icon home  -->
    <div style="float: left;">
      <h2 style="color : white; ">Home</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="{{ asset('siswa/img/home_icon.png') }}">
    </div>
      <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Absen Siswa</p>
      <div class="col">
        <div class="btn-group float-right" style="margin-top: 10px;">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Orang Tua
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('ot/logout')}}">Logout</a>
          </div>
        </div>
      </div>
    <div style="clear: both;"></div><br><br>

      <!-- content dasboard -->
      <hr>
      <h2 style="color : white;">Absen Siswa</h2>
      <hr>
      <div class="row" style="background-color: white;">

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
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>{{ $absen->time_out }}</td>
            <td>-</td>
            <td>-</td>
          </tr>
          @endforeach
        </tbody>
        </table>
     </div>

 </div>
</div>
@endsection
