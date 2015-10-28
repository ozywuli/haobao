<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage haobao
 * @since haobao 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<!-- navbar -->
<nav class="navbar clearfix">


	<div class="navbar__brand">
	<?php
		if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</h1>
		<?php else : ?>
			<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</p>
		<?php endif;
	?>
	</div>
 
	<div class="navbar__menu">
		<a href="#" class="menu-toggle">
			<span class="visuallyhidden">menu toggle</span>
			  @@include('partials/icons/menu.html')
		</a>
		<ul class="sm-links">
			<li>
				<a href="#">
					<span class="visuallyhidden">Twitter icon</span>
					 @@include('partials/icons/twitter.html')
				</a>
			</li>
			<li>
				<a href="#">
					<span class="visuallyhidden">Facebook icon</span>
					 @@include('partials/icons/facebook.html')
				</a>
			</li>
			<li>
				<a href="#">
					<span class="visuallyhidden">Instagram icon</span>
					 @@include('partials/icons/instagram.html')
				</a>
			</li>
			<li>
				<a href="#">
					<span class="visuallyhidden">Google icon</span>
					 @@include('partials/icons/google.html')
				</a>
			</li>
			<li>
				<a href="#">
					<span class="visuallyhidden">Tumblr icon</span>
					 @@include('partials/icons/tumblr.html')
				</a>
			</li>
		</ul>
	</div>

		<ul class="navbar__utils">
			<li>
				<a href="#">
					<span class="visuallyhidden">Search icon</span>
					@@include('partials/icons/search.html')
				</a>
			</li>
			<li>
				<a href="#">
					<span class="visuallyhidden">Gear icon</span>
					@@include('partials/icons/gear.html')
				</a>
			</li>
		</ul>



</nav><!-- /navbar -->


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'haobao' ); ?></a>

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
				?>
				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
			</div><!-- .site-branding -->
		</header><!-- .site-header -->

		<?php get_sidebar(); ?>
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
