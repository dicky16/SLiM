@extends('siswa/layouts/master')
@section('judul', 'tugas')
@section('content')
<div class="container">
              <div id="content" class="background-siswa">
              <div style="position: absolute; margin-left: -130px; margin-top: 15px;" class="row">
                <div class="col">
                 <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                      <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
                      <!-- <img src="img/menu_toggle.png" alt=""> -->
                  </button>
                  </div>
                </div>
                 <!-- search box -->

                  <div class="form-group has-search">
                    <div id="main-search" style="float: left;">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search">
                    </div>
                  </div>
                <div style="padding-left: 700px; top: 13px; position: absolute;" >
                <img style="width:27%; padding-right: 20px;" src="img/bell.png"/>
                <img width="30%" src="img/akun.png"/>
                </div>
                <span style="position: absolute; top: 20px; padding-left: 56.5%;"><p>Muchammad Muchib</p></span>
                <div style="clear: both;"></div>
            <!-- icon home  -->
                <div style="float: left;">
                  <h2 style="color : white; ">Home</h2>
                </div>
                <div style="float: left;">
                  <img id="icon-home" src="img/home_icon.png">
                </div>
                  <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Tugas</p>
                <div style="clear: both;"></div>

                  <!-- content dasboard -->
                  <p></p>
                  <h3 style="color : white;">Tugas Baru</h3>
                  <p></p>
                  <div class="row text-siswa">
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">Bahasa Indonesia</h5>
                          <h5>Senin, 03-07-2020</h5>
                          <a href="" style="text-decoration: none; color: #ff3333;"><h6>Kumpulkan</h6></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">Bahasa Indonesia</h5>
                          <h5>Senin, 03-07-2020</h5>
                          <a href="" style="text-decoration: none; color: #ff3333;"><h6>Kumpulkan</h6></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p></p>

                  <h3 style="color : white;">Tugas Telat</h3>
                  <div class="row text-siswa">
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">Bahasa Indonesia</h5>
                          <h5>Senin, 03-07-2020</h5>
                          <a href="" style="text-decoration: none; color: #ff3333;"><h6>Tandai Selesai</h6></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div style="float: left;"><h3 style="color : white;">Tugas Selesai</h3></div>
                  <h3><a style="text-decoration: none; float: right;" href="" class="btn btn-primary">Lihat Semua</a></h3>
                  <div style="clear: both;"></div>
                  <div class="row text-siswa">
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">Bahasa Indonesia</h5>
                          <h5>Senin, 03-07-2020</h5>
                          <a href="" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">Bahasa Indonesia</h5>
                          <h5>Senin, 03-07-2020</h5>
                          <a href="" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">Bahasa Indonesia</h5>
                          <h5>Senin, 03-07-2020</h5>
                          <a href="" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 id="text-matkul">Bahasa Indonesia</h5>
                          <h5>Senin, 03-07-2020</h5>
                          <a href="" style="text-decoration: none; color: #ff3333;"><h6>Lihat</h6></a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
@endsection
