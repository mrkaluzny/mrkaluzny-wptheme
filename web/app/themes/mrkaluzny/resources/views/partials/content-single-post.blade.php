<article @php post_class() @endphp>
  @include('hero.article')

  <div class="container">
    <div class="row">
      <div class="col-12">

        <div class="blog-article">
          <div class="blog-article__content">
            @php the_content() @endphp
          </div>

          <div class="blog-article__comments">
            @php comments_template('/partials/comments.blade.php') @endphp
          </div>
        </div>

      </div>
    </div>
  </div>
</article>
