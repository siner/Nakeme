<?php get_header(); ?>

<div id="center" class="row">

<div id="content" class="span9 single">		

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="row">
			<div class="span2">
			<?php if(has_post_thumbnail()): ?>
				<?php the_post_thumbnail('thumbnail',array('class' => 'img-polaroid')); ?>
			<?php endif;?>
			</div>
			<div class="span7">
		    	<h1><?php the_title(); ?></h1> 
				<ul class="unstyled">
				  <li><i class="icon-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></li>
				  <li><i class="icon-calendar"></i> <?php echo get_the_date(); ?></li>
				  <li><i class="icon-comment"></i> <?php comments_popup_link( '0', '1', '%' ); ?></li>
				</ul>
				
			</div>				
		</header>
			
		<div class="thecontent">
			<?php the_content(); ?>
		</div>
		
		<footer>
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

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

</div><!-- #content -->

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>