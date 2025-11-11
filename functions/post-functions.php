<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Bootscore Child
 *
 * Post Functions
 * 
 * @version 6.0.0
 */

/**
 * Disable comments on all posts
 */
function disable_all_post_comments() {

    // Disable support for comments and trackbacks in post types
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'post', 'trackbacks' );

    // Close comments on the front-end
    add_filter( 'comments_open', '__return_false', 20, 2 );
    add_filter( 'pings_open', '__return_false', 20, 2 );

    // Hide existing comments
    add_filter( 'comments_array', '__return_empty_array', 10, 2 );
}
add_action( 'init', 'disable_all_post_comments' );

/**
 * Remove comments menu from admin
 */
function remove_comments_admin_menu() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_comments_admin_menu' );

/**
 * Remove comments metabox from dashboard
 */
function remove_comments_dashboard_widget() {
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_comments_dashboard_widget' );
