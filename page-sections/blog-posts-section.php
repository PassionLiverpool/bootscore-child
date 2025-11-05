<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Text
    $header = get_sub_field('header') ?? '';
    $header_style = get_sub_field('header_style') ?? 'h2';

    // Appearance
    $blog_posts_style = get_sub_field('blog_posts_style') ?? 'media-bottom';
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
                <ul class="blog-posts">
                <?php foreach( $blog_posts as $blog_post ):  
                    $permalink = get_permalink( $blog_post->ID );
                    $title = get_the_title( $blog_post->ID );
                    $featured_image = get_the_post_thumbnail( $blog_post->ID, 'medium' );
                ?>
                    <li class="blog-post blog-post--small">
                        <?php if ( $featured_image ) : ?>
                            <a href="<?php echo esc_url( $permalink ); ?>" class="blog-post__image">
                                <?php echo $featured_image; ?>
                            </a>
                        <?php endif; ?>
                        <div class="blog-post__content">
                            <h3><?php echo esc_html( $title ); ?></h3>
                            <a href="<?php echo esc_url( $permalink ); ?>" class="btn btn--primary">
                                Read More
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
    </div>
</section>
