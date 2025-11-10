<?php

/**
 * Template Name: Blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
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
          <!-- Page banner -->
          <?php include get_stylesheet_directory() . '/components/hero-banner.php'; ?>

          <!-- Category List -->
          <div class="categories container">
            <ul class="categories__list">
              <li class="categories__item">
                <a href="/our-blog">All</a>
              </li>
              <?php
              $categories = get_categories([
                  'orderby' => 'name',
                  'order'   => 'ASC',
                  'hide_empty' => true,
              ]);

              foreach ($categories as $category) :
                  $category_link = get_category_link($category->term_id);
                  ?>
                  <li class="categories__item">
                    <a href="<?php echo esc_url($category_link); ?>" class="blog-categories__link">
                      <?php echo esc_html($category->name); ?>
                    </a>
                  </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- Blog Posts -->
          <div class="blog-archive">
            <div class="container">
              <ul class="blog-posts blog-posts--small">
                  <?php
                  // Set up pagination
                  $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

                  // Custom query for posts
                  $args = [
                      'post_type'      => 'post',
                      'post_status'    => 'publish',
                      'paged'          => $paged,
                      'posts_per_page' => 12,
                  ];

                  $blog_query = new WP_Query($args);

                  if ($blog_query->have_posts()) :
                      while ($blog_query->have_posts()) : $blog_query->the_post();
                          $blog_post = get_post();
                          include get_stylesheet_directory() . '/components/blog-post-card-small.php';
                      endwhile;

                  else :
                      echo '<p>' . esc_html__('No posts found.', 'bootscore') . '</p>';
                  endif;

                  // Reset post data
                  wp_reset_postdata();
                  ?>
              </ul>

              <div class="pagination">
                <?php
                    // Pagination
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links([
                        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'    => '?paged=%#%',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $blog_query->max_num_pages,
                        'prev_text' => __('« Previous'),
                        'next_text' => __('Next »'),
                    ]);
                ?>
              </div> <!-- end pagination -->

            </div> <!-- end container -->
          </div> <!-- end blog-posts-archive -->
        </div>
        
        <?php do_action( 'bootscore_before_entry_footer', 'page' ); ?>

      </main>

    </div>
  </div>

<?php
get_footer();
