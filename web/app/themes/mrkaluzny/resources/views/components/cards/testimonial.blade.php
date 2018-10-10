<article class="card card--testimonial">
  <img src="{{ App::get_image_by_id(get_field('image', $testimonial->ID)) }}" alt="{{ $testimonial->post_title }}" class="card__image card__image--testimonial"/>
  <h1 class="card__name">{{ $testimonial->post_title }}</h1>
  <h2 class="card__position">{{ get_field('position', $testimonial->ID) }} at {{get_field('company', $testimonial->ID)}}</h2>
  <div class="card__content">{!! $testimonial->post_content !!}</div>
</article>
