

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
