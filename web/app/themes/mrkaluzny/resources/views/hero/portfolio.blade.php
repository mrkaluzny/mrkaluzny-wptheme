<section class="hero hero--project" style="background-color: {{ get_field('project-color') }}">
  <div class="container">
    <div class="row">
      <div class="hero__content hero__content--project" data-aos="fade-up">

        @if($terms)
          <div class="hero__categories">
            @foreach($terms as $term)
              <span>{{ $term->name}}</span>
            @endforeach
          </div>
        @endif

        <h1>{{ the_title() }}</h1>
        <p>{{ get_field('excerpt') }}</p>
      </div>
      <div class="hero__screenshot">
        <img src="{{ App::get_image_by_id(get_field('project-image')) }}" alt="">
      </div>
    </div>
  </div>
</section>
