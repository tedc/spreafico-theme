<?php
	use Roots\Sage\Assets;
	function lib() {
		wp_enqueue_script('lib', Assets\asset_path('scripts/lib.js'), null, null, true);
	}
	add_action('wp_enqueue_scripts', 'lib', 100);
	function sliderVar() { ?>
		<script>
				sliders = [];
				(function(a,e,c,f,g,h,b,d){var k={ak:"971975964",cl:"-f7sCMj9snMQnNq8zwM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]||(a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
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
		<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '646591368878022'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=646591368878022&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
	<?php }

	add_action( 'wp_footer', 'vars');