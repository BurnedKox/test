<?php
/**
 * Szablon strony statycznej
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
            get_template_part('template-parts/content', 'page');

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
