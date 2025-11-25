<?php
    $permalink = get_permalink( $blog_post->ID );
    $placeholder_image = get_field('placeholder_blog_post_image', 'option');
    $featured_image = get_the_post_thumbnail( $blog_post->ID, 'medium', false, array('loading'=>'lazy') );
    $title = get_the_title( $blog_post->ID );
    $max_length = 60;
    $truncated_title = wp_html_excerpt( $title, $max_length ) . ( strlen( $title ) > $max_length ? '…' : '' );
?>

<li class="blog-post blog-post--small">
    <!-- Featured image -->
    <a href="<?php echo esc_url( $permalink ); ?>" class="blog-post__image">
        <span class="screen-reader-text"> Read more about <?php echo esc_html( $title ); ?></span>
        <?php if ( $featured_image ) : ?>
            <?php echo $featured_image; ?>
        <?php else:
            echo wp_get_attachment_image($placeholder_image['id'], 'medium', false, array('loading'=>'lazy'));;
        endif; ?>
    </a>

    <div class="blog-post__content">
        <!-- Blog post title -->
        <h3 class="blog-post__title"><?php echo esc_html( $truncated_title ); ?></h3>

        <!-- Read more button -->
        <a href="<?php echo esc_url( $permalink ); ?>" class="btn btn--primary">
            Read More <span class="screen-reader-text"> about <?php echo esc_html( $title ); ?></span>
        </a>
    </div>
</li>