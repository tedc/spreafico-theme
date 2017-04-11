<?php use Roots\Sage\Titles; ?>
<aside class="section__cell section__cell--aside-s4 section__cell--aside section__cell--aside-shrink"<?php square('blog'); ?>>
	<h1 class="section__title section__title--huge"><strong><?= Titles\title(); ?></strong></h1>
	<ul class="list list--grow-lg-bottom">
	<?php wp_list_categories(array('title_li'=>0)); ?>
	</ul>
</aside>
