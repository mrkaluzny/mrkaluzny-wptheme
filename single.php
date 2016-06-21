<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mrkaluzny
 */

get_header('single'); ?>

<div class="wrapper"></div>
	<div class="container">
		<div class="row justify">
			<div class="col-md-9 col-xs-12">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
		</div><!-- #main -->
	</div><!-- #primary -->

	<div class="wrapper"></div>

<?php
get_sidebar();
get_footer('default');
