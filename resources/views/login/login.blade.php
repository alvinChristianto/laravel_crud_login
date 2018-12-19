
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
		<form action="{{url(action('loginController@postLogin'))}}" class="form-signin" method="POST">
				{{ csrf_field() }}
				@if ($message = Session::get('success'))
			      <div class="alert alert-success alert-block">
			        <button type="button" class="close" data-dismiss="alert">×</button> 
			          <strong>{{ $message }}</strong>
			      </div>
				@endif
		  		
				<h1 class="h3 mb-3 font-weight-normal">Login</h1>
				<label for="inputEmail" class="sr-only">Input email or Username</label>
				<input type="text" id="inputEmail" class="form-control mb-1" name="inputEmailUser" placeholder="Email address" value ="{{ old('inputEmailUser') }}"required autofocus>
				@if($message = Session::get('noUser')) 
					<span class="error-span text-danger font-weight-bold">{{ $message }}</span>
				@endif

				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" id="inputPassword1" class="form-control" placeholder="Password" required>
				@if($message = Session::get('wrongPs')) 
					<span class="error-span text-danger font-weight-bold">{{ $message }}</span>
				@endif
				<div class="mt-3">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</div>
				</br>
				<a class="mb-3" href="{{ route('register') }}">Register</a>	
		</form>
	</div> 

	<!-- <div class="container">
		<form action="{{url(action('loginController@postLogin'))}}" class="form-signin" method="POST">
			{{ csrf_field() }}
			@if ($message = Session::get('success'))
		      <div class="alert alert-success alert-block">
		        <button type="button" class="close" data-dismiss="alert">×</button> 
		          <strong>{{ $message }}</strong>
		      </div>
	  		@elseif($message = Session::get('wrongPs'))
		      <div class="alert alert-success alert-block">
		        <button type="button" class="close" data-dismiss="alert">×</button> 
		          <strong>{{ $message }}</strong>
		      </div>
		    @elseif($message = Session::get('noUser'))
		      <div class="alert alert-success alert-block">
		        <button type="button" class="close" data-dismiss="alert">×</button> 
		          <strong>{{ $message }}</strong>
		      </div>
	  		@endif
			<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
			<h1 class="h3 mb-3 font-weight-normal">Login</h1>
			<label for="inputEmail" class="sr-only">Input email or Username</label>
			<input type="text" id="inputEmail" class="form-control" name="inputEmailUser" placeholder="Email address" value ="{{ old('inputEmailUser') }}"required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword1" class="form-control" placeholder="Password" required>

			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			</br>
			<a class="mb-3" href="{{ route('register') }}">Register</a>	
		</form>
	</div> -->
	<footer class="page-footer font-small blue">

       @include('includes.footer')

    </footer>
</body>
</html>
