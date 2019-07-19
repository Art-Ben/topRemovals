<?php
/*
    Template Name: Single sity page template
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
<div class="singleSityPage">
    <picture class="bg">
        <source media="(max-width:480px)" srcset="<?php the_field('singleSityImagePhone');?>">
        <source media="(max-width:992px)" srcset="<?php the_field('singleSityTablet');?>">
        <source media="(max-width:1920px)" srcset="<?php the_field('singleSityDesktop');?>">
        <img src="<?php the_field('singleSityDesktop');?>" alt="page">
    </picture>
    <div class="container flex wrap vr-algn__top  hr-algn__bet">
        <div class="singleSityPage__content">
            <h1 class="title">
                <?php if(have_posts()) {
                    while(have_posts()) {
                        the_post();
                        the_title();
                    }
                }?>
            </h1>
            <div class="singleSityPage__content--slider">
                <?php if(have_rows('singleSityPage__slider')){
                    while(have_rows('singleSityPage__slider')){
                        the_row();
                    ?>
                <div class="slide" style="background-image:url(<?php the_sub_field('slide');?>);"></div>
                <?php
                }
                }?>
            </div>
            <div class="singleSityPage__content--text">
                <div class="titl">
                    Top Removals in <?php the_field('cityName');?> will take your move from tiring and stressful, to effortlessly easy.
                </div>
                <div class="cnt scrollbar-inner">
                    <?php if(have_posts()) {
                        while(have_posts()) {
                            the_post();
                            the_content();
                        }
                    }?>
                </div>

            </div>
            <div class="hiddenForm">
                <div class="singleSityPage--form mobile">
                    <div class="tit">
                        Quick Quote
                    </div>
                    <div class="singleSityPage--form__slider">
                        <div class="step" id="formLocationMb">
                            <div class="tit">
                                1. Location
                            </div>
                            <div class="labelGroup">
                                Moving from:
                            </div>
                            <div class="formGroup ">
                                <span class="lbl">
                                    State
                                </span>
                                <select name="stateFrom" class="cstSelect">
                                    <option value="">Choose State </option>
                                    <option value="VIC">VIC</option>
                                    <option value="NSW">NSW</option>
                                    <option value="QLD">QLD</option>
                                    <option value="WA">WA</option>
                                    <option value="SA">SA</option>
                                    <option value="ACT">ACT</option>
                                    <option value="NT">NT</option>
                                    <option value="TAS">TAS</option>
                                </select>
                            </div>
                            <div class="formGroup mrgBtn">
                                <span class="lbl">Suburb / Town</span>
                                <input name="cityFrom" type="text" class="cstInpt" placeholder="Enter">
                            </div>
                            <div class="labelGroup">
                                Moving to:
                            </div>
                            <div class="formGroup">
                                <span class="lbl">
                                    State
                                </span>
                                <select name="stateTo" class="cstSelect">
                                    <option value="">Choose State </option>
                                    <option value="VIC">VIC</option>
                                    <option value="NSW">NSW</option>
                                    <option value="QLD">QLD</option>
                                    <option value="WA">WA</option>
                                    <option value="SA">SA</option>
                                    <option value="ACT">ACT</option>
                                    <option value="NT">NT</option>
                                    <option value="TAS">TAS</option>
                                </select>
                            </div>
                            <div class="formGroup mrgBtn">
                                <span class="lbl">Suburb / Town</span>
                                <input name="cityTo" type="text" class="cstInpt" placeholder="Enter">
                            </div>

                            <div class="btnLine">
                                <button class="button button_gradient button_full nonHover">
                                    Next
                                </button>
                            </div>
                        </div>
                        <div class="step" id="formDetailMb">
                            <div class="tit">
                                2. Your details
                            </div>
                            <div class="formGroup">
                                <span class="lbl">Name</span>
                                <input id="nameGQ-mb" name="QnameQ" type="text" class="cstInpt" placeholder="Enter your name">
                            </div>
                            <div class="formGroup">
                                <span class="lbl">Phone</span>
                                <input id="phoneGQ-mb" name="phoneQQ" type="text" class="cstInpt" placeholder="Phone number">
                            </div>
                            <div class="formGroup mrgBtn">
                                <span class="lbl">E-mail</span>
                                <input id="emailGQ-mb" name="emailQQ" type="text" class="cstInpt" placeholder="Enter your e-mail">
                            </div>
                            <div class="btnLine">
                                <button class="button button_gradient button_full nonHover">
                                    Next
                                </button>
                            </div>
                        </div>
                        <div class="step" id="formQuestionsMb">
                            <div class="tit">
                                3. Comments / questions
                            </div>
                            <?php echo do_shortcode('[contact-form-7 id="442" title="Quick quote"]');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="singleSityPage__content--text_about">
                <div class="titl">
                    About Top Removals
                </div>
                <div class="cnt scrollbar-inner">
                    <?php the_field('singleSityPage_about');?>
                </div>

            </div>
            <div class="btnLine">
                <?php $banerBtns =get_field('singleSityBtns');
                    if($banerBtns){?>
                <a href="<?php echo $banerBtns['first-button']['link']; ?>" class="button button_gradient nonHover">
                    <?php echo $banerBtns['first-button']['label'];?>
                </a>
                <a href="<?php echo $banerBtns['second-button']['link']; ?>" class="button button_white nonHover">
                    <?php echo $banerBtns['second-button']['label'];?>
                </a>
                <?php } ?>
            </div>
        </div>
        <div class="singleSityPage__sidebar">
            <div class="singleSityPage--form desktop">
                <div class="tit">
                    Quick Quote
                </div>
                <div class="singleSityPage--form__slider">
                    <div class="step" id="formLocationDs">
                        <div class="tit">
                            1. Location
                        </div>
                        <div class="labelGroup">
                            Moving from:
                        </div>
                        <div class="formGroup">
                            <span class="lbl">
                                State
                            </span>
                            <select name="stateFrom" class="cstSelect">
                                <option value="">Choose State </option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="ACT">ACT</option>
                                <option value="NT">NT</option>
                                <option value="TAS">TAS</option>
                            </select>
                        </div>
                        <div class="formGroup mrgBtn">
                            <span class="lbl">Suburb / Town</span>
                            <input name="cityFrom" type="text" class="cstInpt" placeholder="Enter">
                        </div>
                        <div class="labelGroup">
                            Moving to:
                        </div>
                        <div class="formGroup">
                            <span class="lbl">
                                State
                            </span>
                            <select name="stateTo" class="cstSelect">
                                <option value="">Choose State </option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="ACT">ACT</option>
                                <option value="NT">NT</option>
                                <option value="TAS">TAS</option>
                            </select>
                        </div>
                        <div class="formGroup mrgBtn">
                            <span class="lbl">Suburb / Town</span>
                            <input name="cityTo" type="text" class="cstInpt" placeholder="Enter">
                        </div>

                        <div class="btnLine">
                            <button class="button button_gradient button_full nonHover">
                                Next
                            </button>
                        </div>
                    </div>
                    <div class="step" id="formDetailDs">
                        <div class="tit">
                            2. Your details
                        </div>
                        <div class="formGroup">
                            <span class="lbl">Name</span>
                            <input id="nameGQ-ds" name="QnameQ" type="text" class="cstInpt" placeholder="Enter your name">
                        </div>
                        <div class="formGroup">
                            <span class="lbl">Phone</span>
                            <input id="phoneGQ-ds" name="phoneQQ" type="text" class="cstInpt" placeholder="Phone number">
                        </div>
                        <div class="formGroup mrgBtn">
                            <span class="lbl">E-mail</span>
                            <input id="emailGQ-ds" name="emailQQ" type="text" class="cstInpt" placeholder="Enter your e-mail">
                        </div>
                        <div class="btnLine">
                            <button class="button button_gradient button_full nonHover">
                                Next
                            </button>
                        </div>
                    </div>
                    <div class="step" id="formQuestionsDs">
                        <div class="tit">
                            3. Comments / questions
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="442" title="Quick quote"]');?>
                    </div>
                </div>
            </div>
            <div class="singleSityPage--map">
                <img src="<?php the_field('sidebarMapImage');?>" alt="move to <?php the_field('cityName');?>" <?php if(get_field('useImageMap')){?>usemap="#citiesMap" <?php } ?> class="img">
                <?php if(get_field('useImageMap')){?>
                <map name="citiesMap">
                    <?php if(have_rows('citiesMapImage')){
                        while(have_rows('citiesMapImage')){
                            the_row();?>
                    <area shape="poly" coords="<?php the_sub_field('coords')?>" href="<?php the_sub_field('link')?>">
                    <?php
                        }
                    }?>
                </map>
                <?php } ?>
            </div>
        </div>
        <div class="quickInfo">
            <div class="tl">
                Move with Us for Easy, Affordable, Removalists in <?php the_field('cityName');?>
            </div>
            <div class="infLine">
                <span class="lbl">Email:</span>
                <a class="link" href="mailto:<?php the_field('singleSityEmail')?>">
                    <?php the_field('singleSityEmail')?>
                </a>
            </div>
            <div class="infLine">
                <span class="lbl">Phone:</span>
                <a class="link" href="tel:<?php the_field('singleSityPhone')?>">
                    <?php the_field('singleSityPhone')?>
                </a>
            </div>
        </div>
    </div>
    <div class="sityPageTestimonails">
        <div class="titl">
            Check out hundreds of highly rated and genuine online customer reviews
        </div>
        <div class="line">
            <div class="container">
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
        </div>

    </div>
</div>

    <?php get_footer('collapsed');?>
