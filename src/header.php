<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' - '; } ?><?php bloginfo('name'); ?></title>

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

  <!-- navbar -->
  <div class="navbar__menu">
    <!-- menu togle -->
    <a href="#" class="menu-toggle" title="menu toggle">
      <span class="visuallyhidden">menu toggle</span>
        @@include('partials/icons/menu.svg')
    </a>
    <!-- /menu toggle -->
    <!-- social media -->
    <ul class="sm-links">
      <li>
        <a href="#" class="sm-twitter">
          <span class="visuallyhidden">Twitter icon</span>
           @@include('partials/icons/twitter.svg')
        </a>
      </li>
      <li>
        <a href="#" class="sm-facebook">
          <span class="visuallyhidden">Facebook icon</span>
           @@include('partials/icons/facebook.svg')
        </a>
      </li>
      <li>
        <a href="#" class="sm-instagram">
          <span class="visuallyhidden">Instagram icon</span>
           @@include('partials/icons/instagram.svg')
        </a>
      </li>
      <li>
        <a href="#" class="sm-google">
          <span class="visuallyhidden">Google icon</span>
           @@include('partials/icons/google.svg')
        </a>
      </li>
      <li>
        <a href="#" class="sm-tumblr">
          <span class="visuallyhidden">Tumblr icon</span>
           @@include('partials/icons/tumblr.svg')
        </a>
      </li>
    </ul>
    <!-- /social media -->
  </div>
  <!-- /navbar -->

    <ul class="navbar__utils">
      <li class="navbar__search">
          <?php get_search_form(); ?>
      </li>
      <li>
        <a href="#" title="stories" class="stories-toggle">
          <span class="visuallyhidden">Stories</span>
          @@include('partials/icons/reading.svg')
        </a>
      </li>
    </ul>



</nav><!-- /navbar -->









    <!-- wrapper -->
    <div class="wrapper">

