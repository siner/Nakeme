<?php

/**
 * Search Form
 */
if (!function_exists('nakeme_search_form')) : 
	function nakeme_search_form( $form ) {
	
	    $form = '
			    <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
				    <div class="input-prepend">
				      <span class="add-on"><i class="icon-search"></i></span>
				      <input id="s" name="s" type="text" value="' . get_search_query() . '">
				    </div>
			    </form>
	    ';
	
	    return $form;
	}
endif;
add_filter( 'get_search_form', 'nakeme_search_form' );


