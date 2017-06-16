<?php
/**
 * Template Name: About page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero hero--medium hero--overlay" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-md-12 hero__content hero__content--home">
        <?php the_field('hero_text'); ?>
      </div>
    </div>
  </div>
</section>

<section class="page-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php while( have_posts() ) {
          the_post();

          the_content();
        } ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
