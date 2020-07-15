@extends('siswa/layouts/master')
@section('judul', 'siswa')
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
            {{ $user->name }}
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
        @foreach($kelas as $t)
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">{{$t->mata_pelajaran}}</h5>
              <h5>{{ $t->hari}}, {{$t->jam}}</h5>
              <a href="siswa/kelas-detail/{{$t->id}}/materi/{{$t->id_mapel}}" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
            </div>
          </div>
        </div>
        @endforeach

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
                @foreach($jadwal as $j)
                <tr>
                  <td>{{$j->hari}}</td>
                  <td>{{$j->mata_pelajaran}}</td>
                  <td>{{$j->kelas}}</td>
                  <td>{{$j->jam}}</td>
                  <td>{{$j->name}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>
        </div>
      </div>

      <div style="float: left;"><h3 style="color : white;">Tugas</h3></div>
      <!-- <h3><a style="text-decoration: none; float: right;" href="" class="btn btn-primary">Lihat Semua</a></h3>  -->
      <div style="clear: both;"></div>
      <div class="row text-siswa">


        @if($tugas != null)
        @foreach($tugas as $t)
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">{{$t->judul_tugas}}</h5>
              <h5>{{$t->deadline}}</h5>
              <a href="{{url('siswa/kumpul-tugas/')}}/{{$t->id}}" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 id="text-matkul">Tugas sudah selesai semua!</h5>
            </div>
          </div>
        </div>
        @endif

      </div>

    </div>
  </div>


@endsection
