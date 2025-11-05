<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.1.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

  <div id="content" class="site-content">
    <div id="primary" class="content-area">
      
      <?php do_action( 'bootscore_after_primary_open', 'page' ); ?>

      <main id="main" class="site-main">

        <div class="entry-content">
          <?php
          // Render ACF flexible page sections for this page (safe, non-recursive)
          if ( function_exists( 'render_theme_page_sections' ) ) {
              render_theme_page_sections( get_the_ID() );
          }
          ?>
        </div>
        
        <?php do_action( 'bootscore_before_entry_footer', 'page' ); ?>

      </main>

    </div>
  </div>

<?php
get_footer();
