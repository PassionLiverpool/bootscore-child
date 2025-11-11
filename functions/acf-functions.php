<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Bootscore Child
 *
 * ACF Functions
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

// Add labels to flexible content layouts
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

// Exclude CPTs from link modal in acf
function exclude_cpt_from_link_modal( $query ) {
    $excluded_post_types = ['testimonial', 'team-member']; 

    if ( isset( $query['post_type'] ) && is_array( $query['post_type'] ) ) {
        foreach ( $excluded_post_types as $excluded_post_type ) {
            $key = array_search( $excluded_post_type, $query['post_type'] );
            if ( $key !== false ) {
                unset( $query['post_type'][ $key ] );
            }
        }
    }

    return $query;
}
add_filter( 'wp_link_query_args', 'exclude_cpt_from_link_modal' );
