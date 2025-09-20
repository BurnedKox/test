<?php
/**
 * Szablon archiwum referencji.
 *
 * @package Carelius
 */

get_header();
?>
<div class="container testimonial-archive">
    <header class="section-header">
        <h1><?php post_type_archive_title(); ?></h1>
        <?php the_archive_description('<p>', '</p>'); ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="testimonial-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'referencja'); ?>
            <?php endwhile; ?>
        </div>

        <nav class="pagination">
            <?php the_posts_pagination([
                'mid_size'           => 2,
                'prev_text'          => __('Poprzednia', 'carelius'),
                'next_text'          => __('Następna', 'carelius'),
                'screen_reader_text' => __('Nawigacja po referencjach', 'carelius'),
            ]); ?>
        </nav>
    <?php else : ?>
        <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
</div>
<?php
get_footer();
