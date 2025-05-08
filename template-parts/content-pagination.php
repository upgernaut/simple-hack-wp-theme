<!-- Pagination -->
<section class="mt-12 text-center">
  <?php
    $pagination = paginate_links([
      'type'      => 'array',
      'mid_size'  => 2,
      'prev_text' => '← Prev',
      'next_text' => 'Next →',
    ]);

    if ($pagination) {
      echo '<ul class="flex justify-center flex-wrap gap-2">';
      foreach ($pagination as $link) {
        if (strpos($link, 'current') !== false) {
          // Current page
          $label = strip_tags($link);
          echo '<li><span class="block px-3 py-1 border border-green-600 rounded bg-green-600 text-white">' . esc_html($label) . '</span></li>';
        } elseif (preg_match('/href="([^"]+)"/', $link, $matches)) {
          // Regular link
          $url = $matches[1];
          $label = strip_tags($link);
          echo '<li><a href="' . esc_url($url) . '" class="block px-3 py-1 border border-green-600 rounded text-green-400 hover:bg-green-800">' . esc_html($label) . '</a></li>';
        } else {
          // Dots (...)
          $label = strip_tags($link);
          echo '<li><span class="block px-3 py-1 border border-green-600 rounded text-gray-400">' . esc_html($label) . '</span></li>';
        }
      }
      
      echo '</ul>';
    }
  ?>
</section>
