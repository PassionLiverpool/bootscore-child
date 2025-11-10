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

/**
 * Shortcode: [business_address]
 * Description: Displays the business address as defined in the ACF options page
 */
function display_business_address() {
    // Get the ACF field from the options page
    $address = get_field('business_address', 'option');

    // If the field is empty, return nothing
    if (empty($address)) {
        return '';
    }

    // Return safely escaped address
    return wp_kses_post($address);
}
add_shortcode('business_address', 'display_business_address');