<div class="full-slider full-slider--grow-lg full-slider--shrink">
	<?php 
	$images = get_sub_field('full_slider');
	$full = true;
include(locate_template( 'builder/commons/gallery.php', false, true )); ?>
</div>