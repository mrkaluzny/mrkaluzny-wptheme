<?php
$args = array(
  'post_type' => 'services',
  'posts_per_page' => 99999,
);
$services = new WP_Query( $args );
if( $services ):
  while( $services->have_posts() ):
    $services->the_post();
?>

<div class="service-item">
  <div class="service-item__name"><?php the_title();?></div>
  <div class="service-item__description">
    <?php the_content(); ?>
  </div>
</div>

<?php endwhile; endif;?>
<?php wp_reset_query(); ?>
