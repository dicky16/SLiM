<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('judul')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- w3school -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ asset('siswa/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('siswa/css/profil.css') }}">
    <script src="https://kit.fontawesome.com/2ee1f2fc44.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="wrapper">
            <!-- Sidebar Holder -->

            <nav id="sidebar">
              <!-- <div class="float-right md-3">
                <img src="{{ asset('staf/img/Menu.png') }}" alt="">
              </div> -->
                <div class="sidebar-header">
                    <a style="text-decoration: none;" href=""><img src="{{ asset('siswa/img/judul.png') }}"></a>
                </div>
                <ul class="list-unstyled components">
                      <img src="{{ asset('siswa/img/home.png') }}" class="mr-3 ml-3">
                      <a href="{{ url('siswa')}}" style="color: black">Home</a>
                      <br>
                      <br>
                      <img src="{{ asset('siswa/img/absensi.png') }}" class="mr-3 ml-3">
                      <a href="{{ url('siswa/absensi')}}" style="color: black">Absensi</a>
                      <br>
                      <br>
                      <img src="{{ asset('siswa/img/jadwal.png') }}" class="mr-3 ml-3">
                      <a href="{{ url('siswa/jadwal')}}" style="color: black">Jadwal Pelajaran</a>
                      <br>
                      <br>
                      <img src="{{ asset('siswa/img/tugas.png') }}" class="mr-3 ml-3">
                      <a href="{{ url('siswa/tugas')}}" style="color: black">Tugas</a>
                      <br>
                      <br>
                      <img src="{{ asset('siswa/img/kalender.png') }}" class="mr-3 ml-3">
                      <a href="{{ url('siswa/calender')}}" style="color: black">Calender</a>
                      <br>
                      <br>
                      <img src="{{ asset('siswa/img/kelas.png') }}" class="mr-3 ml-3">
                      <a href="{{ url('siswa/kelas')}}" style="color: black">Kelas</a>
                      <br>
                      <br>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            @yield('content')
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
  </body>
</html>
