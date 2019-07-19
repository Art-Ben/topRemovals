<?php
/*
    Template Name: Blog
    Template Post Type: post, page, event
 */

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
            <a href="<?php/* echo get_home_url();*/?>" class="link">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjciIGhlaWdodD0iMjEiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTI2IDEwLjM3NUgxbTkuMzc1IDkuMzc1TDEgMTAuMzc1IDEwLjM3NSAxIiBzdHJva2U9IiMyQTI5MkUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjwvc3ZnPg==" alt="arrow back" class="icon"> Back to home page
            </a>
        </div>
-->
        <div class="pageTitle__item">
            <h1 class="cpt">
                <?php the_field('blogTitle','settings')?>
            </h1>
        </div>
    </div>
</div>

<div class="blog">
    <div class="blog__cont blog__cont-category">
        <?php
            $args = array(
                'taxonomy' => 'category',
                'hide_empty'=> 0,
            );
            $categories = get_categories($args);
            $numOfItems = 4;
            $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
            $to = $page * $numOfItems;
            $current = $to - $numOfItems;
            $total = count($categories);
                for($i=$current; $i<$to; $i++) {
                        if($i >= $total) {
                            break;
                        } else {
                            $cat = $categories[$i];
                        }
            ?>
        <a href="<?php echo get_category_link($cat->term_id);?>" class="blog__item">
            <?php if(get_field('category_image', $cat)){?>
                <div class="thumb" style="background-image:url(<?php the_field('category_image', $cat).')'?>"></div>
            <?php } else {?>
                <div class="thumb nonImage">Sorry. Category don`t have thumbnail</div>
                <?php } ?>
            <div class="name">
                <?php echo $cat->name;?>
            </div>
        </a>
        <?php
                } 
                unset($cat);?>
                <div class="blogPagination">
                <?
                $pagArgs = ( array(
                    'base' => add_query_arg( 'cpage', '%#%' ),
                    'format' => 'cpage=%#%',
                    
                    'prev_text' => __('<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNyAyMSI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMkEyOTJFIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGQ9Ik0xIDEwLjRoMjVNMTYuNiAxbDkuNCA5LjQtOS40IDkuNCIvPjwvc3ZnPg==" alt="prev arrow">Previous'),
                    
                    'next_text' => __('Next<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNyAyMSI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMkEyOTJFIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGQ9Ik0xIDEwLjRoMjVNMTYuNiAxbDkuNCA5LjQtOS40IDkuNCIvPjwvc3ZnPg==" alt="prev arrow">'),
                    
                    'total' => ceil($total / $numOfItems),
                    'current' => $page
               ));
                    
               $result = paginate_links($pagArgs);
               $result = preg_replace( '~/?cpage=1/?([\'"])~', '\1', $result );
               echo $result;
        ?>
                </div>
        
    </div>

</div>
<?php
get_footer('padding');
