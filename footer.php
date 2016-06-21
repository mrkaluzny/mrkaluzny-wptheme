<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mrkaluzny
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
    <div class="row">
      <div class="col-sm-3">
        <img class="picture" src="http://mrkaluzny.pl/assets/img/wojciech_kaluzny.jpg" alt="Wojciech Kałużny">
      </div>
    </div>
    <div class="row m-t-40">
      <div class="col-sm-3">
        <h5 class="justify"><strong>Wojciech Kałużny</strong></h5>
        <p class="justify">I'm a student of law &amp; economics. But I also code and develop websites and apps. This website shows a little bit of my work.
          <br>
          <br> Hope you'll enjoy it.
      </div>

      <div class="col-sm-3">
        <h5 class=""><strong>Get in touch</strong></h5>
				<a href="mailto:wojciech.kaluzny@me.com"> wojciech.kaluzny@me.com</a>
      </div>

      <div class="col-sm-3">
        <h5 class="font-alt m-t-0 m-b-20"><strong>Useful Links</strong></h5>
				<?php wp_nav_menu( array( 'theme_location' => 'footeruse', 'menu_class' => 'list-unstyled') ); ?>
      </div>

      <div class="col-sm-3">
        <h5 class="font-alt m-t-0 m-b-20"><strong>Social media</strong></h5>
				<?php wp_nav_menu( array( 'theme_location' => 'footersm', 'menu_class' => 'list-unstyled') ); ?>
      </div>

    </div>

  </div>
  <p class="copyright text-center">Created by <a href="http://mrkaluzny.pl">Wojciech Kałużny</a>
    <br> &copy;<?php echo date('Y'); ?> All rights reserved
  </p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://mrkaluzny.pl/cdn/img-swap/img-swap.js"></script>

<script>
(function ($) {
	$(document).ready(function(){
		$(".navbar").hide();
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 400) {
					$('.navbar').fadeIn();
				} else {
					$('.navbar').fadeOut();
				}
			});
		});
	});
}(jQuery));
</script>

<?php wp_footer(); ?>

</body>
</html>
