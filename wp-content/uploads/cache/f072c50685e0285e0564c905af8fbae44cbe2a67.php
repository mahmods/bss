<div class="col-s-12 col-m-6 col-l-4 media-block">
    <a href="<?php (the_permalink()); ?>" data-src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" class="content-box">
        <h3><?php (the_title()); ?></h3>
    </a>
</div>