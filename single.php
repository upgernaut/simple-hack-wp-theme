<?php get_header(); ?>

<main id="main-content" class="max-w-2xl mx-auto p-4 space-y-8 transition-colors duration-300">
<?php toolnaut_breadcrumb(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="border-l-4 border-green-400 pl-4 font-sans">
      <h2 class="text-3xl font-semibold mb-2"><?php the_title(); ?></h2>
      <p class="text-sm text-gray-400 mb-2">
  <a class="hover:underline " href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php echo get_the_date(); ?></a> · 
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="hover:underline text-green-400">
      <?php the_author(); ?>
    </a>
    <?php
      $category = get_the_category();
      if (!empty($category)) {
        echo ' · <a href="' . esc_url(get_category_link($category[0]->term_id)) . '" class="hover:underline ">'
          . esc_html($category[0]->name) . '</a>';
      }
    ?>
  </p>


  <?php if (has_post_thumbnail()) : 
  $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
  <a href="<?php echo esc_url($img_url); ?>" data-fancybox="gallery">
    <div class="float-left mr-4 my-2 w-40">
      <?php the_post_thumbnail('medium', ['class' => 'rounded border border-green-500']); ?>
    </div>
  </a>
<?php endif; ?>




      <div class="leading-relaxed space-y-4">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
