<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Header & Body Text
    include get_stylesheet_directory() . '/page-sections/section-fields/section-header.php';

    // Appearance
    include get_stylesheet_directory() . '/page-sections/section-fields/section-appearance.php';

    // Team Members
    $testimonials = get_sub_field('testimonials');
    $display_all_testimonials = get_sub_field('display_all_testimonials') ?? false;

    // Determine which team members to display
    if ( $display_all_testimonials ) {
        $testimonials = get_posts([
            'post_type'      => 'testimonial',
            'posts_per_page' => -1, // All published
            'post_status'    => 'publish',
            'orderby'        => 'menu_order', // Optional, if using order
            'order'          => 'ASC',
        ]);
    }

    // Settings
    include get_stylesheet_directory() . '/page-sections/section-fields/section-settings.php';
?>

<section class="testimonials-section background--<?php echo $background_colur ?>"
         <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container">
        <div class="testimonials-section__content">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="testimonials-section__header">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>
            
            <!--  Testimonials -->
            <?php if( $testimonials ): ?>
                <ul class="testimonials">
                <?php foreach( $testimonials as $testimonial ): ?>
                    <?php include get_stylesheet_directory() . '/components/testimonial-card.php'; ?>
                <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
    </div>
</section>
