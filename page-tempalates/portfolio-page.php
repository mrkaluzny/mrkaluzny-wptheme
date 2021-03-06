<?php
/**
 * Template Name: Portfolio page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero hero--medium hero--overlay" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
  <div class="container flex">
    <div class="row text-center hero__content hero__content--home">
      <?php the_field('hero_text');?>
      <?php the_content(); ?>
    </div>
  </div>
</section>

<section class="portfolio-section ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="portfolio-list">
          <?php get_template_part('components/portfolio'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
