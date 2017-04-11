<div class="container container--grow-lg container--grow-lg-shrink">
	<?php if(get_sub_field('titolo')) : ?>
	<h2 class="container__title"><strong><?php the_sub_field('titolo'); ?></strong></h2>
	<?php endif; ?>
	<div class="container__content container__content--grow-top">
	<?php the_sub_field('testo'); ?>
	</div>
</div>