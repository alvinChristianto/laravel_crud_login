
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

	@include('includes.head')
	
</head>

<body>
	<div class="container-fluid">
         @include('includes.header')
    </div>
	<div class="container">
			<form class="form-signin" action="{{ url(action('registerController@postRegister')) }} " method="post">
				{{ csrf_field() }}
				@if ($message = Session::get('error'))
			      <div class="alert alert-success alert-block">
			        <button type="button" class="close" data-dismiss="alert">×</button> 
			          <strong>{{ $message }}</strong>
			      </div>
		  		@endif
	
				<h1 class="h3 mb-3 font-weight-normal">Register</h1>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value ="{{ old('email') }}" required autofocus>

				<label for="inputUsername" class="sr-only">Username</label>
				<input type="text" id="username" name="username" class="form-control" placeholder="username" value ="{{ old('username') }}" required autofocus>

				<label for="inputNama" class="sr-only">Nama</label>
				<input type="text" id="Nama" name="name" class="form-control" placeholder="Nama" value ="{{ old('name') }}" required autofocus>

				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword1" name="password" class="form-control" placeholder="Password" required>

				<label for="inputPassword" class="sr-only">retype Password</label>
				<input type="password" id="inputPassword2" name="password1" class="form-control" placeholder="retype Password" required> 
				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Register now!</button>
		        </br>
		        <a href="{{ route('login') }}">Login</a>                      
		       
			</form> 
	</div>


	<footer class="page-footer font-small blue">

       @include('includes.footer')

    </footer>
</body>
</html>
