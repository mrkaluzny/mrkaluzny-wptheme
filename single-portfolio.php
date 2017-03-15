<?php get_header(); ?>

<section class="hero __portfolio" style="background-color: <?php the_field('project-color'); ?>">
        <div class="container">
          <div class="row text-center">
            <h1 style="text-align:center;"><?php the_field('project-name'); ?></h1>
            <h2><?php the_field('project-subtitle'); ?></h2>
          </div>
        </div>
        <div class="image-container">
          <img class="img-responsive image" src="<?php the_field('project-image');?>" alt="<?php the_field('project-name'); ?>"/>
        </div>
      </section>

      <section class="portfolio-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="subtitle">Project Info</h1>
              <div class="content">
                <?php the_field('project-info'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="img-portfolio" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
      </section>

      <section class="portfolio-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="subtitle">Results</h1>
              <div class="content">
                <?php the_field('project-results'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="portfolio-single __gray">
        <div class="container">
          <div class="row text-center">
            <h1 class="subtitle">Technologies Used</h1>
            <ul class="technology-used">
              <?php
                $technologies = get_field('technologies-used');
                for ($i = 0; $i < count($technologies); $i++ ) {
                  $class = $technologies[$i];
                  echo "<li class=" . $class . "></li>";
                }
              ?>
            </ul>
          </div>
        </div>
      </section>

      <section class="testimonials __invert">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1 class="subtitle">What Client says?</h1>
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

<?php get_footer(); ?>
