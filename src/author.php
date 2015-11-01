<?php get_header(); ?>

<?php $authorImage = get_the_author_meta('image', get_the_author_meta( 'ID' )); ?>

    <div class="masthead" style="background-image: url('<?php echo $authorImage; ?>')">
    </div>

    <div class="author-page">


      <?php echo get_avatar(get_the_author_meta('user_email'), 120); ?>

      <h2><?php echo get_the_author() ; ?></h2>

      <div class="author-page__content">
        <?php echo wpautop( get_the_author_meta('description') ); ?>
      </div>

    </div>


<!-- posts -->
<main class="posts-container">
  <section class="posts">

    <?php if (have_posts()): the_post(); ?>

    <?php rewind_posts(); while (have_posts()) : the_post(); ?>

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!-- post thumbnail -->
        <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
          </a>
        <?php endif; ?>
        <!-- /post thumbnail -->

        <!-- post title -->
        <h2 class="post__title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h2>
        <!-- /Post title -->


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

      <?php get_template_part('pagination'); ?>

  </section>
</main><!-- /posts -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
