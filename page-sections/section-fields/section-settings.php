<?php
    // Settings
    $content_settings = get_sub_field('section_settings');
    $html_id = $content_settings['html_id'] ?? '';

    // Convert to lowercase
    $html_id = strtolower($html_id);

    // Replace any non-alphanumeric character with hyphens
    $html_id = preg_replace('/[^a-z0-9\-_:.]/', '-', $html_id);

    // Replace multiple consecutive hyphens with a single hyphen
    $html_id = preg_replace('/-+/', '-', $html_id);

    // Remove leading/trailing hyphens
    $html_id = trim($html_id, '-');
?>