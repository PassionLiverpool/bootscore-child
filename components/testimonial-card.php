<?php
    $featured_image = get_the_post_thumbnail( $testimonial->ID, 'medium', false, array('loading'=>'lazy') );
    $name = get_the_title( $testimonial->ID );
    $subheading = get_field('subheading', $testimonial->ID );
    $testimonial = get_field('testimonial', $testimonial->ID );
?>

<li class="testimonial">
    <!-- Featured image -->
    <?php if ( $featured_image ) : ?>
        <div class="testimonial__image">
            <?php echo $featured_image; ?>
        </div>
    <?php endif; ?>

    <div class="testimonial__text">
        <!-- Testimonial -->
        <?php if ($testimonial) : ?>
            <p class="testimonial__testimonial">
                <?php echo esc_html( $testimonial ); ?>
            </p>
        <?php endif; ?>

        <!-- Testimonial name -->
        <?php if ($name) : ?>
            <p class="testimonial__name">
                <?php echo esc_html( $name ); ?>
            </p>
        <?php endif; ?>

        <!-- Testimonial Subheading -->
        <?php if ($subheading) : ?>
            <p class="testimonial__subheading">
                <?php echo esc_html($subheading); ?>
            </p>
        <?php endif; ?>
    </div>
</li>