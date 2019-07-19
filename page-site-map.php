<?php
/*
    Template Name: Site Map Page
    Template Post Type: post, page, event
 */

get_header('padding');
?>
<div class="simplePage">
    <div class="simplePage__cont">
        <div class="simplePage__content">
            <img class="imgAbsl img1 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageBoxBig.png" alt="box">
            <img class="imgAbsl img2 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageRightBox.png" alt="box">
            <img class="imgAbsl img3 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageLeftBox.png" alt="box">
            <img class="imgAbsl img4 hide" src="<?php echo get_template_directory_uri();?>/images/simplePageRightBoxSmall.png" alt="box">
            <?php if(have_posts()){
                while(have_posts()){
                    the_post();
            ?>
            
            <div class="titl">
                <h1 class="titl__itm"><?php the_title();?></h1>
            </div>
            <div class="sitemap">
                <div class="sitemap__titl">
                    Pages
                </div>
                <div class="sitemap__list">
                    <?php
                        $pages = get_pages( array( 
                        'meta_key'     => '_wp_page_template', 
                        'meta_value'   => 'page-site-map-item.php', 
                        'hierarchical' => 0
                    ));

                    foreach( $pages as $page ){
                        ?>
                        <p class="line">
                            <a href="<?php echo get_page_link( $page->ID ); ?>" class="link"><?php echo $page->post_title;?></a>
                        </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php }
            }?>
        </div>
    </div>
</div>
<?php
get_footer('collapsed');
