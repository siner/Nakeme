<?php

if ( ! function_exists( 'nakeme_scripts' ) ):
	function nakeme_scripts() {
		/* Scripts */
		wp_deregister_script('jquery');
	  wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', array(), '1.7.2', false);
	  wp_register_script('mediaqueries-script', get_template_directory_uri() . '/js/libs/css3-mediaqueries.js', array(), '1.0', true);
	  wp_register_script('plugins-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true);


   	wp_enqueue_script('jquery');
   	wp_enqueue_script('mediaqueries-script');
   	wp_enqueue_script('plugins-script');

  }
endif;

if ( ! function_exists( 'nakeme_styles' ) ):
	function nakeme_styles() {
	  /* Styles */
		wp_register_style( 'normalize-style', get_template_directory_uri() . '/css/normalize.css', array(), '1.0','all' );
		wp_register_style( '1140-style', get_template_directory_uri() . '/css/1140.css', array(), '1.0','all' );
		wp_register_style( 'base-style', get_template_directory_uri() . '/style.css', array(), '1.0','all' );
		wp_register_style( 'nakeme-style', get_template_directory_uri() . '/css/nakeme.css', array(), '1.0','all' );
		wp_register_style( 'responsive-style', get_template_directory_uri() . '/css/responsive.css', array(), '1.0','all' );
		wp_register_style( 'print-style', get_template_directory_uri() . '/css/print.css', array(), '1.0','all' );


   	wp_enqueue_style( 'normalize-style' );
   	wp_enqueue_style( '1140-style' );
   	wp_enqueue_style( 'base-style' );
   	wp_enqueue_style( 'nakeme-style' );
   	wp_enqueue_style( 'responsive-style' );
   	wp_enqueue_style( 'print-style' );
	}    
endif;
add_action('wp_enqueue_scripts', 'nakeme_scripts');
add_action('wp_enqueue_scripts', 'nakeme_styles');
