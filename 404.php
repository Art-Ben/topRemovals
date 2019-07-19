<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Top_Removals
 */

get_header('padding');
?>
<div class="eor404" style="background-image:url(<?php the_field('page404Image','settings');?>)">
    <div class="eor404__content">
        <h1 class="titl">
            <img src="<?php echo get_template_directory_uri();?>/images/404.svg" alt="error 404">
        </h1>
        <h2 class="text">
            <span class="line"><?php the_field('page404Text1','settings');?></span>
            <span class="line"><?php the_field('page404Text2','settings');?></span>
        </h2>
    </div>
</div>

<?php
get_footer('collapsed');
