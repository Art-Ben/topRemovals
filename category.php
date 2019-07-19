<?php
get_header('padding');
?>
<div class="pageTitle">
    <picture class="bg">
        <source media="(max-width:480px)" srcset="<?php the_field('blogImagePhone','settings');?>">
        <source media="(max-width:992px)" srcset="<?php the_field('blogImageTablet','settings');?>">
        <source media="(max-width:1920px)" srcset="<?php the_field('blogImage','settings');?>">
        <img src="<?php the_field('blogImage','settings')?>" alt="banner">
    </picture>
    <div class="container">
<!--
        <div class="backHomeLine">
            <a href="/blog" class="link">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjciIGhlaWdodD0iMjEiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTI2IDEwLjM3NUgxbTkuMzc1IDkuMzc1TDEgMTAuMzc1IDEwLjM3NSAxIiBzdHJva2U9IiMyQTI5MkUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjwvc3ZnPg==" alt="arrow back" class="icon"> Back to Blog & News
            </a>
        </div>
-->
        <div class="pageTitle__item">
            <h1 class="cpt">
                <?php 
                    echo single_cat_title();
                ?>
            </h1>
        </div>
    </div>
</div>

<div class="blog">
    <div class="blog__cont blog__cont-inner">
        <?php
            $catList = get_category(get_query_var('cat'));
            $cat = $catList->cat_ID;
            $paged = (get_query_var('page_val') ? get_query_var('page_val') : 1);
            $showItem = 4;
            $postArgs = array(
                'posts_per_page'=> $showItem,
                'cat'=> $cat,
                'paged'=> $paged
            );
            $count = 0;
            $query = new WP_Query($postArgs);
            $cls='';
            $postsEven =[];
            $postsOdd = [];
            if ($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post();
                    ++$count;
                    if($count%2 != 0){
                        $cls = 'left';
                        
                    }else{
                        $cls = 'right';
                    }
                    ?>
                    <a href="<?php echo get_permalink();?>" class="blog__item blog__item-inner <?php echo $cls;?>">
                        <?php if(has_post_thumbnail()){?>
                        <div class="thumb" style="background-image: url('<?php the_post_thumbnail_url('full');?>');">
                            <h2 class="cpt">
                                <?php echo the_title();?>
                            </h2>
                        </div>
                        <?php }else{ ?>
                            <div class="thumb nonImg">
                                <h2 class="cpt">
                                    <?php echo the_title();?>
                                </h2>
                            </div>
                        <?php } ?>
                        <div class="name">
                            <?php echo excerpt(15);?>
                        </div>
                        <div class="num">
                            <?php 
                                echo '0'.$count;
                            ?>
                        </div>
                        <div class="hoverBlock"></div>
                    </a>
                    
                    <?php
                }?>
                <div class="blogPagination">
                    <?
                        $big = 999999999; 
                        echo paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '/page/%#%',
                                'current' => max(1, $paged),
                            
                                'prev_text' => __('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNyAyMSI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMkEyOTJFIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGQ9Ik0xIDEwLjRoMjVNMTYuNiAxbDkuNCA5LjQtOS40IDkuNCIvPjwvc3ZnPg==" alt="prev arrow">Previous'),
                            
                                'next_text' => __('Next<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNyAyMSI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMkEyOTJFIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGQ9Ik0xIDEwLjRoMjVNMTYuNiAxbDkuNCA5LjQtOS40IDkuNCIvPjwvc3ZnPg==" alt="prev arrow">'),
                            
                                'total' => $query->max_num_pages,
                            ));
                        wp_reset_query();
                    ?>
                </div>
                <?
            }else{
                echo '<span class="nonPost">Sorry, but there are no posts in this category.</span>';
            }
        ?>
    </div>
</div>
<?php
get_footer('padding');
