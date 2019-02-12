<!-- Footer -->
    <!-- Footer Text -->
<footer class="page-footer font-small indigo" style="background-color: #a9abad">

    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 ">

          <!-- Content -->
          <div class="text-center">
             <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo/logo.png') }}" class="img-fluid mx-auto" alt="Responsive image" width="120" height="120" >
             </a>
          </div>
        </div>
        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-6  mx-auto ">

          <!-- Content -->
          <ul class="list-unstyled list-inline text-center py-2">
            <li class="list-inline-item">
               <a href="{{ route('register') }}" class="btn btn-outline-white btn-rounded">Register for Free</a>
            </li>
            <li class="list-inline-item">
               <a href="{{ route('login') }}" class="btn btn-outline-white btn-rounded">Sign up!</a>
            </li>
          </ul>
          <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a style="text-decoration: none; color: brown" href="{{ route('home') }}"> CreateIt</a>
    </div>
    <!-- Copyright -->
</footer>