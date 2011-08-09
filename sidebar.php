	<aside class="fourcol last">
		
		<section class="search">
			<?php get_search_form(); ?>
		</section>		

		
		<section>

			<h3><?php echo __('Categories'); ?></h3>

			<nav class="categories">

				<?php $categories = get_categories( ); foreach ($categories as $cat): ?>
					<a href="<?php echo get_category_link( $cat->term_id ) ?>" class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a>		
				<?php endforeach; ?>

			</nav>	

		</section>	

		
		<section>

			<h3><?php echo __('Tags'); ?></h3>

			<nav class="tags">

				<?php wp_tag_cloud(); ?>

			</nav>	

		</section>

		
		<section class="links">

			<h3><?php echo __('Links'); ?></h3>
			
			<?php
				$bookmarks = get_bookmarks( array(
					'orderby'        => 'name',
					'order'          => 'ASC',
         ));

				foreach ( $bookmarks as $bm ) { 
   				 printf( '<a href="%s" title="%s">%s</a>', $bm->link_url, __($bm->link_name), __($bm->link_name) );
				}
			?>

		</section>

	</aside>