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

    // Video Gallery
    $video_gallery = get_sub_field('video_gallery') ?? [];

    $link_to_blog_archive = get_sub_field('link_to_blog_archive') ?? false;

    include get_stylesheet_directory() . '/components/content-settings.php';
?>

<section class="video-gallery-section background--<?php echo $background_color ?>"
         <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container">
        <div class="video-gallery-section__content">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="video-gallery-section__header">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>

            <!-- Gallery Images -->
            <ul class="video-gallery">
                <?php foreach ( $video_gallery as $video_item ) : 
                    $video_url = $video_item['video'];
                    $video_thumbnail = $video_item['video_thumbnail'];
                ?>
                    <li class="video-gallery__item">
                        <?php 
                        $video = $video_url;
                        include get_stylesheet_directory() . '/components/video.php'; 
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>

    </div>
</section>
