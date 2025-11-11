<?php
    if ($content) {
        $header = $content['header'];
        $header_style = $content['header_style'];
    } else {
        $header = get_sub_field('header');
        $header_style = get_sub_field('header_style') ?? 'h2';
    }
?>