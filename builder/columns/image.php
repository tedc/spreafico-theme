<?php 
	$image = get_sub_field('immagine');
	if($image) :		
	$p = ( $image['height'] * 100 ) / $image['width'];
?>
<figure class="section__figure"<?php square('slider'); ?>>
	<div class="section__figure-container"<?php scrollmagic('"tween":[{"y" : -40},{"y" : 0}], "duration" : "200vh", "triggerHook" : "onEnter", "triggerElement" : "#col_'.$col.'_'.$row.'"'); ?>><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
</figure>
<?php endif; ?>