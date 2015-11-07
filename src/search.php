<?php get_header(); ?>

<main class="posts-container posts-container--cat">

<header class="post-header posts--search">
  <h2>Search</h2>
  @@include('partials/icons/search.svg')
</header>

<?php
global $wp_query;
?>

  <p class="search__results"><?php echo $total_results = $wp_query->found_posts; ?> results</p>

  <section class="posts">

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <!-- article -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- post thumbnail -->
    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(array(400,225)); // Declare pixel size you need inside the array ?>
      </a>
    <?php endif; ?>
    <!-- /post thumbnail -->

    <!-- post title -->
    <h2 class="post__title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </h2>
    <!-- /post title -->


  </article>
  <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

  <!-- article -->
  <article>
    <h2><?php _e( 'Sorry, nothing to display.', 'haobao' ); ?></h2>
  </article>
  <!-- /article -->

<?php endif; ?>



  </section>
</main><!-- /posts -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
