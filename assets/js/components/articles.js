$(document).on('click', '.blog-article', function() {
  window.open($(this).find('.blog-article__link').attr('href'), '_self');
})
