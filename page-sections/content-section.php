<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    $content = get_sub_field('section_content');

    // Text
    $header = $content['header'] ?? '';
    $header_style = $content['header_style'] ?? 'h2';
    $wysiwyg_text = $content['wysiwyg_text'];

    // Media
    $media_type = $content['media_type'] ?? 'none';
    $image = $content['image'] ?? '';
    $content_video = $content['video'] ?? '';
    $content_video_thumbnail = $content['video_thumbnail'] ?? '';

    // Buttons
    $primary_button = $content['content_section_primary_button_button'];
    $secondary_button = $content['content_section_secondary_button_button'];

    // Appearance
    $content_section_style = get_sub_field('content_section_style') ?? 'media-bottom';
    $section_appearance = get_sub_field('section_appearance');
    $background_color = $section_appearance['background_colour'];
    $padding_top = $section_appearance['padding_top'];
    $padding_bottom = $section_appearance['padding_bottom'];

    include get_stylesheet_directory() . '/components/content-settings.php';
?>

<section class="content-section background--<?php echo $background_color ?>"
         <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container style--<?php echo $content_section_style; ?>">

        <!-- Text content -->
        <div class="content-section__text">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="content-section__header">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>

            <!-- WYSIWYG -->
            <?php if ( $wysiwyg_text ) : ?>
                <div class="content-section__wysiwyg">
                    <?php echo wp_kses_post( $wysiwyg_text ); ?>
                </div>
            <?php endif; ?>

            <!-- Buttons -->
            <?php if($primary_button || $secondary_button): ?>
                <div class="content-section__buttons">
                    <?php if($primary_button): ?>
                        <?php
                            $button = $primary_button;
                            include get_stylesheet_directory() . '/components/button.php';
                        ?>
                    <?php endif; ?>
                    <?php if($secondary_button): ?>
                        <?php
                            $button = $secondary_button;
                            include get_stylesheet_directory() . '/components/button.php';
                        ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
        
        <!-- Media -->
        <?php if($image || $video): ?>
            <div class="content-section__media">
                <!-- Image -->
                <?php if($media_type == "image"): ?>
                    <div class="content-section__image">
                        <?php echo wp_get_attachment_image($image['id'], 'medium', false, array('loading'=>'lazy')); ?>
                    </div>
                <?php endif; ?>

                <!-- Video -->
                 <?php
                 if($media_type == "video"):
                ?>
                    <div class="content-section__video">
                        <?php
                            $video = $content_video;
                            $video_thumbnail = $content_video_thumbnail;
                            include get_stylesheet_directory() . '/components/video.php';
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
