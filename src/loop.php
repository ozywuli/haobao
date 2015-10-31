<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <!-- article -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- post thumbnail -->
    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(array(400,400)); // Declare pixel size you need inside the array ?>
      </a>
    <?php endif; ?>
    <!-- /post thumbnail -->

    <!-- post title -->
    <h2 class="post__title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </h2>
    <!-- /post title -->

    <!-- post details -->
<!--     <div class="post__meta">
  <span class="date">
    <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
      <?php the_time('j M Y'); ?>
    </time>
  </span>
  <span>|</span>
  <span class="author"><?php _e( 'By', 'haobao' ); ?> <?php the_author_posts_link(); ?></span>
</div> -->
    <!-- /post details -->


    <div><?php edit_post_link(); ?></div>

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
