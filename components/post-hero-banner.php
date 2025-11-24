<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Appearance
    $banner_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

?>

<section class="post-hero-banner">
    <div class="post-hero-banner__info">
        <div class="post-hero-banner__text">
            <!-- Post Title -->
            <h1 class="post-hero-banner__header">
                <?php echo the_title(); ?>
            </h1>
        </div>

        <div class="post-hero-banner__categories">
            <?php bootscore_category_badge(); ?>
        </div>
    </div>
    <?php if($banner_image_url): ?>
        <img 
            src="<?php echo esc_url($banner_image_url); ?>" 
            alt="" 
            fetchpriority="high"
            class="post-hero-banner__image"
        >
    <?php endif; ?>
</section>

<section class="post-hero-banner__meta">
    <div class="container">
        <?php bootscore_date(); ?>

        <!-- AddToAny Share Buttons -->
        <?php if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) {
            ADDTOANY_SHARE_SAVE_KIT();
        } ?>
    </div>
</section>