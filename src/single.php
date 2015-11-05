<?php get_header(); ?>


  <div class="single__post">
  <?php if ( have_posts() ): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="single__categories"><?php the_category(); ?></div>

      <!-- post title -->
      <h1 class="single__title">
        <?php the_title(); ?>
      </h1>
      <!-- /post title -->

      <!-- post details -->
      <div class="single__details">
        <div class="single__byline">by <?php the_author_posts_link(); ?></div>

        <div class="single__date">
          @@include('partials/icons/calendar.svg')
          <time datetime="<?php the_time('d M Y'); ?>">
            <?php the_time('d F Y'); ?>
          </time>
        </div>
      </div>
      
      <!-- /post details -->

      <!-- post thumbnail -->
      <div class="single__featuredimg">
      <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
      <?php the_post_thumbnail(); // Fullsize image for the single post ?>
      <?php endif; ?>
      </div>
      <!-- /post thumbnail -->


        <!-- single content -->
        <div class="single__content">


        <!-- main content -->
        <?php the_content(); // Dynamic Content ?>
        <!-- main content -->

        <!-- tags -->
        <div class="single__tags">
        <?php
        $posttags = get_the_tags();
        if ($posttags) :
          foreach($posttags as $tag) :
        ?>
        <a href="<?php echo get_tag_link($tag->term_id); ?>">#<?php echo $tag->name ?></a>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <!-- /tags -->

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
              <a href="<?php the_author_meta( 'user_url' ) ?>" class="author-links__url">
                @@include('partials/icons/link.svg')
                <span><?php the_author_meta( 'user_url' ) ?></span>
              </a>
              <ul class="author-links__sm">
              <?php
                $sm = array("twitter", "facebook", "instagram", "google", "tumblr");
              ?>

              <?php foreach ($sm as $name) { ?>
                <?php if ( get_the_author_meta($name.'_profile') ): ?>
                  <li>
                    <a href="<?php the_author_meta($name.'_profile') ?>" title="<?php echo $name ?>" class="<?php echo $name.'-author' ?>"><?php  get_template_part('assets/icons/inline', $name.'.svg'); ?></a>
                  </li>
                <?php endif; ?>
                  
              <?php } ?>



              </ul>

            </div>
          <?php endif; ?>

        </div>
        <!-- /author info -->



        <!-- post pagination arrows -->
        <?php
        $nextPost = get_next_post();
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
        $prevPost = get_previous_post();
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
                $nextPost = get_next_post();
                if ($nextPost) {
                  $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(400,225) );
                  echo $nextthumbnail;
                  echo $nextPost->post_title;
                }
              ?>
              </a>

            </div>



          <div class="prev">

            <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>">
            <?php
            $prevPost = get_previous_post();
            if ($prevPost) {
              $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(400,225) );
              echo $prevthumbnail;
              echo $prevPost->post_title;
            }
            ?>
            </a>

          </div>

        </div><!-- /post pagination -->

        <!-- comments -->
        <?php comments_template(); ?>
        <!-- comments -->

      </div><!-- /single content -->

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
function rp4wp_example_my_thumbnail_size( $thumb_size ) {
  return 'my-thumbnail-size';
}
add_filter( 'rp4wp_thumbnail_size', 'rp4wp_example_my_thumbnail_size' );
?>




<?php get_sidebar(); ?>

<?php get_footer(); ?>
