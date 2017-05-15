<?php get_template_part( 'templates/form', 'header' ); 
$current_url = home_url(add_query_arg(array(),$wp->request)); ?>
<div class="form form--grid" ng-form>
	<?php if($obj != __('Richiesta di preventivo', 'sprfc')) : ?>
	<div class="form__cell form__cell--s6">
		<div class="form__content form__content--shrink form__content--grow-md">
			<?php the_content(); ?>
		</div>
	</div>
<?php endif; ?>
	<form class="form__cell form__cell--inputs<?php if($obj != __('Richiesta di preventivo', 'sprfc')) : ?> form__cell--s6<?php endif; ?>" ng-submit="onSubmit(contactForm.$valid, '<?php echo $current_url; ?>')" name="contactForm" novalidate>
		<input type="hidden" ng-model="formData.obj" ng-init="formData.obj = '<?php echo $obj; ?>'">
		<input type="text" name="sender" ng-model="formData.sender" placeholder="<?php _e('Nome e cognome (obbligatorio)', 'sprfc'); ?>" required />
		<input type="email" name="email" ng-model="formData.email" placeholder="<?php _e('Indirizzo email (obbligatorio)', 'sprfc'); ?>" required />
		<input type="tel" name="tel" ng-model="formData.tel" placeholder="<?php _e('Telefono (obbligatorio)', 'sprfc'); ?>" required />
		<textarea ng-model="formData.message" placeholder="<?php _e('Messaggio', 'sprfc'); ?>"></textarea>
		<button class="button" ng-disabled="contactForm.$invalid">
			<span class="button__label"><?php _e('Invia', 'sprfc') ?></span>
			<span class="button__alert" ng-class="{'button__alert--visible' : isContactSent}">
				<?php _e('Messaggio inviato correttamente'); ?>
			</span>
		</button>
	</form>
</div>