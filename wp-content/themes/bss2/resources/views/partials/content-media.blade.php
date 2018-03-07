<?php
if (get_post_format($post->ID) == 'gallery') {
    $postFormatClass = 'ti-camera-alt';
} elseif (get_post_format($post->ID) == 'video') {
    $postFormatClass = 'ti-play-circle-line';
}
?>
<div class="col-s-12 col-m-6 col-l-4 media-block">
<a href="<?php the_permalink(); ?>" data-src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" class="content-box <?php echo $postFormatClass ?>">
    <h3><?php the_title(); ?> </h3>
</a>
</div>
<!-- // media block -->