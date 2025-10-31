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
    $primary_button = $content['content_section_primary_button_button'];
    $secondary_button = $content['content_section_secondary_button_button'];
    // echo '<pre>';
    // var_dump(get_row($primary_button)); // dumps all sub fields in this layout
    // echo '</pre>';
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
            <?php if($primary_button): ?>
                <?php
                    $button = $primary_button;
                    include get_stylesheet_directory() . '/components/button.php';
                ?>
            <?php endif; ?>
        </div>
    </div>
</section>