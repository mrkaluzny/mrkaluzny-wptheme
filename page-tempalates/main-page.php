<?php
/**
 * Template Name: Home page
 * @package mrkaluzny
 */

get_header('main'); ?>

<div class="wrapper"></div>

<section class="welcome" id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="text-center mar-side-50">In constant search for new challanges.</h2>
      </div>
    </div>
    <div class="wrapper"></div>
    <div class="row">
      <div class="col-md-6 pad-side-50">
        <p class="justify"><strong>Who Am I?</strong>
          <br>Currently I'm studing Law and Economics at Poznan University Of Economics and work with company called <a href="http://blueowl.pl">Blue Owl</a>. Recently I decided to start programming as both as hobby and probable future job. This website is
          meant for presenting and documenting my work and progress.</p>
      </div>
      <div class="col-md-6 pad-side-50">
        <p class="justify"><strong>Why I do what I do?</strong>
          <br> Building things always made me wonder. Thanks to programming I'm able to develop ideas using only my imagination and a computer. This idea is both liberating and mesmerizing, which happend to be the things I look for in my life.</p>
          <p>Today I help people execute their ideas in a way which they customers will truly love and appreciate. Knowing that my work makes life of few hundred people a day easier by providing them with is the most rewarding feeling in the world.</p>
      </div>
    </div>
  </div>
</section>

<div class="wrapper"></div>

<seciton id="portfolio-cta" class="img-swap" data-img="<?php the_field('portfolio-img'); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      </div>
    </div>
  </div>
</section>



<section id="blog-query">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="text-center mar-side-50">Newest Articles</h2>
        <h4 class="text-center mar-side-50">Take a look at some of my latest articles. Still hot!</h4>
      </div>
    </div>
    <div class="wrapper"></div>
    <div class="row">
      <?php $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
      if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>
        <div class="col-md-4 blog-post">
          <?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-responsive"));
                the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
          <p class="article-small">
            <?php mrkaluzny_posted_on(); ?>
          </p>
          <?php
      			the_content( sprintf(
      				/* translators: %s: Name of current post. */
      				wp_kses( __( '<div class="btn button">Continue reading <span class="meta-nav">&rarr;</span></div>', 'mrkaluzny' ), array( 'span' => array( 'class' => array() ) ) ),
      				the_title( '<span class="screen-reader-text">"', '"</span>', false )
      			) );

      			wp_link_pages( array(
      				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mrkaluzny' ),
      				'after'  => '</div>',
      			) );
      		?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>

<?php
get_footer();
?>
