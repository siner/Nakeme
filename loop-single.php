<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div id="content" class="single">		
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<header>
				<h1><?php the_title(); ?></h1>
				<p class="info"><?php echo __('Posted by', 'nakeme'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?>, <?php comments_popup_link( 'Commment', '1 Comment', '% Comments' ); ?></p>
			</header>
 	
 			
 			<div id="text">
				<?php the_content(); ?>
			</div>
	
			
			<footer>
				<nav class="tags">
        	<?php $tags_list = get_the_tag_list( '', ' ' ); if ( $tags_list ): echo __('Tags').': '. $tags_list ; endif; ?>
				</nav>
				<?php edit_post_link( __( 'Edit', 'nakeme' ), '<p class="edit">', '</p>' ); ?>
			</footer>
				
		</article>

		<?php comments_template( '', true ); ?>

	</div><!-- #content -->

<?php endwhile; ?>