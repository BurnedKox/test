<?php
/**
 * Szablon błędu 404
 *
 * @package Carelius
 */

get_header();
?>
<div class="container">
    <section class="post-card">
        <h1><?php esc_html_e('Ups! Ta strona nie istnieje.', 'carelius'); ?></h1>
        <p><?php esc_html_e('Być może adres został wpisany niepoprawnie lub strona została przeniesiona.', 'carelius'); ?></p>
        <?php get_search_form(); ?>
        <p><a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Wróć na stronę główną', 'carelius'); ?></a></p>
    </section>
</div>
<?php
get_footer();
