<?php get_header(); ?>

<main id="main-content" class="max-w-2xl mx-auto p-4 space-y-8 transition-colors duration-300">
  <!-- Category Title and Description -->
  <section class="mb-8">
    <h1 class="text-4xl font-semibold mb-4">
      <?php the_archive_title(); ?>
    </h1>
    <p class="text-lg text-gray-400">
      <?php the_archive_description(); ?>
    </p>
  </section>

  <!-- Posts in this Archive -->
  <section class="space-y-8">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php get_template_part('template-parts/content', 'feed-item'); ?>
  <?php endwhile; else : ?>
    <p>No posts found.</p>
  <?php endif; ?>
  </section>

  <!-- Pagination -->
  <section class="flex justify-between items-center mt-12">
    <div><?php previous_posts_link('← Previous Page'); ?></div>
    <div><?php next_posts_link('Next Page →'); ?></div>
  </section>
</main>

<?php get_footer(); ?>
