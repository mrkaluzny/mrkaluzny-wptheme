<?php
/**
 * Template Name: Home page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero">
  <div class="overlay"></div>
  <div class="container flex">
    <div class="row text-center">
      <h1>Profesjonalne strony internetowe</h1>
      <p>Szybko skutecznie i bajecznie. Szybko skutecznie i bajecznie. Szybko skutecznie i bajecznie. Szybko skutecznie i bajecznie. Szybko skutecznie i bajecznie.</p>
      <i class="icon ion-chevron-down"></i>
    </div>
  </div>
</section>

<section class="welcome">
  <div class="container">
    <div class="row info">
      <div class="col-md-8 col-md-offset-2 col-sm-12">
        <h1 class="title">Make your <span>startup</span> dream a reality</h1>
        <p class="content">We love to work with startups because they are as passionate as we are about their products. Whether you need a brand new app, a full website redesign or just some sprucing up of current products, we want to help and make your startup dream a reality.</p>
      </div>
    </div>
    <div class="row offer">
      <div class="col-md-6 hidden-xs hidden-sm">
        <img class="mockup" src="<?php echo get_template_directory_uri(); ?>/assets/img/mock.png" alt="">
      </div>
      <div class="col-md-6">
        <div class="col-md-12">
          <h2 class="subtitle">Strony internetowe</h2>
          <p class="content">We love to work with startups because they are as passionate as we are about their products. Whether you need a brand new app, a full website redesign or just some sprucing up of current products, we want to help and make your startup dream a reality.</p>
          <a href="#" class="btn-basic">Więcej</a>
        </div>
        <div class="col-md-12">
          <h2 class="subtitle">Aplikacje webowe</h2>
          <p class="content">We love to work with startups because they are as passionate as we are about their products. Whether you need a brand new app, a full website redesign or just some sprucing up of current products, we want to help and make your startup dream a reality.</p>
          <a href="#" class="btn-basic">Więcej</a>
        </div>
        <div class="col-md-12">
          <h2 class="subtitle">Design &amp; Marketing</h2>
          <p class="content">We love to work with startups because they are as passionate as we are about their products. Whether you need a brand new app, a full website redesign or just some sprucing up of current products, we want to help and make your startup dream a reality.</p>
          <a href="#" class="btn-basic">Więcej</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('components/testimonials'); ?>

<section class="information-section" data-img="<?php the_field('portfolio-img'); ?>">
  <div class="information img-swap" data-img="<?php the_field('portfolio-img'); ?>">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-sm-12 col-md-10 col-md-offset-1 text-center">
          <h1><?php the_field('cta-heading'); ?></h1>
          <p class="content">With over 100 successful project launches, we’ve got the experience to deliver the results you want. Our app development team is passionate about creating quality products that will bring your vision into reality.</p>
          <a class="btn-basic" href="#">Learn more</a>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="promoted-articles">
  <div class="container">
    <div class="row">
      <div class="col-md-6" id="articlesTitle">
          <div class="title">
            <h1>Read our startup tips</h1>
            <p class="content">Keep up with the latest in app development and design. Follow our blog for expert insights from our team, new technologies and the projects we’re working on.</p>
            <a class="btn-basic" href="#">Sprawdź bloga</a>
          </div>
      </div>
      <div class="col-md-6 articles" id="articles">
        <?php $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
        if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>


          <article class="excerpt">
            <?php the_title( '<h1>', '</h1>' );?>
            <p class="content"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php get_permalink(); ?>">Read more..</a>
          </article>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>



<?php get_template_part('page-tempalates/partials/contactComponent'); ?>

<?php
get_footer();
?>
