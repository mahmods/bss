<?php get_header('home'); global $redux_demo; ?>
<!-- Companys -->
<div class="companys-slider tornado-ui" id="companys">
<?php 
$staff_members = new WP_Query(array('post_type'=>'projects','showposts'=>3));
if ($staff_members->have_posts()):
while($staff_members->have_posts()):
$staff_members->the_post();?>
<!-- Mashroo3k -->
    <div class="item mashroo3k" data-src="<?php echo get_the_post_thumbnail_url( $post->ID); ?>">
        <img src="<?php echo wp_get_attachment_url(get_post_meta( get_the_ID(), 'companylogo', true)); ?>">
        <a href="<?php the_permalink(); ?>" class="hvr">
            <h5><?php the_title(); ?></h5>
            <?php the_excerpt(); ?>
        </a>
    </div>
<?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
</div>
<!-- // Companys -->

<!-- Features -->
<div class="features">
    <div class="container wow fadeIn" data-wow-duration="0s">
        <i class="center-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/tie-white.png" alt=""></i>
        <?php $services =  get_posts(array('post_type'=>'services','showposts'=>6) ); ?>
        <!-- Feature Block -->
        <div class="feature-block">
            <i><?php echo get_the_post_thumbnail($services[0]->ID); ?></i>
            <h3><?php echo $services[0]->post_title; ?></h3>
            <p><?php echo $services[0]->post_content ?></p>
        </div>
        
        <div class="right-side">
            <!-- Feature Block -->
            <div class="feature-block">
                <i><?php echo get_the_post_thumbnail($services[1]->ID); ?></i>
                <h3><?php echo $services[1]->post_title; ?></h3>
                <p><?php echo $services[1]->post_content ?></p>
            </div>

            <!-- Feature Block -->
            <div class="feature-block">
                <i><?php echo get_the_post_thumbnail($services[2]->ID); ?></i>
                <h3><?php echo $services[2]->post_title; ?></h3>
                <p><?php echo $services[2]->post_content ?></p>
            </div>
        </div>
        
        <div class="left-side">
            <!-- Feature Block -->
            <div class="feature-block">
                <i><?php echo get_the_post_thumbnail($services[3]->ID); ?></i>
                <h3><?php echo $services[3]->post_title; ?></h3>
                <p><?php echo $services[3]->post_content ?></p>
            </div>

            <!-- Feature Block -->
            <div class="feature-block">
                <i><?php echo get_the_post_thumbnail($services[4]->ID); ?></i>
                <h3><?php echo $services[4]->post_title; ?></h3>
                <p><?php echo $services[4]->post_content ?></p>
            </div>
        </div>
        
        <span class="clear"></span>
        
        <!-- Feature Block -->
        <div class="feature-block">
            <i><?php echo get_the_post_thumbnail($services[5]->ID); ?></i>
            <h3><?php echo $services[5]->post_title; ?></h3>
            <p><?php echo $services[5]->post_content ?></p>
        </div>
    </div>
</div>
<!-- // Features -->
<?php wp_reset_postdata(); wp_reset_query(); ?>
<!-- About Section -->
<div class="about-section">
    <div class="row no-gutter">
        <div class="col-s-12 col-m-6 text-content">
            <div class="info">
                <h3 class="wow fadeInUp"><?php echo $redux_demo['aboutus_title'] ?></h3>
                <p class="wow fadeInUp" data-delay=".3s"><?php echo $redux_demo['aboutus_content'] ?></p>
                <a href="<?php echo $redux_demo['aboutus_url'] ?>" class="ti-arrow-left-c button wow fadeInUp" data-delay=".6s"><?php _e('تعرف على شركات المجموعه','bssGroup' ); ?></a>
            </div>
        </div>
        <?php echo wp_get_attachment_url(); ?>
        <!-- about video btn -->
        <div class="col-s-12 col-m-6 ti-play-a"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/Jv4ph43GU0Q" frameborder="0" allowfullscreen></iframe></div>
    </div>
</div>
<!-- // About Section -->

<!-- Events -->
<div class="events">
    <div class="container">
        <div class="section-head">
            <h3><?php $obj = get_post_type_object( 'events' ); echo $obj->labels->name;?></h3>
            <p><?php echo $redux_demo['events'] ?></p>
        </div>
        
        <div class="events-slider row">
            
            <?php 
            $events = new WP_Query(array('post_type'=>'events'));
            if ($events->have_posts()):
             while ($events->have_posts()) :
                $events->the_post();

             ?>
            <!-- event block -->
            <div class="col-s-12 col-m-6 col-l-4 event-block">
                <div class="content-box">
                    <a href="<?php the_permalink(); ?>" data-src="<?php echo get_the_post_thumbnail_url($post->ID); ?>"></a>
                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    <?php  the_excerpt(); ?>
                </div>
            </div>
            <!-- // event block -->
            <?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>
        </div>

        <div class="section-controll">
            <a href="<?php echo get_post_type_archive_link('events' ); ?>" class="button"><?php _e('المزيد من الانشطه','bssGroup' ); ?></a>
        </div>
    </div>
