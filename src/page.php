<?php get_header(); ?>

  <main class="container">
  <section class="content-col">
      <h1 class="page__title"><?php the_title(); ?></h1>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php the_content(); ?>

        <?php comments_template( '', true ); // Remove if you don't want comments ?>

        <br class="clear">


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

  </main>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
