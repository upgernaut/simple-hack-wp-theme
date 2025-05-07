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
<body <?php body_class('bg-gray-900 text-white font-sans transition-colors duration-300'); ?>>
  <header id="site-header" class="sticky top-0 bg-gray-800 shadow z-50 transition-colors duration-300">
    <div class="max-w-2xl mx-auto flex items-center justify-between p-4">
      <div class="text-xl font-bold tracking-widest font-mono"><?php bloginfo('name'); ?></div>
      <nav class="space-x-4 font-mono">
        <a href="<?php echo home_url(); ?>" class="hover:underline text-green-400">Home</a>
        <a href="#" class="hover:underline text-green-400">Blog</a>
        <a href="#" class="hover:underline text-green-400">Contact</a>
        <button onclick="toggleDarkMode()" class="ml-4 text-sm px-2 py-1 border rounded border-green-400 text-green-400 hover:bg-green-500 hover:text-white">
          Toggle Dark
        </button>
      </nav>
    </div>
  </header>
