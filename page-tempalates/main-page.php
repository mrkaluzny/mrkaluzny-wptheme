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
      <?php the_field('hero_text'); ?>
      <i class="icon ion-chevron-down"></i>
    </div>
  </div>
</section>

<section class="welcome">
  <div class="container">
    <div class="row info">
      <div class="col-md-8 col-md-offset-2 col-sm-12">
        <div class="welcome__content">
          <?php the_field('services_text'); ?>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row offer">
      <div class="col-md-6 hidden-xs hidden-sm">
        <img class="mockup" src="<?php echo get_template_directory_uri(); ?>/assets/img/mock.png" alt="">
      </div>
      <div class="col-md-6">
        <div class="services-list">
          <?php get_template_part('components/services'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('components/testimonials'); ?>

<?php get_template_part('components/portfolio'); ?>

<section class="information-section" style="background-image: url('<?php the_field('portfolio-img'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-sm-12 col-md-10 col-md-offset-1 text-center">
        <h1><?php the_field('cta-heading'); ?></h1>
        <p class="content">With over 100 successful project launches, we’ve got the experience to deliver the results you want. Our app development team is passionate about creating quality products that will bring your vision into reality.</p>
        <a class="btn-basic" href="#">Learn more</a>
      </div>

    </div>
  </div>
</section>

<section class="promoted-articles">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="promoted-articles-title">
            <? the_field('blog_text'); ?>
            <a class="btn-basic" href="<?php the_field('blog_button_link');?>"><?php the_field('blog_button_text');?></a>
          </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row blog-row">

      <?php $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
      if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>

      <div class="col-md-4">
      		<div class="blog-article">
      			<div class="top-image" style="background-image: url(<?php the_post_thumbnail_url('large');?>)">
      			</div>
      			<article class="article-content">
      				<div class="entry-meta">
      					<?php the_time('F jS, Y'); ?>
      				</div><!-- .entry-meta -->
      				<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>
      				<div class="entry-excerpt">
      					<?php the_excerpt();?>
      				</div>
      			</article>
      		</div>
      </div>
      <?php endwhile; endif; ?>

    </div>
  </div>
</section>



<?php get_template_part('page-tempalates/partials/contactComponent'); ?>

<?php
get_footer();
?>
