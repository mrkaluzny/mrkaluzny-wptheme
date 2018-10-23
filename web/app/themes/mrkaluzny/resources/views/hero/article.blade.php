<section class="hero hero--article hero--overlay" style="background-image: url('{{ the_post_thumbnail_url() }}')">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="article-hero">
					<div class="article-hero__categories">
						@php
						$categories = get_the_category();
						$separator = ' ';
						$output = '';
						if ( ! empty( $categories ) ) {
							foreach( $categories as $category ) {
								$output .= '<a class="category-item" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
							}
							echo trim( $output, $separator );
						}
            @endphp
					</div>
					<h1 class="article-hero__title">{{ the_title() }}</h1>
					<div class="author">
						@php
							$author_id = get_the_author_meta( 'ID' );
							$avatar_url = get_avatar_url($author_id);
						@endphp

						<div class="author__photo" style="background-image: url('{{ $avatar_url }}')"></div>
						<div class="author__info">
              <a class="author__link" href="{{ get_author_posts_url( $author_id ) }}"> {{ get_the_author() }}</a>
              <div class="article-hero__details">
                <span class="article-hero__published">{{ the_time('j F, Y') }}</span> | <span class="article-hero__time">{{ App::get_reading_time_for_string($post->post_content)}}</span>
              </div>
            </div>
					</div>
				</div>
      </div>
    </div>
  </div>
</section>
