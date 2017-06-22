<?php
/**
 * Template Name: Home page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero hero--home hero--overlay-home" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>')">
  <div class="container">
    <div class="row">
      <div class="hero__content">
        <?php the_field('hero_text'); ?>
        <a href="#services" class="btn-basic btn-basic--white animate-link">Learn More</a>
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
      </div>
    </div>
  </div>
</section>

<section class="services" id="services">

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-sm-12">
        <div class="services__content content">
          <?php the_field('services_text'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="services-list">
      <?php get_template_part('components/services'); ?>
    </div>
  </div>

</section>

<section class="information-section" style="background-image: url('<?php the_field('portfolio-img'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-sm-12 col-md-10 col-md-offset-1 text-center content">
        <h1><?php the_field('cta-heading'); ?></h1>
        <p>With over 100 successful project launches, we’ve got the experience to deliver the results you want. Our app development team is passionate about creating quality products that will bring your vision into reality.</p>
        <a class="btn-basic" href="#">Learn more</a>
      </div>

    </div>
  </div>
</section>

<section class="portfolio-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="portfolio-list">
          <?php get_template_part('components/portfolio'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('components/testimonials'); ?>

<section class="promoted-articles">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="promoted-articles__title content">
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
      		<div class="blog-article blog-article--home">
      			<?php echo get_the_post_thumbnail($post, 'large', array(
              'class' => 'blog-article__image blog-article__image--home'
            )); ?>
      			<article class="article-content article-content--home">
      				<?php the_title( '<h1 class="blog-article__title blog-article__title--home"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>
      				<div class="blog-article__content blog-article__content--home">
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
