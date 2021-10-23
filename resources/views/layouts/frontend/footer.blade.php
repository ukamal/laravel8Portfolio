@php
  $contacts = DB::table('contacts')->first();    
@endphp

<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Company</h3>
            <p>
              {{ $contacts->address }}<br><br>
              <strong>Phone:</strong> {{ $contacts->phone }}<br>
              <strong>Email:</strong> {{ $contacts->email }}<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Need a Laravel expert for your website? Subscribe now.</p>
            @if(session('success'))
              <strong style="color: red">{{ session('success') }}</strong>
            @endif
            <form action="{{ route('subscribe') }}" method="post">
              @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>kamal</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a target="_blank" href="https://twitter.com/kamal06062193" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a target="_blank" href="https://www.facebook.com/kamalh.web" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a target="_blank" href="https://www.instagram.com/flkamal2016/" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a target="_blank" href="kamalhossain147" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a target="_blank" href="https://www.linkedin.com/in/kamal-hossen-aa81ab11a/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>