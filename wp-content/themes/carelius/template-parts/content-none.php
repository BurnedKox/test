<?php
/**
 * Szablon prezentujący komunikat o braku treści.
 *
 * @package Carelius
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<section class="no-results not-found">
    <header class="section-header">
        <h2><?php esc_html_e('Nic nie znaleziono', 'carelius'); ?></h2>
    </header>

    <div class="page-content">
        <?php if (is_search()) : ?>
            <p><?php esc_html_e('Spróbuj ponownie z innym słowem kluczowym lub skorzystaj z nawigacji głównej.', 'carelius'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e('Wygląda na to, że nie ma tu jeszcze treści. Wróć na stronę główną lub skontaktuj się z nami.', 'carelius'); ?></p>
        <?php endif; ?>

        <a class="btn btn-secondary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Powrót na stronę główną', 'carelius'); ?></a>
    </div>
</section>
