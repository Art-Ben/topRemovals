<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Top_Removals
 */

?>

<div class="blog__single">
    <div class="titleLine">
        <h1 class="title"><?php the_title();?></h1>
    </div>
    <div class="readLine">
        Time to read: <?php the_field('postTimeToRead'); ?> min.
    </div>
    <div class="content">
        <img class="imgAbsl img1 hide" src="<?php echo get_template_directory_uri();?>/images/postLeftBox.png" alt="">
        <img class="imgAbsl img2 hide" src="<?php echo get_template_directory_uri();?>/images/postLeftBoxLow.png" alt="">
        <img class="imgAbsl img3 hide" src="<?php echo get_template_directory_uri();?>/images/postRightBox.png" alt="">

        <?php the_content();?>

    </div>
</div>
