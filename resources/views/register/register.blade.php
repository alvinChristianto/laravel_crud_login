
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	@section('title', 'register')
	@include('basefile.head')

</head>

<body>
	<div class="container-fluid">
         @include('basefile.header')
    </div>
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
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
			
						<h2 class="h1 font-weight-normal">Register</h2>
						
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


          </div>
        </div>
      </div>
    </header>
	
	
	<footer class="page-footer font-small blue">

       @include('basefile.footer')

    </footer>
</body>
</html>
