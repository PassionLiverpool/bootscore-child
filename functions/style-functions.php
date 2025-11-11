<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Bootscore Child
 *
 * Style Functions
 * 
 * @version 6.0.0
 */


/**
 * Output ACF site options scripts in the header
 */
add_action('wp_head', function() {
    $header_scripts = get_field('header_scripts', 'option');
    if ( $header_scripts ) {
        echo $header_scripts; // allows safe HTML/JS output
    }
});

/**
 * Output ACF site options scripts in the footer
 */
add_action('wp_footer', function() {
    $footer_scripts = get_field('footer_scripts', 'option');
    if ( $footer_scripts ) {
        echo $footer_scripts;
    }
});