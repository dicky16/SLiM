@extends('guru/layouts/master')
@section('judul', 'guru')
@section('content')
<div class="container">
  <div id="content" class="background-siswa">
     <!-- search box -->
    <div style="padding-left: 700px; top: 13px; position: absolute;" >
    <img style="width:27%; padding-right: 20px;" src="{{ asset('guru/img/bell.png') }}"/>
    <img class="rounded-circle"width="30%" src="{{ asset('guru/img/1.jpeg') }}"/>
    </div>
    <span style="position: absolute; top: 20px; padding-left: 75%;"><p>{{ $user }}</p></span>
    <div style="clear: both;"></div>
<!-- icon home  -->
    <div style="float: left;">
      <h2 style="color : white; ">Home</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="{{ asset('guru/img/home_icon.png') }}">
    </div>
      <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Tugas Siswa</p>
    <div style="clear: both;"></div><br><br>



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
