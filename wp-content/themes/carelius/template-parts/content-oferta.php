<?php
/**
 * Treść dla typu oferta
 *
 * @package Carelius
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('offer-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <figure class="offer-card__media">
            <?php the_post_thumbnail('carelius-offer'); ?>
        </figure>
    <?php endif; ?>

    <div class="offer-card__body">
        <header class="offer-card__header">
            <?php
            if (is_singular('oferta')) {
                the_title('<h1 class="offer-card__title">', '</h1>');
            } else {
                the_title('<h2 class="offer-card__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            }
            ?>

            <?php
            $highlight = get_post_meta(get_the_ID(), 'carelius_oferta_highlight', true);

            if (!empty($highlight)) :
                ?>
                <p class="offer-card__highlight"><?php echo esc_html($highlight); ?></p>
            <?php endif; ?>
        </header>

        <div class="offer-card__content">
            <?php if (is_singular('oferta')) : ?>
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before' => '<div class="page-links">' . esc_html__('Strony:', 'carelius'),
                    'after'  => '</div>',
                ]);
                ?>
            <?php else : ?>
                <?php the_excerpt(); ?>
                <a class="btn btn-secondary offer-card__more" href="<?php the_permalink(); ?>"><?php esc_html_e('Poznaj szczegóły', 'carelius'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</article>
