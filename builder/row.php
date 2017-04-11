<style>
#row_<?php echo $row; ?> {
	background-image: url(<?php echo get_sub_field('row_image')['sizes']['large']; ?>);
}
@media screen and (min-width: <?php echo (850/16); ?>em) {
	#row_<?php echo $row; ?> {
		background-image: url(<?php echo get_sub_field('row_image')['url']; ?>);
	}
}
</style>
<div class="row row--grow-lg row--grow--lg-shrink" id="row_<?php echo $row; ?>"<?php scrollmagic('"tween":[{"backgroundPosition": "50% 200px"},{"backgroundPosition": "50% -200px"}],"duration":"200vh","triggerHook":1'); ?>>
	<?php if(get_sub_field('row_title')) : ?>
	<h3 class="row__title row__title--big row__title--big-upper"><?php the_sub_field('row_title'); ?></h3>
	<?php endif; ?>
	<?php the_sub_field('row_text'); ?>
	<?php if(get_sub_field('row_link') && get_sub_field('row_link_text')) : ?>
	<div class="row__button row__button--grow-lg-top">
		<a href="<?php the_sub_field('row_link'); ?>" class="button">
			<span class="button__label"><?php the_sub_field('row_link_text'); ?></span>
		</a>
	</div>
	<?php endif; ?>
</div>