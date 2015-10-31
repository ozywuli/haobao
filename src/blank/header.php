<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

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
			<li class="navbar__search">
					<?php get_search_form(); ?>
					<span class="visuallyhidden">Search icon</span>
					@@include('partials/icons/search.html')

			</li>
			<li>
				<a href="#">
					<span class="visuallyhidden">Gear icon</span>
					@@include('partials/icons/gear.html')
				</a>
			</li>
		</ul>



</nav><!-- /navbar -->









		<!-- wrapper -->
		<div class="wrapper">
