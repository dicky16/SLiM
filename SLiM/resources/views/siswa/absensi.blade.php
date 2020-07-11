@extends('siswa/layouts/master')
@section('judul', 'absensi')

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
    <div style="float: left;">
      <h2 style="color : white; ">Home</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="{{ asset('siswa/img/home_icon.png') }}">
    </div>
    <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Absensi</p>

    <div style=" position: absolute;  padding-left: 700px; margin-top: -50px;">
    <img style="width:27%; padding-right: 20px;" src="{{ asset('siswa/img/bell.png') }}">
    <img width="30%" src="{{ asset('siswa/img/akun.png') }}"/>
    </div>
    <span class="text-nama"><p>Muchammad Muchib</p></span>
    <div style="clear: both;"></div>
      <!-- content dasboard -->

      <div style="clear: both;"></div><br><br>
      <div class="row text-absensi">
        <div class="col-sm-3 mx-auto">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Bahasa Indonesia</h5>
              <h5>Senin, 03-07-2020</h5>
              <a href="" style="text-decoration: none; color: #ff3333;"><h6>Absen</h6></a>
            </div>
          </div>
        </div>
      </div>
  </div>


  <!-- Tabel -->
  <div style="padding-top: 6px;" id="content-absensi" class="table-responsive">
  <p></p><h2 style="float: left;">Tabel Absensi</h2><br>
  <button style="margin-top: -8px; float: right;" type="button" class="btn btn-outline-secondary">Export Absensi</button>
  <div style="clear: both;"></div><br>
  <table class="table">
    <thead>
    <tr style="background-color: #F6F9FC;">
      <th scope="col">KODE</th>
      <th scope="col">CREATED AT</th>
      <th scope="col">Kelas</th>
      <th scope="col">Alpha</th>
      <th scope="col">Ijin</th>
      <th scope="col">Hadir</th>
      <th scope="col">Tatap Muka</th>
      <th scope="col">Prosentase</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
  </tbody>
  </table>
</div>
<!-- end tabel -->

</div>
@endsection
