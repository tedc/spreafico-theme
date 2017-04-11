<header class="banner" ng-class="{'banner--active' : isMenu}">
    <div class="banner__container banner__container--shrink">
        <a class="banner__logo" href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
        <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo print_svg(get_bloginfo('url') . $image[0]);

        ?>
        </a>
        <?php get_template_part('templates/breadcrumb'); ?>
    </div>
    <span class="banner__toggle" data-open="<?php _e('Menu', 'sprfc'); ?>" data-close="<?php _e('Chiudi', 'sprfc'); ?>" ng-click="isMenu=!isMenu">
        <span class="banner__toggle-line banner__toggle-line--top"></span>
        <span class="banner__toggle-line banner__toggle-line--center"></span>
        <span class="banner__toggle-line banner__toggle-line--bottom"></span>
    </span>
    <nav class="banner__nav">
        <div class="banner__nav-container banner__nav-container--grid-nowrap" ng-scroll>
            <div class="banner__scroller banner__scroller--grid">
                <?php
                get_template_part( 'templates/linee' );
                if (has_nav_menu('primary_navigation')) :
                    bem_menu('primary_navigation', 'menu', 'menu--shrink menu--grow-lg');
                endif;
                ?>
                
            </div>
        </div>
    <div class="banner__footer banner__footer--grid banner__footer--grow banner__footer--shrink">
        <?php get_template_part( 'templates/social' ); ?>
        <p><?php echo strip_tags(get_field('address', 'options')); ?></p>
    </div>
    </nav>
</header>
