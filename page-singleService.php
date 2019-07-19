<?php
/*
    Template Name: Single Service page tamplate
    Template Post Type: post, page, event
 */
get_header('padding');
?>
<div class="additionalMenu short">
    <div class="container">
        <div class="additionalMenu__list">
            <?php if(have_rows('service-links-menu','settings')){
                     while(have_rows('service-links-menu','settings')) {
                         the_row();
                         $tit = get_sub_field('title');
                         $link = get_sub_field('link');
                         $useSubMenu = get_sub_field('useSubMenu');
                ?>

            <?php if($useSubMenu){
                    ?>
            <div class="additionalMenu__list--link">
                <a href="<?php echo $link;?>" class="additionalMenu__list--link__inner">
                    <?php if(get_sub_field('use_br')){ the_sub_field('title-firstLine');?>
                    <br>
                    <?php
                                    the_sub_field('title-secondLine');                            
                                } else { the_sub_field('title'); }?>
                </a>
                <span class="toggleMenu"></span>
            </div>
            <?php
                } else {?>
            <a href="<?php echo $link;?>" class="additionalMenu__list--link">
                <?php if(get_sub_field('use_br')){ the_sub_field('title-firstLine');?>
                <br>
                <?php
                        the_sub_field('title-secondLine');                            
                    } else { the_sub_field('title'); }
                }?>
            </a>
            <?php }
                }?>
            <div class="additionalMenu__hidden">
                <?php if(have_rows('citiesMenu','settings')){
                        while(have_rows('citiesMenu','settings')){
                            the_row();
                            ?>
                <a href="<?php the_sub_field('link')?>" class="link">
                    <?php the_sub_field('label');?>
                </a>
                <?php
                        }
                    }?>
            </div>
        </div>
    </div>
</div>
<section class="singleService flex wrap hr-algn__center">
    <picture class="bg">
        <source media="(max-width:480px)" srcset="<?php the_field('phoneImage');?>">
        <source media="(max-width:992px)" srcset="<?php the_field('tabletImage');?>">
        <source media="(max-width:1920px)" srcset="<?php the_field('desktopImage');?>">
        <img src="<?php the_field('basicImage');?>" alt="banner for the <?php the_title();?> page">
    </picture>
    <div class="container">
        <div class="singleService__content">
            <div class="singleService__content--item">
                <h1 class="captions">
                    <?php the_field('serviceTitle');?>
                </h1>
                <?php if(get_field('shortDesc')){?>
                <div class="txt small scrollbar-inner">
                    <?php the_field('content');?>
                </div>
                <?php } else{?>
                <div class="txt scrollbar-inner">
                    <?php the_field('content');?>
                </div>
                <?php }?>
                <div class="btn-line flex wrap hr-agn__left">
                    <a href="<?php if(get_field('linkBtn')){the_field('linkBtn');} else {echo 'javascript:void(0);';}?>" class="button button_gradient <?php if(get_field('useScroll')){
    echo 'scrLink';
} if(get_field('useModal')){
    echo 'showModalWindow';
}?>" data-show-modal="<?php the_field('useModal'); ?>">
                        Get a free quote
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer('collapsed');?>
