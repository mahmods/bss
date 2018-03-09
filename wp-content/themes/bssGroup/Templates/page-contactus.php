<?php 
/*
	Template Name: اتصل بنا
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
         <!-- page content -->
        <div class="container page-content ContactUs">
            <div class="row">
                <div class="col-s-12 col-m-7 col-l-8 form-ui">
                    <div class="row row-reverse">
                        <!-- info -->
                        <div class="col-s-12 col-l-4 contact-info">
                            <ul class="ui-tornado" data-type="custome">
                                <li class="ti-mobile-portrait"><?php echo $redux_demo['phoneNumber1'] ?></li>
                                <li class="ti-email"><?php echo $redux_demo['Email1'] ?></li>
                                <li class="ti-email"><?php echo $redux_demo['phoneNumber2'] ?></li>
                                <li class="ti-email"><?php echo $redux_demo['Email2'] ?></li>
                            </ul>
                        </div>
                        
                        <!-- inputs -->
                        <div class="col-s-12 col-l-8">
                            <label><?php _e('الاسم','bssGroup' ); ?></label>
                            <input type="text" id="name" placeholder="" class="round-corner">
                            <label><?php _e('البريد الالكتروني','bssGroup' ); ?></label>
                            <input type="text" id="email" placeholder="" class="round-corner">
                        </div>
                        <div class="col-s-12">
                            <label><?php _e('الرساله','bssGroup' ); ?></label>
                            <textarea placeholder="" id="message" class="round-corner"></textarea>
                            <input type="submit" class="btn primary round-corner ContactUsSubmit" value="<?php _e('ارسال الرساله','bssGroup' ); ?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-s-12 col-m-5 col-l-4">
                	<div class="map"></div>
                </div>
            </div>
        </div>
        <!-- // page content -->
        <div class="modal-box tornado-ui" id="styled-modal">
		    <div class="modal-content">
		        <div class="modal-head">
		            <?php _e('تنبيه','bssGroup' ); ?>
		            <span class="close-modal ti-clear"></span>
		        </div>

		        <div class="modal-body">
		        </div>

		        
		    </div>
</div>

 <?php get_footer(); ?>