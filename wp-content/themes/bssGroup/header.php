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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98356924-1', 'auto');
  ga('send', 'pageview');

</script>

    </head>
    <body>
<!-- loading -->
        <div class="tornado-loader">
            <div class="loading">
                <img src="<?php echo get_template_directory_uri() ?>/img/tie-white.png" alt="">
                <div class="typing_loader"></div>
            </div>
        </div>
<!-- header -->
<header>
    <div class="container">
        <a href="<?php bloginfo('url' ); ?>" class="logo"><img src="<?php echo $redux_demo['header_logo']['url'] ?>" alt=""></a>
        
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
