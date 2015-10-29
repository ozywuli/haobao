<?php get_header(); ?>


<?php get_sidebar(); ?>

<main class="container">
  <section class="posts">
  <?php get_template_part('loop') ?>
  <?php get_template_part('pagintion'); ?>
  </section>
</main>

<?php get_footer(); ?>