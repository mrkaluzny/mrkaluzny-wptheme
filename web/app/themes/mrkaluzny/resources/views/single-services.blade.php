@extends('layouts.app')

@section('content')
  <section class="hero hero--home">
    <div class="container">
      <div class="row flex-row">
        <div class="hero__content hero__content--home" data-aos="fade-up">
          <?php the_field('hero_text'); ?>
          <a href="#services" class="btn btn--underlined btn--large animate-link">Learn more</a>
        </div>
        <img src="@asset('images/services-image.png')" alt="" class="hero__image hero__image--home" data-aos="fade-right">
      </div>
    </div>
  </section>

  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile

  <section id="testimonials" class="section section--testimonials background--up"></section>
  <section id="recent-projects"></section>

  @include('partials.cta')
@endsection
