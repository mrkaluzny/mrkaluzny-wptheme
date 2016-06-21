<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mrkaluzny
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#292F36">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<?php wp_head(); ?>
</head>

<body>
	<?php if (has_post_thumbnail() ): ?>
<section class="hero-def img-swap" data-img="<?php the_post_thumbnail_url(); ?>">
<?php endif; ?>
  <nav class="navbar navbar-mr navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="mr">MR<span class="kaluzny">KALUZNY</span></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav') ); ?>
      </div>
    </div>
  </nav>

  <div class="wrapper"></div>
  <div class="container">
    <div class="row">
        <h2 class="text-center white" id="subtitle"><?php wp_title(); ?></h2>
    </div>
    <div class="wrapper"></div>
  </div>
</section>