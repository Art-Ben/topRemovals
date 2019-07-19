<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Top_Removals
 */

?>
<div class="simplePage__content">
    <img class="imgAbsl img1 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageBoxBig.png" alt="box">
    <img class="imgAbsl img2 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageRightBox.png" alt="box">
    <img class="imgAbsl img3 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageLeftBox.png" alt="box">
    <img class="imgAbsl img4 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageRightBoxSmall.png" alt="box">
    
    <div class="titl">
        <h1 class="titl__itm"><?php echo the_title();?></h1>
    </div>
    <?php the_content();?>
</div>

