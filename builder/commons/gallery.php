<?php
	if($images):
	$imgs = '';
	$count=0; foreach($images as $img) :
	$comma = ($count>0) ? ',' : '';
	$imgs .= ($full) ? $comma. '{url : \''.$img['url'].'\', width: '.$img['width'].', height : '.$img['height'].',alt : "'.$img['alt'].'"}' : $comma. '{url : \''.$img['url'].'\', width: '.$img['width'].', height : '.$img['height'].'}';
	$count++; endforeach;
?>
<script type="text/javascript">
	sliders['gallery_<?php echo $row; ?>'] = [<?php echo $imgs; ?>];
</script>
<ng-slider ng-mouseenter="pause(true)" ng-mouseleave="pause(false)" id="gallery_<?php echo $row; ?>"<?php if($full):?> slider-kind="full"<?php endif; ?>>
</ng-slider>
<?php endif; ?>