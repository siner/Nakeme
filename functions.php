<?php

/** Tell WordPress to run nakeme_setup() when the 'after_setup_theme' hook is run. */
if ( ! function_exists( 'nakeme_setup' ) ):
	function nakeme_setup() {	
		add_theme_support( 'post-formats', array( 'aside', 'video' ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
	
		// Make theme available for translation
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'nakeme', TEMPLATEPATH . '/languages' );
	
		register_nav_menus( array(
			'primary' => 'Header navigation',
		) );
	}
endif;
add_action( 'after_setup_theme', 'nakeme_setup' );


/**
 * Removes some links from the header 
 */
if (!function_exists('nakeme_remove_headlinks')):
	function nakeme_remove_headlinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	}
endif;
add_action('init', 'nakeme_remove_headlinks');

/**
 * Removing the WP version
 */
if (!function_exists('nakeme_remove_version')) :
	function nakeme_remove_version() 
	{
		return '';
	}
endif;
add_filter('the_generator', 'nakeme_remove_version');

if (!function_exists('nakeme_wp_nav_menu_args')) :
	function nakeme_wp_nav_menu_args( $args = '' )
	{
		$args['container'] = false;
		return $args;
	} // function
endif;
add_filter( 'wp_nav_menu_args', 'nakeme_wp_nav_menu_args' );


/**
 * Get some loop information
 */
if (!function_exists('nakeme_get_loop_title')) :
	function nakeme_get_loop_title()
	{
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	
		if (is_category()) : $title = __( 'Category' , 'nakeme' ) . ' : ' . single_cat_title( '', false );
		elseif (is_tag()) : $title = __( 'Tag' , 'nakeme' ) . ' : ' . single_tag_title( '', false);
		elseif (is_month()) : $title = __( 'Monthly Archives' , 'nakeme' ) . ' : ' . get_the_date('F Y');
		elseif (is_year()) : $title = __( 'Yearly Archives' , 'nakeme' ). ' : ' . get_the_date('Y');
		elseif (is_search()) : $title = __( 'Search results for' , 'nakeme' ) . ' : ' . get_search_query();
		elseif (is_author()) : $title = __( 'Author Archives', 'nakeme' ) . ' : ' . $curauth->display_name;
		elseif (is_archive()) : $title = __( 'Archive' , 'nakeme' );
		endif;
		
		return $title;
	}
endif;


require_once('includes/widgets.php');
require_once('includes/thumbnails.php');
require_once('includes/pagination.php');
require_once('includes/searchform.php');
require_once('includes/scripts.php');
require_once('includes/analytics.php');





