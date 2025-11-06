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
