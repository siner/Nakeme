<?php get_header(); ?>
 
<div id="author"> 

	<?php if ( have_posts() ) the_post(); ?>
	 
		<h1><?php printf ( __( 'Author Archives: %s', 'nakeme' ) , get_the_author() ); ?></h1>
	 
		<?php /* Description and avatar */ ?>
		<?php if ( get_the_author_meta( 'description' ) ) : ?>

			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'nakeme_author_bio_avatar_size', 60 ) ); ?>
	    <h2><?php printf( __( 'About %s', 'nakeme' ), get_the_author() ); ?></h2>
	    <?php the_author_meta( 'description' ); ?>

		<?php endif; // End of description ?>
 
		<?php rewind_posts(); ?>
		
		<!-- The loop -->
		<?php get_template_part( 'loop' ); ?>
 

	<?php get_sidebar(); ?>

</div><!-- #author -->

<?php get_footer(); ?>