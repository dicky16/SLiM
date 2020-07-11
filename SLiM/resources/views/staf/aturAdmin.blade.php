@extends('staf.layouts.master')

@section('judul', 'user')

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



              <!-- <div class="col">
                <a href="user/logout.php"><button type="button" class="btn btn-info navbar-btn float-right">Logout</button></a>
              </div> -->
          </div>
      </nav>

      <h2 style="color : white;">Admin</h2>
      <div class="container" style="background-color: white;" >
        <div class="row mt-4">
          <div class="col-6">
            <div class="input-group md-form form-sm form-1 pl-0">
              <div class="input-group-prepend">
                <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fas fa-search"
                    aria-hidden="true"></i></span>
              </div>
              <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
            </div>
          </div>
          <div class="col-6">
            <button class="btn btn-primary float-right"><i class="fas fa-plus"></i></button>
          </div>
        </div>
        <div class="row">

          <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">NIS</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Semester</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $dt)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$dt->name}}</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>{{$dt->email}}</td>
                  <td>-</td>
                  <td>
                    <a href="delete/{{ $dt->id}}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> |
                    <a href=""><button class="btn btn-success"><i class="far fa-edit"></i></button></a>
                  </td>
                </tr>
                <?php $i++; ?>
                @endforeach
              </tbody>
            </table>

        </div>
      </div>

  </div>
</div>
@if($msg = Session::get('delete'))
<script type="text/javascript">
  alert('{{ $msg }}')
</script>
@endif
@endsection
