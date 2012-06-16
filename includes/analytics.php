<?php

/* Google Analytics Function */
if ( !function_exists('nakeme_google_analytics') ) : 
	function nakeme_google_analytics() {
?>
<!-- The google analytics script -->
 	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']); /* Change the value to your own */
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
<!-- End of the Google Analytics script -->
<?php
	}
endif;
add_action('wp_head', 'nakeme_google_analytics');