

@extends('siswa.layouts.master')

@section('judul', 'user')

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
        <span><p class="text-home">Kaitkan dengan Orang Tua</p></span>
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

      <div class="container" style="background-color: white;" >
        <div class="row mt-4">
        </div>
        <div class="row">
          <form class="" action="{{ url('siswa/tambah-ortu') }}" method="post">
            @csrf
          <div class="ml-4 mr-4 mt-4 mb-4">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" id="email" name="username">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Nama</label>
              <input type="text" class="form-control" id="name" placeholder="Nama..." name="nama">
            </div>
            <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
          </div>
          </form>
        </div>
      </div>

  </div>
</div>

@endsection
