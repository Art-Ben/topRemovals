<?php 
/*
    Template Name: Home page
    Template Post Type: post, page, event
 */
get_header();
?>

<section class="primaryBanner flex wrap vr-algn__top hr-algn__center">
        <?php
        $hero_banner = get_field('hero-banner');
        if($hero_banner){
        ?>
        <picture class="bg">
            <source media="(max-width:480px)" srcset="<?php echo $hero_banner['hero-image_992']?>">
            
            <source media="(max-width:992px)" srcset="<?php echo $hero_banner['hero-image_992']?>">
            
            <source media="(max-width:1920px)" srcset="<?php echo $hero_banner['hero-image_1920']?>">
            
            <source media="(min-width:1921px)" srcset="<?php echo $hero_banner['hero-image_2560'] ?>">
            
            <source media="(min-width:2560px)" srcset="<?php echo $hero_banner['hero-image_retina']; ?>">
            
            <img src="<?php echo $hero_banner['hero-image_1920']; ?>" alt="Primary Banner">
        </picture>    
        <!-- -->
        <?php
        }else{ ?>
            <picture class="bg">
                <img src="<? echo get_template_directory_uri();?>/images/primary_banner_image_2560.png" alt="Primary Banner">
            </picture>
        <?php } ?>
        
        <div class="primaryBanner__content">
            <div class="primaryBanner__content--container flex wrap vr-algn__top hr-algn__left desktop">
                <div class="cpts">
                    <h1>
                       <?php
                            $banerTxt = get_field('banner-text');
                            if($banerTxt){    
                        ?> 
                        <span class="captions captions_h2">
                            <?php echo $banerTxt['banner-text_desktop']['first_text_line'];?>
                        </span>
                        <span class="captions captions_h2">
                            <?php echo $banerTxt['banner-text_desktop']['second_text_line'];?>
                        </span>
                        <?php
                            }
                        ?> 
                   </h1>
                </div>
                <div class="cpts showTablet">
                    <h2>
                        <span class="captions captions_h1">
                            <?php echo $banerTxt['banner-text_tablet']['text_line'];?>
                        </span>
                    </h2>
                </div>
                <dvi class="subCpts text text_light text_big">
                    <?php echo $banerTxt['banner-text_desktop']['sub-header'];?>
                </dvi>
                <dvi class="subCpts text text_light text_big showTablet">
                    <?php echo $banerTxt['banner-text_tablet']['sub-header'];?>
                </dvi>
                <div class="btnLine flex wrap vr-algn__center hr-algn__left">
                    <?php $banerBtns =get_field('banner-btns');
                    if($banerBtns){?>
                    <a href="<?php echo $banerBtns['first-button']['link']; ?>" class="button button_gradient nonHover <?php if($banerBtns['first-button']['scrollBtn']){
                        echo 'scrLink';
                    } 
                     ?>">
                        <?php echo $banerBtns['first-button']['label'];?>
                    </a>
                    <a href="<?php echo $banerBtns['second-button']['link']; ?>" class="button button_white nonHover <?php if($banerBtns['second-button']['scrollBtn']){
                        echo 'scrLink';
                    } 
                     ?>">
                        <?php echo $banerBtns['second-button']['label'];?>
                    </a>
                    <?php } ?>
                </div>
            </div>   
        </div>
    </section>
    
    <section id="freeQuote" class="primaryQuote flex wrap vr-algn__top hr-algn__center">
        <div class="container">
            <div class="topHeaders">
               <?php 
                    $topHeaders=get_field('header-group');
                    if($topHeaders){
                ?>
                <span class="topHeaders_top text--center">
                    <?php echo $topHeaders['second_subtitle'];?>
                </span>
                <h2 class="topHeaders_bottom captions captions_h2 text--center">
                    <?php echo $topHeaders['second_title'];?>
                </h2>
                <?php } ?>
            </div>
            <div class="primaryQuote--content">
               <?php 
                    $text = get_field('texts-group');
                    if($text){
                ?>
                <span class="basicContent text text_big text_full">
                    <?php echo $text['first-line'];?>
                </span>
                <span class="basicContent text text_full text--preheader text_medium">
                    <?php echo $text['second-line'];?>
                </span>
                <?php } ?>
            </div>
            <div class="primaryQuote__order">
                <div class="primaryQuote__order--items">
                    <?php 
                        if(have_rows('items')) {
                            while(have_rows('items')) {
                                the_row();
                                $titl = get_sub_field('title');
                                $link = get_sub_field('link');
                                $image = get_sub_field('image');
                    ?>
                    <a href="<?php echo $link; ?>" class="link">
                        <img src="<?php echo $image; ?>" alt="Top Removals" class="img">
                        <span class="text text_full text--preheader text--center">
                            <?php echo $titl;?>
                        </span>
                    </a>
                    
                    <?php }
                            } else { ?>
                    <a href="javascript:void(0);" class="link">
                        <img src="<?php echo get_template_directory_uri();?>/images/few-things.png" alt="move few thing" class="img">
                        <span class="text text_full text--preheader text--center">
                            A few things
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="link">
                        <img src="<?php echo get_template_directory_uri();?>/images/house.png" alt="move a house" class="img">
                        <span class="text text_full text--preheader text--center">
                            House
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="link">
                        <img src="<?php echo get_template_directory_uri();?>/images/office.png" alt="move a house" class="img">
                        <span class="text text_full text--preheader text--center">
                            Office
                        </span>
                    </a>
                    <?php } ?>
                </div>
                <div class="primaryQuote__order--process">
                    <div class="headLine">
                        <img src="<?php echo get_template_directory_uri();?>/images/car.svg" alt="car Marker" class="carMarker">
                    </div>
                    <div class="bodyLine"></div>
                    <div class="footerLine">
                        <span class="text text_italic text_Cav text--preheader">What</span>
                        <span class="text text_italic text_Cav text--preheader">Where</span>
                        <span class="text text_italic text_Cav text--preheader">When</span>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="additionalMenu">
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
    
    <section class="primarySize flex vr-algn__top hr-algn__center">
        <div class="container">
            <div class="topHeaders">
                <?php $titleGroup = get_field('titles_group');
                    if($titleGroup){
                ?>
                <span class="topHeaders_top text--center">
                    <?php echo $titleGroup['sub_title'];?>
                </span>
                <h2 class="topHeaders_bottom captions captions_h2 text--center">
                    <?php echo $titleGroup['title'];?>
                </h2>
                <?php }?>
            </div>
            
            <div class="sliderNav showTablet">
                <div class="sliderNav--cont">
                    <a href="javascript:void(0);" class="arrow prev"></a>
                    <div class="circle"></div>
                    <a href="javasctipt:void(0);" class="arrow next"></a>
                </div>
                <span class="text text_Cav text--preheader text_full text--center">Scroll to see more</span>
            </div>
            
            <div class="primarySize__slider flex wrap vr-algn__top hr-algn__center">
                <div class="primarySize__slider--nav">
                    <?php if(have_rows('track_slider')){
                        while(have_rows('track_slider')){
                            the_row();
                    ?>
                    <a href="javascript:void(0);" rel="nofollow" class="carousel-cell nav-slide">
                        <?php the_sub_field('slide_nav_title');?>
                    </a>
                    <?php  }
                        }
                    ?>
                </div>
                <div class="primarySize__slider--slides">
                    <?php if(have_rows('track_slider')){
                        while(have_rows('track_slider')){
                            the_row();
                    ?>
                    <div class="slide">
                        <div class="imageSide">
                            <img src="<?php the_sub_field('slide_image')?>" alt="Top Removals">
                        </div>
                        <div class="contentSide">
                            <div class="contentSide--title">
                                <?php the_sub_field('slide_title');?>
                            </div>
                            <div class="contentSide--subCnt">
                                <?php $textArr = get_sub_field('slide_info_text');?>
                                <span class="cpt1"><?php echo $textArr['big_text'];?></span>
                                <span class="cpt2"><?php echo $textArr['small_text'];?></span>
                            </div>
                            <?php the_sub_field('slide_advnt_list');?>
                            <div class="btnLine">
                                <a href="<?php the_sub_field('link');?>" class="link">
                                    <span class="big">
                                        Convert 
                                    </span>
                                    my  inventory to Cubic Meter
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php   }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    
    <section class="primaryTestimonials flex wrap vr-algn__top hr-algn__center">
        <div class="container">
            <div class="topHeaders">
               <?php $titlGrp = get_field('sct4-title_group');
                    if($titlGrp){
                ?>
                <span class="topHeaders_top text--center">
                    <?php echo $titlGrp['sub_title'];?>
                </span>
                <h2 class="topHeaders_bottom captions captions_h2 text--center">
                    <?php echo $titlGrp['title'];?>
                </h2>
                <?php } ?>
            </div>
            
            <div class="sliderNav showTablet mrgBt50">
                <div class="sliderNav--cont">
                    <a href="javascript:void(0);" class="arrow prev"></a>
                    <div class="circle"></div>
                    <a href="javasctipt:void(0);" class="arrow next"></a>
                </div>
                <span class="text text_Cav text--preheader text_full text--center">Scroll to see more</span>
            </div>
            
            <div class="primaryTestimonials__items">
                <?php
                    if(have_rows('testimonialsItems','settings')){
                        while(have_rows('testimonialsItems','settings')){
                            the_row();
                            ?>
                    <div class="item <?php the_sub_field('title');?>">
                        <a href="<?php the_sub_field('link')?>" class="logoLine" rel="nofollow">
                            <img src="<?php the_sub_field('image');?>" alt="<?php the_sub_field('title');?>">
                            <span class="tit">
                                <?php the_sub_field('title');?>
                            </span>
                        </a>
                        <div class="ratingLine" data-rating="<?php the_sub_field('rating') ?>"></div>
                        <div class="bottomLine">
                            <span class="sum"><?php the_sub_field('rating') ?></span> from <span class="scope"><?php the_sub_field('reviews');?></span> reviews
                        </div>
                    </div>
                    <?php
                        }
                    }
                ?>
            </div>
        </div>
    </section>
    
    <section class="primaryWhy flex wrap vr-algn__top hr-algn__center">
        <div class="container">
            <div class="topHeaders">
                <?php $sct5TitleGroup = get_field('sct5_title_group');
                    if($sct5TitleGroup){
                ?>
                <span class="topHeaders_top text--center">
                    <?php echo $sct5TitleGroup['sub_title'];?>
                </span>
                <h2 class="topHeaders_bottom captions captions_h2 text--center">
                    10 reasons for choosing us
                </h2>
                <?}?>
            </div>
            
            <div class="sliderNav showMobile mrgBt50">
                <div class="sliderNav--cont">
                    <a href="javascript:void(0);" class="arrow prev"></a>
                    <div class="circle"></div>
                    <a href="javasctipt:void(0);" class="arrow next"></a>
                </div>
                <span class="text text_Cav text--preheader text_full text--center">Scroll to see more</span>
            </div>
            
            <div class="primaryWhy__slider">
                <?php if(have_rows('advntSlider')){
                    while(have_rows('advntSlider')){
                        the_row();
                        $img = get_sub_field('image');
                        $titl = get_sub_field('title');
                        $hoverTxt = get_sub_field('hoverTxt');
                ?>
                <div class="item">
                    <div class="imageCont">
                        <img src="<?php echo $img;?>" alt="Top Removals">
                    </div>
                    <div class="textCont">
                        <?php echo $titl;?>
                    </div>
                    <div class="hoverCont">
                        <span class="tit">
                            <?php echo $titl;?>
                        </span>
                        <?php echo $hoverTxt;?>
                    </div>
                </div>
                <?php } }?>
            </div>
        </div>
    </section>
    
<?php get_footer(); 