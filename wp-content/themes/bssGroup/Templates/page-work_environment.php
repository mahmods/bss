<?php 
/*
	Template Name: بيئة العمل
*/
get_header();
global $redux_demo;
 ?>
 <!-- Page Head -->
<div class="page-head">
    <div class="container">
        <span><?php the_title(); ?></span>
        
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

<!-- Team Photos -->
<div class="team-photos">
<?php
$images = explode(",", $redux_demo['work_environment_team']);
 foreach ($images as $team): ?>
    <img src="<?php echo wp_get_attachment_url($team ); ?>" alt="">
    
<?php endforeach ?>
</div>
<!-- // Team Photos -->

<!-- page content <img src="http://bss-group.net/wp-content/themes/bssGroup/img/bag-icon.png" alt=""> -->
<div class="container page-content">
    <!-- Group Infographic -->
    <div class="Group-infographic">
        <h2><?php _e('مميزاتنا','bssGroup' ); ?></h2>
        <div class="row cols-gutter-20">
        <?php foreach ($redux_demo['work_environment_infographic'] as $info): 
            $explode = explode('|',$info);
        ?>
            <!-- info -->
            <div class="col-s-12 col-m-4 col-l-6 wow fadeIn info">
                <i><?php echo $explode[0] ?></i>
                <p><?php echo $explode[1] ?></p>
            </div>
            <!-- // info -->
        <?php endforeach ?>
        </div>
    </div>
    <!-- // Group Infographic -->
    
    <!-- info block -->
    <div class="row row-reverse info-block row-vCenter">
        <div class="col-s-12 col-m-4 image wow fadeInLeft">
            <img src="<?php echo $redux_demo['block1_image']['url']; ?>" alt="">
        </div>
        <div class="col-s-12 col-m-8 wow fadeInRight" data-delay="0.3s">
            <h3><?php echo $redux_demo['block1_title'] ?></h3>
            <p class="align-justify"><?php echo $redux_demo['block1_content'] ?></p>
        </div>
    </div>
    <!-- // info block -->
    
    <!-- info block -->
    <div class="row info-block row-vCenter">
        <div class="col-s-12 col-m-4 image wow fadeInRight">
            <img src="<?php echo $redux_demo['block2_image']['url']; ?>" alt="">
        </div>
        <div class="col-s-12 col-m-8 wow fadeInLeft" data-delay="0.3s">
            <h3><?php echo $redux_demo['block2_title'] ?></h3>
            <p class="align-justify"><?php echo $redux_demo['block2_content'] ?> </p>           
        </div>
    </div>
    <!-- // info block -->
    
    <!-- info block -->
    <div class="row row-reverse info-block row-vCenter">
        <div class="col-s-12 col-m-4 image wow fadeInLeft">
            <a href="#" data-modal="inside-video"><img src="<?php echo $redux_demo['block3_image']['url']; ?>" alt=""></a>
        </div>
        <div class="col-s-12 col-m-8 wow fadeInRight" data-delay="0.3s">
            <h3><?php echo $redux_demo['block3_title'] ?></h3>
            <p class="align-justify"><?php echo $redux_demo['block3_content'] ?></p>
        </div>
    </div>
    <!-- // info block -->
    
    <!-- Video Modal Box -->
    <div class="modal-box" id="inside-video">
        <div class="modal-content">
            <iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/<?php echo youtube_code($redux_demo['block3_video_url']) ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    
    <!-- info block -->
    <div class="row info-block row-vCenter">
        <div class="col-s-12">
            <h3 class=" wow fadeInUp"><?php echo $redux_demo['block4_title'] ?></h3>
            
            <div class="row">
            <?php 
            $array = array();

                foreach ($redux_demo['block4_values'] as $key => $value) {
                    if($key % 2 == 1){
                        $array[$key]['content'] = $value;
                    }else{
                        $array[$key]['head'] = $value;
                    }
                }
                ?>

                <?php
                $count = 1;
                foreach ($array as  $value) {
                    if ($count%6 == 1)
                    {  
                         echo '<div class="col-s-12 col-m-4 col-l-3 wow fadeInUp">';
                    }
                    echo "<h4>". $value['head'] ."</h4>";
                    if ($count%6 == 0)
                    {
                        echo "</div>";
                    }
                    
                    
                    $count++;
                }
                if ($count%6 != 1) echo "</div>"
                 ?>
                <div class="col-s-12 col-m-4 col-l-3 wow fadeInUp">
                    <a href="<?php echo $redux_demo['block4_image_url'] ?>" class="join-us teal">
                        <div>
                            <img src="<?php echo $redux_demo['block4_image']['url']; ?>" alt="">
                            <h3><?php _e('هل تريد الانضمام معنا','bssGroup' ); ?></h3>
                            <h5><?php _e('تفقد الوظائف المتاحة لدينا','bssGroup' ); ?></h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- // info block -->
    

</div>
<!-- // page content -->
 <?php get_footer(); ?>