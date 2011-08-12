	<aside id="sidebar">
		
		<section class="search">
			<?php get_search_form(); ?>
		</section><!-- .search -->

		
		<section class="categories">

			<h3><?php echo __('Categories'); ?></h3>

			<nav class="categories">
				<ul>
				<?php $categories = get_categories( ); foreach ($categories as $cat): ?>
					<li><a href="<?php echo get_category_link( $cat->term_id ) ?>" class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></li>		
				<?php endforeach; ?>
				</ul>
			</nav>	

		</section><!-- .categories -->

		
		<section class="tags">

			<h3><?php echo __('Tags'); ?></h3>

			<nav class="tags">

				<?php wp_tag_cloud(); ?>

			</nav>	

		</section><!-- .tags -->

		
		<section class="links">

			<h3><?php echo __('Links'); ?></h3>
			
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

		</section><!-- .links -->
		
	</aside><!-- #sidebar -->