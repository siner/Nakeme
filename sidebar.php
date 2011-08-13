	<section id="sidebar">

		<?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>

		
		<aside class="search">
			<h3><?php echo __('Search'); ?></h3>
			<?php get_search_form(); ?>
		</aside><!-- .search -->

		
		<aside class="categories">
			<h3><?php echo __('Categories'); ?></h3>
			<nav>
				<ul>
				<?php $categories = get_categories( ); foreach ($categories as $cat): ?>
					<li><a href="<?php echo get_category_link( $cat->term_id ) ?>" class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></li>		
				<?php endforeach; ?>
				</ul>
			</nav>	
		</aside><!-- .categories -->

		
		<aside class="tags">
			<h3><?php echo __('Tags'); ?></h3>
			<nav>
				<?php wp_tag_cloud(); ?>
			</nav>	
		</aside><!-- .tags -->

		
		<aside class="links">
			<h3><?php echo __('Links'); ?></h3>
			<nav>
				<ul>
				<?php
					$bookmarks = get_bookmarks( array(
						'orderby'        => 'name',
						'order'          => 'ASC',
	         ));

					foreach ( $bookmarks as $bm ) { 
	   				 printf( '<li><a href="%s" title="%s">%s</a></li>', $bm->link_url, __($bm->link_name), __($bm->link_name) );
					}
				?>
				</ul>
			</nav>
		</aside><!-- .links -->

		<?php endif; // end sidebar widget area ?>
		
	</section><!-- #sidebar -->