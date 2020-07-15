@extends('staf/layouts/master')

@section('judul', 'home')

@section('content')
<div class="container">
<div id="content" class="bg-dark">
  <div style="position: absolute; margin-left: -130px; margin-top: 8px;" class="row">
    <div class="njajal">
    <div class="col">
     <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
          <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
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
        <span><p class="text-home">Monitor Kelas</p></span>
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

      <h2 style="color : white;">Status</h2>
      <div class="row">

        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 align="center" class="card-title">Lampu Depan</h5>
              <img src="{{ asset('staf/img/lampu.png') }}" alt="">
              <label class="switch float-right mt-2">
                <input type="checkbox" id="btnLd" @if(Session::has('statusLd')) {{Session::get('statusLd')}} @endif>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 align="center" class="card-title">Lampu Tengah</h5>
              <img src="{{ asset('staf/img/lampu.png') }}" alt="">
              <label class="switch float-right mt-2">
                <input type="checkbox" id="btnLt" @if(Session::has('statusLt')) {{Session::get('statusLt')}} @endif>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 align="center" class="card-title">Lampu Belakang</h5>
              <img src="{{ asset('staf/img/lampu.png') }}" alt="">
              <label class="switch float-right mt-2">
                <input type="checkbox" id="btnLb" @if(Session::has('statusLb')) {{Session::get('statusLb')}} @endif>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 align="center" class="card-title">AC</h5>
              <img src="{{ asset('staf/img/ac.png') }}" width="60" height="50">
              <label class="switch float-right mt-2">
                <input type="checkbox" id="btnAc" class="btnAc" @if(Session::has('statusAc')) {{Session::get('statusAc')}} @endif>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>

      </div>
  </div>
</div>
@endsection
