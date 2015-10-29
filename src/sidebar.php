<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage haobao
 * @since haobao 1.0
 */

if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' )  ) : ?>
  <div class="sidebar">

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <nav class-"sidebar__nav" role="navigation">
        <h2>Pages</h2>
        <?php
          // Primary navigation menu.
          wp_nav_menu( array(
            'menu_class'     => 'nav-menu',
            'theme_location' => 'primary',
          ) );
        ?>
      </nav><!-- /main-navigation -->
    <?php endif; ?>

    <?php if ( has_nav_menu( 'social' ) ) : ?>
      <nav class="sidebar__sm" role="navigation">
        <h2>Connect</h2>
        <?php
          // Social links navigation menu.
          wp_nav_menu( array(
            'theme_location' => 'social',
            'depth'          => 1
          ) );
        ?>
      </nav><!-- /social-navigation -->
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
      <div class="sidebar__widget" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div><!-- .widget-area -->
    <?php endif; ?>

  </div><!-- /sidebar -->

<?php endif; ?>
