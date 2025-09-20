<?php
/**
 * Wyświetlanie treści wpisu
 *
 * @package Carelius
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }
        ?>
        <div class="entry-meta">
            <span><?php echo esc_html(get_the_date()); ?></span>
            <span>•</span>
            <span><?php the_author(); ?></span>
        </div>
    </header>

    <div class="entry-content">
        <?php
        if (is_singular()) {
            the_content();
            wp_link_pages([
                'before' => '<div class="page-links">' . esc_html__('Strony:', 'carelius'),
                'after'  => '</div>',
            ]);
        } else {
            the_excerpt();
        }
        ?>
    </div>

    <?php if (get_post_type() === 'post') : ?>
        <footer class="entry-footer">
            <?php the_tags('<div class="tag-links">', '', '</div>'); ?>
        </footer>
    <?php endif; ?>
</article>
