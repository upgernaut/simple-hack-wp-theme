<?php
// Enable basic theme features
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');

// Register a menu
register_nav_menus([
  'main_menu' => 'Main Menu'
]);


function simplehack_enqueue_assets() {
  wp_enqueue_style('simplehack-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'simplehack_enqueue_assets');



add_theme_support('custom-logo', [
    'height'      => 50,
    'width'       => 50,
    'flex-height' => true,
    'flex-width'  => true,
]);
