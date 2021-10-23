<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/') }}"><span>Talk is cheap.</span>Show me the code.</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url('/') }}">Home</a></li>

          <li class="drop-down"><a href="{{ route('about-page') }}">About</a>
            <ul>
              <li><a href="{{ route('about-page') }}">About Us</a></li>
            </ul>
          </li>

          <li><a href="{{ route('service-page') }}">Services</a></li>
          <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
          <li><a href="https://blog.kamalhossen.com/" target="_blank">Blog</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a target="_blank" href="https://twitter.com/kamal06062193" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a target="_blank" href="https://www.facebook.com/kamalh.web" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a target="_blank" href="https://www.instagram.com/flkamal2016/" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a target="_blank" href="https://www.linkedin.com/in/kamal-hossen-aa81ab11a/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>

    </div>
  </header><!-- End Header -->