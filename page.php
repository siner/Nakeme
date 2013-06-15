<?php get_header(); ?>

<div id="center" class="row">

	<div id="content" class="span9 page">	
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header>
					<h1><?php the_title(); ?></h1>
					<section class="info">
						<?php echo get_the_date(); ?>
					</section>
				</header>				
	
	
				<div class="thecontent">
					<?php the_content(); ?>			
				</div><!-- .thecontent -->
				
													
				<footer>			
					<?php edit_post_link( __( 'Edit', 'nakeme' ), '<p class="edit">', '</p>' ); ?>
				</footer>
				
			</article>
	
	<?php endwhile; ?>
	
	</div><!-- #content -->
	
	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
