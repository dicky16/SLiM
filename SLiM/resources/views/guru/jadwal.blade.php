@extends('guru/layouts/master')
@section('judul', 'Jadwal Mengajar')
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

    <hr>
     <div class="row">
      <div class="col md-6"><h2 style="color : white;">Jadwal Mengajar</h2> </div>
      <div class="col md-6"><button type="button" class="btn btn-info float-right">Export Jadwal</button></div>
     </div>
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
                <th scope="row">Senin</th>
                <td>MTK</td>
                <td>12 C</td>
                <td>10.00 - 11.00</td>
              </tr>
              <tr>
                <th scope="row">Senin</th>
                <td>FISIKA</td>
                <td>12 B</td>
                <td>13.00 - 14.30</td>
              </tr>


              <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>


                <th scope="row">Selasa</th>
                <td>FISIKA</td>
                <td>12 B</td>
                <td>07.00 - 09.15</td>
              </tr>
              <tr>
                <th scope="row">Selasa</th>
                <td>MTK</td>
                <td>12 A</td>
                <td>10.00 - 11.00</td>
              </tr>
              <tr>
                <th scope="row">Selasa</th>
                <td>MTK</td>
                <td>12 C</td>
                <td>13.00 - 14.30</td>
              </tr>

               <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>


                <th scope="row">Rabu</th>
                <td>MTK</td>
                <td>12 C</td>
                <td>07.00 - 09.15</td>
              </tr>
              <tr>
                <th scope="row">Rabu</th>
                <td>FISIKA</td>
                <td>12 B</td>
                <td>10.00 - 11.00</td>
              </tr>
              <tr>
                <th scope="row">Rabu</th>
                <td>MTK</td>
                <td>12 A</td>
                <td>13.00 - 14.30</td>
              </tr>
            </tbody>
        </table>
  </div>
</div>
@endsection
