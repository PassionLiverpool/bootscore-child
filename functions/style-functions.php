<?php

/**
 * @package Bootscore Child
 *
 * CMS Functions
 * 
 * @version 6.0.0
 */

// Disable both Gutenberg and the Classic editor for pages.
function mytheme_enqueue_dashicons() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_dashicons');
