<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Text
    $header = get_sub_field('header') ?? '';
    $header_style = get_sub_field('header_style') ?? 'h2';

    // Appearance
    $section_appearance = get_sub_field('section_appearance');
    $background_color = $section_appearance['background_colour'];
    $padding_top = $section_appearance['padding_top'];
    $padding_bottom = $section_appearance['padding_bottom'];

    // Image Gallery
    $image_gallery = get_sub_field('image_gallery') ?? [];

    $link_to_blog_archive = get_sub_field('link_to_blog_archive') ?? false;

    include get_stylesheet_directory() . '/components/content-settings.php';
?>

<section class="image-gallery-section background--<?php echo $background_color ?>"
         <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container">
        <div class="image-gallery-section__content">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="image-gallery-section__header">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>

            <!-- Gallery Images -->
            <ul class="image-gallery">
                <?php foreach ( $image_gallery as $image ) : 
                    $full = wp_get_attachment_image_src($image['id'], 'full')[0]; ?>
                    <li class="image-gallery__item">
                        <img 
                            src="<?php echo esc_url( $image['sizes']['medium'] ); ?>" 
                            alt="<?php echo esc_attr( $image['alt'] ); ?>" 
                            data-full="<?php echo esc_url( $full ); ?>" 
                            class="gallery-image"
                            loading="lazy"
                        >
                    </li>
                <?php endforeach; ?>
            </ul>
    </div>
</section>
