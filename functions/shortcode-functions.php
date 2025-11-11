<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Bootscore Child
 *
 * Shortcode Functions
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
 * Shortcode: [business_name]
 * Description: Displays the business name as defined in the ACF options page
 */
function display_business_name() {
    $name = get_field('business_name', 'option');

    if (empty($name)) {
        return '';
    }

    return wp_kses_post($name);
}
add_shortcode('business_name', 'display_business_name');

/**
 * Shortcode: [business_address]
 * Description: Displays the business address as defined in the ACF options page
 */
function display_business_address() {
    $address = get_field('business_address', 'option');
    if (empty($address)) {
        return '';
    }
    return wp_kses_post($address);
}
add_shortcode('business_address', 'display_business_address');

/**
 * Shortcode: [business_phone_number]
 * Description: Displays the business phone number as defined in the ACF options page
 */
function display_business_phone_number() {
    $phone_number = get_field('business_phone_number', 'option');

    if (empty($phone_number)) {
        return '';
    }

    return '<a href="tel:'.esc_attr($phone_number).'">'.esc_html($phone_number).'</a>';
}
add_shortcode('business_phone_number', 'display_business_phone_number');

/**
 * Shortcode: [business_email]
 * Description: Displays the business email as defined in the ACF options page
 */
function display_business_email() {
    $email = get_field('business_email', 'option');

    if (empty($email)) {
        return '';
    }

    return '<a href="mailto:'.esc_attr($email).'">'.esc_html($email).'</a>';
}
add_shortcode('business_email', 'display_business_email');