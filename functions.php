<?php
// Enable basic theme features
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');

// Register a menu
register_nav_menus([
  'main_menu' => 'Main Menu'
]);
