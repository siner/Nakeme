<div id="content">		

<?php if ( ! have_posts() ) : ?>
	<article>
  	<header>
  		<h1>No encontrado</h1>
    </header>
    <div class="text">
      <p>No aparece lo que buscas...</p>
		</div>
	</article>
<?php endif; ?>

     
	<?php 
		
		/* Looping Header */
		
		$category = get_the_category(); 
		$clase = $category[0]->category_nicename;
	?>
	
	<?php if (! is_home()): ?>
	<h1>
		<?php	if (is_category()) : echo __( 'Category' , 'nakeme' ) . ' : ' . single_cat_title( '', false ); 
		elseif (is_tag()) : echo __( 'Tag' , 'nakeme' ) . ' : ' . single_tag_title( '', false);
		elseif (is_month()) : printf( __( 'Monthly Archives: %s' , 'nakeme' ), get_the_date('F Y') );
		elseif (is_year()) : printf( __( 'Yearly Archives: %s' , 'nakeme' ), get_the_date('Y') );
		elseif (is_search()) : echo __( 'Search results for' , 'nakeme' ) . ' : ' . get_search_query();
		else : echo __( 'Archive' , 'nakeme' );
		endif; ?>
	</h1>
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
	    <h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
	    <p class="info"><?php echo get_the_date(); ?>, <?php comments_popup_link( '0 Comments' , '1 Comment' , '% Comments' ); ?></p>
		</header>

		<div class="text">
					
			<?php if(has_post_thumbnail()): ?>
				<div class="thumb"><?php the_post_thumbnail('thumbnail'); ?></div>
			<?php endif;?>
	    
	    <?php the_excerpt( 'Continue reading &rarr;' ); ?>             
		</div><!-- .text -->     
	
	  <footer>
	    <nav class="tags">
	    	<?php $tags_list = get_the_tag_list( '', ' ' ); if ( $tags_list ): echo __( 'Tags' , 'nakeme' ) . ': ' . $tags_list ; endif; ?>                          
	  	</nav>
			<?php edit_post_link( __( 'Edit', 'nakeme' ), '<p class="edit">', '</p>' ); ?>
	  </footer>
	</article>

 
	<?php endwhile; ?>

	<?php /* The pagination*/ ?>
	<nav id="pagination">
	<?php echo paginate_links( ) ?>
	</nav>


</div><!-- #content -->
