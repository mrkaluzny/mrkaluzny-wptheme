$(document).ready(function() {
  $("#testimonialSlider").owlCarousel({
    autoPlay: 3000,
    singleItem: true
  });

  $('#blogSlider').owlCarousel({
    singleItem: true
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
      $('.navbar').addClass('scrolling');
    } else {
      $('.navbar').removeClass('scrolling');
    }
  });
});


$(document).on('click', '.animate-link', function(e){
  e.preventDefault();
  var animateTo = $(this).attr('href');
  $("html, body").animate({ scrollTop: $(animateTo).offset().top }, 1000);
});
