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
        <!-- Team Member name -->
        <h3 class="testimonial__name">
            <?php echo esc_html( $name ); ?>
        </h3>

        <!-- Job Title -->
        <?php if ($subheading) : ?>
            <h4 class="testimonial__title">
                <?php echo esc_html($subheading); ?>
            </h4>
        <?php endif; ?>

        <!-- Testimonial -->
        <?php if ($testimonial) : ?>
            <p class="testimonial__testimonial">
                <?php echo esc_html( $testimonial ); ?>
            </p>
        <?php endif; ?>
    </div>
</li>