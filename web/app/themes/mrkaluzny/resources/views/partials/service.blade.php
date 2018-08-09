<article class="service">
  <h1 class="service__name">{{ $service->post_title }}</h1>
  <h2 class="service__tagline">{{ get_field('tagline', $service->ID)}}</h2>
  <div class="service__excerpt">
    {{ get_field('short_description', $service->ID)}}
  </div>
  <a href="{{ get_permalink($service->ID) }}" class="btn btn--green btn--rounded btn--small">See how I can help</a>
</article>
