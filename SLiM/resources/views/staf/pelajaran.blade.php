@extends('staf/layouts/master')

@section('judul', 'pelajaran')

@section('content')

<div class="container">
  <div id="content" class="bg-dark">

  <div style="position: absolute; margin-left: -130px; margin-top: 8px;" class="row">
    <div class="njajal">
    <div class="col">
     <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
          <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
          <!-- <img src="img/menu_toggle.png" alt=""> -->
      </button>
      </div>
      </div>
    </div>
<!-- icon home  -->
    <div class="row">
      <div class="col-1">
        <h2 style="color : white; ">Home</h2>
      </div>
      <div class="col-0 ml-4">
        <img class="img-akun" src="{{ asset('siswa/img/home_icon.png') }}">
      </div>
      <div class="col ml-2">
        <span><p class="text-home">Jadwal Pelajaran</p></span>
      </div>
      <div class="col">
        <div class="btn-group float-right" style="margin-top: 10px;">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{$user->name}}
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('staf/profil')}}">Profile</a>
            <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>

      <h2 style="color : white;">Jadwal Pelajaran</h2>
      <div class="container" style="background-color: white;" >
        <div class="row mt-4">
          <div class="col-6">
            <div class="input-group md-form form-sm form-1 pl-0">
              <div class="input-group-prepend">
                <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fas fa-search"
                    aria-hidden="true"></i></span>
              </div>
              <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
            </div>
          </div>
          <div class="col-6">
            <a href="{{ url('staf/add-mapel') }}"><button class="btn btn-primary float-right"><i class="fas fa-plus"></i></button></a>
          </div>
        </div>
        <div class="row">
        <div class="table-responsive">
        <table class="table">
          <thead class="thead-dark">
                <tr>
                  <th scope="col">Hari</th>
                  <th scope="col">Mata Pelajaran</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jam</th>
                  <th scope="col">Guru</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $dt)
                <tr>
                  <td>{{$dt->hari}}</td>
                  <td>{{$dt->mata_pelajaran}}</td>
                  <td>{{$dt->kelas}}</td>
                  <td>{{$dt->jam}}</td>
                  <td>{{$dt->name}}</td>
                  <td>
                    <a href=""><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> |
                    <a href=""><button class="btn btn-success"><i class="far fa-edit"></i></button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
    </div>

  </div>
</div>
@endsection
