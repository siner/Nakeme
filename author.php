<?php get_header(); ?>
 
<section class="row author"> 

	<?php if ( have_posts() ) the_post(); ?>
	 
		<h1><?php printf ( __( 'Author Archives: %s', 'nakeme' ) , get_the_author() ); ?></h1>
	 
		<?php if ( get_the_author_meta( 'description' ) ) : ?>

			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'nakeme_author_bio_avatar_size', 60 ) ); ?>
	    <h2><?php printf( __( 'About %s', 'nakeme' ), get_the_author() ); ?></h2>
	    <?php the_author_meta( 'description' ); ?>

		<?php endif; ?>
 
		<?php rewind_posts(); get_template_part( 'loop', 'author' ); ?>
 
	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>