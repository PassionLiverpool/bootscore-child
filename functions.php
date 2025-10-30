<?php

/**
 * @package Bootscore Child
 *
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;


/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  
  // custom.js
  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), $modificated_CustomJS, false, true);
}

add_action( 'init', function() {
    ini_set( 'default_charset', 'UTF-8' );
});

// Disable both Gutenberg and the Classic editor for pages.
add_action( 'init', function() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'team-member', 'editor' );
    remove_post_type_support( 'testimonial', 'editor' );
});

add_action( 'wp_enqueue_scripts', function() {
    if ( is_page() ) {
        // FRONT END ONLY — safe
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'global-styles' );
        wp_dequeue_style( 'classic-theme-styles' );
    }
}, 20 );

add_filter( 'acf/fields/flexible_content/layout_title', function( $title, $field, $layout, $i ) {

    $settings = get_sub_field( 'section_settings' );
    $section_label  = $settings['section_label'] ?? '';

    $content = get_sub_field( 'section_content' );
    if ($content) {
        $header = $content['header'] ?? '';
    } else {
        $header = get_sub_field('header');
    }

    if ( $section_label ) {
        $title .= ' – ' . esc_html( $section_label );
    } else if (!$section_label && $header) {
        $title .= ' – ' . esc_html( $header );
    }

    return $title;

}, 10, 4 );