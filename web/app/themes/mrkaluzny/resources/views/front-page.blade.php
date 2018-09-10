@extends('layouts.app')

@section('content')
  <section class="hero hero--overlay" style="background-image: url(' {{ the_post_thumbnail_url('full') }} ')">
    <div class="container">
      <div class="row">
        <div class="hero__content">
          <?php the_field('hero_text'); ?>
          <a href="#services" class="btn btn--rounded btn--green-f btn--large animate-link">Learn More</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="title">
            <h2 class="title__top">Services</h2>
            <h1 class="title__main">Let's make the web a better place</h1>
            <p class="title__content">With clean HTML, well-organized CSS and optimised JS your site is bound to fly! Always beautifully responsive and working on all devices. Thanks to cutting-edge frameworks, your project will reflect modern needs.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="services__feed">
      <div class="container" style="position:relative;">
        <img src="{{ get_template_directory_uri() . '/assets/images/mockup-steen.png'}}" alt="" class="services-desktop animated fadeInRight">
        <div class="services__items animated fadeInUp">
          @foreach($get_services as $service)
            @include('components.service-card')
          @endforeach
        </div>
      </div>
    </div>

  </section>


  <section id="testimonials"></section>

  <section id="recent-projects"></section>


  @include('partials.help')

  <section id="recent-articles"></section>

  <section id="contactComponent"></section>

@endsection
