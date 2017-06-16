<?php
/**
 * Template Name: Contact page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero hero--medium hero--overlay" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-md-12 hero__content hero__content--home">
        <?php the_field('hero_text');?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('page-tempalates/partials/contactComponent'); ?>

<?php get_footer(); ?>
