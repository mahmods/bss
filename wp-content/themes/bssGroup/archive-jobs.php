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
            <div class="responsive-table">
                <table class="table-borderd jobs-table">
                    <thead>
                        <tr>
                            <td><?php _e('المسمي الوظيفي','bssGroup' ); ?></td>
                            <td><?php _e('العدد المطلوب','bssGroup' ); ?></td>
                            <td><?php _e('المستوي الوظيفي','bssGroup' ); ?></td>
                            <td><?php _e('قدم بياناتك','bssGroup' ); ?></td>
                        </tr>
                    </thead>
                    <?php 
            if (have_posts()):
            while(have_posts()):
                the_post();?>
            <tr class="table-content">
                        <td><?php the_title(); ?></td>
                        <td><?php echo get_post_meta( get_the_ID(), 'job_req', true) ?></td>
                        <td><?php echo get_post_meta( get_the_ID(), 'job_level', true) ?></td>
                        <td><a href="<?php the_permalink(); ?>" class="btn large primary job-btn">التقديم على الوظيفه</a></td>
                    </tr>


            <?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>

                    
                </table>
            </div>
   
<!-- فورم ملئ البيانات -->         
<div class="modal-box tornado-ui" id="form-id">
    <div class="modal-content">
        <div class="modal-head">
            المسمي الوظيفي
            <span class="close-modal ti-clear"></span>
        </div>

        <div class="modal-body">
            <!-- ألفورم -->
<form class="form-ui">
     <input type="text" placehold="انبوت كتابي">
     <select><option>اختيارات</option> </select>
     <!-- File input -->
     <div class="file-input">
        <input type="file">
        <span class="btn secondary">Browse</span>
        <input class="file-path" placeholder="رفع ملف">
     </div>
     <textare placeholder="نبذه"></textarea>
     <input type="submit" class="btn primary large rounded" value="ارسال البيانات">
</form>
        </div>
    </div>
</div>


        </div>
        <!-- // page content -->
<?php get_footer() ?>