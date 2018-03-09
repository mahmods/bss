<?php get_header(); global $redux_demo ?>
<!-- Page Head -->
        <div class="page-head">
            <div class="container">
                <span><?php echo post_type_archive_title(); ?></span>
                
                <div class="social">
                    <a href="<?php echo $redux_demo['facebook'] ?>" target="_blank" class="ti-facebook"></a>
                    <a href="<?php echo $redux_demo['twitter'] ?>" target="_blank" class="ti-twitter"></a>
                    <a href="<?php echo $redux_demo['linkedin'] ?>" target="_blank" class="ti-linkedin"></a>
                    <a href="<?php echo $redux_demo['googleplus'] ?>" target="_blank" class="ti-googleplus"></a>
                    <a href="<?php echo $redux_demo['pinterest'] ?>" target="_blank" class="ti-pinterest"></a>
                </div>
            </div>
        </div>
        <!-- // Page Head -->
        <!-- page content -->
        <div class="container page-content">
            <div class="row">
            <?php 
            if (have_posts()):
            while(have_posts()):
                the_post();?>

                <!-- news block -->
                <div class="col-s-12 col-m-6 news-block">
                    <div class="content-box">
                        <a href="<?php the_permalink(); ?>" data-src="<?php echo get_the_post_thumbnail_url($post->ID); ?>"></a>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <?php the_excerpt(); ?>
                        
                        <div class="footer">
                            كاتب الخبر : <?php the_author_link(); ?>
                            <a href="<?php the_permalink(); ?>" class="more"><?php _e('قراءة المزيد','bssGroup' ); ?></a>
                        </div>
                    </div>
                </div>
            <!-- // news block -->
            <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>

                
            </div>
            
            <?php pagination() ?>
        </div>
        <!-- // page content -->      
<?php get_footer() ?>