<?php get_header(); ?>
<main id="main-content" class="max-w-2xl mx-auto p-4 space-y-8 transition-colors duration-300">
  <!-- Author Info -->
  <section class="text-center space-y-6 pb-4 border-b border-gray-300">
    <?php echo get_avatar(get_the_author_meta('ID'), 100, '', '', ['class' => 'author-avatar mx-auto']); ?>
    <h1 class="text-3xl font-semibold"><?php the_author(); ?></h1>
    <p class="text-lg text-gray-400"><?php the_author_meta('description'); ?></p>
  </section>

    <!-- Search Results Loop -->
    <section class="space-y-8">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php get_template_part('template-parts/content', 'feed-item'); ?>
  <?php endwhile; else : ?>
    <p>No posts found.</p>
  <?php endif; ?>
  </section>

  <?php get_template_part('template-parts/content', 'pagination'); ?>
</main>

<?php get_footer(); ?>
