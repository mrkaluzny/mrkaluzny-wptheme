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
				<h5 class="justify"><strong>Wojciech Kałużny</strong></h5>
				<p class="justify description">I'm a student of law &amp; economics. But I also code and develop websites and apps. This website shows a little bit of my work.
					<br>
					<br> Hope you'll enjoy it.
			</div>

			<div class="col-sm-2"></div>

			<div class="col-sm-2 col-xs-6">
				<h5 class=""><strong>Menu</strong></h5>
				<ul class="list-unstyled">
					<li><a href="http://blog.mrkaluzny.pl">Strona główna</a></li>
					<li><a href="http://blog.mrkaluzny.pl">Oferta</a></li>
					<li><a href="http://blog.mrkaluzny.pl">Portfolio</a></li>
					<li><a href="http://blog.mrkaluzny.pl">Blog</a></li>
					<li><a href="http://blog.mrkaluzny.pl">Kontakt</a></li>
				</ul>
			</div>

			<div class="col-sm-2 col-xs-6">
				<h5 class="font-alt m-t-0 m-b-20"><strong>Useful Links</strong></h5>
				<?php wp_nav_menu( array( 'theme_location' => 'footeruse', 'menu_class' => 'list-unstyled') ); ?>
			</div>

			<div class="col-sm-2 col-xs-6">
				<h5 class="font-alt m-t-0 m-b-20"><strong>Social media</strong></h5>
				<?php wp_nav_menu( array( 'theme_location' => 'footersm', 'menu_class' => 'list-unstyled') ); ?>
			</div>

		</div>

	</div>
	<p class="copyright text-center">Made by <a href="http://mrkaluzny.pl">Wojciech Kałużny</a>
		<br> &copy;<?php echo Date('Y');?> All rights reserved
	</p>
</footer>
<?php wp_footer(); ?>

</body>
</html>
