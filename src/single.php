<?php get_header(); ?>

  <div class="single__post">
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


      <!-- post title -->
      <h1 class="single__title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
      </h1>
      <!-- /post title -->

      <!-- post thumbnail -->
      <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
          <?php the_post_thumbnail(); // Fullsize image for the single post ?>
      <?php endif; ?>
      <!-- /post thumbnail -->

      <!-- post details -->
      <span class="date">
        <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
          <?php the_date(); ?> <?php the_time(); ?>
        </time>
      </span>
      <span class="author"><?php _e( 'Published by', 'haobao' ); ?> <?php the_author_posts_link(); ?></span>
      <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'haobao' ), __( '1 Comment', 'haobao' ), __( '% Comments', 'haobao' )); ?></span>
      <!-- /post details -->

      <?php the_content(); // Dynamic Content ?>

      <?php the_tags( __( 'Tags: ', 'haobao' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

      <p><?php _e( 'Categorised in: ', 'haobao' ); the_category(', '); // Separated by commas ?></p>

      <p><?php _e( 'This post was written by ', 'haobao' ); the_author(); ?></p>

      <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

      <?php comments_template(); ?>

    </article>
    <!-- /article -->

  <?php endwhile; ?>

  <?php else: ?>

    <!-- article -->
    <article>

      <h1><?php _e( 'Sorry, nothing to display.', 'haobao' ); ?></h1>

    </article>
    <!-- /article -->

  <?php endif; ?>
</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
