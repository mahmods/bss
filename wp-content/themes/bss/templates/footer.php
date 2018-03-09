<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="about-fo">
        <h3>من نحن</h3>
        <p>ال BSS هي مجموعة تضم عدد من الشركات في الشرق الأوسط وهم شركة "مها كود" وتعمل في مجال البرمجة الرقمية وشركة "مشروعك" وتعمل في المجال الاقتصادي باللإضافة إلى شركة إنجاز وتختص بالترجمة من العربية إلى الإنجليزية والعكس.</p>
      </div>
      <div class="links">
        <h3>شركة مشروعك</h3>
        <?php wp_nav_menu(array('theme_location' => 'footer_mashroo3k', 'menu' => 'footer_mashroo3k', 'container' => 'ul')) ?>
      </div>
      <div class="links">
        <h3>شركة مها كود</h3>
        <?php wp_nav_menu(array('theme_location' => 'footer_mahacode','menu' => 'footer_mahacode','container' => 'ul')) ?>
      </div>
      <div class="links">
        <h3>شركة انجاز</h3>
        <?php wp_nav_menu(array('theme_location' => 'footer_engaz','menu' => 'footer_engaz','container' => 'ul')) ?>
      </div>
      <div class="email-subscribe">
        <h3><?php _e('القائمة البريديه','bssGroup' ); ?></h3>
        <p><?php _e('اشترك فى القائمة البريديه ليصلك كل جديد','bssGroup' ); ?></p>
        <script language="javascript" type="text/javascript" src="<?php //echo emailnews_plugin_url('widget/widget.js'); ?>"></script>
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
          <a href="https://www.facebook.com/BSS-environment-311401662596455/" target="_blank" class="ti-facebook"></a>
          <a href="https://twitter.com/BssCompany" target="_blank" class="ti-twitter"></a>
          <a href="http://linkedin.com" target="_blank" class="ti-linkedin"></a>
          <a href="" target="_blank" class="ti-googleplus"></a>
          <a href="https://www.instagram.com/bssgroupe/" target="_blank" class="ti-pinterest"></a>
      </div>
    </div>
  </div>
</footer>