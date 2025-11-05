<?php
    $permalink = get_permalink( $blog_post->ID );
    $title = get_the_title( $blog_post->ID );
    $featured_image = get_the_post_thumbnail( $blog_post->ID, 'medium' );
?>

<li class="blog-post blog-post--large">
    <?php if ( $featured_image ) : ?>
        <a href="<?php echo esc_url( $permalink ); ?>" class="blog-post__image">
            <?php echo $featured_image; ?>
        </a>
    <?php endif; ?>
    <div class="blog-post__content">
        <h3><?php echo esc_html( $title ); ?></h3>
        <a href="<?php echo esc_url( $permalink ); ?>" class="btn btn--primary">
            Read More
        </a>
    </div>
</li>