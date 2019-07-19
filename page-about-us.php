<?php
/*
    Template Name: About us page tamplate
    Template Post Type: post, page, event
 */
get_header('padding');
?>

<div class="simplePage">
    <div class="simplePage__cont">
        <div class="backHomeLine">
            <a href="<?php echo get_home_url();?>" class="link">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjciIGhlaWdodD0iMjEiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTI2IDEwLjM3NUgxbTkuMzc1IDkuMzc1TDEgMTAuMzc1IDEwLjM3NSAxIiBzdHJva2U9IiMyQTI5MkUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjwvc3ZnPg==" alt="arrow back" class="icon"> Back to home page
            </a>
        </div>
        <div class="simplePage__content">
            <img class="imgAbsl img1About hide" src="<?php echo get_template_directory_uri();?>/images/aboutUs1.png" alt="box">
            <img class="imgAbsl img2About hide" src="<?php echo get_template_directory_uri();?>/images/aboutUs2.png" alt="box">
            <img class="imgAbsl img3About hide" src="<?php echo get_template_directory_uri();?>/images/aboutUs3.png" alt="box">
            <img class="imgAbsl img4About hide" src="<?php echo get_template_directory_uri();?>/images/aboutUs4.png" alt="box">
            <img class="imgAbsl img5About hide" src="<?php echo get_template_directory_uri();?>/images/aboutUs5.png" alt="box">
            <div class="titl">
                <h1 class="titl__itm"><?php the_title();?></h1>
            </div>
            <?php 
                while(have_posts()){
                    the_post();
                    the_content();
                }
            ?>
        </div>
    </div>
</div>

<?php get_footer('collapsed');?>
