<!-- page content -->
<div class="container page-content">
    <div class="row">
        <div class="col-s-12 content-wraper">
            <div class="content-block">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="" class="fluid">
                <?php endif ?>
                <h5>@php(the_title())</h5>
                @php(the_content())
            </div>
        </div>
    </div>
</div>
<!-- // page content -->
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}