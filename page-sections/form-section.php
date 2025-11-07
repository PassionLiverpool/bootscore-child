<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Text
    $header = get_sub_field('header') ?? '';
    $header_style = get_sub_field('header_style') ?? 'h2';
    $wysiwyg_text = get_sub_field('wysiwyg_text') ?? '';

    // Appearance
    $section_appearance = get_sub_field('section_appearance');
    $background_color = $section_appearance['background_colour'];
    $padding_top = $section_appearance['padding_top'];
    $padding_bottom = $section_appearance['padding_bottom'];

    // Form Shortcode
    $form_section_style = get_sub_field('form_section_style') ?? 'form-right';
    $form_shortcode = get_sub_field('form_shortcode') ?? [];

    include get_stylesheet_directory() . '/components/content-settings.php';
?>

<section class="form-section background--<?php echo $background_color ?>"
         <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container style--<?php echo $form_section_style; ?>">
        <div class="form-section__text">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="icon-list-section__header">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>

            <!-- WYSIWYG -->
            <?php if ( $wysiwyg_text ) : ?>
                <div class="content-section__wysiwyg">
                    <?php echo wp_kses_post( $wysiwyg_text ); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Form -->
        <div class="form-section__form">
            <?php echo do_shortcode( $form_shortcode ); ?>
        </div>

    </div>
</section>
