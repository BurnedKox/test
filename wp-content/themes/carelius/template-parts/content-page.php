<?php
/**
 * Treść strony statycznej
 *
 * @package Carelius
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>

    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages([
            'before' => '<div class="page-links">' . esc_html__('Strony:', 'carelius'),
            'after'  => '</div>',
        ]);
        ?>
    </div>
</article>
