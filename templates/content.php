
<article <?php post_class('post--shrink post--grow-lg'); ?>>
	<header>
		<?php if($count == 0 && $paged < 2) : ?>
		<figure class="<?php echo get_post_type(); ?>__thumbnail">
			<?php the_post_thumbnail('full'); ?>
		</figure>
		<?php endif; ?>
		<?php  get_template_part('templates/entry-meta'); ?>
		<h2 class="<?php echo get_post_type(); ?>__title <?php echo get_post_type(); ?>__title--small"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
	</header>
	<div class="<?php echo get_post_type(); ?>__summary <?php echo get_post_type(); ?>__summary--grow">
		<?php the_excerpt(); ?>
	</div>
	<a href="<?php the_permalink( ); ?>" class="more"><?php _e('Leggi tutto', 'sprfc') ?></a>
</article>
