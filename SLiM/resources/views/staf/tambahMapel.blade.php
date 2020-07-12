

@extends('staf.layouts.master')

@section('judul', 'tambah mata pelajaran')

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
                  <span>Mata Pelajaran</span>
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

      <h2 style="color : white;">Mata Pelajaran</h2>
      <div class="container" style="background-color: white;" >
        <div class="row mt-4">
        </div>
        <div class="row">
          <div class="ml-4 mr-4 mt-4 mb-4">
            <form action="{{ url('staf/add-mapel') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Hari</label>
                <input type="text" class="form-control" id="hari" name="hari" aria-describedby="emailHelp">
              </div>
                <label for="inputState" name="level">Mata Pelajaran</label>
                <select id="mapel" name="mapel" class="form-control">
                  @foreach($mapel as $dt)
                  <option value="{{$dt}}">{{$dt}}</option>
                  @endforeach
                </select>
                <br>
                <label for="inputState" name="level">Kelas</label>
                <select id="kelas" name="kelas" class="form-control">
                  @foreach($kelas as $dt)
                  <option value="{{$dt}}">{{$dt}}</option>
                  @endforeach
                </select>
                <br>
                <label for="inputState" name="level">Guru</label>
                <select id="guru" name="guru" class="form-control">
                  @foreach($user as $dt)
                  <option value="{{$dt->name}}">{{$dt->name}}</option>
                  @endforeach
                </select>
                <br>
                <div class="md-form md-outline">
                  <input type="time" id="default-picker" name="jam" class="form-control" placeholder="Select time">
                  <label for="default-picker">Jam mulai</label>
                  <input type="time" id="default-picker" name="jamAkhir" class="form-control" placeholder="Select time">
                  <label for="default-picker">Jam berakhir</label>
                </div>
              <button type="submit" class="btn btn-primary" id="tambahMapel">Tambah</button>
            </form>
          </div>
        </div>
      </div>

  </div>
</div>
@endsection
