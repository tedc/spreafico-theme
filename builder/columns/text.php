<div class="section__content section__content--grow-lg section__content--shrink">
	<?php if(get_sub_field('title_text')) { ?>
		<h4 class="section__title <?php the_sub_field('title_size'); echo (get_sub_field('brown')) ? ' section__title--emphasis' : ''; echo (get_sub_field('uppercase')) ? ' section__title--upper' : ''; ?>">
			<?php echo (get_sub_field('title_weight')) ? '<strong>' . get_sub_field('title_text') . '</strong>' : get_sub_field('title_text'); ?>
		</h4>
	<?php }?>
	<?php the_sub_field('text'); ?>
</div>