</div>
<!-- // Events -->

<!-- Media -->
<div class="media">
    <div class="container">
        <div class="section-head">
            <h3><?php $obj = get_post_type_object( 'media' ); echo $obj->labels->name;?></h3>
            <p><?php echo $redux_demo['media'] ?></p>
        </div>
        
        <div class="media-slider row">
            <!-- media block -->
            <?php 
            $mediaLoop = new WP_Query(array('post_type'=>'media'));
            if ($mediaLoop->have_posts()):
             while ($mediaLoop->have_posts()) :
                $mediaLoop->the_post();
                if (get_post_format($post->ID) == 'gallery') {
                    $postFormatClass = 'ti-camera-alt';
                }elseif (get_post_format($post->ID) == 'video') {
                    $postFormatClass = 'ti-play-circle-line';
                }
             ?>
            <div class="col-s-12 col-m-6 col-l-4 media-block">
                <a href="<?php the_permalink(); ?>" data-src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" class="content-box <?php echo $postFormatClass ?>">
                    <h3><?php the_title(); ?> </h3>
                </a>
            </div>
            <!-- // media block -->
            <?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>
        </div>
        
        <div class="section-controll">
            <a href="<?php echo get_post_type_archive_link('media' ); ?>" class="button"><?php _e('المزيد من الوسائط','bssGroup' ); ?></a>
        </div>
    </div>
</div>
<!-- // Media -->

<!-- News -->
<div class="news">
    <div class="container">
        <div class="section-head">
            <h3><?php $obj = get_post_type_object( 'news' ); echo $obj->labels->name;?></h3>
            <p><?php echo $redux_demo['news'] ?></p>
        </div>
        
        <div class="news-slider row">
        <?php 
            $news = new WP_Query(array('post_type'=>'news'));
            if ($news->have_posts()):
            while($news->have_posts()):
                $news->the_post();?>

                <!-- news block -->
                <div class="col-s-12 col-m-6 news-block">
                    <div class="content-box">
                        <a href="<?php the_permalink(); ?>" data-src="<?php echo get_the_post_thumbnail_url($post->ID); ?>"></a>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <?php the_excerpt(); ?>
                        
                        <div class="footer">
                            <a href="<?php the_permalink(); ?>" class="more"><?php _e('قراءة المزيد','bssGroup' ); ?></a>
                        </div>
                    </div>
                </div>
            <!-- // news block -->
            <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
        </div>
        
        <div class="section-controll">
            <a href="<?php echo get_post_type_archive_link('news' ); ?>" class="button"><?php _e('المزيد من الاخبار','bssGroup' ); ?></a>
        </div>
    </div>
</div>
<!-- // News -->

<!-- team -->
<div class="team">
    <div class="container">
        <div class="section-head">
            <h3><?php echo _e('الهيكل الاداري','bssGroup' ); ?></h3>
        </div>
        <div class="team-slider">
        	<?php 
    		$staff_members = new WP_Query(array('post_type'=>'staff_members'));
    		if ($staff_members->have_posts()):
    	 		while($staff_members->have_posts()):
    	 		$staff_members->the_post();?>
	        	 	 <!-- team block -->
	                <div class="col-s-12 col-m-6 col-l-4 team-block">
	                    <div class="content-box">
	                        <?php the_post_thumbnail(); ?>
	                        <div class="info">
	                            <h3><?php the_title(); ?></h3>
	                            <?php 
	                            	$member_position = get_post_meta( $post->ID, 'member_position', true );
	                            	if (!empty($member_position)) {
	                            		echo "<h4>". $member_position ."</h4>";
	                            	}
	                            	$member_linkdin = get_post_meta( $post->ID, 'member_linkdin', true );
	                            	if (!empty($member_linkdin)) {
	                            		echo '<a href="'. $member_linkdin .'" class="ti-linkedin" target="_blank">'. _e('الملف الشخصي','bssGroup' ) .'</a>';
	                            	}
	                             ?>
	                        </div>
	                    </div>
	                </div>
        			<!-- // team block -->
    	 		<?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<!-- // team -->
<?php get_footer() ?>