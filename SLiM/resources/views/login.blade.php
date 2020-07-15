<!DOCTYPE html>
<html>
<head>
	<title>Login SLiM</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('login/login.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<a style="text-decoration: none;" href=""><h2 style="text-align: center;color: white;">SLiM</h2></a>
				<h6 style="text-align: center; color: white;">Selamat Datang ! Silahkan Login Untuk Melanjutkan</h6>
			</div>
			<div class="card-body">
				<form action="{{ url('login') }}" method="post">
          @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="email">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn"  name="submit">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="#">Lupa Password? KLIK DISINI!</a>
				</div>
			</div>
		</div>
	</div>
</div>
@if (session('status'))
    <script type="text/javascript">
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Email atau Password salah!',
			})
    </script>
@endif
</body>
</html>
