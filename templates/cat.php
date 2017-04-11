<nav class="cat cat--shrink cat--grow"<?php scrollmagic('"class":"cat--inview","triggerElement":".main","triggerHook":"onLeave","offset":100'); ?> ng-footer>
	<h4 class="cat__title cat__title--upper" ng-click="isPopup=true"><?php _e('Richiedi un preventivo', 'sprfc'); ?></h4>
	<a href="tel:<?php echo str_replace('.','',get_field('phone', 'options')); ?>"><?php the_field('phone', 'options'); ?></a>
</nav>
<div class="popup" ng-class="{'popup--visible':isPopup}" ng-scroll>
	<span class="popup__close" ng-click="isPopup=false" data-close="<?php _e('Chiudi', 'sprfc'); ?>">
		<span class="popup__close-line popup__close-line--first"></span>
		<span class="popup__close-line popup__close-line--second"></span>
	</span>
	<div class="popup__svg">
		<?php
			$page_id = get_field('contact_page', 'options');
			$images = get_field('random_images', $page_id);
			$rand = rand(0, count($images) - 1);
			$image = $images[$rand]; ?>
		<svg preserveAspectRatio="xMidYMid slice" viewBox="0 0 <?php echo $image['width']; ?> <?php echo $image['height']; ?>">
			<defs>
				<filter id="popup_filter" color-interpolation-filters="sRGB">
					<feColorMatrix type="matrix" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" result="gray"></feColorMatrix><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="table" tableValues="1 0.7862745098039216 0.5725490196078431 0.050980392156862744"></feFuncR><feFuncG type="table" tableValues="1 0.7843137254901961 0.5686274509803921 0.047058823529411764"></feFuncG><feFuncB type="table" tableValues="1 0.8235294117647058 0.6470588235294118 0.21568627450980393"></feFuncB><feFuncA type="table" tableValues="1 1 1 1"></feFuncA></feComponentTransfer>
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