<!doctype html>
<html <?php (language_attributes()); ?>>
  <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <body <?php (body_class()); ?>>
    <?php (do_action('get_header')); ?>
    <?php if(is_home()): ?>
    <?php echo $__env->make('partials.headerHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
    <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php (do_action('get_footer')); ?>
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php (wp_footer()); ?>
  </body>
</html>
