<section id="content">

	<h1><?php	echo nakeme_get_loop_title(); ?></h1>
		
	<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<section class="author-info">
			<figure>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'nakeme_author_bio_avatar_size', 60 ) ); ?>
			</figure>
	    
	    <h2>
	    	<?php printf( __( 'About %s', 'nakeme' ), get_the_author() ); ?>
	    </h2>
	    
	    <p class="description"><?php the_author_meta( 'description' ); ?></p>
		</section>
	<?php endif; ?>
	


	<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
	    <h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
			<p class="info"><?php echo __('Posted by', 'nakeme'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?>, <?php comments_popup_link( 'Commment', '1 Comment', '% Comments' ); ?></p>
		</header>

		<div class="text">
					
			<?php if(has_post_thumbnail()): ?>
				<figure class="thumb"><?php the_post_thumbnail('thumbnail'); ?></figure>
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
	<?php echo nakeme_paginate_links( ) ?>
	</nav>


</section><!-- #content -->
