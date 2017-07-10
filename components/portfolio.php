<?php
$args = array(
  'post_type' => 'portfolio',
  'posts_per_page' => 6,
);
$opinie = new WP_Query( $args );
if( $opinie ):
  while( $opinie->have_posts() ):
    $opinie->the_post();
    $image = get_the_post_thumbnail_url($post, 'portfolio_image_small');
?>

<div class="portfolio-item" style="background-image: url('<?php echo $image; ?>')">
  <a href="<?php the_permalink(); ?>">
    <figure class="portfolio-item__figure">
      <figcaption class="portfolio-item__description">
        <h2 class="portfolio-item__description__name"><?php the_field('project-name');?></h2>
        <p class="portfolio-item__description__short"><?php the_field('project-subtitle');?></p>
      </figcaption>
    </figure>
  </a>
</div>

<?php endwhile; endif;?>
<?php wp_reset_query(); ?>
