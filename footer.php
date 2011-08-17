	
	
	<footer id="colophon">
		<?php	if ( ! dynamic_sidebar( 'footer-sidebar' ) ) : ?>
			<p>HTML5 Naked WordPress Theme developed by <a href="http://www.franmoreno.com">Fran Moreno</a>, feel free to change everything, I don't mind ;)</p>
		<?php	endif; ?>
		
		<nav id="footer-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>		
		</nav>
	</footer><!-- #colophon -->

</div><!-- #container -->



<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/libs/css3-mediaqueries.js"></script>
<script src="<?php bloginfo('template_url') ?>/js/libs/respond.min.js"></script>
<style>
	#boxsize button, #boxsize input, #boxsize select, #boxsize textarea {
		width: 200px;
		border: 1px solid #333;
	}
</style>
<script src="<?php bloginfo('template_url') ?>/js/script.js"></script>
<!--[if lt IE 7 ]>
<script src="<?php bloginfo('template_url') ?>/js/libs/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg');</script>
<![endif]-->

<?php wp_footer(); ?>
</body>
</html>