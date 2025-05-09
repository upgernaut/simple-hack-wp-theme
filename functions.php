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

    $wp_customize->add_setting('footer_text', array(
      'default' => 'Built clean and simple.',
      'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('footer_text', array(
      'label' => 'Footer Text',
      'section' => 'title_tagline',
      'type' => 'textarea',
    ));    
  }
  add_action('customize_register', 'mytheme_customize_register');
  

  function mytheme_enqueue_scripts() {
    $default_scheme = get_theme_mod('default_color_scheme', 'dark');
  
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/js/theme.js', [], null, true);
    wp_localize_script('theme-scripts', 'themeSettings', [
      'defaultColorScheme' => $default_scheme
    ]);

    wp_enqueue_script(
      'theme-main-js',
      get_template_directory_uri() . '/js/scripts.js',
      array(),
      null,
      true // load in footer
    );    
  }
  add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
  


/**
 * Displays a breadcrumb navigation.
 *
 * @since 1.0.0
 */
  function toolnaut_breadcrumb() {
    if (!is_front_page()) {
      echo '<nav class="text-sm text-gray-400 mb-4 font-mono">';
      echo '<a href="' . home_url() . '" class="hover:underline text-green-400">Home</a>';
  
      if (is_category() || is_single()) {
        $category = get_the_category();
        if (!empty($category)) {
          echo ' / <a href="' . esc_url(get_category_link($category[0]->term_id)) . '" class="hover:underline text-green-400">' . esc_html($category[0]->name) . '</a>';
        }
        if (is_single()) {
          echo ' / <span class="text-gray-500 dark:text-gray-400">' . get_the_title() . '</span>';
        }
      } elseif (is_page()) {
        echo ' / <span class="text-gray-500 dark:text-gray-400">' . get_the_title() . '</span>';
      } elseif (is_search()) {
        echo ' / <span class="text-gray-500 dark:text-gray-400">Search results</span>';
      } elseif (is_404()) {
        echo ' / <span class="text-gray-500 dark:text-gray-400">Page not found</span>';
      } elseif (is_author()) {
        echo ' / <span class="text-gray-500 dark:text-gray-400">Author: ' . get_the_author() . '</span>';
      }
  
      echo '</nav>';
    }
  }