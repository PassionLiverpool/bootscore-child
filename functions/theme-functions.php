<?php

/**
 * @package Bootscore Child
 *
 * Template Functions
 * 
 * @version 6.0.0
 */

// Prevent sidebar container markup
function disable_sidebar_widgets( $sidebars_widgets )
{
    if (is_single())
    {
        $sidebars_widgets = false;
    }   
    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'disable_sidebar_widgets' );

/*
 * Page section templates
 */
// Helper: return sections HTML for a given post ID (safe, does not alter main loop)
function get_theme_page_sections_html( $post_id = null ) {
    if ( ! function_exists( 'have_rows' ) ) {
        return ''; // ACF not active
    }
    $post_id = $post_id ? $post_id : get_the_ID();
    if ( ! $post_id ) {
        return '';
    }

    $html = '';

    // Use have_rows with $post_id so we don't touch the global loop
    if ( have_rows( 'flexible_page_sections', $post_id ) ) {
        while ( have_rows( 'flexible_page_sections', $post_id ) ) {
            the_row();
            $layout = str_replace( '_', '-', get_row_layout() );
            $template_path = locate_template( "page-sections/{$layout}.php" );
            if ( $template_path ) {
                ob_start();
                include $template_path;
                $html .= ob_get_clean();
            }
        }
    }

    return $html;
}

// Renderer: echo sections (call from templates)
function render_theme_page_sections( $post_id = null ) {
    echo get_theme_page_sections_html( $post_id );
}

// Register custom image sizes
function custom_image_sizes() {
    // Add custom sizes: name, width, height, crop
    add_image_size( 'small-icon', 50, 50 ); 
    add_image_size( 'large-icon', 150, 150 ); 
    add_image_size( 'small-post-thumbnail', 300, 200, true );
    add_image_size( 'large-post-thumbnail', 400, 400, true ); 
}
add_action( 'after_setup_theme', 'custom_image_sizes' );

function mytheme_custom_sizes_dropdown( $sizes ) {
    return array_merge( $sizes, array(
        'small-icon'  => __( 'Small Icon' ),
        'large-icon' => __( 'Large Icon' ),
        'small-post-thumbnail'  => __( 'Small Post Thumbnail' ),
        'large-post-thumbnail'  => __( 'Large Post Thumbnail' ),
    ) );
}
add_filter( 'image_size_names_choose', 'mytheme_custom_sizes_dropdown' );
