<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
         <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo/logo.png') }}" width="40" height="40">
        </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav">
            @if (Session::has('Session_email') && Session::has('Session_role_admin'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('list_post') }}">All Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
            @elseif(Session::has('Session_email') && Session::has('Session_role_user'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('create') }}">Create Something</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('list_post') }}">Your Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif

          </ul>
        </div>
      </div>
    </nav>