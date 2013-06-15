<?php get_header(); ?>

<div id="center" class="row">

	<div id="content" class="span9">		

		<article class="error404">

			<header>        		
  	  			<h1><?php echo __('Not Found'); ?></h1>      
			</header>

      		<div class="thecontent">
      			<p><?php echo __('We can find what you are looking for... You can use the search bar or the menu'); ?></p>
			</div><!-- .thecontent -->

		</article>

	</div><!-- #content -->		

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>