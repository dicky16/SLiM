

@extends('staf.layouts.master')

@section('judul', 'tambah mata pelajaran')

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
        <span><p style="padding-top: 22px;  font-size: 12px;">Mata Pelajaran</p></span>
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
