<?php
$button_link = $button['button_link'] ?? null;

if ($button_link) :
    $url = $button_link['url'] ?? '#';
    $title = $button_link['title'] ?? '';
    $target = $button_link['target'] ?? '_self';
?>
    <a class="btn btn--primary"
        href="<?php echo esc_url($url); ?>"
        target="<?php echo esc_attr($target); ?>">
        <?php echo esc_html($title); ?>
    </a>
<?php endif; ?>
