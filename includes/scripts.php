<?php

if ( ! function_exists( 'nakeme_scripts' ) ):
	function nakeme_scripts() {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-1.10.0.min.js', array(), '1.10.0', false);
		wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/libs/bootstrap.min.js', array(), '1.0', true);
		wp_enqueue_script('plugins-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true);
  }
endif;

if ( ! function_exists( 'nakeme_styles' ) ):
	function nakeme_styles() {	
	  	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0','all' );
	  	wp_enqueue_style( 'bootstrap-responsive-style', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array(), '1.0','all' );
	  	wp_enqueue_style( 'base-style', get_template_directory_uri() . '/style.css', array(), '1.0','all' );
	}    
endif;
add_action('wp_enqueue_scripts', 'nakeme_scripts');
add_action('wp_enqueue_scripts', 'nakeme_styles');
