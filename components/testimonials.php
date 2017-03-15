<section class="testimonials">
  <div class="container">
    <div class="row">
      <div class="owl-carousel owl-theme" id="testimonialSlider">

        <?php
        $args = array(
          'post_type' => 'opinie',
          'posts_per_page' => 9,
        );
        $opinie = new WP_Query( $args );
        if( $opinie ):
          while( $opinie->have_posts() ):
            $opinie->the_post();
        ?>

        <div class="item">
          <div class="testimonial">
            <h2 class="client"><?php the_title();?></h2>
            <h3 class="company"><?php the_field('company'); ?></h3>
            <div class="content">
              <?php the_content();?>
            </div>
          </div>
        </div>

        <?php endwhile; endif;?>
        <?php wp_reset_query(); ?>

      </div>
    </div>
  </div>
</section>
