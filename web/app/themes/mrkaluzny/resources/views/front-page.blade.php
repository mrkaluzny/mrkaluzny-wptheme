@extends('layouts.app')

@section('content')
  {{-- <section class="hero background--down">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="title title--hero">Get from idea to a bussiness.</h1>
          <h2 class="title title--sub">You might be searching through job boards to find someone for your project. Why waste your time? Work with tested, dedicated developer!</h2>
          <button class="btn btn--rounded btn--outline btn--green btn--large btn--center">Get Started</button>
        </div>
      </div>
    </div>
  </section> --}}

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


  @include('partials.help')

  <section class="section promoted-articles">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="promoted-articles__title content">
              {{ the_field('blog_text') }}
              <a class="btn" href="{{ the_field('blog_button_link') }}">{{ the_field('blog_button_text') }}</a>
            </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row blog-row">

        @foreach($recent_posts as $item)
          <div class="col-md-4">
            @include('partials.articles.recent')
          </div>
        @endforeach

      </div>
    </div>
  </section>



  <section id="contactComponent"></section>

@endsection
