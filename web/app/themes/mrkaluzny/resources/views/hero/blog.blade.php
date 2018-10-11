<section class="hero hero--blog" style="background-image: url('{{ App::get_image_by_id(get_field('image', get_option('page_for_posts')), 'large') }}')">
  <div class="container">
    <div class="row">
      <div class="hero__content hero__content--blog" data-aos="fade-up">
        {!! get_field('hero_text', get_option('page_for_posts')) !!}
      </div>
    </div>
  </div>
</section>
