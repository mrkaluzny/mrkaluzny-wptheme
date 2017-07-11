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

<footer class="footer">
	<div class="container">
		<div class="row m-t-40">
			<div class="col-sm-4 col-xs-12">
				<h1 class="footer__brand">mrkaluzny</h5>
				<p class="footer__about">
					Hi, I’m Wojciech Kałużny! This website was created to present my work both as a web developer and a designer. <br><br>Check out my previous projects and let’s create something together!
			</div>

			<div class="col-sm-2"></div>

			<div class="col-sm-2 col-xs-6">
				<h2 class="footer__menu-title"><strong>Menu</strong></h5>
				<div class="footer__menu-container">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'list-unstyled') ); ?>
				</div>
			</div>

			<div class="col-sm-2 col-xs-6">
				<h2 class="footer__menu-title"><strong>Useful Links</strong></h5>
				<div class="footer__menu-container">
					<?php wp_nav_menu( array( 'theme_location' => 'footeruse', 'menu_class' => 'list-unstyled') ); ?>
				</div>
			</div>

			<div class="col-sm-2 col-xs-6">
				<h2 class="footer__menu-title"><strong>Social media</strong></h5>
				<div class="footer__menu-container">
					<?php wp_nav_menu( array( 'theme_location' => 'footersm', 'menu_class' => 'list-unstyled') ); ?>
				</div>
			</div>

		</div>

	</div>
	<p class="footer__copyrights text-center">
		 &copy; 2015-<?php echo Date('Y');?> Wojciech Kałużny All Rights Reserved.
	</p>
</footer>
<?php wp_footer(); ?>

</body>
</html>
