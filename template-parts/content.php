<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mrkaluzny
 */

?>
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
