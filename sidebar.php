	<section id="sidebar" class="span3 last">

		<?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>

		
		<nav class="search">
			<h3><?php echo __( 'Search' , 'nakeme'); ?></h3>
			<?php get_search_form(); ?>
		</nav><!-- .search -->

		
		<nav class="categories">
			<h3><?php echo __( 'Categories' , 'nakeme'); ?></h3>
			<ul>
			<?php $categories = get_categories( ); foreach ($categories as $cat): ?>
				<li><a href="<?php echo get_category_link( $cat->term_id ) ?>" class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></li>		
			<?php endforeach; ?>
			</ul>
		</nav><!-- .categories -->

		
		<nav class="tags">
			<h3><?php echo __( 'Tags' , 'nakeme'); ?></h3>
			<?php wp_tag_cloud(); ?>
		</nav><!-- .tags -->

		
		<nav class="links">
			<h3><?php echo __( 'Links' , 'nakeme'); ?></h3>
			<ul>
			<?php
				$bookmarks = get_bookmarks( array(
					'orderby'        => 'name',
					'order'          => 'ASC',
         		));

				foreach ( $bookmarks as $bm ) :
   				 printf( '<li><a href="%s" title="%s">%s</a></li>', $bm->link_url, __($bm->link_name), __($bm->link_name) );
				endforeach;
			?>
			</ul>
		</nav><!-- .links -->

		<?php endif; // end sidebar widget area ?>
		
	</section><!-- #sidebar -->