<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Top_Removals
 */

?>
<footer class="footer flex wrap vr-algn__top hr-algn__center">
    <div class="footer_top flex wrap vr-algn__top hr-algn__center">
        <div class="container flex wrap vr-algn__top hr-algn__bet">
            <div class="footer__column tabletHide">
                <div class="footer__column--title">
                    Quick contact
                </div>
                <div class="footer_contactForm">
                    <div class="form black">
                        <?php echo do_shortcode('[contact-form-7 id="213" title="footer contact form"]');?>
                    </div>
                </div>
            </div>
            <div class="footer__column tabletWidth">
                <div class="footer__column--title">
                    Our office
                </div>
                <div class="footer_contactList">
                    <div class="headGroup">
                        <a href="mailto:<?php the_field('office-email','settings');?>" class="item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/iconEmail.svg" alt="email icon">
                            <span><?php the_field('office-email','settings')?></span>
                        </a>
                        <a href="tel:<?php the_field('office-number','settings')?>" class="item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/iconPhone.svg" alt="phone icon">
                            <span><?php the_field('office-number','settings')?></span>
                        </a>
                    </div>
                    <div class="bottomGroup">
                        <span class="item nonHover">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/icon-LocationPin.svg" alt="marker icon">
                            <span><?php the_field('office-address','settings')?></span>
                        </span>
                        <?php
                                $location = get_field('location','settings');
                                if(!empty($location)){
                            ?>
                        <div class="acf-map mapCont">
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                        </div>
                        <?php }?>
                    </div>
                    <a href="javascript:void(0);" class="quickContact showModalWindow" data-show-modal="freeCall" rel="nofollow">
                        Quick contact
                    </a>
                </div>
            </div>
            <div class="footer__column">
                <div class="footer__column--title hideMobile">
                    Services
                </div>
                <div class="footer_nav">
                    <div class="footerMenu hideMobile">
                        <?php wp_nav_menu(array('container'=>false, 'theme_location' => 'footer-services', 'menu_class'=>'footerMenu--list', 'fallback_cb'=> ''));?>
                    </div>
                    <div class="footerMenu">
                        <?php wp_nav_menu(array('container'=>false, 'theme_location' => 'footer-pages', 'menu_class'=>'footerMenu--list', 'fallback_cb'=> ''));?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom flex wrap hr-algn__center">
        <div class="container flex wrap vr-algn__center hr-algn__bet">
            <div class="footerCopyright">
                © Top removals 2018 - <?php echo date('Y')?>. All rights reserved.
            </div>
            <div class="footerMade">
                Made by <a href="https://anvi.agency" rel="nofollow" target="_blank">ANVI.agency</a>
            </div>
        </div>
    </div>
</footer>

<?php get_template_part('template-parts/modal-windows');?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3ObqUxuk5Dj_VvBeZ_xFEuR9m8WCKGiQ&libraries=places"></script>

<?php wp_footer();?>
</body>

</html>
