<header class="posts-featured">

<?php $my_query = new WP_Query( 'category_name=Featured&posts_per_page=3' );
while ( $my_query->have_posts() ) : $my_query->the_post();
$do_not_duplicate = $post->ID; ?>


  <!-- article -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">


    <!-- post text -->
    <div class="post__text">
      <!-- post title -->
      <h2 class="post__title">
        <?php the_title(); ?>
      </h2>
      <!-- /post title -->

      <!-- post excerpt -->
      <?php the_excerpt(); ?>
      <!-- /post excerpt -->
    </div>
    <!-- /post text -->

    <div class="post__img">
      <!-- post thumbnail -->
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <div class="posts-featured__bg" style="background-image: url('<?php echo $image[0]; ?>')">
        </div>
        <?php endif; ?>
      <!-- /post thumbnail -->


      <!-- post overlay -->
      <div class="posts-featured__overlay"></div>
      <!-- /post overlay -->
    </div>








    </a>
  </article>
  <!-- /article -->

<?php endwhile; ?>
</header><!-- /featured posts -->




<!-- posts -->



<main class="posts-container">

<header class="posts--all">
  <h2>The Stack</h2>
</header>

  <section class="posts">

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <!-- article -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- post thumbnail -->
    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(array(400,240)); // Declare pixel size you need inside the array ?>
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

