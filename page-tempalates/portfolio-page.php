<?php
/**
 * Template Name: Portfolio page
 * @package mrkaluzny
 */

get_header('default'); ?>

<div class="wrapper"></div>
<section>
  <div class="row">
    <div class="col-xs-12">
      <h2 class="text-center mar-side-50"><?php the_field('short') ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 ">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>

<div class="wrapper"></div>

<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-12 col-sm-6 mar-side-50">
        <div id="filters" class="button-group mar-side-50 clearfix">
          <button class="btn button is-checked" data-filter="*">All</button>
          <button class="btn button" data-filter=".branding">Branding</button>
          <button class="btn button" data-filter=".mobile">Mobile</button>
          <button class="btn button" data-filter=".web">Web</button>
          <button class="btn button last" data-filter=".design">Design</button>
        </div><!--//filters-->
      </div>
      <div class="col-xs-3"></div>
    </div>
  </div>
</section>

<div class="wrapper"></div>

<section>
  <div class="container">
    <div class="col-md-12">
      <div class="portfolio-items items-wrapper isotope">
    <?php $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
    if ( $child_pages ) :
      foreach ( $child_pages as $pageChild ) :
        setup_postdata( $pageChild );
        $thumbnail = get_the_post_thumbnail_url($pageChild->ID);
        $tags = get_field('tags', $pageChild->ID);
        $class = get_field('class', $pageChild->ID);
        if($thumbnail == "") continue; // Skip pages without a thumbnail ?>
        <div class="item <?php echo $class ?>">
        <figure class="col-md-4 col-sm-6 portfolio-item">
          <a href="<?= get_permalink($pageChild->ID) ?>"><img class="img-responsive" src="<?= $thumbnail ?>">
            <figcaption>
              <h3><?= $pageChild->post_title ?></h3>
              <p class="caption"><?php echo $tags ?></p>
            </figcaption>
          </figure></a>
        </div>
<?php endforeach; endif; ?>
    </div></div>
  </div>
</section>

<?php get_footer('default'); ?>
