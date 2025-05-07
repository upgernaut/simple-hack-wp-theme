<?php get_header(); ?>

<main id="main-content" class="max-w-2xl mx-auto p-4 space-y-8 transition-colors duration-300">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="border-l-4 border-green-400 pl-4 font-sans">
      <h2 class="text-3xl font-semibold mb-2"><?php the_title(); ?></h2>
      <p class="text-sm text-gray-400 mb-2"><?php echo get_the_date(); ?></p>
      <div class="leading-relaxed space-y-4">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
