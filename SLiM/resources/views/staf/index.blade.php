@extends('staf/layouts/master')

@section('judul', 'home')

@section('content')
<div class="container">
  <div id="content" class="bg-dark">

      <nav class="navbar navbar-default bg-dark">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                  <!-- <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                      <i class="glyphicon glyphicon-align-left"></i>
                      <img src="{{ asset('staf/img/Menu.png') }}" alt="">
                  </button> -->
                  <h2 style="color : white;">Home</h2>
                </div>
                <div class="col">
                  <img src="{{ asset('staf/img/Home.png') }}">
                </div>
                <div style="color : white;" class="col">
                  <span class="float-right">Monitor Class</span>
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



              <!-- <div class="col">
                <a href="user/logout.php"><button type="button" class="btn btn-info navbar-btn float-right">Logout</button></a>
              </div> -->
          </div>
      </nav>

      <h2 style="color : white;">Status</h2>

      <div class="row">

        <div class="col-sm-3 c">
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
