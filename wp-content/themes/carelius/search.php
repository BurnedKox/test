<?php
/**
 * Szablon wyników wyszukiwania
 *
 * @package Carelius
 */

get_header();
?>
<div class="container content-with-sidebar">
    <div>
        <header class="section-header">
            <h1><?php printf(esc_html__('Wyniki wyszukiwania dla: %s', 'carelius'), '<span>' . get_search_query() . '</span>'); ?></h1>
        </header>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', get_post_type()); ?>
            <?php endwhile; ?>

            <nav class="pagination">
                <?php the_posts_pagination([
                    'mid_size'           => 2,
                    'prev_text'          => __('Poprzednia', 'carelius'),
                    'next_text'          => __('Następna', 'carelius'),
                    'screen_reader_text' => __('Nawigacja po wynikach wyszukiwania', 'carelius'),
                ]); ?>
            </nav>
        <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
