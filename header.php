<?php
$color_scheme = get_theme_mod('default_color_scheme', 'light');; // default
if (isset($_COOKIE['colorScheme']) && in_array($_COOKIE['colorScheme'], ['dark', 'light'])) {
  $color_scheme = $_COOKIE['colorScheme'];
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo esc_attr($color_scheme); ?>">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title(); ?></title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Tailwind -->
  <script>
    tailwind = {
      config: {
        darkMode: 'class'
      }
    };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>

  </style>

  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-800 text-gray-200 font-sans transition-colors duration-300'); ?>>
<header id="site-header" class="max-w-2xl mx-auto sticky top-0 bg-gray-900 z-50 transition-colors duration-300 mb-3">
  <div class="flex items-center justify-between p-4">
    <!-- Logo -->
    <div class="text-xl font-bold tracking-widest font-mono logoText text-white flex items-center space-x-2">
      <a href="<?php echo home_url(); ?>" class="flex items-center space-x-2">
        <?php
        if (has_custom_logo()) {
          $logo_id = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_src($logo_id, 'full')[0];
          echo '<img src="' . esc_url($logo_url) . '" alt="Logo" class="w-11 h-11 rounded-sm">';
        }
        ?>
        <span><?php bloginfo('name'); ?></span>
      </a>
    </div>

    <!-- Desktop nav -->
    <nav class="hidden md:flex items-center space-x-4 font-mono relative">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'main_menu',
        'container' => false,
        'menu_class' => 'flex space-x-4',
        'items_wrap' => '%3$s',
        'fallback_cb' => false,
        'walker' => new class extends Walker_Nav_Menu {
          function start_lvl(&$output, $depth = 0, $args = null) {
            $output .= '<div class="submenu p-4 absolute hidden group-hover:flex flex-col  mt-1 rounded shadow-lg min-w-[150px] z-10">';
          }
          function end_lvl(&$output, $depth = 0, $args = null) {
            $output .= '</div>';
          }
          function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $classes = implode(' ', $item->classes);
            $title = $item->title;
            $url = $item->url;

            if (in_array('menu-item-has-children', $item->classes)) {
              $output .= '<div class="dropdown-wrapper relative group">';
              $output .= '<a href="' . esc_url($url) . '" class="hover:underline text-green-400 flex items-center gap-1">' . esc_html($title) . ' <span class="text-xs">▼</span></a>';
            } else {
              $output .= '<a href="' . esc_url($url) . '" class="hover:underline text-green-400">— ' . esc_html($title) . '</a>';
            }
          }
          function end_el(&$output, $item, $depth = 0, $args = null) {
            if (in_array('menu-item-has-children', $item->classes)) {
              $output .= '</div>';
            }
          }
        }
      ));
      ?>

      <!-- Extras -->
      <button onclick="toggleDarkMode()" class="text-sm px-2 py-1 border rounded border-green-400 text-green-400 hover:bg-green-500 hover:text-gray-200">
        Toggle Dark
      </button>
      <button onclick="toggleSearchBar()" class="px-1 py-1 text-green-400 rounded hover:bg-green-500 hover:text-gray-200 pb-2.5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 13.65z" />
        </svg>
      </button>
    </nav>

    <!-- Mobile burger -->
    <div class="md:hidden">
      <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="text-green-400">
        ☰
      </button>
    </div>
  </div>

  <!-- Mobile menu -->
  <div id="mobileMenu" class="hidden md:hidden flex flex-col px-4 pb-4 space-y-2 font-mono">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'main_menu',
      'container' => false,
      'menu_class' => 'flex flex-col space-y-1',
      'items_wrap' => '%3$s',
      'fallback_cb' => false,
      'walker' => new class extends Walker_Nav_Menu {
        function start_lvl(&$output, $depth = 0, $args = null) {
          $output .= '<div class="submenuMobile hidden flex flex-col w-full mt-1 rounded shadow-lg z-10">';
        }
        function end_lvl(&$output, $depth = 0, $args = null) {
          $output .= '</div>';
        }
        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
          $classes = implode(' ', $item->classes);
          $title = $item->title;
          $url = $item->url;

          if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '<div class="relative group">';
            $output .= '<button onclick="this.nextElementSibling.classList.toggle(\'hidden\')" class="hover:underline text-green-400 flex items-center gap-1">' . esc_html($title) . ' <span class="text-xs">▼</span></button>';
          } else {
            $output .= '<a href="' . esc_url($url) . '" class="hover:underline text-green-400">' . esc_html($title) . '</a>';
          }
        }
        function end_el(&$output, $item, $depth = 0, $args = null) {
          if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '</div>';
          }
        }
      }
    ));
    ?>

    <!-- Extras -->
    <button onclick="toggleDarkMode()" class="text-sm px-2 py-1 border rounded border-green-400 text-green-400 hover:bg-green-500 hover:text-gray-200 w-fit">
      Toggle Dark
    </button>
    <button onclick="toggleSearchBar()" class="px-1 py-1 text-green-400 rounded hover:bg-green-500 hover:text-gray-200 w-fit flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 13.65z" />
      </svg><span class="block sm:hidden">Search</span>
    </button>
  </div>
</header>



