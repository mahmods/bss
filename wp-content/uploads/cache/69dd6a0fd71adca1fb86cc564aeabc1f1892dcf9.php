<div class="col-s-12 col-m-6 news-block">
        <div class="content-box">
            <a href="<?php (the_permalink()); ?>" data-src="<?=get_the_post_thumbnail_url($post->ID)?>"></a>
            <a href="<?php (the_permalink()); ?>"><h3><?php (the_title()); ?></h3></a>
            <?php (the_excerpt()); ?>
            <div class="footer">
                كاتب الخبر : <?php (the_author_link()); ?>
                <a href="<?php (the_permalink()); ?>" class="more">قراءة المزيد</a>
            </div>
        </div>
    </div>