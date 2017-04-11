<?php
/**
 * Template Name: Contact Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/header', 'contact'); ?>
  <div class="container container--shrink container--grow-lg-bottom">
  <?php $obj = __('Richiesta di preventivo', 'sprfc'); include(locate_template ( 'templates/form.php', false, true )); ?>
  </div>
<?php endwhile; ?>
