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

 <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/html5shiv.js"></script>
<![endif]-->
		 
<?php
 if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 

 wp_head(); 
?>
</head>
 
<body <?php body_class(); ?>>

	<div class="container">
	
		
		<header id="head" class="row">
	
			<hgroup class="span12">
       			<h1 class="header-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        		<h2 class="header-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
			
			<nav class="span12">
				<?php wp_nav_menu( array('theme_location' => 'primary')); ?>		
			</nav>

		</header><!-- #head -->		
		