<?php
/**
 * Template Name: Portfolio page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero __small">
  <div class="container flex">
    <div class="row text-center">
      <?php the_field('hero_text');?>
    </div>
  </div>
</section>

<section class="portfolio-single __gray">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>


<?php get_template_part('components/portfolio', 'archive'); ?>

<?php get_footer(); ?>
