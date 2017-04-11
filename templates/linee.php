<?php 
	$object = get_queried_object();
	$q = new WP_Query(array('post_type'=>'linee', 'posts_per_page'=>-1, 'orderby'=>'menu_order')); 
	if($q->have_posts()) :  ?>
<ul class="menu menu--left menu--left-shrink menu--grow-lg">
	<?php while($q->have_posts()) : $q->the_post(); ?>
	<li class="menu__item<?php echo ($object->ID == get_the_ID()) ? ' menu__item--active' : ''; ?>">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</li>
	<?php endwhile; wp_reset_query(); ?>
</ul>
<?php endif; ?>