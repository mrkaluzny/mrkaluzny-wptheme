@extends('layouts.app')

@section('content')
  <section class="hero hero--home">
    <div class="container">
      <div class="row flex-row">
        <div class="hero__content hero__content--home" data-aos="fade-up">
          <?php the_field('hero_text'); ?>
          <a href="#services" class="btn btn--underlined btn--large animate-link">Learn more</a>
        </div>
        <img src="@asset('images/hero-image.png')" alt="" class="hero__image hero__image--home" data-aos="fade-left">
      </div>
    </div>
  </section>

  <hr class="hr hr--left">

  <section class="section services" id="services">
    <div class="container" style="position: relative;">
      <img src="@asset('images/services-image.png')" alt="" class="services__image" data-aos="fade-right">
      <div class="row">
        <div class="col-12">
          <div class="title title--right" data-aos="fade-up">
            <h1 class="title__main title__main--large">Supporting your business with expertise<span>.</span></h1>
          </div>
        </div>
        <div class="services__feed">
          <div class="services__items" data-aos="fade-up">
            @foreach($get_services as $service)
              @include('components.service-card')
            @endforeach
          </div>
        </div>
      </div>
    </div>

  </section>

  <hr class="hr hr--right">


  <section id="testimonials" class="section section--testimonials background--up"></section>

  <hr class="hr hr--left">

  <section id="recent-projects"></section>

  @include('partials.cta')

  <section id="recent-articles"></section>

  <hr class="hr hr--right">

  <section id="contactComponent"></section>

@endsection
