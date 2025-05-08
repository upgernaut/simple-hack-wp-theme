<?php get_header(); ?>

<main id="main-content" class="max-w-2xl mx-auto p-4 space-y-8 transition-colors duration-300">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php get_template_part('template-parts/content', 'feed-item'); ?>
  <?php endwhile; else : ?>
    <p>No posts found.</p>
  <?php endif; ?>

  <?php get_template_part('template-parts/content', 'pagination'); ?>
</main>


<?php get_footer(); ?>
