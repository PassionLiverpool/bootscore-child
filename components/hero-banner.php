<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Text
    $hero_banner_text = get_sub_field('hero_banner_text');
    $header = get_field('header') ?? '';
    $header_style = get_field('header_style') ?? 'h2';
    $wysiwyg_text = get_field('wysiwyg_text') ?? '';

    // Buttons
    $primary_button = get_field('hero_banner_primary_button_button');
    $secondary_button = get_field('hero_banner_secondary_button_button');

    // Appearance
    $hero_banner_style = get_field('hero_banner_style') ?? 'media-bottom';
    $background_color = get_field('hero_banner_background_colour');
    $background_image = get_field('hero_banner_background_image');
    $banner_video = get_field('hero_banner_video');

    // Settings
    $hide_hero_banner = get_field('hide_hero_banner') ?? false;
    include get_stylesheet_directory() . '/components/content-settings.php';
?>

<?php if ($hide_hero_banner == false): ?>
    <header class="hero-banner style--<?php echo $hero_banner_style; ?> <?php if($background_color): ?> background--<?php echo $background_color ?> <?php endif; ?>"
            <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
            style="background-image: url('<?php echo esc_url( $background_image['url'] ); ?>');"
    >
        <div class="container style--<?php echo $hero_banner_style; ?>">

            <!-- Text content -->
            <div class="hero-banner__text">
                <!-- Header -->
                <?php if ( $header ) : ?>
                    <<?php echo esc_attr( $header_style ); ?> class="hero-banner__header">
                        <?php echo esc_html( $header ); ?>
                    </<?php echo esc_attr( $header_style ); ?>>
                <?php endif; ?>

                <!-- WYSIWYG -->
                <?php if ( $wysiwyg_text ) : ?>
                    <div class="hero-banner__wysiwyg">
                        <?php echo wp_kses_post( $wysiwyg_text ); ?>
                    </div>
                <?php endif; ?>

                <!-- Buttons -->
                <?php if($primary_button || $secondary_button): ?>
                    <div class="hero-banner__buttons">
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
    </header>
<?php endif; ?>