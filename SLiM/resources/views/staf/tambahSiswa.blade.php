

@extends('staf.layouts.master')

@section('judul', 'user')

@section('content')

<div class="container">
  <div id="content" class="bg-dark">

      <nav class="navbar navbar-default bg-dark">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                  <h2 style="color : white;">Home</h2>
                </div>
                <div class="col-4">
                  <img src="{{ asset('staf/img/Home.png') }}">
                </div>
                <div style="color : white;" class="col">
                  <span>User management - Admin</span>
                </div>
              </div>
              <div class="row">
                <div class="col mt-4">
                  <img src="{{ asset('staf/img/bell.png') }}">
                </div>
                <div class="col mr-4">
                  <img class="rounded-circle" src="{{ asset('staf/img/photo.jpg') }}" width="80" height="80">
                </div>
                <div style="color : white;" class="col mt-4">
                  <span class="float-right">Admin</span>
                </div>
              </div>
          </div>
      </nav>

      <h2 style="color : white;">Admin</h2>
      <div class="container" style="background-color: white;" >
        <div class="row mt-4">
        </div>
        <div class="row">
          <form class="" action="{{ url('staf/siswa-tambah') }}" method="post" enctype="multipart/form-data">
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
            <div class="form-group">
              <label for="inputState" name="level">Kelas</label>
              <select id="level" class="form-control" name="kelas">
                @foreach($kelas as $k)
                <option value="{{ $k->kelas}}">{{ $k->kelas}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="inputState" name="Semester">Semester</label>
              <select id="level" class="form-control" name="level">
                @foreach($smt as $k)
                <option value="{{ $k->semester}}">{{ $k->semester}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-row">
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
