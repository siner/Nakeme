<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div id="content">	

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<header>
				<?php if ( is_front_page() ) { ?>
					<h2><?php the_title(); ?></h2>
				<?php } else { ?>	
					<h1><?php the_title(); ?></h1>
				<?php } ?>
				<p class="info"><?php echo get_the_date(); ?></p>
			</header>				


			<div id="text">
				<?php the_content(); ?>			
			</div>
			
												
			<footer>			
				<?php edit_post_link( __( 'Edit', 'nakeme' ), '<p class="edit">', '</p>' ); ?>
			</footer>
			
		</article>

		<?php comments_template( '', true ); ?>

	</div><!-- #content -->

<?php endwhile; ?>