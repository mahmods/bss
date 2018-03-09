<?php global $redux_demo ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        
        <?php wp_head() ?>
    </head>
    <body>
        
        <!-- loading -->
        <div class="tornado-loader">
            <div class="loading">
                <img src="<?php echo get_template_directory_uri() ?>/img/tie-white.png" alt="">
                <div class="typing_loader"></div>
            </div>
        </div>

<div class="lightbox-rbany">
     <div class="content">
         <span class="close ti-close-a"></span>
         <a href="http://bss-group.net/news/%d9%85%d8%a8%d8%a7%d8%af%d8%b1%d8%a9-%d8%aa%d8%af%d8%b1%d9%8a%d8%a8%d9%8a%d8%a9-%d9%84%d9%84%d8%aa%d8%a3%d9%87%d9%8a%d9%84-%d9%84%d8%b3%d9%88%d9%82-%d8%a7%d9%84%d8%b9%d9%85%d9%84/"><img src="<?php echo get_template_directory_uri() ?>/img/slide02.png" alt=""></a>
     </div>
</div>

        <!-- Home Header -->
        <div class="home-header">
            
            <!-- header -->
            <header>
                <div class="container">
                    <a href="<?php bloginfo('url' ); ?>" class="logo"><img src="<?php echo $redux_demo['header_logoـhome']['url'] ?>" alt=""></a>
                    
                    <div class="navigation-menu">
                        <?php 
               /**
                * Displays a navigation menu
                * @param array $args Arguments
                */
                $args = array(
                    'theme_location' => 'Main_Menu',
                    'menu' => 'Main_Menu',
                    'container' => 'ul',
                    
                );
            
                wp_nav_menu( $args );
         ?>
                    </div>
                </div>
            </header>
            <!-- // header -->
            
            <div class="intro">
                <div class="social">
                    <span class="wow fadeInLeft"><a href="<?php echo $redux_demo['facebook']?>" class="ti-facebook" target="_blank"><span></span></a></span>
                    <span class="wow fadeInLeft" data-delay="0.3s"><a href="<?php echo $redux_demo['twitter'] ?>" class="ti-twitter" target="_blank"><span></span></a></span>
                    <span class="wow fadeInLeft" data-delay="0.6s"><a href="<?php echo $redux_demo['linkedin'] ?>" class="ti-linkedin" target="_blank"><span></span></a></span>
                    <span class="wow fadeInLeft" data-delay="0.9s"><a href="<?php echo $redux_demo['googleplus'] ?>" class="ti-googleplus" target="_blank"><span></span></a></span>
                    <span class="wow fadeInLeft" data-delay="1.2s"><a href="<?php echo $redux_demo['pinterest'] ?>" class="ti-pinterest" target="_blank"><span></span></a></span>
                </div>
                
                <div class="intro-logo wow slideExpandUp">
                    <span><img src="<?php echo $redux_demo['header_main_logo']['url'] ?>" alt=""></span>
                </div>
            </div>
            
            <a href="#companys" class="ti-chevron-down scroll-down"></a>
        </div>
        <!-- // Home Header -->