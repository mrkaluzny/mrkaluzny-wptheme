<?php
/**
 * Template Name: Portfolio Single Item
 * @package mrkaluzny
 */

get_header('portfolio'); ?>
<div class="wrapper"></div>
<section class="welcome" id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="text-center mar-side-50">Project Description</h2>
      </div>
    </div>
    <div class="wrapper"></div>
    <div class="row">
      <div class="col-md-6 pad-side-50">
        <p class="justify"><strong>The Project</strong>
            <br><?php the_field('project'); ?></p>
      </div>
      <div class="col-md-6 pad-side-50">
        <p class="justify"><strong>The Result</strong>
            <br><?php the_field('description'); ?></p>
      </div>
    </div>
  </div>
</section>

<div class="wrapper"></div>
<div class="container">
    <img class="img-responsive" src="<?php the_field('image'); ?>">
</div>


<?php get_footer();?>
