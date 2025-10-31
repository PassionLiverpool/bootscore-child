<?php

/**
 * @package Bootscore Child
 *
 * CMS Functions
 * 
 * @version 6.0.0
 */

// Disable both Gutenberg and the Classic editor for pages.
add_action( 'init', function() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'team-member', 'editor' );
    remove_post_type_support( 'testimonial', 'editor' );
});

add_action( 'wp_enqueue_scripts', function() {
    if ( is_page() ) {
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