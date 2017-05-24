<nav class="cat cat--shrink cat--grow" ng-footer>
	<h4 class="cat__title cat__title--upper" ng-click="isPopup=true"><?php _e('Richiedi un preventivo', 'sprfc'); ?></h4>
	<a href="tel:<?php echo str_replace('.','',get_field('phone', 'options')); ?>"><?php the_field('phone', 'options'); ?></a>
</nav>
<div class="popup" ng-class="{'popup--visible':isPopup}" ng-scroll>
	<span class="popup__close" ng-click="isPopup=false; $event.stopPropagation()" data-close="<?php _e('Chiudi', 'sprfc'); ?>">
		<span ng-click="$event.stopPropagation()" class="popup__close-line popup__close-line--first"></span>
		<span ng-click="$event.stopPropagation()" class="popup__close-line popup__close-line--second"></span>
	</span>
	<div class="popup__svg">
		<?php
			$page_id = get_field('contact_page', 'options');
			$images = get_field('random_images', $page_id);
			$rand = rand(0, count($images) - 1);
			$image = $images[$rand]; ?>
		<svg preserveAspectRatio="xMidYMid slice" viewBox="0 0 <?php echo $image['width']; ?> <?php echo $image['height']; ?>">
			<defs>
				<filter id="popup_filter">
					<feColorMatrix type="matrix" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" result="gray"></feColorMatrix><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="table" tableValues="1 0.9058823529411765 0.8117647058823529 0.7607843137254902"></feFuncR><feFuncG type="table" tableValues="1 0.884313725490196 0.7686274509803922 0.7098039215686275"></feFuncG><feFuncB type="table" tableValues="1 0.8450980392156863 0.6901960784313725 0.6078431372549019"></feFuncB><feFuncA type="table" tableValues="1 1 1 1"></feFuncA></feComponentTransfer>
				</filter>
			</defs>
			<image ng-attr-xlink:href="<?php echo $image['url']; ?>" ng-attr-width="<?php echo $image['width']; ?>" ng-attr-height="<?php echo $image['height']; ?>" filter="url(#popup_filter)" xlink:href="" x="0" y="0"></image>
		</svg>
	</div>
	<div class="popup__container popup__container--shrink popup__container--grow-lg" ng-scroll>
	<?php $q = new WP_Query(array('post__in' => array($page_id),'post_type'=>'page')); while($q->have_posts()) : $q->the_post(); 
			$obj = __('Richiesta di preventivo', 'sprfc'); include(locate_template ( 'templates/form.php', false, true )); endwhile; wp_reset_query(); ?>
	</div>
</div>