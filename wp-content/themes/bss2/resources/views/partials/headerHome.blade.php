<!-- loading -->
<div class="tornado-loader">
  <div class="loading">
    <img src="@asset('images/tie-white.png')" alt="{{ get_bloginfo('name', 'display') }}">
      <div class="typing_loader"></div>
  </div>
</div>

<div class="lightbox-rbany">
     <div class="content">
         <span class="close ti-close-a"></span>
         <a href="http://bss-group.net/news/%d9%85%d8%a8%d8%a7%d8%af%d8%b1%d8%a9-%d8%aa%d8%af%d8%b1%d9%8a%d8%a8%d9%8a%d8%a9-%d9%84%d9%84%d8%aa%d8%a3%d9%87%d9%8a%d9%84-%d9%84%d8%b3%d9%88%d9%82-%d8%a7%d9%84%d8%b9%d9%85%d9%84/"><img src="@asset('images/slide02.png')" alt=""></a>
     </div>
</div>
<!-- header -->
<div class="home-header">
  <header>
    <div class="container">
      <a href="{{ home_url('/') }}" class="logo"><img src="@asset('images/logo-w.png')" alt="{{ get_bloginfo('name', 'display') }}"></a>
      <div class="navigation-menu">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => 'ul']) !!}
        @endif
      </div>
    </div>
    </header>
    <div class="intro">
        <div class="social">
            <span class="wow fadeInLeft"><a href="" class="ti-facebook" target="_blank"><span></span></a></span>
            <span class="wow fadeInLeft" data-delay="0.3s"><a href="" class="ti-twitter" target="_blank"><span></span></a></span>
            <span class="wow fadeInLeft" data-delay="0.6s"><a href="" class="ti-linkedin" target="_blank"><span></span></a></span>
            <span class="wow fadeInLeft" data-delay="0.9s"><a href="" class="ti-googleplus" target="_blank"><span></span></a></span>
            <span class="wow fadeInLeft" data-delay="1.2s"><a href="" class="ti-pinterest" target="_blank"><span></span></a></span>
        </div>
        
        <div class="intro-logo wow slideExpandUp">
            <span><img src="@asset('images/logo-w.png')" alt=""></span>
        </div>
    </div>

    <a href="#companys" class="ti-chevron-down scroll-down"></a>
</div>