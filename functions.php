<?php

/** Tell WordPress to run nakeme_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'nakeme_setup' );

if ( ! function_exists( 'nakeme_setup' ) ):

function nakeme_setup() {

	add_theme_support( 'post-formats', array( 'aside', 'video' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );


	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'nakeme', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );


	register_nav_menus( array(
		'primary' => 'Header navigation',
	) );
}
endif;


/**
 * Removes some links from the header 
 */
add_action('init', 'remheadlink');
function remheadlink() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
}



/**
 *	The sidebar declarations
 */
function nakeme_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'nakeme' ),
		'id' => 'main-sidebar',
		'description' => __( 'The sidebar', 'nakeme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );


}
add_action( 'widgets_init', 'nakeme_widgets_init' );




/**
 * Removing the WP version
 */
function nakeme_remove_version() 
{
	return '';
}
add_filter('the_generator', 'nakeme_remove_version');



function nakeme_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
} // function

add_filter( 'wp_nav_menu_args', 'nakeme_wp_nav_menu_args' );



/**
 * Get some loop information
 */
function nakeme_get_loop_title()
{
	if (is_category()) : $title = __( 'Category' , 'nakeme' ) . ' : ' . single_cat_title( '', false );
	elseif (is_tag()) : $title = __( 'Tag' , 'nakeme' ) . ' : ' . single_tag_title( '', false);
	elseif (is_month()) : $title = __( 'Monthly Archives' , 'nakeme' ) . ' : ' . get_the_date('F Y');
	elseif (is_year()) : $title = __( 'Yearly Archives' , 'nakeme' ). ' : ' . get_the_date('Y');
	elseif (is_search()) : $title = __( 'Search results for' , 'nakeme' ) . ' : ' . get_search_query();
	elseif (is_author()) : $title = __( 'Author Archives', 'nakeme' ) . ' : ' . get_the_author();
	elseif (is_archive()) : $title = __( 'Archive' , 'nakeme' );
	endif;
	
	return $title;
}





/**
 *	Shows thumbnails in the posts or pages admin panel
 */
if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) :
    // for post and page
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );
    function AddThumbColumn($cols) {
        $cols['thumbnail'] = __('Thumbnail', 'nakeme');
        return $cols;
    }
    function AddThumbValue($column_name, $post_id) {
            $width = (int) 90; // You can change the thumbnails width and height
            $height = (int) 90;
            if ( 'thumbnail' == $column_name ) {
                // thumbnail of WP 2.9
                $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                // image from gallery
                $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                if ($thumbnail_id)
                    $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
                elseif ($attachments) {
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
                    }
                }
                    if ( isset($thumb) && $thumb ) {
                        echo $thumb;
                    } else {
                        echo __('None');
                    }
            }
    }
    // for posts
    add_filter( 'manage_posts_columns', 'AddThumbColumn' );
    add_action( 'manage_posts_custom_column', 'AddThumbValue', 10, 2 );

endif;


/**
 * Shows the paginate links
 */
function nakeme_paginate_links()
{

	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => true,
		'type' => 'plain'
	);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

	echo paginate_links( $pagination );

}


function nakeme_search_form( $form ) {

    $form = '
	    <aside>
		    <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
			    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search' , 'nakeme' ) . '" />
			    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
		    </form>
    	</aside>
    ';

    return $form;
}

add_filter( 'get_search_form', 'nakeme_search_form' );

