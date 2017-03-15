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

      <section class="img-portfolio">
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
            <h1 class="subtitle">Wykorzystana technologia</h1>
            <ul class="technology-used">
              <li><img class="img-responsive" src="https://www.w3.org/html/logo/downloads/HTML5_Logo_512.png" /></li>
              <li><img class="img-responsive" src="https://ohdoylerules.com/content/images/css3.svg" /></li>
              <li><img class="img-responsive" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Boostrap_logo.svg/2000px-Boostrap_logo.svg.png" /></li>
              <li><img class="img-responsive" src="https://s.w.org/about/images/logos/wordpress-logo-notext-rgb.png" /></li>
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
                  <h2 class="client"><?php the_field('client-name'); ?></h2>
                  <h3 class="company"><?php the_field('client-company'); ?></h3>
                  <div class="content">
                    <?php the_field('client-testimonial'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php get_footer(); ?>
