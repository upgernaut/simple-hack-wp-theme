<article class="border-l-4 border-green-400 pl-4 font-sans">
  <h2 class="text-3xl font-semibold mb-2"><a href="<?php the_permalink(); ?>" class=" hover:underline"><?php the_title(); ?></a></h2>
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
  <p>
    <?php 
    if (is_search() || is_archive() || is_author() ) {
      echo wp_trim_words(get_the_excerpt(), 30, '...');
    } else {
      echo get_the_excerpt();
    }
    ?>
  </p>
  <a href="<?php the_permalink(); ?>" class="text-green-400 hover:underline">Read more</a>
</article>
