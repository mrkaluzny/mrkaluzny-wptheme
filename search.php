<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero hero--small hero--overlay"  style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
	<div class="hero__content hero__content--home">
		<h1><?php printf( esc_html__( 'Search Results for: %s', 'mrkaluzny' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</div>
</section>

<nav class="navbar-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<ul class="categories-menu">
				<?php
				$categories = get_categories();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<li><a class="category" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a> </li>' . $separator;
					}
					echo trim( $output, $separator );
				} ?>
				</ul>
			</div>
		</div>
	</div>
</nav>

<section class="module blog-main-module">
	<div class="container">
			<div class="col-md-12">
				<?php
				if ( have_posts() ) :

					$count = 0;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						if ($count == 0) {
							echo "<div class='row blog-row'>";
						}
						get_template_part( 'template-parts/content', get_post_format() );

						if ($count == 2) {
							echo "</div>";
							$count = 0;
						} else {
							$count++;
						}

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
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
