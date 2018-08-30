<a href="{{ get_permalink($item->ID) }}" class="article__link">
  <article class="article article--recent">
    {!! get_the_post_thumbnail($item->ID, 'medium', array(
      'class' => 'article__image'
    )) !!}
    <h1 class="article__title article__title--recent">{{ $item->post_title }}</h1>
    <div class="article__excerpt">
      {{ wp_trim_words($item->post_content, 45, '...') }}
    </div>
  </article>
</a>
