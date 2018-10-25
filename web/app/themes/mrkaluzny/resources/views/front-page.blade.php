@extends('layouts.app')

@section('content')
  <section class="hero hero--home">
    <div class="container">
      <div class="row hero__row">
        <div class="hero__content hero__content--home" data-aos="fade-up">
          <?php the_field('hero_text'); ?>
          <a href="#services" class="btn btn--underlined btn--large animate-link">Learn more</a>
        </div>
        <img src="@asset('images/hero-image.png')" alt="" class="hero__image hero__image--home" data-aos="fade-left">
      </div>
    </div>
  </section>

  <section class="section services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="title" data-aos="fade-up">
            <h2 class="title__top">Services</h2>
            <h1 class="title__main">Let's make the web a better place</h1>
            <p class="title__content">With clean HTML, well-organized CSS and optimised JS your site is bound to fly! Always beautifully responsive and working on all devices. Thanks to cutting-edge frameworks, your project will reflect modern needs.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="services__feed">
      <div class="container" style="position:relative;">
        <img src="{{ get_template_directory_uri() . '/assets/images/mockup-steen.png'}}" alt="" class="services-desktop" data-aos="fade-left">
        <div class="services__items" data-aos="fade-up">
          @foreach($get_services as $service)
            @include('components.service-card')
          @endforeach
        </div>
      </div>
    </div>

  </section>


  <section id="testimonials" class="section section--testimonials background--up"></section>

  <section id="recent-projects"></section>


  @include('partials.help')

  <section id="recent-articles"></section>

  <section id="contactComponent"></section>

@endsection
