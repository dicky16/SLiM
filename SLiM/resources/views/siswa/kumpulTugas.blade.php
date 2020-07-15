@extends('siswa/layouts/master')
@section('judul', 'kumpul tugas')
@section('content')
<div class="container">
<div style="padding-top: 6px;" id="content" class="background-siswa">
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
        <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Absensi</p></span>
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
      <!-- content dasboard -->

      <h3 style="color : white;">Kumpulkan Tugas</h3>
      <br>
      <div class="row" style="background-color: white; padding: 10px;">
        <div class="col-sm-6">
          <h3><b>{{$tugas->mata_pelajaran}}</b></h3>
          <br>
          <input type="text-area" name="" value="{{$tugas->judul_tugas}}">
          <br>
          <br>
          {{$tugas->file_path}}
        </div>
        <div class="col-sm-6">
          <form action="{{url('siswa/kumpul-tugas')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="exampleInputPassword1">Keterangan</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="keterangan">
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">Pilih file pdf, word, image</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileUp">
                <input type="hidden" name="id_tugas" value="{{$tugas->id}}">
                <input type="hidden" name="judul" value="{{$tugas->judul_tugas}}">
                <input type="hidden" name="id_mapel" value="{{$tugas->id_mapel}}">

              </div>
              <button type="submit" class="btn btn-primary" {{$info['status']}} >Upload</button>
          </form>
        </div>

    </div>

  </div>
</div>
@endsection
