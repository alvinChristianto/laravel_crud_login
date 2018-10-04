
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="">

	<title>Signin Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">
	<form class="form-signin" action="{{ url(action('registerController@postRegister')) }} " method="post">
		{{ csrf_field() }}
		<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Register</h1>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>

		<label for="inputUsername" class="sr-only">Username</label>
		<input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>

		<label for="inputNama" class="sr-only">Nama</label>
		<input type="text" id="Nama" name="name" class="form-control" placeholder="Nama" required autofocus>

		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword1" name="password" class="form-control" placeholder="Password" required>

		<!-- <label for="inputPassword" class="sr-only">retype Password</label>
		<input type="password" id="inputPassword2" name="password1" class="form-control" placeholder="retype Password" required> -->
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Register now!</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</form>
</body>
</html>
