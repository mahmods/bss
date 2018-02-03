<!-- loading -->
<div class="tornado-loader">
  <div class="loading">
    <img src="@asset('images/tie-white.png')" alt="{{ get_bloginfo('name', 'display') }}">
      <div class="typing_loader"></div>
  </div>
</div>
<!-- header -->
<header>
  <div class="container">
    <a href="{{ home_url('/') }}" class="logo"><img src="@asset('images/logo.png')" alt="{{ get_bloginfo('name', 'display') }}"></a>
    <div class="navigation-menu">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => 'ul']) !!}
      @endif
    </div>
  </div>
</header>