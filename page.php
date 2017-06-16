<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mrkaluzny
 */

get_header('default'); ?>

<section class="hero hero--small hero--overlay" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-md-12 hero__content hero__content--home">
        <?php the_field('hero_text'); ?>
      </div>
    </div>
  </div>
</section>

<section class="single-page">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 single-page__content">
        <?php while( have_posts() ) {
          the_post();

          the_content();
        } ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
