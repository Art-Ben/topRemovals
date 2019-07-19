<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Top_Removals
 */

get_header('padding');
?>
<div class="blog">
    <div class="blog__cont">
        <div class="backHomeLine">
            <a href="<?php
                $category = get_the_category();
                if(count($category)>1){
                    echo get_home_url().'/blog/';
                } else {
                    echo get_home_url().'/category/'.$category[0]->slug;
                }?>" class="link">
                <img src="<?php echo get_template_directory_uri();?>/images/icons/arrowBackGrey.svg" alt="arrow back" class="icon"> Back to Articles
            </a>
        </div> 

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;
		?>

    </div>
</div>
<?php
get_footer('padding');
