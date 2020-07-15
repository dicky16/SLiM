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
    <link rel="stylesheet" href="{{ asset('siswa/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('siswa/css/profil.css') }}">
    <script src="https://kit.fontawesome.com/2ee1f2fc44.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <!-- <div class="float-right md-3">
                <img src="{{ asset('staf/img/Menu.png') }}" alt="">
              </div> -->

                <div class="sidebar-header">
                    <a style="text-decoration: none;" href=""><img src="{{ asset('siswa/img/judul.png') }}"></a>
                </div>
                <ul class="list-unstyled components">
                      <img src="{{ asset('staf/img/monitor.png') }}" class="mr-3 ml-3">
                      <a href="{{route('staf')}}" style="color: black">Monitoring Class</a>
                      <br>
                      <br>
                      <div class="dropdown">
                        <img src="{{ asset('staf/img/user.png') }}" class="ml-3">
                        <button class="btn dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 1px;">
                          Management User
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ url('staf/siswa') }}">Siswa</a>
                          <a class="dropdown-item" href="{{ url('staf/guru') }}">Guru</a>
                          <a class="dropdown-item" href="{{ url('staf/admin') }}">Admin</a>
                        </div>
                      </div>
                      <br>
                      <img src="{{ asset('staf/img/kelas.png') }}" class="mr-4 ml-3">
                      <a href="{{ url('staf/pelajaran') }}" style="color: black">Jadwal Pelajaran</a>
                      <br><br>
                      <img src="{{ asset('staf/img/calendar.png') }}" class="mr-4 ml-3">
                      <a href="{{ url('staf/calender')}}" style="color: black">Calendar</a>
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
                  var ref = firebase.database().ref('ac/status');
                  ref.on("value", function(snapshot) {
                    var data = snapshot.val();
                    // console.log(data);
                    var sesi = '{{Session::get('statusAc')}}';
                    if(sesi == "checked") {
                      firebase.database().ref('ac').set({
                          status : 0
                        });
                        location.replace('{{ url('/staf/del-ac') }}');
                    } else {
                      firebase.database().ref('ac').set({
                          status : 1
                        });
                        location.replace('{{ url('/staf/set-ac') }}');
                    }
                  }, function (errorObject) {
                    console.log("The read failed: " + errorObject.code);
                  });
                });

                //add status lampu depan
                $("#btnLd").click(function(e) {
                  e.preventDefault();
                  var ref = firebase.database().ref('lampuDepan/status');
                  ref.on("value", function(snapshot) {
                    var data = snapshot.val();
                    // console.log(data);
                    var sesi = '{{Session::get('statusLd')}}';
                    if(sesi == "checked") {
                      firebase.database().ref('lampuDepan').set({
                          status : 0
                        });
                        location.replace('{{ url('/staf/del-ld') }}');
                    } else {
                      firebase.database().ref('lampuDepan').set({
                          status : 1
                        });
                        location.replace('{{ url('/staf/set-ld') }}');
                    }
                  }, function (errorObject) {
                    console.log("The read failed: " + errorObject.code);
                  });
                });

                //add status lampu tengah
                $("#btnLt").click(function(e) {
                  e.preventDefault();
                  var ref = firebase.database().ref('lampuTengah/status');
                  ref.on("value", function(snapshot) {
                    var data = snapshot.val();
                    // console.log(data);
                    var sesi = '{{Session::get('statusLt')}}';
                    if(sesi == "checked") {
                      firebase.database().ref('lampuTengah').set({
                          status : 0
                        });
                        location.replace('{{ url('/staf/del-lt') }}');
                    } else {
                      firebase.database().ref('lampuTengah').set({
                          status : 1
                        });
                        location.replace('{{ url('/staf/set-lt') }}');
                    }
                  }, function (errorObject) {
                    console.log("The read failed: " + errorObject.code);
                  });
                });

                //add status lampu belakang
                $("#btnLb").click(function(e) {
                  e.preventDefault();
                  var ref = firebase.database().ref('lampuBelakang/status');
                  ref.on("value", function(snapshot) {
                    var data = snapshot.val();
                    // console.log(data);
                    var sesi = '{{Session::get('statusLb')}}';
                    if(sesi == "checked") {
                      firebase.database().ref('lampuBelakang').set({
                          status : 0
                        });
                        location.replace('{{ url('/staf/del-lb') }}');
                    } else {
                      firebase.database().ref('lampuBelakang').set({
                          status : 1
                        });
                        location.replace('{{ url('/staf/set-lb') }}');
                    }
                  }, function (errorObject) {
                    console.log("The read failed: " + errorObject.code);
                  });
                });

                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });

                  //ajax edit user
                  $("#edit").click(function(e) {
                    e.preventDefault();
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var id = $("#edit").data("id");
                    if(name == "" || email == "") {
                      alert('data tidak boleh kosong')
                    } else {
                      if(password == "") {
                        $.ajax({
                          type: 'POST',
                          url:"{{ url('/staf/update') }}",
                          data:{name:name,email:email,id:id},
                          dataType: 'json',
                          success:function(data) {
                            if(data.status == '1') {
                              Swal.fire(
                                'Sukses edit data',
                                'success'
                              )
                              location.reload();
                            } else {
                              Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Gagal tambah data',
                              })
                            }
                          }
                        });
                      } else {
                        $.ajax({
                          type: 'POST',
                          url:"{{ url('/staf/update') }}",
                          data:{name:name,email:email,id:id,password:password},
                          dataType: 'json',
                          success:function(data) {
                            if(data.status == '1') {
                              Swal.fire(
                                'Sukses edit data',
                                'success'
                              )
                              location.reload();
                            } else {
                              Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Gagal tambah data',
                              })
                            }
                          }
                        });
                      }
                    }
                  });

             });
         </script>
  </body>
</html>
