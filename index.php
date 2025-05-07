<?php get_header(); ?>

<main id="main-content" class="max-w-2xl mx-auto p-4 space-y-8 transition-colors duration-300">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="border-l-4 border-green-400 pl-4 font-sans">
      <h2 class="text-3xl font-semibold mb-2">
        <a href="<?php the_permalink(); ?>" class="hover:underline text-white">
          <?php the_title(); ?>
        </a>
      </h2>
      <p class="text-sm text-gray-400 mb-2"><?php echo get_the_date(); ?></p>
      <p><?php echo get_the_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>" class="text-green-400 hover:underline">Read more</a>
    </article>
  <?php endwhile; else : ?>
    <p>No posts found.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
