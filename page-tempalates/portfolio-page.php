<?php
/**
 * Template Name: Portfolio page
 * @package mrkaluzny
 */

get_header(); ?>

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
      <div class="col-xs-1 col-sm-3 col-md-4"></div>
      <div class="col-xs-10 col-sm-6 col-md-4">
        <div id="filters" class="button-group clearfix">
          <button class="btn button is-checked" data-filter="*">All</button>
          <button class="btn button" data-filter=".branding">Branding</button>
          <button class="btn button" data-filter=".mobile">Mobile</button>
          <button class="btn button" data-filter=".web">Web</button>
          <button class="btn button last" data-filter=".design">Design</button>
        </div><!--//filters-->
      </div>
      <div class="col-xs-1 col-sm-3 col-md-4"></div>
    </div>
  </div>
</section>

<div class="wrapper"></div>

<section>
  <div class="container">
    <div class="row">
      <div class="isotope">
    <?php $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
    if ( $child_pages ) :
      foreach ( $child_pages as $pageChild ) :
        setup_postdata( $pageChild );
        $thumbnail = get_the_post_thumbnail_url($pageChild->ID);
        $tags = get_field('tags', $pageChild->ID);
        $class = get_field('class', $pageChild->ID);
        if($thumbnail == "") continue; // Skip pages without a thumbnail ?>
        <a href="<?= get_permalink($pageChild->ID) ?>">
        <div class="item <?php echo $class ?> img-swap" data-img="<?= $thumbnail ?>">
          <div class="col-xs-12 item-sub text-center">
            <h3><?= $pageChild->post_title ?></h3>
            <p class="caption"><?php echo $tags ?></p>
          </div>
        </div></a>
<?php endforeach; endif; ?>
</div>
  </div>
  </div>
</section>

<div class="wrapper"></div>

<?php get_footer(); ?>
