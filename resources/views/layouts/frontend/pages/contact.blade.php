@extends('layouts.frontend.master')
@section('front_content')
    

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->



    <!-- ======= Contact Section ======= -->
    <div class="map-section">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7496149.95373021!2d85.84621250756469!3d23.452185887261447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2z4Kas4Ka-4KaC4Kay4Ka-4Kam4KeH4Ka2!5e0!3m2!1sbn!2sbd!4v1634973774160!5m2!1sbn!2sbd" frameborder="0" allowfullscreen></iframe>
    </div>

    <div style="text-align: center">  
      @if(session('success'))
      <strong style="color: red">{{ session('success') }}</strong>
      @endif
    </div>
    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>{{ $contacts->address }}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{ $contacts->email }}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>{{ $contacts->phone }}</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form action="{{ route('store-contact-form') }}" method="post">
              @csrf 
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" placeholder="Your name"/>
                  @error('name')
                    <strong style="color: red">{{ $message }}</strong>
                  @enderror
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" />
                  @error('email')
                    <strong style="color:red">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                @error('subject')
                  <strong style="color:red">{{ $message }}</strong>
                @enderror
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                @error('message')
                  <strong style="color:red">{{ $message }}</strong>
                @enderror
              </div>
              <div class="text-center">
              <button type="submit" class="btn btn-success">Send Message</button>
            </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


  
@endsection

