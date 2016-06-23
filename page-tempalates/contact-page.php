<?php
/**
 * Template Name: Contact page
 * @package mrkaluzny
 */

get_header('default'); ?>

<div class="wrapper"></div>
<section>
  <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="text-center mar-side-50"><?php the_field('short') ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
</section>

<div class="wrapper"></div>

<!-- GOOGLE MAP -->
		<div id="module-maps">
			<div id="map"></div>
		</div>
<!-- /GOOGLE MAP -->

<?php get_footer('default'); ?>
