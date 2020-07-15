@extends('guru/layouts/master')
@section('judul', 'Kelas Detail')
@section('content')
<div class="container">
 <div style="padding-top: 6px;" id="content-detailkelas" class="background-siswa">
   <div style="position: absolute; margin-left: -130px; margin-top: 1px;" class="row">
     <div class="col">
      <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
           <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
           <!-- <img src="img/menu_toggle.png" alt=""> -->
       </button>
       </div>
   </div>
     <!-- search box -->
     <div class="row">
      <div class="col-1">
        <h2 style="color : white; ">Home</h2>
      </div>
      <div class="col-1 ml-4">
        <img id="icon-home" src="{{ asset('siswa/img/home_icon.png') }}">
      </div>
      <div class="col ml-4">
        <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Kelas</p></span>
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
      <h1 class="text-white text-center">{{$data[0]->mata_pelajaran}}</h1>
      <h3 class="text-white text-center">Kelas {{$data[0]->kelas}}</h3>
    <div style="clear: both;"></div>

    <!--Content-->
    <!-- <div class="form-group has-search">
        <div id="main-search">
        <span class="fa fa-search form-control-feedback"></span>
        <input type="text" class="form-control" placeholder="Search">
        </div>
      </div> -->
  </div>
    <div  id="content-detailkelas-01" >
      <!-- <div style="text-align: center; padding-top: 50px;">
        <button style="background: #103156;" type="button" class="btn btn-lg text-white">Materi</button>
        <button style="background: #11CDEF;" type="button" class="btn btn-lg text-white">Tugas Kelas</button>
      </div> -->
      <!-- <div style="margin: 40px; text-align: center;">
        <button id="btn-tugas" type="button" class="btn text-white bold">Tugas Kelas</button><br>
        <button style="background: #103156;" id="btn-tugas" type="button" class="btn text-white">Bahasa Indonesia.pdf</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
        <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
      </div> -->
      @yield('isi')
    </div>
</div>
@endsection
