<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Sorry, no results were found.', 'sage')); ?>

    </div>
    <?php echo get_search_form(false); ?>

  <?php endif; ?>
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
          <?php while(have_posts()): ?> <?php (the_post()); ?>
            <?php echo $__env->make('partials.content-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endwhile; ?>
      </table>
    </div>
    <!-- فورم ملئ البيانات -->         
    <div class="modal-box tornado-ui" id="form-id">
      <div class="modal-content">
        <div class="modal-head">المسمي الوظيفي<span class="close-modal ti-clear"></span></div>
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
    </div>
  </div>
  <?php echo get_the_posts_navigation(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>