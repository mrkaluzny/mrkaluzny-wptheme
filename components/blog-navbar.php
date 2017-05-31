<nav class="navbar-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">

				<!-- TODO: Add Search form -->
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
