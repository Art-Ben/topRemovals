<?php
 /*- Page for cubic meter convertation calculator -*/
get_header('padding');
?>

<div class="inventoryCalc">
    <img class="imgAbsl img1 hide" src="<?php echo get_template_directory_uri();?>/images/rightObjectCub.png" alt="box image 1">
    <img class="imgAbsl img2 hide" src="<?php echo get_template_directory_uri();?>/images/leftObjectCub.png" alt="box image 1">

    <div class="container">
        <div class="topHeaders">
            <span class="topHeaders_top text--center">
                <?php the_field('cubicSubTitle','settings');?>
            </span>
            <h2 class="topHeaders_bottom captions captions_h2 text--center">
                <?php the_field('cubicTitle','settings');?>
            </h2>
        </div>

        <div class="inventoryCalc__content">
            <div class="inventoryCalc__places">
                    <div class="inventoryCalc__places--nav">
                        <img src="<?php echo get_template_directory_uri();?>/images/car.svg" alt="car" class="marker">
                        <img src="<?php echo get_template_directory_uri();?>/images/car.svg" alt="car" class="markerTablet">
                    </div>
                    <div class="sliderNav showTablet">
                        <div class="sliderNav--cont">
                            <a href="javascript:void(0);" rel="nofollow" class="arrow prev"></a>
                            <div class="circle"></div>
                            <a href="javasctipt:void(0);" rel="nofollow" class="arrow next"></a>
                        </div>
                        <span class="text text_Cav text--preheader text_full text--center">Scroll to see more</span>
                    </div>

                    <div class="inventoryCalc__places--slider">
                       <?php if(have_rows('cubicSlides','settings')){
                            while(have_rows('cubicSlides','settings')){
                                the_row();
                        ?>
                        <div class="slide" data-parent="<?php the_sub_field('slideTitle')?>"><?php the_sub_field('slideTitle')?></div>
                        <?php }
                        }?>

                        <div class="slide">Comments</div>

                    </div>
        </div>
                
                <div class="inventoryCalc__form">
                    <div class="inventoryCalc__places--items">
                        <?php if(have_rows('cubicSlides','settings')){
                        while(have_rows('cubicSlides','settings')){
                            the_row();
                        ?>
                        <div class="slide" data-slide="<?php the_sub_field('slideTitle');?>">
                            <?php
                                if(get_sub_field('calcLine')){
                                    $calcline = get_sub_field('calcLine');
                                    $items_count = count($calcline);
                                    if($items_count > 5){
                                         $items_half = ceil($items_count / 2);
                                         $calcLine_chunks = array_chunk($calcline, $items_half);
                                        foreach ($calcLine_chunks as $chunk) {
                            ?>
                            <div class="column">
                                <?php
                                    foreach ($chunk as $value) {
                                ?>
                                <div class="calcLine" data-coef="<?php echo $value['coef']?>" data-scope="0">
                                    <div class="calcLine__text">
                                        <?php echo $value['title'];?>
                                    </div>
                                    <div class="calcLine__btns">
                                        <a href="javascript:void(0);" rel="nofollow" class="btn minus">
                                            <span class="icon"></span>
                                        </a>
                                        <span class="scope">0</span>
                                        <a href="javascript:void(0);" rel="nofollow" class="btn plus">
                                            <span class="icon"></span>
                                            <span class="icon"></span> 
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                                    </div>
                                <?php } ?>
                            
                            
                        
                        
                        <?php      
                                } else {
                                        if(have_rows('calcLine')) {
                                            ?>
                                            <div class="column">
                                            <?php
                                            while(have_rows('calcLine')){
                                                the_row();
                                                ?>
                                                <div class="calcLine" data-coef="<?php the_sub_field('coef')?>" data-scope="0">
                                                    <div class="calcLine__text">
                                                        <?php the_sub_field('title');?>
                                                    </div>
                                                    <div class="calcLine__btns">
                                                        <a href="javascript:void(0);" rel="nofollow" class="btn minus">
                                                            <span class="icon"></span>
                                                        </a>
                                                        <span class="scope">0</span>
                                                        <a href="javascript:void(0);" rel="nofollow" class="btn plus">
                                                            <span class="icon"></span>
                                                            <span class="icon"></span> 
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                <?php
                                            }?>
                                            </div>
                                            <?php
                                        }
                                    } 
                                } else {
                                    echo '<div class="err">Please fill in the required data in the admin panel</div>';
                                }
                            ?>
                                </div>
                            <?php
                            }
                        }?>
                        <div class="slide">
                            <div class="txtArea">
                                <span class="tit">
                                        Write here all items, that you didn’t find, their descriptions and quantities
                                </span>
                                <textarea class="cstArea" placeholder="Type here"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="inventoryCalc__form--total">
                        <div class="summary">
                            <div class="summary_buttons">
                                <div class="contains">
                                    <span class="titl">Your list</span>
                                    <div class="subTot">contain <span class="count">0</span> objects</div>
                                </div>
                                <a href="javascript:void(0);" rel="nofollow" class="moreList open">
                                        See all
                                </a>
                            </div>
                            <div class="summary__list">
                                <?php if(have_rows('cubicSlides','settings')){
                                    while(have_rows('cubicSlides','settings')){
                                        the_row();
                                ?>
                                
                                <div class="summary__list--item hide" data-slideShow='<?php the_sub_field('slideTitle')?>'>
                                        <div class="titl">
                                            <?php the_sub_field('slideTitle');?>
                                        </div>
                                        <?php if(have_rows('calcLine')){
                                            while(have_rows('calcLine')){
                                                the_row();
                                        ?>
                                        <div class="calcLine hide" data-lineShow='<?php     
                                            the_sub_field('title');
                                        ?>'>
                                            <div class="calcLine__text">
                                                <?php the_sub_field('title');?>
                                            </div>
                                            <div class="calcLine__btns">
                                                <span class="scope">0</span>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        }?>

                                </div>
                                <?php }
                                }?>
                                <div class="summary__list--item hide" data-slideShow='comments'>
                                    <div class="titl">
                                        Comments
                                    </div>
                                    <textarea readonly class="cstArea" placeholder="Type here"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="btnLine">
                            <a href="javascript:void(0);" class="button_gradient button nonHover">
                                <span class="big">Convert</span> my  inventory to Cubic Meter
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<?php
get_footer('padding');
?>
