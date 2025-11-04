<?php
$button_link = $button['button_link'] ?? null;
$button_icon = $button['button_icon'] ?? null;

if ($button_link) :
    $url    = $button_link['url'] ?? '#';
    $title  = $button_link['title'] ?? '';
    $target = $button_link['target'] ?? '_self';
?>
    <a class="btn btn--primary"
       href="<?php echo esc_url($url); ?>"
       target="<?php echo esc_attr($target); ?>">

        <?php
        // --- ICON ---
        if ( $button_icon ) {
            // If the field contains a Dashicon class name
            if ( str_starts_with( $button_icon, 'dashicons-' ) ) {
                echo '<span class="btn__icon dashicons ' . esc_attr( $button_icon ) . '"></span>';
            }

            // If the field looks like a URL (media library or custom)
            elseif ( filter_var( $button_icon, FILTER_VALIDATE_URL ) ) {
                echo '<img class="btn__icon" src="' . esc_url( $button_icon ) . '" alt="">';
            }

            // Otherwise, treat it as raw text (fallback)
            else {
                echo esc_html( $button_icon );
            }
        }
        ?>

        <span class="btn__text"><?php echo esc_html($title); ?></span>
    </a>
<?php endif; ?>
