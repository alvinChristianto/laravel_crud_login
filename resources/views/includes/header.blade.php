<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('images/logo/logo.png') }}" width="40" height="40">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
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
</nav>

<!--

        @if (Session::has('email'))
        <div class="top-right links">
            <a href="{{ route('create') }}">Create something</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
        @else
        <div class="top-right links">
            <a href="{{ route('login') }}">Login</a> 
            <a href="{{ route('register') }}">Register</a>    
        </div> 
        @endif
-->