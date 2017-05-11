<footer class="footer footer--shrink footer--grow-md-top">
	<div class="footer__container footer__container--grid footer__container--grow-md">
	<div class="footer__cell footer__cell--s3">
	<img src="<?php the_field('white_logo', 'options'); ?>" alt="<?php bloginfo('name'); ?>">
	<p><?php the_field('address', 'options'); ?><br/>
	P.iva: <?php the_field('piva', 'options'); ?></p>
	</div>
	<?php if(have_rows('menu', 'options')) : ?>
	<div class="footer__cell footer__cell--s9 footer__cell--grid">
	<ul class="footer__cell footer__cell--s3">
	<?php $count = 0; while(have_rows('menu_linee', 'options')) : the_row('menu', 'options'); ?>
	<?php if($count%4==0 && $count > 0) : ?>
	</ul>
	<ul class="footer__cell footer__cell--s3">
	<?php endif; ?>
	<li class="footer__item footer__item--shrink-left-only">
		<a href="<?php echo get_permalink(get_sub_field('menu_item')); ?>"><?php echo get_the_title(get_sub_field('menu_item')); ?></a>
	</li>
	
	<?php $count++; endwhile; ?>
	</ul>
	<ul class="footer__cell footer__cell--s3">
	<?php $count = 0; while(have_rows('menu', 'options')) : the_row('menu', 'options'); ?>
	<?php if($count%4==0 && $count > 0) : ?>
	</ul>
	<ul class="footer__cell footer__cell--s3">
	<?php endif; ?>
	<li class="footer__item footer__item--shrink-left-only">
		<a href="<?php echo get_permalink(get_sub_field('menu_item')); ?>"><?php echo get_the_title(get_sub_field('menu_item')); ?></a>
	</li>
	
	<?php $count++; endwhile; ?>
	</ul>
	</div>
	<?php endif; ?>
	</div>
	<div class="footer__container footer__container--grid-align-center footer__container--grow">
		<?php get_template_part( 'templates/social' ); ?>
		<a href="http://www.bspkn.it/" class="icon-credits" target="_blank" rel="nofollow"></a>
	</div>
</footer>
<?php get_template_part( 'templates/cat' ); ?>
