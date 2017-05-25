<section class="portfolio __oferta">
        <div class="container">
          <div class="row title">
            <div class="col-md-12">
              <h1 class="subtitle"><?php the_field('portfolio_title'); ?> </h1>
            </div>
          </div>
          <div class="row">
            <div class="portfolio-grid">

              <?php
              $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 6,
              );
              $opinie = new WP_Query( $args );
              if( $opinie ):
                while( $opinie->have_posts() ):
                  $opinie->the_post();
              ?>

              <a href="<?php the_permalink(); ?>">
                <div class="portfolio-item">
                  <img src="<?php echo the_post_thumbnail_url('large'); ?>" alt="">
                  <div class="description">
                    <div class="content">
                      <h2><?php the_title();?></h2>
                    </div>
                  </div>
                </div>
              </a>

              <?php endwhile; endif;?>
              <?php wp_reset_query(); ?>

            </div>
          </div>
        </div>
      </section>
