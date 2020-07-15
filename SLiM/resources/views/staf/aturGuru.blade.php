@extends('staf.layouts.master')

@section('judul', 'guru')

@section('content')

<div class="container">
  <div id="content" class="bg-dark">

  <div style="position: absolute; margin-left: -130px; margin-top: 8px;" class="row">
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
        <img style="  width:20px; margin-left: 75px; margin-top: 20px;" src="{{ asset('siswa/img/home_icon.png') }}">
      </div>
      <div class="col ml-4">
        <span><p style="padding-top: 22px;  font-size: 12px;">User management &nbsp; - &nbsp;Guru</p></span>
      </div>
      <div class="col">
        <div class="btn-group float-right" style="margin-top: 10px;">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('siswa/profil')}}">Profile</a>
            <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <br>

      <h2 style="color : white;">Guru</h2>
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
            <a href="add"><button class="btn btn-primary float-right"><i class="fas fa-plus"></i></button></a>
          </div>
        </div>

        <div class="row">
        <div class="table-responsive">
        <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">NIS</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Semester</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $dt)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$dt->name}}</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>{{$dt->email}}</td>
                  <td>-</td>
                  <td>
                    <a href="delete/{{ $dt->id}}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> |
                    <a href="update/{{ $dt->id}}"><button class="btn btn-success"><i class="far fa-edit"></i></button></a>
                  </td>
                </tr>
                <?php $i++; ?>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
  </div>

  </div>
</div>
@endsection
