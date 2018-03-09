<?php use Roots\Sage\Assets; ?>
<!-- loading -->
<div class="tornado-loader">
  <div class="loading">
    <img src="<?= Assets\asset_path('images/tie-white.png'); ?>" alt="">
      <div class="typing_loader"></div>
  </div>
</div>
<!-- header -->
<header>
  <div class="container">
    <a href="<?= esc_url(home_url('/')); ?>" class="logo"><img src="<?= Assets\asset_path('images/logo.png'); ?>" alt=""></a>
    <div class="navigation-menu">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => 'ul']);
      endif;
      ?>
    </div>
  </div>
</header>
