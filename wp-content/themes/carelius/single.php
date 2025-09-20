<?php
/**
 * Szablon pojedynczego wpisu
 *
 * @package Carelius
 */

get_header();
?>
<div class="container content-with-sidebar">
    <div>
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', get_post_type());

            the_post_navigation([
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Poprzedni artykuł', 'carelius') . '</span><span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Następny artykuł', 'carelius') . '</span><span class="nav-title">%title</span>',
            ]);

            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        endwhile;
        ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
