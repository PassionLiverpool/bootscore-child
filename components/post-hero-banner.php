<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Appearance
    $banner_colour = get_field('hero_banner_background_colour') ?? 'white';
    $banner_image = get_field('hero_banner_background_image');
?>

<header class="post-hero-banner background--<?php echo $background_colour ?>">
    <?php if($banner_image): ?>
        <img 
            src="<?php echo esc_url($banner_image['url']); ?>" 
            alt="" 
            fetchpriority="high"
            class="post-hero-banner__bg-image"
        >
    <?php endif; ?>
    <div class="container style--<?php echo $hero_banner_style; ?>">

            <div class="post-hero-banner__text font--<?php echo $font_colour; ?>">
                <!-- Post Title -->
                    <h1 class="post-hero-banner__header">
                        <?php echo the_title() ; ?>
                    <h1>
            </div>

    </div>
</header>
