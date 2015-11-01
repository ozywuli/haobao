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


        <div class="single__content">

        <!-- post details -->
        <span class="date">
          <time datetime="<?php the_time('d M Y'); ?>">
            <?php the_time('d F Y'); ?>
          </time>
        </span>
        <span class="author"><?php _e( '', 'haobao' ); ?> <?php the_author_posts_link(); ?></span>
        <!-- /post details -->


        <?php the_tags( __( 'Tags: ', 'haobao' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

        <p><?php _e( 'Categorised in: ', 'haobao' ); the_category(', '); // Separated by commas ?></p>


        <!-- main content -->
        <?php the_content(); // Dynamic Content ?>
        <!-- main content -->



        <!-- author info -->
        <?php
          $author = get_the_author();
          $authorGravatar = get_avatar( get_the_author_meta('email') , 120 );
          $authorDescription = get_the_author_meta('description');
        ?>

        <div class="single__author">
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
            <?php echo $authorGravatar ?>
          </a>
          <h3>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
               <?php echo $author ?>
            </a>
          </h3>
          <p><?php echo $authorDescription ?></p>
          <?php
            if ( get_the_author_meta('url') ):
          ?>
            <div class="author-links">
              <ul class="author-links__sm">
              <?php
                if ( get_the_author_meta('facebook_profile') ):
              ?>
                <li>
                  <a href="<?php the_author_meta('twitter_profile') ?>">@@include('partials/icons/twitter.html')</a>
                </li>
              <?php endif; ?>
              <?php
                if ( get_the_author_meta('facebook_profile') ):
              ?>
                   <li>
                      <a href="<?php the_author_meta('facebook_profile') ?>">@@include('partials/icons/facebook.html')</a>
                    </li>
              <?php endif; ?>
              </ul>
              <a href="<?php the_author_meta( 'user_url' ) ?>"><?php the_author_meta( 'user_url' ) ?></a>
            </div>
          <?php endif; ?>

        </div>
        <!-- /author info -->



        <!-- post pagination arrows -->
        <?php
        $nextPost = get_next_post(true);
        if ( ( $nextPost )): ?>
          <nav class="pagination-arrow pagination-arrow--next">
            <a href="<?php echo get_permalink( $nextPost->ID ); ?>">
              <div class="pagination-arrow__title">
                <?php echo $nextPost->post_title; ?>
              </div>
              <div class="pagination-arrow__icon">
                @@include('partials/icons/arrow_left.svg')
              </div>
            </a>
          </nav>
        <?php endif; ?>

        <?php
        $prevPost = get_previous_post(true);
        if ( ( $prevPost )): ?>
          <nav class="pagination-arrow pagination-arrow--prev">
            <a href="<?php echo get_permalink( $prevPost->ID ); ?>">
              <div class="pagination-arrow__icon">
                @@include('partials/icons/arrow_right.svg')
              </div>
              <div class="pagination-arrow__title">
                <?php echo $prevPost->post_title; ?>
              </div>
            </a>
          </nav>
        <?php endif; ?>

        <!-- /post pagination arrows -->


        <!-- post pagination -->
        <div class="pagination-posts">


            <div class="next">
              <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>">
              <?php 
                $nextPost = get_next_post(true);
                if ($nextPost) {
                  $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(150,150) );
                  echo $nextthumbnail;
                  echo $nextPost->post_title;
                }
              ?>
              </a>

            </div>



          <div class="prev">

            <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>">
            <?php
            $prevPost = get_previous_post(true);
            if ($prevPost) {
              $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(150,150) );
              echo $prevthumbnail;
              echo $prevPost->post_title;
            }
            ?>
            </a>

          </div>

        </div><!-- /post pagination -->

      </div>

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

<?php
  add_filter( 'rp4wp_append_content', '__return_false' );
?>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
