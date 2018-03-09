<?php global $redux_demo; ?>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="about-fo">
                        <h3><?php echo $redux_demo['footer_aboutus_title'] ?></h3>
                        <p><?php echo $redux_demo['footer_aboutus_content'] ?></p>
                    </div>
                    <div class="links">
                        <h3>شركة مشروعك</h3>
                        <?php 
                               /**
                                * Displays a navigation menu
                                * @param array $args Arguments
                                */
                                $args = array(
                                    'theme_location' => 'Footer1',
                                    'menu' => 'Footer1',
                                    'container' => 'ul',
                                    
                                );
                            
                                wp_nav_menu( $args );
                         ?>
                    </div>
                    <div class="links">
                        <h3>شركة مها كود</h3>
                        <?php 
                               /**
                                * Displays a navigation menu
                                * @param array $args Arguments
                                */
                                $args = array(
                                    'theme_location' => 'Footer2',
                                    'menu' => 'Footer2',
                                    'container' => 'ul',
                                    
                                );
                            
                                wp_nav_menu( $args );
                         ?>
                    </div>
                    <div class="links">
                        <h3>شركة انجاز</h3>
                        <?php 
                               /**
                                * Displays a navigation menu
                                * @param array $args Arguments
                                */
                                $args = array(
                                    'theme_location' => 'Footer3',
                                    'menu' => 'Footer3',
                                    'container' => 'ul',
                                    
                                );
                            
                                wp_nav_menu( $args );
                         ?>
                    </div>
                    <div class="email-subscribe">
                        <h3><?php _e('القائمة البريديه','bssGroup' ); ?></h3>
                        <p><?php _e('اشترك فى القائمة البريديه ليصلك كل جديد','bssGroup' ); ?></p>
                        <script language="javascript" type="text/javascript" src="<?php echo emailnews_plugin_url('widget/widget.js'); ?>"></script>
                        <div>
                          
                          <div class="eemail_msg">
                            <span id="eemail_msg"></span>
                          </div>
                          <div class="eemail_textbox">
                            <input class="eemail_textbox_class" name="eemail_txt_email" id="eemail_txt_email" onkeypress="if(event.keyCode==13) eemail_submit_ajax('<?php echo admin_url('admin-ajax.php'); ?>')" onblur="if(this.value=='') this.value='<?php _e('ادخل البريد الالكترونى','bssGroup' ); ?>';" onfocus="if(this.value=='<?php _e('ادخل البريد الالكترونى','bssGroup' ); ?>') this.value='';" value="<?php _e('ادخل البريد الالكترونى','bssGroup' ); ?>" maxlength="150" type="text">
                          </div>
                          <div class="eemail_button">
                            <input class="btn primary rounded left" name="eemail_txt_Button" id="eemail_txt_Button" onClick="return eemail_submit_ajax('<?php echo admin_url('admin-ajax.php'); ?>')" value="<?php _e('اشترك','bssGroup' ); ?>" type="button">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-rights">
                <div class="container">
                    <?php _e('جميع الحقوق محفوظة','bssGroup' ); ?>  
                    
                    <div class="social">
                        <a href="<?php echo $redux_demo['facebook'] ?>" target="_blank" class="ti-facebook"></a>
                        <a href="<?php echo $redux_demo['twitter'] ?>" target="_blank" class="ti-twitter"></a>
                        <a href="<?php echo $redux_demo['linkedin'] ?>" target="_blank" class="ti-linkedin"></a>
                        <a href="<?php echo $redux_demo['googleplus'] ?>" target="_blank" class="ti-googleplus"></a>
                        <a href="<?php echo $redux_demo['pinterest'] ?>" target="_blank" class="ti-pinterest"></a>
                    </div>
                </div>
            </div>
        </footer>
        
        
        <?php wp_footer() ?>
        <script>
$(document).ready(function () {
    $(".team-photos img").each(function(){
        var imageW = $(this).width();
        $(this).height(imageW);
    });
    
});
</script>

<script>
          $(document).ready(function (){
               $(".lightbox-rbany .close").on("click", function(){
                    $(".lightbox-rbany").fadeOut(800);
               })
          })
     </script>

    
</body>
</html>