@extends('layouts.frontend.master')
@section('front_content')

@php 
    $abouts = DB::table('abouts')->first();
@endphp

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h2>About</h2>
        <ol>
            <li><a href="index.html">Home</a></li>
            <li>About</li>
        </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

 <!-- ======= About Us Section ======= -->
 <section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

      <div class="row content">
        <div class="col-lg-6" data-aos="fade-right">
          <h2>{{ $abouts->title }}</h2>
          <h3>{{ $abouts->short_des }}</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
          <p>
            {{ $abouts->long_des }}
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

@endsection