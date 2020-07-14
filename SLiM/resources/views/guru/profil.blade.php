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
    <div style="float: left;">
      <h2 style="color : white; ">Profil</h2>
    </div>
    <div style="float: left;">
      <img id="icon-home" src="{{ asset('siswa/img/home_icon.png') }}">
    </div>
    <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Profil &nbsp; - &nbsp; Siswa</p></span>
    <div style=" position: absolute;  padding-left: 840px; margin-top: -35px;">
    	<!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ $user }}
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{url('guru/profil')}}">Profil</a>
    <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
  </div>
</div>
    </div>
    <div style="clear: both;"></div><br><br>
      <!-- content dasboard -->

      <div class="container">
        <div class="flex-profil">
          
        </div>
<!--         <div class="card" style="width: 50rem; height: 40rem;">
            <img class="card-img-top"  alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                      </ul>
                     <div class="card-body">
                          <a href="#" class="card-link">Card link</a>
                          <a href="#" class="card-link">Another link</a>
                    </div>
        </div> -->
      </div>
  </div>
</div>
@endsection
