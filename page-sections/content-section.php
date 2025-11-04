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
    $video = $content['video'] ?? '';

    // Buttons
    $primary_button = $content['content_section_primary_button_button'];
    $secondary_button = $content['content_section_secondary_button_button'];

    // Appearance
    $content_appearance = get_sub_field('section_appearance');
    $background_color = $content_appearance['background_colour'];
    $padding_top = $content_appearance['padding_top'];
    $padding_bottom = $content_appearance['padding_bottom'];
?>

<section class="content-section background--<?php echo $background_color ?>"
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container">
        <div class="content-section__content">
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
        
        <?php if($image || $video): ?>
            <div class="content-section__media">
                <?php if($media_type == "image"): ?>
                    <div class="content-section__image">
                        <?php echo wp_get_attachment_image($image['id'], 'medium'); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
    // echo '<pre>';
    // print_r( get_fields() );
    // echo '</pre>';
?>