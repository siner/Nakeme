<?php

/**
 *	The sidebar declarations
 */
if ( !function_exists('nakeme_widgets_init') : 
	function nakeme_widgets_init() {
	
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'nakeme' ),
			'id' => 'main-sidebar',
			'description' => __( 'The sidebar', 'nakeme' ),
			'before_widget' => '<nav id="%1$s" class="widget %2$s">',
			'after_widget' => "</nav>",
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );	
	
	}
endif;
add_action( 'widgets_init', 'nakeme_widgets_init' );

