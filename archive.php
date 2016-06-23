<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mrkaluzny
 */

get_header(); ?>

<div class="wrapper"></div>
	<div class="container">
		<div class="row">
		<?php
		if ( have_posts() ) : ?>

			<div class="col-xs-12">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</div><!-- .page-header -->
		</div>

			<div class="row">
				<div class="col-md-9 col-sm-12">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</div>
	<div class="col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</div>
	</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('default');
