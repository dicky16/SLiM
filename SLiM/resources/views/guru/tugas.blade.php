@extends('guru/layouts/master')
@section('judul', 'Tugas Siswa')
@section('content')
<div class="container">
              <div id="content" class="background-siswa">
              <div style="position: absolute; margin-left: -130px; margin-top: 15px;" class="row">
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
        <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Tugas</p></span>
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
                  <p></p>
                  <h3 style="color : white;">Tugas Siswa</h3>
                  <p></p>
                  <div class="row text-siswa">


                    @foreach($tugas as $t)
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">{{$t->judul_tugas}}</h5>
                          <h5>{{$t->deadline}}</h5>
                          <a href="kumpul-tugas/{{$t->id}}" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
                        </div>
                      </div>
                    </div>
                    @endforeach


                  </div>



                  </div>
              </div>
@endsection
