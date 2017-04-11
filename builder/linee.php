<?php 
	$linee = new WP_Query(array('post_type'=>'linee', 'posts_per_page'=>-1, 'orderby'=>'title')); 	
	if(get_sub_field('linee_kind') > 0) :
	$images = '';
	$count=0; while($linee->have_posts()) : $linee->the_post();
	$image_id = get_post_thumbnail_id(get_the_ID());
	$image = wp_get_attachment_image_src( $image_id, 'full' );
	$comma = ($count>0) ? ',' : '';
	$title = explode(' ', get_the_title());
	$new_title = '';
	$count_t = 0;
	foreach ($title as $t) {
		$d = (count($title) > 1) ? 1 : 0;
		$new_title .= ($count_t>$d) ? '<br/>'.$t : ' '.$t; 
		$count_t++;
	}
	$sepia = get_field('sepia', get_the_ID());
	$images .= $comma. '{url : \''.$image[0].'\', width: '.$image[1].', height : '.$image[2].', title : \''.$new_title.'\', link : \''.get_permalink().'\', sepia : "'.$sepia.'"}';
	$count++; endwhile; wp_reset_query(); 
?>
<script type="text/javascript">
	sliders["linee_slider_<?php echo $row; ?>"] = [<?php echo $images; ?>];
</script>
<section class="linee linee--grow-lg linee--slider linee--slider-shrink" id="linee_slider_<?php echo $row; ?>" ng-slider slider-title="<?php _e('Linee', 'sprfc'); ?>" show-label="<?php _e('Scopri', 'sprfc'); ?>" slider-kind="linee">
</section>
<?php
	else : 
?>
<?php if($linee->have_posts()) : ?>
<section class="linee linee--grid linee--grow-lg" id="linee_list_<?php echo $row; ?>">
	<header class="linee__cell linee__cell--label linee__cell--label-shrink linee__cell--label-s2 linee__cell--grow"<?php $offset = 80 + ($count*20); scrollmagic('"tween":[{"x":-40, "opacity":0},{"x":0, "opacity":1}],"triggerHook":0.75'); ?>>
		<h4 class="linee__title linee__title--small linee__title--small-upper"><?php _e('Linee', 'sprfc'); ?></h4>
	</header>
	<ul class="linee__cell linee__cell--shrink linee__cell--shrink-s10 linee__cell--grid linee__cell--grow">
	<li class="linee__cell linee__cell--shrink linee__cell--shrink-s6">
	<?php 
		$count = 0; 
		while($linee->have_posts()) : $linee->the_post(); ?>
	<?php if($count > 0 && $count%4==0) { ?>
	</li>
	<li class="linee__cell linee__cell--shrink linee__cell--shrink-s6">
	<?php } ?>
	<h5 class="linee__title linee__title--small"<?php $offset = 80 + ($count*20); scrollmagic('"tween":[{"x":-40, "opacity":0},{"x":0, "opacity":1}],"triggerHook":0.75'); ?>><a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a></h5>
	<?php $count++; endwhile; wp_reset_query(); ?>
	</li>
	</ul>
	
</section>
<?php 
	endif;
	endif;
?>

	