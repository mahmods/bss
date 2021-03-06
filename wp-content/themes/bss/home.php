<?php use Roots\Sage\Assets; ?>
<!-- Companies -->
<div class="companys-slider tornado-ui" id="companys">
<?php $projects = new WP_Query(array('post_type'=>'projects','showposts'=>3)) ?>
<?php if ($projects->posts) : ?>
<?php foreach ($projects->posts as $project) : ?>
    <div class="item mashroo3k" data-src="<?php echo get_the_post_thumbnail_url($project->ID); ?>">
        <img src="<?= wp_get_attachment_url(get_post_meta( $project->ID, 'companylogo', true)); ?>">
        <a href="<?php the_permalink($project->ID); ?>" class="hvr">
            <h5><?= get_the_title($project->ID); ?></h5>
            <p><?= wp_kses_post( wp_trim_words( $project->post_content, 35 )) ?></p>
        </a>
    </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<!-- // Companies -->

<!-- Features -->
<div class="features">
    <div class="container wow fadeIn" data-wow-duration="0s">
        <i class="center-icon"><img src="<?= Assets\asset_path('images/tie-white.png'); ?>" alt=""></i>
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
                <h3 class="wow fadeInUp">عن الجروب</h3>
                <p class="wow fadeInUp" data-delay=".3s">من أجل خطوة جديده على طريق التقدم والاستثمار في عالم الاعمال قمنا بتأسيس bss group لتضم مجموعه من الشركات التى اضافت وتضيف كل يوم سهما جديدا فى عالم الأعمال حيث تضم شركة مشروعك لدراسات الجدوى وخطط الأعمال بالشرق الاوسط وشركة مها كود للبرمجيات والتسويق الرقمى ومركز إنجاز للترجمة  ليعملوا تحت مظلة واحده وهدف واحد وهو ترك بصمة مضيئة ليس فى منطقتنا العربية فقط ولكن فى العالم اجمع.</p>
                <a href="http://www.mashroo3k.com/newsite/ar/" class="ti-arrow-left-c button wow fadeInUp" data-delay=".6s"><?php _e('تعرف على شركات المجموعه','bssGroup' ); ?></a>
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
            <p>هذه هي أنشطة الشركة التي تنظمها ويقوم بفاعلياتها الموظفين لتحسين جو العمل وخلق بيئة عمل مختلفة مليئة بالدفء</p>
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
            <p>هذا القسم خاص بأهم أخبار المجموعة والتي تخص العمل والإنجازات التي يتم تحقيقها.</p>
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
            <p>يضم هذا القسم عدد من الصور التي تخلد بعض الزكريات الرائعة التي تجمع فريق العمل والشركة</p>
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