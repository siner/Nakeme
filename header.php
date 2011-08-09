<!doctype html>
<!--[if lt IE 7 ]> <html lang="es" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="es" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="es" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="es" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title>
		<?php
 			global $page, $paged; 
 			wp_title( '|', true, 'right' ); 
 			bloginfo( 'name' ); 
 			$site_description = get_bloginfo( 'description', 'display' ); 
 				if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; 
 				if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'nakeme' ), max( $paged, $page ) ); 
 		?>
 </title>

	<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/img/favicon.ico">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/libs/1140.css" type="text/css" media="screen" />	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 

	<!-- !LEGACY -->
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/libs/1140ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/libs/selectivizr-min.js"></script>
	<![endif]-->
		 
<?php
 if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 

	/* Charging the Google Jquery */
	 wp_deregister_script('jquery');
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"), false, '1.6.1');
   wp_enqueue_script('jquery');
 
 wp_head(); 
?>
 
 
<!-- The google analytics script -->
 	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']); /* Change the value to your own */
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
<!-- End of the Google Analytics script -->

</head>
 
<body <?php body_class(); ?>>

	
	<div class="container">
 
    <header id="cabecera" class="row">

			<div class="fourcol">
        <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
 			<nav class="eightcol last">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
 			</nav>

    </header>