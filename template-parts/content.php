<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mrkaluzny
 */

?>

<article class="blog-article">
	<div class="blog-article__image" style="background-image: url(<?php the_post_thumbnail_url('large');?>)"></div>
	<a href="<?php echo get_permalink(); ?>">
	<div class="blog-article__content">
		<div class="meta__categories meta__categories--all">
			<?php get_template_part('components/categories'); ?>
		</div>
		<?php the_title( '<h1 class="blog-article__title"><a class="blog-article__link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>
		<div class="blog-article__excerpt">
			<?php the_excerpt();?>
		</div>
	</div>
	</a>
</article>
