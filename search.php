<?php get_header(); ?>

<section class="row search"> 

	<?php if ( have_posts() ) :
			get_template_part( 'loop' );
		else : ?>

  <section class="eightcol">
	
		<article>
	
			<header>        		
  	  	<h1><?php echo __('Not Found'); ?></h1>      
			</header>

      <div class="content">
      	<p><?php echo __('We can find what you are looking for... You can use the search bar or the menu'); ?></p>
			</div>
	
		</article>
  
  </section>
	<?php endif; ?>

	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
