<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('edit', $prevpost->id) }}">Edit Post</a></li>
                <li><a href="{{ route('delete', $prevpost->id) }}">Delete Post</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="h1-responsive">{{$prevpost -> judul}}</h1>
                <h4 class="text-muted">{{$prevpost -> subjudul}}</h4>
             </div>         
        </div>
        <hr style="border-bottom: solid rgb(249, 105, 105);">
        <div class="row justify-content-center">
        	<div class="col-md-8">
    			<h5 class="h4-responsive">{{$prevpost -> para1}}
    			</h5>
    			<h5 class="h4-responsive">{{$prevpost -> para2}}
    			</h5>
    			
    			<h3 class="font-weight-normal">The Final Frontier</h3>
    			
    			<h5 class="h4-responsive">{{$prevpost -> para3}}
    			</h5>

    		</div>
        </div>   
    </div>
    @yield('main')
    <footer class="page-footer font-small blue">

       @include('includes.footer')

    </footer>
</body>
</html>
