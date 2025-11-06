<?php
    $video_id = '';
    $pattern = '%(?:https?:)?//(?:www\.|m\.)?(?:youtube(?:-nocookie)?\.com/(?:watch\?v=|embed/|oembed\?url=)|youtu\.be/)([A-Za-z0-9_-]{11})%ix';

    if (preg_match($pattern, $video, $matches)) {
        $video_id = $matches[1];
    }
?>
<div class="video-thumbnail">
    <button type="button"
            class="content-button white-outline-button modal-video-button"
            data-video-id="<?php echo esc_attr($video_id) ?>">Play Video</button>
    <?php echo wp_get_attachment_image($video_thumbnail['id'], 'medium', false, array('loading' => 'lazy')); ?>
</div>
