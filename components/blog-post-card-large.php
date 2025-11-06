<?php
    $permalink = get_permalink( $blog_post->ID );
    $featured_image = get_the_post_thumbnail( $blog_post->ID, 'medium', false, array('loading'=>'lazy') );
    $title = get_the_title( $blog_post->ID );
    $excerpt = get_the_excerpt( $blog_post->ID );
    $truncated_title = wp_trim_words( $title, 15 );
?>

<li class="blog-post blog-post--large">
    <!-- Featured Image -->
    <?php if ( $featured_image ) : ?>
        <a href="<?php echo esc_url( $permalink ); ?>" class="blog-post__image">
            <span class="screen-reader-text"> Read more about <?php echo esc_html( $title ); ?></span>
            <?php echo $featured_image; ?>
        </a>
    <?php endif; ?>

    <div class="blog-post__content">

        <!-- Category -->
        <div class="blog-post__categories">
            <?php
            $categories = get_the_category( $blog_post->ID );
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $category_link = get_category_link( $category->term_id );
                    echo '<a href="' . esc_url( $category_link ) . '" class="blog-post__category">'
                        . esc_html( $category->name ) .
                        '</a> ';
                }
            }
            ?>
        </div>

        <!-- Title -->
        <h3 class="blog-post__title">
            <?php echo esc_html( $truncated_title ); ?>
        </h3>

        <!-- Excerpt -->
        <?php if ($excerpt) : ?>
            <p class="blog-post__excerpt">
                <?php echo esc_html( wp_trim_words( $excerpt, 40 ) ); ?>
            </p>
        <?php endif; ?>

        <!-- Read more button -->
        <a href="<?php echo esc_url( $permalink ); ?>" class="btn btn--primary">
            Read More <span class="screen-reader-text"> about <?php echo esc_html( $title ); ?></span>
        </a>
    </div>
</li>