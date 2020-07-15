@extends('guru/layouts/master')
@section('judul', 'guru')
@section('content')

<div class="container">
  <div id="content" class="background-siswa">
        <div style="position: absolute; margin-left: -130px; margin-top: 1px;" class="row">
      <div class="col">
       <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
            <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
            <!-- <img src="img/menu_toggle.png" alt=""> -->
        </button>
        </div>
    </div>
     <!-- search box -->
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

    <!-- content dasboard -->
      <hr>
      <h2 style="color : white;">Kelas Mengajar</h2>
      <hr>
      <div class="row">

        @foreach($data as $kelas)
        <div class="col-sm-4" style="margin-top: 10px;">
          <div class="card">
            <div class="card-body">
              <h5 id="text-content" align="center" class="margin-top">{{ $kelas->mata_pelajaran }}</h5>
              <h5 id="text-content" align="center" class="margin-top">{{ $kelas->kelas }}</h5>
              <label class="mt-0">
              <h5 align="center" class="card-title">{{ $kelas->hari}}, {{$kelas->jam}}</h5>
              </label>
              <a href="kelas-detail/{{$kelas->id}}/materi/{{$kelas->id_mapel}}"><button type="button" class="btn btn-info float-right">Cek Kelas</button></a>
            </div>
          </div>
        </div><br>
        @endforeach
     </div>

     <br>
      <hr>
      <h2 style="color : white;">Jadwal Mengajar</h2>
      <hr>
      <table class="table" style="background-color: white;">
               <thead>
               <tr>
                 <th scope="col">No.</th>
                 <th scope="col">Hari</th>
                 <th scope="col">Mata Pelajaran</th>
                 <th scope="col">kelas</th>
                 <th scope="col">Jam</th>
               </tr>
             </thead>
             <tbody>
               <?php $no = 1; ?>
               @foreach($data as $d)
               <tr>
                 <td>{{ $no }}</td>
                 <td>{{ $d->hari }}</td>
                 <td>{{ $d->mata_pelajaran }}</td>
                 <td>{{ $d->kelas }}</td>
                 <td>{{ $d->jam }}</td>
               </tr>
               <?php $no++; ?>
               @endforeach
             </tbody>
         </table>
        <button type="button" class="btn btn-info float-right"><a href="guru/jadwal">Lihat Jadwal</a></button>
      <br>

       <hr>


  </div>
</div>

@endsection
