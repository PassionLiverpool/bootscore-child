<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
    // Header & Body Text
    include get_stylesheet_directory() . '/page-sections/section-fields/section-text.php';

    // Appearance
    include get_stylesheet_directory() . '/page-sections/section-fields/section-appearance.php';

    // Carousel
    // NOTE: ACF field values are now correctly available here
    $carousel_images = get_sub_field('carousel_images') ?? [];
    $autoplay = get_sub_field('autoplay') ?? true;
    $show_indicators = get_sub_field('show_indicators') ?? false;
    $show_controls = get_sub_field('show_controls') ?? false;
    $show_captions = get_sub_field('show_captions') ?? false;

    // Settings
    include get_stylesheet_directory() . '/page-sections/section-fields/section-settings.php';

    // Check if we have images to proceed
    if ( empty( $carousel_images ) ) {
        return; 
    }
    
    // Total number of slides
    $total_slides = count( $carousel_images );
    
    // Determine the data-bs-ride attribute
    $data_ride = $autoplay ? 'carousel' : '';
?>

<section class="carousel-section background--<?php echo esc_attr($background_colour); ?>"
         <?php if($html_id): ?>id="<?php echo esc_attr($html_id); ?>"<?php endif; ?>
         style="<?php if($background_image):?>background-image: url('<?php echo esc_url($background_image['url']); ?>'); <?endif;?>padding-top: <?php echo esc_attr($padding_top); ?>rem; padding-bottom: <?php echo esc_attr($padding_bottom); ?>rem"
>
    <div class="container">
        <div class="carousel-section__content">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="carousel-section__header font--<?php echo esc_attr($font_colour) ?>">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>

            <!-- WYSIWYG -->
            <?php if ( $wysiwyg_text ) : ?>
                <div class="carousel-section__wysiwyg font--<?php echo esc_attr($font_colour) ?>">
                    <?php echo wp_kses_post( $wysiwyg_text ); ?>
                </div>
            <?php endif; ?>

            <!-- Carousel -->
            <div id="carouselExampleIndicators" 
                 class="carousel slide" 
                 data-bs-ride="<?php echo $data_ride; ?>" 
                 <?php if ( ! $autoplay ): ?>data-bs-interval="false"<?php endif; // Prevent automatic cycle if autoplay is false ?>
            >

                <!-- 1. CAROUSEL INDICATORS (Conditional) -->
                <?php if ( $show_indicators && $total_slides > 1 ) : ?>
                    <div class="carousel-indicators">
                        <?php for ( $i = 0; $i < $total_slides; $i++ ) : ?>
                            <button 
                                type="button" 
                                data-bs-target="#carouselExampleIndicators" 
                                data-bs-slide-to="<?php echo $i; ?>" 
                                class="<?php echo $i === 0 ? 'active' : ''; ?>" 
                                aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>" 
                                aria-label="Slide <?php echo $i + 1; ?>"
                            ></button>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>

                <!-- 2. CAROUSEL INNER ITEMS (Dynamic Content) -->
                <div class="carousel-inner">
                    <?php 
                        $i = 0; 
                        foreach ( $carousel_images as $carousel_image ) : 
                            // Get the full image URL. ACF returns the image ID, so we use wp_get_attachment_image_url.
                            $image_id = $carousel_image['ID'] ?? $carousel_image['id']; 
                            $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                            $alt_text = $carousel_image['alt'] ?? '';
                    ?>
                        <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                            <img 
                                src="<?php echo esc_url( $image_url ); ?>" 
                                class="d-block w-100" 
                                alt="<?php echo esc_attr( $alt_text ); ?>"
                                loading="lazy"
                            >
                            <!-- Caption (Conditional) -->
                            <?php if ( $show_captions && ! empty( $carousel_image['caption'] ) ) : ?>
                                <div class="carousel-caption d-none d-md-block">
                                    <p><?php echo wp_kses_post( $carousel_image['caption'] ); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>
                </div>

                <!-- 3. CAROUSEL CONTROLS (Conditional) -->
                <?php if ( $show_controls && $total_slides > 1 ) : ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php endif; ?>

            </div>

            <!-- The redundant <ul> loop and static Bootstrap content have been removed -->

        </div>
    </div>
</section>