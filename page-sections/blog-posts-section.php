<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Text
    $header = get_sub_field('header') ?? '';
    $header_style = get_sub_field('header_style') ?? 'h2';

    // Appearance
    $blog_posts_style = get_sub_field('blog_posts_style') ?? 'small';
    $section_appearance = get_sub_field('section_appearance');
    $background_color = $section_appearance['background_colour'];
    $padding_top = $section_appearance['padding_top'];
    $padding_bottom = $section_appearance['padding_bottom'];

    // Blog posts
    $number_of_blog_posts = get_sub_field('number_of_blog_posts') ?? 3;
    $blog_posts = get_sub_field('blog_posts');

    $link_to_blog_archive = get_sub_field('link_to_blog_archive') ?? false;

    include get_stylesheet_directory() . '/components/content-settings.php';
?>

<section class="blog-posts-section background--<?php echo $background_color ?>"
         <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container style--<?php echo $content_section_style; ?>">
        <div class="blog-posts-section__content">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="blog-posts-section__header">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>
            
            <!--  Blog Posts -->
            <?php if( $blog_posts ): ?>
                <ul class="blog-posts blog-posts--<?php echo $blog_posts_style; ?>">
                <?php foreach( $blog_posts as $blog_post ): ?>
                    <?php include get_stylesheet_directory() . '/components/blog-post-card-'.$blog_posts_style.'.php'; ?>
                <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
    </div>
</section>
