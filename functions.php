<?php
/**
 * Top Removals functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Top_Removals
 */

/**
 * Enqueue scripts and styles.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function top_removals_style() {
    wp_enqueue_style( 'top-removals-style', get_template_directory_uri() . '/main.css' );
}
add_action('wp_enqueue_scripts','top_removals_style');


function top_removals_scripts() {    
    wp_enqueue_script('mainScript', get_template_directory_uri() . '/js/main-bundle.js','','',true);
}
add_action( 'wp_enqueue_scripts', 'top_removals_scripts' );
/* end */

/* svg support */
function svg_add_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'svg_add_types', 1, 1);
/* end */

/* acf plugin settings page */
if( function_exists('acf_add_options_page') ) {
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Site General Settings',
		'menu_title' 	=> 'Site Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false,
        'post_id' => 'settings',
        'update_button'		=> __('Update settings', 'acf'),
        'updated_message'		=> __('Settings updated', 'acf'),
	));
}
/* end */


/* add menus support */
register_nav_menus(array(
    'primary'=>'header services list',
    'pages'=>'header pages list',
    'footer-services' => 'footer services list',
    'footer-pages' => 'footer pages list'
));
/* end */

/*- delete VER text into css files -*/
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) 
{
    $handles_with_version = [ 'style' ];

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}
/*- end -*/

/*- delete p tag on image when use TINYMce editor -*/
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');
/*- end -*/

/*- add support for acf map -*/
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyD3ObqUxuk5Dj_VvBeZ_xFEuR9m8WCKGiQ');
}

add_action('acf/init', 'my_acf_init');
/*- end -*/

/*- sitemap pages list -*/
function cst_sitemap() {
    $pages = get_pages();
    $result = ' ';
    foreach( $pages as $page ) {      
        $link = get_page_link($page->ID);
        $titl = $page->post_title;
        $result .= '<p class="line"><a class="link" href="'.$link.'">'.$titl.'</a></p>';
    }
    wp_reset_query();
    echo $result;
}
/*- end -*/

/*- fix for %categoy%%postname% pagination on category.php page */ 
function custom_pre_get_posts($query)
{
    if ($query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {
        $query->set('page_val', get_query_var('paged'));
        $query->set('paged', 0);
    }
}
add_action('pre_get_posts', 'custom_pre_get_posts');
/* end */

/*- change excerpt length function-*/
function excerpt( $limit ) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}
/*- end -*/

