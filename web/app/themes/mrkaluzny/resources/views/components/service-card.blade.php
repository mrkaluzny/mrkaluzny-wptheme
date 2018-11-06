<div class="service">
  <div class="service__inner">
    <h2 class="service__tagline">{{ get_field('tagline', $service->ID)}}</h2>
    <h1 class="service__name">{{$service->post_title}}</h1>
    <div class="service__excerpt">
      {{ get_field('short_description', $service->ID)}}
    </div>
    <a href="{{ get_permalink($service->ID) }}" class="btn btn--standard">Learn more</a>
  </div>
</div>
