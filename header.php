<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Top_Removals
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!--    Google Fonts Montserrat    -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
    <!--    Google Fonts Caveat    -->
    <link href="https://fonts.googleapis.com/css?family=Caveat:400,700&amp;subset=latin-ext" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PQQR7TN');

    </script>
    <!-- End Google Tag Manager -->
    
    <script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    ga('send', 'event', 'Contact Form', 'submit');
}, false );
</script>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQQR7TN" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header class="header flex wrap vr-algn__center hr-algn__center">
        <div class="header__cont container flex wrap vr-algn__center hr-algn__bet">
            <a href="<?php echo get_home_url();?>" class="logoCont">
                <img src="<?php the_field('site-logo','settings');?>" alt="Top Removals" class="hideMobile">
                <img src="<?php the_field('site-logo-mobile','settings');?>" alt="Top Removals" class="showMobile">
            </a>
            <div class="infoCont">
                <a href="javascript:void(0);" class="callback showModalWindow" rel="nofollow" data-show-modal="freeCall">
                    <img class="icon" src="<?php echo get_template_directory_uri();?>/images/getAquoteIcon.svg" alt="callback icon">
                    <div class="titleGroup">
                        <span class="title">Get a</span>
                        <span class="title">Quote</span>
                    </div>
                </a>
                <a href="tel:<?php the_field('quick-call','settings');?>" class="callback--numer" rel="nofollow">
                    <img class="icon" src="<?php echo get_template_directory_uri();?>/images/icons/callback.svg" alt="callback icon">
                    <span class="num"><?php the_field('quick-call','settings');?></span>
                </a>
                <div class="menu">
                    <a href="javascript:void(0);" rel="nofollow" class="menu__link" title="click to toggle menu">

                        <div class="menuIcon">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <nav class="menu__hiddenList_mobile">
            <div class="container flex wrap hr-algn__bet vr-algn__center">
                <!-- show full menu -->
                <?php wp_nav_menu(array('container'=>false, 'theme_location' => 'primary', 'menu_class'=>'menu__hiddenList_mobile-line long', 'fallback_cb'=> ''));?>


                <!-- show services list menu -->
                <!--<?php/* wp_nav_menu(array('container'=>false, 'theme_location' => 'primary', 'menu_class'=>'menu__hiddenList_mobile-line long', 'fallback_cb'=> ''));*/?>-->

                <!-- show pages list menu -->
                <!--<?php/* wp_nav_menu(array('container'=>false, 'theme_location' => 'pages', 'menu_class'=>'menu__hiddenList_mobile-line algnRight', 'fallback_cb'=> ''));*/?>-->

            </div>
        </nav>
    </header>
