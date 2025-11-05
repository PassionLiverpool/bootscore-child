<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
    // Text
    $header = get_sub_field('header') ?? '';
    $header_style = get_sub_field('header_style') ?? 'h2';

    // Appearance
    $blog_posts_style = get_sub_field('blog_posts_style') ?? 'small';
    $section_appearance = get_sub_field('section_appearance');
    $background_color = $section_appearance['background_colour'];
    $padding_top = $section_appearance['padding_top'];
    $padding_bottom = $section_appearance['padding_bottom'];

    // Team Members
    $team_members = get_sub_field('team_members');

    include get_stylesheet_directory() . '/components/content-settings.php';
?>

<section class="team-members-section background--<?php echo $background_color ?>"
         <?php if($html_id): ?>id="<?php echo $html_id; ?>"<?php endif; ?>
         style="padding-top: <?php echo $padding_top ?>rem; padding-bottom: <?php echo $padding_bottom ?>rem"
>
    <div class="container style--<?php echo $content_section_style; ?>">
        <div class="team-members-section__content">
            <!-- Header -->
            <?php if ( $header ) : ?>
                <<?php echo esc_attr( $header_style ); ?> class="team-members-section__header">
                    <?php echo esc_html( $header ); ?>
                </<?php echo esc_attr( $header_style ); ?>>
            <?php endif; ?>
            
            <!--  Team Members -->
            <?php if( $team_members ): ?>
                <ul class="team-members">
                <?php foreach( $team_members as $team_member ): ?>
                    <?php echo "TEST"; ?>
                <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
    </div>
</section>
