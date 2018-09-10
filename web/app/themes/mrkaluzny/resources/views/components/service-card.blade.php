<div class="service">
  <div class="service__inner">
    <div class="service__name">{{$service->post_title}}</div>
    <div class="service__tagline">{{ get_field('tagline', $service->ID)}}</div>
    <div class="service__excerpt">
      {{ get_field('short_description', $service->ID)}}
    </div>
    <a href="{{ get_permalink($service->ID) }}" class="btn btn--green btn--rounded btn--small">See how I can help</a>
  </div>
</div>
