<?php

/**
 * Search Form
 */
if (!function_exists('nakeme_search_form')) : 
	function nakeme_search_form( $form ) {
	
	    $form = '
			    <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
				    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search' , 'nakeme' ) . '" />
				    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
			    </form>
	    ';
	
	    return $form;
	}
endif;
add_filter( 'get_search_form', 'nakeme_search_form' );


