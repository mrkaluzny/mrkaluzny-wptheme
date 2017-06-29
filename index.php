<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mrkaluzny
 */

get_header(); ?>
<?php
	$stickies = get_option( 'sticky_posts' );
	$args = [
			'post_type'           => 'post',
			'post__in'            => $stickies,
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => 1
	];

 if ( $stickies ) : ?>
 <section class="hero hero--blog">
	 <div class="owl-carousel owl-theme blog-slider" id="blogSlider">
		<?php
 	 	$sticky_posts = new WP_Query($args);
 	 	if ( $sticky_posts->have_posts() ) :
 		 	while ( $sticky_posts->have_posts() ) :
 							 $sticky_posts->the_post(); ?>

 		<div class="item">
			<div class="promoted-article">
				<div class="promoted-article__image hero--overlay" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')"></div>
				<div class="promoted-article__title">
					<?php the_title(); ?>
				</div>
				<div class="promoted-article__description">
					<?php the_excerpt(); ?>
				</div>
				<div class="promoted-article__button">
					<a href="<?php the_permalink(); ?>" class="btn-basic">Read More</a>
				</div>
			</div>
		</div>

 		<?php endwhile; endif; else : ?>
	</div>
<section class="hero hero--blog hero--overlay" data-background="<?php the_post_thumbnail_url('cover-img');?>">
		<h1 class="hero__title">POZNAJ NOWĄ STRONĘ TEKSTU</h1>
	<?php endif; ?>
</section>



<section class="module blog-main-module">
	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="articles-list">

						<?php get_template_part('page-tempalates/partials/newsletterComponent'); ?>

						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );
							endwhile;

						else :
							get_template_part( 'template-parts/content', 'none' );
						endif; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( 'Poprzednie', 'textdomain' ),
						'next_text' => __( 'Następne', 'textdomain' ),
						) ); ?>
				</div>
			</div>
		</div>

</section>


<?php
get_footer();
?>
