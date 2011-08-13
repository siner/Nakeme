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
		'secondary' => 'Footer navigation',
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

	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'nakeme' ),
		'id' => 'footer-sidebar',
		'description' => __( 'The footer sidebar', 'nakeme' ),
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
function nakeme_remove_version() {
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
 *	Shows thumbnails in the posts or pages admin panel
 */
if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) :
    // for post and page
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );
    function AddThumbColumn($cols) {
        $cols['thumbnail'] = __('Thumbnail');
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