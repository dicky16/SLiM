

@extends('staf.layouts.master')

@section('judul', 'user')

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
        <span><p style="padding-top: 22px;  font-size: 12px;">User management - Guru</p></span>
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
        </div>
        <div class="row">
          <form class="" action="{{ url('staf/add') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="ml-4 mr-4 mt-4 mb-4">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Nama</label>
              <input type="text" class="form-control" id="name" placeholder="Nama..." name="name">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState" name="level">Level</label>
                <select id="level" class="form-control" name="level">
                  <option value="admin" selected>Admin</option>
                  <option value="guru">Guru</option>
                  <option value="siswa">Siswa</option>
                </select>
              </div>
              <div class="form-group col-md-8">
                <label for="exampleFormControlFile1">Photo</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imageUser">
              </div>
            </div>
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
          </div>
          </form>
        </div>
      </div>

  </div>
</div>

@endsection
