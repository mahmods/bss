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
                <h5><?php the_title(); ?></h5>

                <?php the_content(); ?>
                
                <div class="footer">
                    <span><?php _e('تم النشر فى  :','bssGroup' ); ?>  <?php the_date(); ?> <?php the_time(); ?></span>
                    <span> <?php _e('كاتب الخبر :','bssGroup' ); the_author(); ?></span>
                    
                    <div class="social">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&picture=<?php echo get_the_post_thumbnail_url($post->ID); ?>&title=<?php the_title(); ?>" target="_blank" class="ti-facebook"></a>
                        <a href="#" class="ti-twitter"></a>
                        <a href="#" class="ti-dribbble"></a>
                        <a href="#" class="ti-linkedin"></a>
                        <a href="#" class="ti-googleplus"></a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php 
        if ( get_comments_number() != 0) : ?>
        <div class="col-s-12 content-wraper">
            <?php 
            
        //Gather comments for a specific page/post 
        $comments = get_comments(array(
            'post_id' => $post->ID,
            'status' => 'approve' //Change this to the type of comments to be displayed
        ));

        //Display the list of comments
        wp_list_comments(array(
            'per_page' => 10, //Allow comment pagination
            'reverse_top_level' => false, //Show the oldest comments at the top of the list
            'callback'=>'bssGroup_commentـlist'
        ), $comments);
    ?>


           
        </div>
        <div class="col-s-12 content-wraper">
           <div class="content-block">
        <?php bssGroup_comment_form() ?>
</div>
            
        </div>
        <?php endif; // end have_comments() ?>
        <?php }} ?>
        

        
    </div>
</div>
<!-- // page content -->

<?php get_footer(); ?>