<?php
	use Roots\Sage\Assets;
	function lib() {
		wp_enqueue_script('lib', Assets\asset_path('scripts/lib.js'), null, null, true);
	}
	add_action('wp_enqueue_scripts', 'lib', 100);
	function sliderVar() { ?>
		<script>
				sliders = [];
		</script>
	<?php }
	add_action('wp_head', 'sliderVar');
	function vars() {
		?>
		<script>
		  (function(d) {
		    var config = {
		      kitId: 'sxs7jfn',
		      scriptTimeout: 3000,
		      async: true
		    },
		    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
		  })(document);
			var isMobile = <?php echo (is_handheld()) ? 'true' : 'false'; ?>,
				assets = '<?php echo get_stylesheet_directory_uri(); ?>/assets/',
				google_api = "AIzaSyDPjHDg5-EGUjQ_zDjltstiGMJ-aVkHuU0";
		</script>
	<?php }

	add_action( 'wp_footer', 'vars');