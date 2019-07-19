<?php
/*
    Template Name: Single site map item
    Template Post Type: post, page, event
 */
get_header('padding');
?>
<div class="simplePage">
    <div class="simplePage__cont">
        <?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'single-site-map' );
		endwhile;
		?>
       <div class="singleSiteMap__add">
           <div class="txt">
               You can use Top Removals to get quotes from removalists in any suburb throughout Australia.
           </div>
           <div class="singleSiteMap__relateds">
               <?php 
                    global $post;
                    $exld = $post -> ID;
                    $pages = get_pages( array( 
                        'meta_key'     => '_wp_page_template', 
                        'meta_value'   => 'page-site-map-item.php', 
                        'hierarchical' => 0,
                        'exclude' => $exld
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
    </div>
</divd>
<?php
get_footer('padding');
?>