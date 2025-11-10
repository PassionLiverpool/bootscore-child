<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Bootscore Child
 *
 * Template Functions
 * 
 * @version 6.0.0
 */

/**
 * Shortcode: [social_media]
 * Description: Displays the social media links from components/social-media.php
 */
function mytheme_social_media_shortcode( $atts ) {
    ob_start(); // Start output buffering

    $component_path = get_stylesheet_directory() . '/components/social-media.php';

    if ( file_exists( $component_path ) ) {
        include $component_path;
    } else {
        echo '<!-- social-media.php not found -->';
    }

    return ob_get_clean(); // Return the buffered content
}
add_shortcode( 'social_media', 'mytheme_social_media_shortcode' );