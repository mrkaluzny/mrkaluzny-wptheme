(function ($) {
  $(document).ready(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 10) {
				$('.navbar').addClass('scrolling');
			} else {
				$('.navbar').removeClass('scrolling');
			}
		});
});
  }(jQuery));

  $(document).ready(function() {
              $("#testimonialSlider").owlCarousel({
                autoPlay: 3000,
                singleItem: true
              });
            });