<?php get_header(); ?>
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
<?php 
if (have_posts()) {
    while (have_posts()) {
        the_post();
    
?>
<!-- page content -->
        <div class="container page-content">
            <div class="row">
                <div class="col-s-12 col-m-6  col-l-7 content-wraper">
                    <div class="content-block jobform">
                        <h2 class="head">التقديم على الوظيفه</h2>
                        <?php the_content(); ?>
                    </div>
                </div>
<!-- شروط الوظيفه
                <div class="col-s-12 col-m-6  col-l-5 content-wraper">
                    <div class="content-block">
                        <h2 class="head">شروط الوظيفه</h2>
                        <ul class="ui-tornado list-block">
                            <?php 
                                $job_req = get_post_meta( get_the_ID(), 'job_req', true);
                                if ( $job_req ) {
                                    foreach ( $job_req as $job_reqs ) {
                                        echo '<li>' . esc_html( $job_reqs['name'] ) .'</li> ' ;
                                    }
                                }
                             ?>
                        </ul>
                    </div>
                </div>
-->
            </div>
        </div>
        <!-- // page content -->
</div>
<!-- // page content -->
<?php }} ?>
<?php get_footer(); ?>