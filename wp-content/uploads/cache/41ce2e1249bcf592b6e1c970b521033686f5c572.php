<!-- loading -->
<div class="tornado-loader">
  <div class="loading">
    <img src="<?= App\asset_path('images/tie-white.png'); ?>" alt="<?php echo e(get_bloginfo('name', 'display')); ?>">
      <div class="typing_loader"></div>
  </div>
</div>
<!-- header -->
<header>
  <div class="container">
    <a href="<?php echo e(home_url('/')); ?>" class="logo"><img src="<?= App\asset_path('images/logo.png'); ?>" alt="<?php echo e(get_bloginfo('name', 'display')); ?>"></a>
    <div class="navigation-menu">
      <?php if(has_nav_menu('primary_navigation')): ?>
        <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => 'ul']); ?>

      <?php endif; ?>
    </div>
  </div>
</header>