<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    $content = get_sub_field('section_content');

    // Text
    $header = $content['header'] ?? '';
    $header_style = $content['header_style'] ?? 'h2';
    $wysiwyg_text = $content['wysiwyg_text'];

    // Buttons
    $buttons = $content['buttons'];
?>

<section class="content-section">
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

        </div>
    </div>
</section>