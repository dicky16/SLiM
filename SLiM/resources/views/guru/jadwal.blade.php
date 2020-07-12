@extends('guru/layouts/master')
@section('judul', 'Jadwal Mengajar')
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
    <div style="padding-left: 700px; top: 13px; position: absolute;" >
    <img style="width:27%; padding-right: 20px;" src="{{ asset('guru/img/bell.png') }}"/>
    <img class="rounded-circle"width="30%" src="{{ asset('guru/img/1.jpeg') }}"/>
    </div>
    <span style="position: absolute; top: 20px; padding-left: 75%;"><p>Muhammad Farraseka</p></span>
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

    <hr>
     <div class="row">
      <div class="col md-6"><h2 style="color : white;">Jadwal Mengajar</h2> </div>
      <div class="col md-6"><button type="button" class="btn btn-info float-right">Export Jadwal</button></div>
     </div>
    <hr>

     <table class="table" style="background-color: white;">
              <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Hari</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">kelas</th>
                <th scope="col">Jam</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach($data as $d)
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $d->hari }}</td>
                <td>{{ $d->mata_pelajaran }}</td>
                <td>{{ $d->kelas }}</td>
                <td>{{ $d->jam }}</td>
              </tr>
              <?php $no++; ?>
              @endforeach
            </tbody>
        </table>
  </div>
</div>
@endsection
