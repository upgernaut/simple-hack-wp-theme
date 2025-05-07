<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title(); ?></title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Tailwind -->
  <script>
    tailwind = { config: { darkMode: 'class' } };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>

  </style>

  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-800 text-gray-200 font-sans transition-colors duration-300'); ?>>
  <header id="site-header" class="max-w-2xl mx-auto sticky top-0 bg-gray-900 shadow z-50 transition-colors duration-300">
    <div class="max-w-2xl mx-auto flex items-center justify-between p-4">

      <div class="text-xl font-bold tracking-widest font-mono logoText text-white flex items-center space-x-2">
        <a href="<?php echo home_url(); ?>" class="hover:none flex items-center space-x-2">
          <?php
          if (has_custom_logo()) {
            $logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_src($logo_id, 'full')[0];
            echo '<img src="' . esc_url($logo_url) . '" alt="Logo" class="w-11 h-11">';
          }
          ?>
          <span><?php bloginfo('name'); ?></span>
        </a>
      </div>
      <nav class="space-x-4 font-mono">
        <a href="<?php echo home_url(); ?>" class="hover:underline text-green-400">Home</a>
        <a href="#" class="hover:underline text-green-400">Blog</a>
        <a href="#" class="hover:underline text-green-400">Contact</a>
        <button onclick="toggleDarkMode()" class="ml-4 text-sm px-2 py-1 border rounded border-green-400 text-green-400 hover:bg-green-500 hover:text-gray-200">
          Toggle Dark
        </button>
      </nav>
    </div>
  </header>
