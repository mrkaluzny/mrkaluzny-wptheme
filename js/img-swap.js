$(".img-swap").each(function() {
  var attr = $(this).attr('data-img');

  if (typeof attr !== typeof undefined && attr !== false) {
      $(this).css('background', 'url('+attr+')');
      $(this).css('background-size', 'cover');
      $(this).css('background-position', 'center');
  }

});
