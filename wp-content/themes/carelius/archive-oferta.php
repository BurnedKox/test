<?php
/**
 * Szablon archiwum ofert.
 *
 * @package Carelius
 */

get_header();
?>
<div class="container offer-archive">
    <header class="section-header">
        <h1><?php post_type_archive_title(); ?></h1>
        <?php the_archive_description('<p>', '</p>'); ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="offer-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'oferta'); ?>
            <?php endwhile; ?>
        </div>

        <nav class="pagination">
            <?php the_posts_pagination([
                'mid_size'           => 2,
                'prev_text'          => __('Poprzednia', 'carelius'),
                'next_text'          => __('Następna', 'carelius'),
                'screen_reader_text' => __('Nawigacja po ofertach', 'carelius'),
            ]); ?>
        </nav>
    <?php else : ?>
        <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>

    <?php $contact = carelius_get_contact_data(); ?>
    <section class="offer-cta">
        <div>
            <h2><?php esc_html_e('Zaprośmy bezpieczeństwo do Twojego życia', 'carelius'); ?></h2>
            <p><?php esc_html_e('Skontaktuj się z zespołem Carelius, aby dobrać ubezpieczenie lub plan inwestycyjny dopasowany do Twoich potrzeb.', 'carelius'); ?></p>
        </div>
        <div class="offer-cta__actions">
            <a class="btn btn-primary" href="tel:<?php echo esc_attr($contact['phone']); ?>"><?php echo esc_html(sprintf(__('Zadzwoń: %s', 'carelius'), $contact['phone'])); ?></a>
            <a class="btn btn-secondary" href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a>
        </div>
    </section>
</div>
<?php
get_footer();
