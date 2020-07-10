<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('judul')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- w3school -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ asset('staf/css/style.css') }}">
    <script src="https://kit.fontawesome.com/2ee1f2fc44.js" crossorigin="anonymous"></script>
    <!-- <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script> -->
  </head>
  <body>
    <!-- firebase config -->
    <!-- The core Firebase JS SDK is always required and must be listed first -->
      <script src="https://www.gstatic.com/firebasejs/7.16.0/firebase-app.js"></script>

      <!-- TODO: Add SDKs for Firebase products that you want to use
           https://firebase.google.com/docs/web/setup#available-libraries -->
      <script src="https://www.gstatic.com/firebasejs/7.16.0/firebase-analytics.js"></script>
      <script src="https://www.gstatic.com/firebasejs/7.16.0/firebase-database.js"></script>

      <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
          apiKey: "AIzaSyDb48LOFhY1pdT80HF9gjQZVwcB_T1MNls",
          authDomain: "slim-b5937.firebaseapp.com",
          databaseURL: "https://slim-b5937.firebaseio.com",
          projectId: "slim-b5937",
          storageBucket: "slim-b5937.appspot.com",
          messagingSenderId: "607309266401",
          appId: "1:607309266401:web:2f6fc340c01bb78d58e6a0",
          measurementId: "G-YDL68DWM9L"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
        // add fungsi


      </script>
      <!--  end firebase config -->
    <div class="wrapper">
            <!-- Sidebar Holder -->

            <nav id="sidebar">
              <div class="float-right md-3">
                <img src="{{ asset('staf/img/Menu.png') }}" alt="">
              </div>
                <div class="sidebar-header">
                    <h3 style="color: black">SLiM</h3>
                </div>
                <ul class="list-unstyled components">
                      <img src="{{ asset('staf/img/monitor.png') }}" class="mr-3 ml-3">
                      <a href="index.php" style="color: black">Data Dosen</a>
                      <br>
                      <br>
                      <div class="dropdown">
                        <img src="{{ asset('staf/img/user.png') }}" class="ml-3">
                        <button class="btn dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Management User
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Siswa</a>
                          <a class="dropdown-item" href="#">Guru</a>
                          <a class="dropdown-item" href="#">Admin</a>
                        </div>
                      </div>
                      <br>
                      <br>
                      <img src="{{ asset('staf/img/calendar.png') }}" class="mr-4 ml-3">
                      <a href="index.php" style="color: black">Data Dosen</a>
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
        <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>

        <script type="text/javascript">
             $(document).ready(function () {
               //ajax
               $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                // add status ac
                $("#btnAc").click(function(e) {
                  e.preventDefault();
                  var sesi = '{{Session::get('statusAc')}}';
                  var data = null;
                  if(sesi == 'unchecked') {
                    data = 0;
                  } else {
                    data = 1;
                  }
                    console.log(sesi);
                    if(data == 0) {
                      // setStatusAc();
                      firebase.database().ref('ac').set({
                        status : 1
                      });
                      $.ajax({
                        type: 'POST',
                        url:"{{ url('/staf/setstatus') }}",
                        data:{jenis:'ac'},
                        dataType: 'json',
                        success:function(data) {
                          if(data.status == '1') {
                            // alert('AC dinyalakan!')
                            location.reload();
                          }
                        }
                      });
                    } else if(data==1) {
                      firebase.database().ref('ac').set({
                        status : 0
                      });
                      $.ajax({
                        type: 'POST',
                        url:"{{ url('/staf/destroystatus') }}",
                        data:{jenis:'ac'},
                        dataType: 'json',
                        success:function(data) {
                          if(data.status == '0') {
                            // alert('AC dimatikan!')
                            location.reload();
                          }
                        }
                      });
                    }

                });

                //add status lampu depan
                $("#btnLd").click(function(e) {
                  e.preventDefault();
                  var sesi = '{{Session::get('statusLd')}}';
                  var data = null;
                  if(sesi == 'unchecked') {
                    data = 0;
                  } else {
                    data = 1;
                  }
                    console.log(data);
                    if(data == 0) {
                      setStatusLd();
                      $.ajax({
                        type: 'POST',
                        url:"{{ url('/staf/setstatus') }}",
                        data:{jenis:'ld'},
                        dataType: 'json',
                        success:function(data) {
                          if(data.status == '1') {
                            // alert('Lampu depan dinyalakan!')
                            location.reload();
                          }
                        }
                      });
                    }
                    if(data==1) {
                      destroyStatusLd();
                      $.ajax({
                        type: 'POST',
                        url:"{{ url('/staf/destroystatus') }}",
                        data:{jenis:'ld'},
                        dataType: 'json',
                        success:function(data) {
                          if(data.status == '0') {
                            // alert('Lampu depan dimatikan!')
                            location.reload();
                          }
                        }
                      });
                    }

                });

                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
                 //toggle
                 // $("#btnAc").click(function() {
                 //   // loadStatusAc();
                 //   console.log('ok');
                 //   // setStatusAc();
                 //   destroyStatusAc();
                 //  });

                  // function loadStatusAc()
                  // {
                  //     var ref = firebase.database().ref('slim/ac');
                  //     ref.on("value", function(snapshot) {
                  //       // console.log(snapshot.val());
                  //       var data = snapshot.val();
                  //       if(data == 1) {
                  //         $("#btnAc").prop("checked", true);
                  //       } else {
                  //         $("#btnAc").prop("checked", false);
                  //       }
                  //     }, function (errorObject) {
                  //       console.log("The read failed: " + errorObject.code);
                  //     });
                  // }
                  //ac
                  function setStatusAc()
                  {
                        firebase.database().ref('ac').set({
                          status : 1
                        });
                  }

                  function destroyStatusAc()
                  {
                        firebase.database().ref('ac').set({
                          status : 0
                        });
                  }
                  //lampu depan
                  function setStatusLd()
                  {
                        firebase.database().ref('lampuDepan').set({
                          status : 1
                        });
                  }

                  function destroyStatusLd()
                  {
                        firebase.database().ref('lampuDepan').set({
                          status : 0
                        });
                  }
             });
         </script>
  </body>
</html>
