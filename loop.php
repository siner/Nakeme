<section class="grid_8 alpha">		

<?php if ( ! have_posts() ) : ?>
				<article>
        	<header>
        		<h1>No encontrado</h1>
          </header>
            <p>No aparece lo que buscas...</p>
				</article>
<?php endif; ?>

     
 				<?php 
					
					/* Titular para los listados */
					
					$category = get_the_category(); 
					$clase = $category[0]->category_nicename;
				?>
				<?php if (is_category()){ ?>
					<h1 class="category <?php echo $clase; ?>">Categoría: <?php single_cat_title( '' ); ?></h1>
				<?php } else if (is_tag()){ ?>
					<h1 class="category <?php echo $clase; ?>">Tag: <?php single_tag_title( '' ); ?></h1>
				<?php }else if ( is_month() ) { ?>
					<h1 class="category"><?php printf( __( 'Archivo del mes de: %s', 'starkers' ), get_the_date('F Y') ); ?></h1>
				<?php }elseif ( is_year() ) { ?>
					<h1 class="category"><?php printf( __( 'Archivo del año: %s', 'starkers' ), get_the_date('Y') ); ?></h1>
				<?php }elseif ( is_search()){ ?>
					<h1 class="category">Resultado de buscar: "<?php echo get_search_query(); ?>"</h1>
				<?php } ?>



<?php while ( have_posts() ) : the_post(); ?>


	<?php if ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) : ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if(has_post_thumbnail()): ?>
							<div class="thumb"><?php the_post_thumbnail(array(80,80)); ?></div>
						<?php endif;?>

				<header>
	          <h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
      		</header>
				<div class="content">
					<?php the_content( 'Seguir leyendo <span class="meta-nav">&rarr;</span>' ); ?>
				</div>
				<footer>
	        <?php $tags_list = get_the_tag_list( '', ' ' ); if ( $tags_list ): echo 'Tags: '. $tags_list ; endif; ?>          
         </footer>
			</article>

	<?php elseif ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $post->ID ) ) : ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
	          <h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
	          <?php echo get_the_date(); ?>, <?php comments_popup_link( 'Comentar', '1 Comentario', '% Comentarios' ); ?>
      		</header>
				<div class="content">
					<?php the_content( 'Seguir leyendo <span class="meta-nav">&rarr;</span>' ); ?>
				</div>
				<footer>
	        <?php $tags_list = get_the_tag_list( '', ' ' ); if ( $tags_list ): echo 'Tags: '. $tags_list ; endif; ?>               
         </footer>
			</article>

	<?php else : ?>



        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
	          <h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
            <?php echo get_the_date(); ?>, <?php comments_popup_link( 'Comentar', '1 Comentario', '% Comentarios' ); ?>
      		</header>
 					<div class="content">
						<?php if(has_post_thumbnail()): ?>
							<div class="thumb"><?php the_post_thumbnail('thumbnail'); ?></div>
						<?php endif;?>
            <?php the_excerpt( 'Seguir Leyendo &rarr;' ); ?>             
					</div>     
					<div class="clear"></div>
          <footer>
		        <?php $tags_list = get_the_tag_list( '', ' ' ); if ( $tags_list ): echo 'Tags: '. $tags_list ; endif; ?>                          
          </footer>
				</article>

<?php endif; ?>

 
<?php endwhile; // End the loop. Whew. ?>

<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>

</section>
