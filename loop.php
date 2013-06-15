<section id="content" class="span9">		

	<?php if (! is_home()): ?>
	<h1><?php	echo nakeme_get_loop_title(); ?></h1>
	<?php endif; ?>
	

	<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="row">
			<div class="span2">
			<?php if(has_post_thumbnail()): ?>
				<?php the_post_thumbnail('thumbnail',array('class' => 'img-polaroid')); ?>
			<?php endif;?>
			</div>
			<div class="span7">
		    	<h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
				<ul class="unstyled">
				  <li><i class="icon-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></li>
				  <li><i class="icon-calendar"></i> <?php echo get_the_date(); ?></li>
				  <li><i class="icon-comment"></i> <?php comments_popup_link( '0', '1', '%' ); ?></li>
				</ul>
				
			</div>				
		</header>

		<div class="clearfix thecontent">
		    <?php the_excerpt( __( 'Continue reading &rarr;' , 'nakeme' ) ); ?>             
		</div><!-- .thecontent -->     
	
	  <footer class="clearfix">
	    <nav class="categories">
	    	<?php echo __( 'Categories' , 'nakeme' ) . ': '; the_category(', '); ?>                          
	  	</nav>

	    <?php $tags_list = get_the_tag_list( '', ' ' ); ?>
	
			<?php if ( $tags_list ): ?>

	    <nav class="tags">
	    	<?php echo __( 'Tags' , 'nakeme' ) . ': ' . $tags_list ; ?>                          
	  	</nav>

			<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'nakeme' ), '<p class="edit">', '</p>' ); ?>
	  </footer>
	</article>

 
	<?php endwhile; ?>

	<nav class="pagination pagination-centered">
		<?php nakeme_paginate_links( ) ?>
	</nav>


</section><!-- #content -->
