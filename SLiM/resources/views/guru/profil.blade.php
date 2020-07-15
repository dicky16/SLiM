@extends('guru/layouts/master')
@section('judul', 'profil')
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
        <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Dashboard</p></span>
      </div>
      <div class="col">
        <div class="btn-group float-right" style="margin-top: 10px;">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $user }}
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('guru/profil')}}">Profile</a>
            <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <div style="clear: both;"></div><br><br>
      <!-- content profil -->
    <div class="container">
    <div class="row">
      <div class="offset-lg-4 col-lg-4 col-sm-6 col-12 main-section text-center">
          <div class="row">
              <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
          </div>
          <div class="row user-detail">
              <div class="col-lg-12 col-sm-12 col-12">
                  <img src="{{ url('assets/user/img/')}}/{{$img}}" class="rounded-circle img-thumbnail">
                  <h5>{{ $user }}</h5>
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i><br>
                  <p style="color: black;">Teacher</p>
                  <hr>
                  <span>Email : {{$email}} </span><br>
              </div>
          </div>
          <div class="row user-social-detail">
              <div class="col-lg-12 col-sm-12 col-12">
                 <a style="text-decoration: none;" href=""><img src="{{ asset('siswa/img/judul.png') }}"></a>
              </div>
          </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection
