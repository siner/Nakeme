<?php get_header(); ?>

<div id="search"> 

	<?php if ( have_posts() ) :
			get_template_part( 'loop' );
		else : ?>

  <div id="content">
	
		<article>
	
			<header>        		
  	  	<h1><?php echo __('Not Found', 'nakeme'); ?></h1>      
			</header>

      <div id="text">
      	<p><?php echo __('We can find what you are looking for... You can use the search bar or the menu', 'nakeme'); ?></p>
			</div>
	
		</article>
  
  </div><!-- #content -->
	<?php endif; ?>

	<?php get_sidebar(); ?>

</div><!-- #search -->

<?php get_footer(); ?>
