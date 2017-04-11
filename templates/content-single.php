<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class('post--grid post--grid-start post--grid-shrink post--grow-md'); ?>>
        <div class="post__cell post__cell--s12">
            <figure class="post__thumbnail">
                <?php the_post_thumbnail('full'); ?>      
            </figure>
            <style type="text/css">
                .post__thumbnail {
                    background-image: url(<?php the_post_thumbnail_url('full'); ?> )
                }
            </style>
        </div>
        <div class="post__cell post__cell--grow-md post__cell--aside post__cell--aside-s4 post__cell--aside-shrink">
            <?php _e('Condividi:') ?><br />
            <a href="#" class="icon-facebook"></a>
            <a href="#" class="icon-twitter"></a>
            <a href="#" class="icon-facebook"></a>
        </div>
        <div class="post__cell post__cell--s8 post__cell--grow-md">
            <div class="post__meta post__meta--shrink">
                <?php get_template_part('templates/entry-meta'); ?>
                <div class="post__category post__category--grow-bottom">
                    <?php the_category(', '); ?>
                </div>
            </div>
            <div class="post__content post__content--grow-md post__content--shrink">
                <header>
                <h1 class="<?php echo get_post_type(); ?>__title <?php echo get_post_type(); ?>__title--big"><?php the_title(); ?></h1>
                </header>
                <?php the_content(); ?>
            </div>
        </div>
    </article>
    <?php 
        $cats = wp_get_post_categories($post->ID);
        $q = new WP_Query(
            array(
                'category__in' => $cats,
                'posts_per_page' => 2
            )
        );
        if($q->have_posts()) : ?>
    <footer class="related related--grid related--grow-lg-bottom">
        <aside class="related__cell--s4 related__cell related__cell--shrink related__cell--grow">
            <h5 class="related__title related__title--small related__title--small-upper">
                <?php _e('Leggi anche', 'sprfc'); ?>
            </h5>
        </aside>
        <ul class="related__cell related__cell--shrink related__cell--s8 related__cell--grid">
        <?php $c = 0; while($q->have_posts()) : $q->the_post(); ?>
            <li class="related__cell related__cell--s6">
                <div class="related__content related__content--shrink related__content--grow<?php echo ($c==0) ? ' related__content--first' : '' ?>">
                    <h3 class="related__title related__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="related__summary related__summary--grow">
                        <?php echo my_excerpt(10); ?>
                    </div>
                    <a href="<?php the_permalink() ?>" class="more"><?php _e('Leggi tutto'); ?></a>
                </div>
            </li>
        <?php $c++; endwhile; wp_reset_query(); ?>
        </ul>
    </footer>
    <?php endif; ?>
<?php endwhile; ?>
