<?php get_header(); ?>

<section class="hero hero--single-portfolio" style="background-color: <?php the_field('project-color'); ?>">
  <div class="container">
    <div class="single-portfolio__info">
      <h1><?php the_field('project-name'); ?></h1>
      <h2><?php the_field('project-subtitle'); ?></h2>
    </div>
    <div class="single-portfolio__screenshot">
      <?php $project_image = get_field('project-image'); ?>
      <img class="img-responsive image" src="<?php echo wp_get_attachment_image_url($project_image, 'small_background')?>" alt="<?php the_field('project-name'); ?>"/>
    </div>
  </div>
</section>

      <section class="single-portfolio__block">
        <div class="container">
          <div class="row">
            <div class="col-md-12 single-page__content">
              <h1>Project Info</h1>
              <?php the_field('project-info'); ?>
            </div>
          </div>
        </div>
      </section>

      <section class="single-portfolio__image" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
      </section>

      <section class="single-portfolio__block single-portfolio__block--small">
        <div class="container">
          <div class="row">
            <div class="col-md-12 single-page__content">
              <h1>Results</h1>
              <?php the_field('project-results'); ?>
            </div>
          </div>
        </div>
      </section>

      <section class="portfolio-single __gray">
        <div class="container">
          <div class="row text-center single-page__content">
            <h1>Technologies Used</h1>
            <div class="technology-used">
              <?php
                $technologies = get_field('technologies-used');
                for ($i = 0; $i < count($technologies); $i++ ) {
                  $class = $technologies[$i];
                  echo "<div class='technology__item technology__item--" . $class . "'></div>";
                }
              ?>
            </div>
          </div>
        </div>
      </section>

      <?php if (get_field('client-testimonial')) : ?>
      <section class="testimonials __invert">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center single-page__content">
              <h1>What Client said?</h1>
            </div>
          </div>
          <div class="row">
            <div class="owl-carousel owl-theme" id="testimonialSlider">
              <div class="item">
                <div class="testimonial">
                  <div class="content">
                    <?php the_field('client-testimonial'); ?>
                  </div>
                  <h2 class="client"><?php the_field('client-name'); ?></h2>
                  <h3 class="company"><?php the_field('client-company'); ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

<?php get_footer(); ?>
