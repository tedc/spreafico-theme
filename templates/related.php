<?php if(get_field('related')) : ?>
<div class="related-linee">
	<div class="related-linee__header related-linee__header--shrink related-linee__header--grow-md"<?php square('slider'); ?>>
		<h4 class="related-linee__title related-linee__title--upper"><?php _e('Linee', 'sprfc'); ?></h4>
	</div>
	<div class="related-linee__items related-linee__items--grid" id="related">
		<?php $q = new WP_Query(array(
			'post_type' => 'linee',
			'post__in' => get_field('related'),
			'orderby' => 'post__in'
		)); 
		while($q->have_posts()) : $q->the_post(); ?>
		<a href="<?php the_permalink(); ?>" class="related-linee__cell related-linee__cell--shrink related-linee__cell--grow-md related-linee__cell--s6" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>)"<?php scrollmagic('"tween":[{"backgroundPosition":"50% 40%"},{"backgroundPosition":"50% 60%"}],"duration":"200%", "triggerElement":"#related","triggerHook":1'); ?>>
			<span class="related-linee__title related-linee__title--big-upper"><?php get_template_part( 'templates/title' ); ?></span>
			<i class="icon-arrow-big"></i>
		</a>
		<?php endwhile; wp_reset_query(); ?>
	</div>
</div>
<?php endif; ?>