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


// Color scheme setting
function mytheme_customize_register($wp_customize) {
    $wp_customize->add_section('theme_color_scheme', array(
      'title'    => __('Color Scheme', 'mytheme'),
      'priority' => 30,
    ));
  
    $wp_customize->add_setting('default_color_scheme', array(
      'default'           => 'dark',
      'sanitize_callback' => function ($input) {
        return in_array($input, ['dark', 'light']) ? $input : 'dark';
      },
    ));
  
    $wp_customize->add_control('default_color_scheme', array(
      'label'    => __('Default Color Scheme', 'mytheme'),
      'section'  => 'theme_color_scheme',
      'settings' => 'default_color_scheme',
      'type'     => 'radio',
      'choices'  => array(
        'dark'  => __('Dark', 'mytheme'),
        'light' => __('Light', 'mytheme'),
      ),
    ));
  }
  add_action('customize_register', 'mytheme_customize_register');
  

  function mytheme_enqueue_scripts() {
    $default_scheme = get_theme_mod('default_color_scheme', 'dark');
  
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/js/theme.js', [], null, true);
    wp_localize_script('theme-scripts', 'themeSettings', [
      'defaultColorScheme' => $default_scheme
    ]);
  }
  add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
  