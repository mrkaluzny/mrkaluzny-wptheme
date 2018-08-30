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

  <section id="testimonials"></section>

  <section class="section services" id="services">

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="services__content">
            {{ the_field('services_text') }}
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="services-list">
        @foreach($get_services as $service)
          @include('components.service-card')
        @endforeach
      </div>
    </div>

  </section>

  <section id="recent-projects"></section>


  @include('partials.help')

  <section id="recent-articles"></section>

  <section id="contactComponent"></section>

@endsection
