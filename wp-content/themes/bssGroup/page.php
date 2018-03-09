<?php 

get_header();
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
<!-- page content -->
<div class="container page-content">
    <div class="row">
        <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                
         ?>
        <div class="col-s-12 content-wraper">
            <div class="content-block">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="" class="fluid">
                <?php endif ?>
                
                <h5><?php the_title(); ?></h5>
                <?php the_content(); ?>
                
                
            </div>
        </div>
        
       <?php } } ?>

        
    </div>
</div>
<!-- // page content -->

<?php get_footer(); ?>