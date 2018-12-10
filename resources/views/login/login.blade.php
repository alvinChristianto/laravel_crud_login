
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

	<form action="{{url(action('loginController@postLogin'))}}" class="form-signin" method="POST">
		{{ csrf_field() }}
		@if ($message = Session::get('success'))
	      <div class="alert alert-success alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	          <strong>{{ $message }}</strong>
	      </div>
  		@endif
		<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Login</h1>
		<label for="inputEmail" class="sr-only">Input email or Username</label>
		<input type="text" id="inputEmail" class="form-control" name="inputEmailUser" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="inputPassword1" class="form-control" placeholder="Password" required>

		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</form>
</body>
</html>
