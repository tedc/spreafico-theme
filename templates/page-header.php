<?php 
	if(is_front_page() || is_singular('linee') || is_page_template( 'template-custom.php' )) :
		$sm = '"tween":{"y" : -120},"triggerElement":"#header","triggerHook":0,"duration":"150vh","offset":80';
?>

<header class="header header--grid header--grow-md" id="header">
	<div class="header__cell header__cell--s6 header__cell--<?php the_field('image_position'); ?><?php if(get_field('is_gallery')): echo ' header__cell--slider'; endif; ?>"<?php if(has_post_thumbnail()):?> style="background-image:url(<?php the_post_thumbnail_url('full'); ?>)"<?php endif; ?><?php scrollmagic($sm); ?>>
		<?php 
			if(get_field('is_gallery') && get_field('header_gallery')) :
				$images = get_field('header_gallery');
				$row = 'header';
				$full = false;
				include(locate_template( 'builder/commons/gallery.php', false, true ));
			else :
				the_post_thumbnail('full');
			endif;
		?>

	</div>
	<div class="header__cell header__cell--<?php echo odd_even('image_position'); ?>  header__cell--content header__cell--shrink header__cell--grow-lg header__cell--s6"<?php if(!is_front_page() && !is_singular('mobili')): ?><?php if(!get_field('is_gallery')):square('side');endif; ?><?php endif; ?><?php scrollmagic($sm); ?>>
		<h1 class="header__title header__title--huge<?php echo (get_field('sottotitolo')=='') ? ' header__title--huge-ungrow' : ''; ?>"><strong><?php get_template_part( 'templates/title' ); ?></strong></h1>
		<?php the_field('sottotitolo'); ?>
	</div>
</header>
<?php else : ?>
<header class="header">
  <h1 class="header__title header__title--huge"><strong><?= Titles\title(); ?></strong></h1>
</header>
<?php endif; ?>
