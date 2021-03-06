<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero--single-article hero--overlay" style="background-image: url('<?php the_post_thumbnail_url('cover-img');?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="article__meta">
					<div class="meta__categories">
						<?php
						$categories = get_the_category();
						$separator = ' ';
						$output = '';
						if ( ! empty( $categories ) ) {
							foreach( $categories as $category ) {
								$output .= '<a class="category-item" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
							}
							echo trim( $output, $separator );
						} ?>
					</div>
					<h1 class="meta__article-title"><?php the_title();?></h1>
					<div class="meta__author">
						<?php
							$author_id = get_the_author_meta( 'ID' );
							$avatar_url = get_avatar_url($author_id);
						?>

						<div class="author__photo" style="background-image: url('<?php echo $avatar_url; ?>')"></div>
						<h3 class="author__info"><?php echo the_time('j F, Y');?> - by <a class="author__link" href="<?php echo get_author_posts_url( $author_id ); ?>"><?php the_author();?></a></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
		while ( have_posts() ) : the_post();?>
		<section class="single-post">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<?php get_template_part('views/modules/share'); ?>
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'zmienzdanie' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zmienzdanie' ),
							'after'  => '</div>',
						) );
					?>
					<?php get_template_part('views/modules/share'); ?>
					<hr />
					<div class="tags">
						<?php $posttags = get_the_tags();
									$separator = ' ';
									$output = '';
									if ($posttags) {
										foreach($posttags as $tag) {
											$output .= '<a href="' . esc_url( get_category_link( $tag->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $tag->name ) ) . '">' . esc_html( $tag->name ) . '</a>' . $separator;
										}
										echo trim( $output, $separator );
									}
						?>
					</div>
				</div><!-- .entry-content -->

				<footer class="entry-footer">

				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->
		</section>

		<div class="post-navigation">
			<?php
				$prevPost = get_previous_post();
				$nextPost = get_next_post();

				$class = $nextPost ? ($prevPost ? 'multiple' : 'single') : 'single';

				if($nextPost): ?>
					<?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'large' );?>
					<a href="<?php echo get_post_permalink($nextPost->ID); ?>">
						<div class="nav-box next <?php echo $class; ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($nextPost->ID, 'large'); ?>);">
							<div class="overlay"></div>
							<h3 class="post-navigation-title"><?php echo $nextPost->post_title ?></h3>
						</div>
					</a>
				<?php endif; ?>

			 	<?php if($prevPost):
				$prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'large' );?>

				<a href="<?php echo get_post_permalink($prevPost->ID); ?>">
					<div class="nav-box previous <?php echo $class; ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($prevPost->ID, 'large'); ?>);">
						<div class="overlay"></div>
						<h3 class="post-navigation-title"><?php echo $prevPost->post_title ?></h3>
						<?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'large' );?>
					</div>
				</a>
			<?php endif; ?>

		</div>

		<div class="post-signup">
			<?php get_template_part('page-tempalates/partials/newsletterComponent'); ?>
		</div>

		<?php	endwhile; // End of the loop.?>
<?php
get_footer();
