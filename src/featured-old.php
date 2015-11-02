<!-- featured posts -->
<header class="posts-featured">

<?php
query_posts('posts_per_page=3&cat=5');
?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <!-- article -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
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

    <!-- post title -->
    <h2 class="post__title">
      <?php the_title(); ?>
    </h2>
    <!-- /post title -->

    </a>
  </article>
  <!-- /article -->

<?php endwhile; ?>


<?php endif; ?>
</header><!-- /featured posts -->



<?php rewind_posts(); ?>



<?php query_posts(''); ?>
