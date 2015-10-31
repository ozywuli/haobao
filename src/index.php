<?php get_header(); ?>


<?php get_sidebar(); ?>

<!-- featured posts -->
<header class="posts-featured">

</header><!-- /featured posts -->

<!-- posts -->
<main class="posts-container">
  <section class="posts">
  <?php get_template_part('loop') ?>
  <?php get_template_part('pagintion'); ?>
  </section>
</main><!-- /posts -->

<?php get_footer(); ?>

