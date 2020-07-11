<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- w3school -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href='css/style.css'>
    <script src="https://kit.fontawesome.com/2ee1f2fc44.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="wrapper">
            <!-- Sidebar Holder -->

            <nav id="sidebar">
              <div class="float-right md-3">
                <img src="{{ asset('staf/img/Menu.png') }}" alt="">
              </div>
                <div class="sidebar-header">
                    <a style="text-decoration: none;" href=""><img src="img/judul.png"></a>
                </div>
                <ul class="list-unstyled components">
                      <img src="img/home.png" class="mr-3 ml-3">
                      <a href="dasboard.php" style="color: black">Home</a>
                      <br>
                      <br>
                      <img src="img/absensi.png" class="mr-3 ml-3">
                      <a href="absensi.php" style="color: black">Absensi</a>
                      <br>
                      <br>
                      <img src="img/jadwal.png" class="mr-3 ml-3">
                      <a href="jadwal.php" style="color: black">Jadwal Pelajaran</a>
                      <br>
                      <br>
                      <img src="img/tugas.png" class="mr-3 ml-3">
                      <a href="tugas.php" style="color: black">Tugas</a>
                      <br>
                      <br>
                      <img src="img/kalender.png" class="mr-3 ml-3">
                      <a href="kalender.php" style="color: black">Calender</a>
                      <br>
                      <br>
                      <img src="img/kelas.png" class="mr-3 ml-3">
                      <a href="kelas.php" style="color: black">Kelas</a>
                      <br>
                      <br>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div class="container">
            <div style="padding-top: 6px;" id="content-jadwal" class="background-siswa">
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
                  <h2 style="color : white; ">Home</h2>   
                </div>
                <div style="float: left;">                     
                  <img id="icon-home" src="img/home_icon.png">
                </div>
                <p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Jadwal Pelajaran</p>

                <div style=" position: absolute;  padding-left: 700px; margin-top: -50px;">
                <img style="width:27%; padding-right: 20px;" src="img/bell.png">
                <img width="30%" src="img/akun.png"/> 
                </div> 
                <span class="text-nama"><p>Muchammad Muchib</p></span> 
                <div style="clear: both;"></div>
                  <!-- content dasboard -->   
                  <div style="clear: both;"></div><br><br>
              </div>


              <!-- Tabel -->
              <div style="padding-top: 6px;" id="content-absensi" class="table-responsive">
              <p></p><h2 style="float: left;">Jadwal Pelajaran</h2><br>             
              <button style="margin-top: -8px; float: right;" type="button" class="btn btn-outline-secondary">Export Jadwal</button>
              <div style="clear: both;"></div><br>
              <table class="table container">
                <thead>
                <tr style="background-color: #F6F9FC;">
                  <th scope="col">Hari</th>
                  <th scope="col">Mata Pelajaran</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jam</th>
                  <th scope="col">Guru</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                  <td>@mdo</td>
                </tr>
              </tbody>
              </table>
            </div>
            <!-- end tabel -->

            </div>
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
