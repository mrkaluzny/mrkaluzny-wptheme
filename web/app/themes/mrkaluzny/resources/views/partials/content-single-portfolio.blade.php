@php
  $terms = get_the_terms(get_the_ID(), 'project_type');
  $content = get_field('content');
  $testimonial = get_field('testimonial');
@endphp

@include('hero.portfolio')

@if($content)
  <section class="section portfolio-content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="portfolio-content__inner">
            {!! $content !!}
          </div>
        </div>
      </div>
    </div>
  </section>
@endif


@if($testimonial)
  @include('partials.testimonial')
@endif
