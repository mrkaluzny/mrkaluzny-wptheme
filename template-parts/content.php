<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mrkaluzny
 */

?>
	<div class="col-xs-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="article-title">', '</h1>' );
			} else {
				the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<p class="article-small">
			<?php mrkaluzny_posted_on(); ?>
		</p<!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->


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
	<div class="wrapper"></div>
</article><!-- #post-## -->
