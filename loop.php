<section id="content" class="ninecol">		

	<?php if (! is_home()): ?>
	<h1><?php	echo nakeme_get_loop_title(); ?></h1>
	<?php endif; ?>
	

	<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
	    	<h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
			<section class="info">
				<?php echo __('Posted by', 'nakeme'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>, 
				<?php echo get_the_date(); ?>, 
				<?php comments_popup_link( __( 'Comment' , 'nakeme' ), __( '1 Comment' , 'nakeme' ), __( '% Comments' , 'nakeme' ) ); ?>
			</section>
		</header>

		<div class="thecontent">
					
		<?php if(has_post_thumbnail()): ?>
			<figure class="thumb"><?php the_post_thumbnail('thumbnail'); ?></figure>
		<?php endif;?>
	    
		    <?php the_excerpt( __( 'Continue reading &rarr;' , 'nakeme' ) ); ?>             
		</div><!-- .thecontent -->     
	
	  <footer>
	    <nav class="categories">
	    	<?php echo __( 'Categories' , 'nakeme' ) . ': '; the_category(', '); ?>                          
	  	</nav>

	    <?php $tags_list = get_the_tag_list( '', ' ' ); ?>
		<?phpif ( $tags_list ): ?>

	    <nav class="tags">
	    	<?php echo __( 'Tags' , 'nakeme' ) . ': ' . $tags_list ; ?>                          
	  	</nav>

		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'nakeme' ), '<p class="edit">', '</p>' ); ?>
	  </footer>
	</article>

 
	<?php endwhile; ?>

	<nav id="pagination">
		<?php nakeme_paginate_links( ) ?>
	</nav>


</section><!-- #content -->
