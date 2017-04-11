<div class="section section--grid section--grid-start">

<?php get_template_part('templates/aside'); ?>
<div class="section__cell section__cell--s8 section__cell--grow-lg-bottom">
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php $count = 0; while (have_posts()) : the_post(); ?>
  <?php $file = get_post_type() != 'post' ? '-'.get_post_type() : ''; 
  include(locate_template( 'templates/content' .$file.'.php', false, false)); ?>
<?php $count++; endwhile; wp_reset_query() ?>
<nav class="posts-nav posts-nav--shrink posts-nav--grow-md<?php echo (!get_previous_posts_link()) ? ' posts-nav--noprev' : ''; echo (!get_next_posts_link()) ? ' posts-nav--nonext' : ''; ?>" data-prev="<?php _e('Precedente', 'sprfc'); ?>" data-next="<?php _e('Sucessiva', 'sprfc'); ?>">
<?php echo (!get_previous_posts_link() || !get_next_posts_link()) ? __('<span class="posts-nav__number">Pagina ', 'sprfc') . $paged  . '</span>' : ''; posts_nav_link(__('<span class="posts-nav__number">Pagina ', 'sprfc') . $paged  . '</span>', __('Precedente', 'sprfc'), __('Sucessiva', 'sprfc')); ?>
</nav>
</div>