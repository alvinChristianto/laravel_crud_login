
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	@section('title', 'register')
	@include('includes.head')

</head>

<body>
	<div class="container-fluid">
         @include('includes.header')
    </div>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-2"></div>
			<div class="col-md-6">
			<form class="form-signin" action="{{ url(action('registerController@postRegister')) }} " method="post">
				{{ csrf_field() }}
				@if ($message = Session::get('error'))
			      <div class="alert alert-success alert-block">
			        <button type="button" class="close" data-dismiss="alert">×</button> 
			          <strong>{{ $message }}</strong>
			      </div>
		  		@endif
	
				<h1 class="h3 m-3 font-weight-normal">Register</h1>
				
				<label for="inputNama" class="sr-only">Nama Lengkap</label>
				<input type="text" id="Nama" name="name" class="form-control mb-1" placeholder="Nama" value ="{{ old('name') }}" required autofocus>

				<label for="inputUsername" class="sr-only">Username</label>
				<input type="text" id="username" name="username" class="form-control mb-1" placeholder="username" value ="{{ old('username') }}" required autofocus>

				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" id="inputEmail" name="email" class="form-control mb-1" placeholder="Email address" value ="{{ old('email') }}" required autofocus>

				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword1" name="password" class="form-control mb-1" placeholder="Password" required>

				<button class="btn btn-lg mt-3 btn-primary btn-block" type="submit">Register now!</button>
		        </br>
		        <a href="{{ route('login') }}">Login</a>                      
		       
			</form> 
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<footer class="page-footer font-small blue">

       @include('includes.footer')

    </footer>
</body>
</html>
