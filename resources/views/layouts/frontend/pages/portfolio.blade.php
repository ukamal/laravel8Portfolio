@extends('layouts.frontend.master')
@section('front_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h2>Portolio</h2>
        <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portolio</li>
        </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
            </div>
          </div>
  
          <div class="row portfolio-container" data-aos="fade-up">
            
            @foreach ($multiimg as $multi)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="{{ asset($multi->image) }}" class="img-fluid" alt="img" width="100%">
              <div class="portfolio-info">
                <h4>Laravel</h4>
                <p>MySql</p>
                <a href="{{ asset($multi->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1">
                  <i class="bx bx-plus"></i>
                </a>
                <a target="_blank" href="http://kamalhossen.com/cv" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->


@endsection