<?php get_header(); ?>

<div id="content" class="ninecol single">		

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header>
			<h1><?php the_title(); ?></h1>
			<section class="info">
				<?php echo __('Posted by', 'nakeme'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>, 
				<?php echo get_the_date(); ?>, 
				<?php comments_popup_link( __( 'Comment' , 'nakeme' ), __( '1 Comment' , 'nakeme' ), __( '% Comments' , 'nakeme' ) ); ?>
			</section>
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


<?php	get_sidebar(); ?>

<?php get_footer(); ?>