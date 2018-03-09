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
<div class="container page-content">
    <div class="row">
        <div class="col-s-12 content-wraper">
            <div class="content-block">
                <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="" class="fluid">
                <h5><?php the_title(); ?></h5>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="col-s-12 col-m-6 content-wraper">
            <div class="content-block">
                <h2 class="head"><?php _e('تفاصيل المشروع','bssGroup' ); ?></h2>
                <ul class="ui-tornado list-block">
                	<?php 
						$project_details = get_post_meta( get_the_ID(), 'project_details', true);
						if ( $project_details ) {

						    foreach ( $project_details as $project_detailss ) {
						        echo '<li>' . esc_html( $project_detailss['name'] ) .'</li> ' ;
						    }
						}
                	 ?>
                </ul>
            </div>
        </div>
        <div class="col-s-12 col-m-6 content-wraper">
            <div class="content-block">
                <h2 class="head"><?php _e('اهداف المشروع','bssGroup' ); ?></h2>
                <ul class="ui-tornado list-block">
                    <?php 
						$project_details = get_post_meta( get_the_ID(), 'project_probs', true);
						if ( $project_details ) {

						    foreach ( $project_details as $project_detailss ) {
						        echo '<li>' . esc_html( $project_detailss['project_probsname'] ) .'</li> ' ;
						    }
						}
                	 ?>
                </ul>
            </div>
        </div>
    </div>

    <?php 
    $link = get_post_meta( get_the_ID(), 'wpshed_textfield', true);
    if (!empty($link)): 
     ?>
    	<a href="<?php echo get_post_meta( get_the_ID(), 'wpshed_textfield', true) ?>" class="btn large btn-block primary round-corner"><?php _e('زيارة الموقع الرسمي للمشروع' ,'bssGroup'); ?></a>
    <?php endif ?>
    
</div>
<!-- // page content -->
<?php }} ?>
<?php get_footer(); ?>