<?php
/**
 * Szablon pojedynczej oferty.
 *
 * @package Carelius
 */

get_header();
?>
<div class="container single-offer">
    <?php
    $contact = carelius_get_contact_data();

    while (have_posts()) :
        the_post();
        ?>
        <div class="single-offer__content">
            <?php get_template_part('template-parts/content', 'oferta'); ?>
        </div>

        <aside class="single-offer__sidebar">
            <section class="offer-summary">
                <h2><?php esc_html_e('Chcesz porozmawiać o tej ofercie?', 'carelius'); ?></h2>
                <p><?php esc_html_e('Skontaktuj się z doradcą Carelius, aby otrzymać indywidualną analizę potrzeb i propozycję ochrony.', 'carelius'); ?></p>
                <a class="btn btn-primary" href="tel:<?php echo esc_attr($contact['phone']); ?>"><?php echo esc_html(sprintf(__('Zadzwoń: %s', 'carelius'), $contact['phone'])); ?></a>
                <a class="btn btn-secondary" href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a>
            </section>

            <section class="offer-summary offer-summary--info">
                <h3><?php esc_html_e('Dlaczego warto z Carelius?', 'carelius'); ?></h3>
                <ul>
                    <li><?php esc_html_e('Porównujemy oferty największych towarzystw ubezpieczeniowych.', 'carelius'); ?></li>
                    <li><?php esc_html_e('Zapewniamy indywidualnego opiekuna na każdym etapie współpracy.', 'carelius'); ?></li>
                    <li><?php esc_html_e('Pomagamy w obsłudze szkód i formalności po podpisaniu umowy.', 'carelius'); ?></li>
                </ul>
            </section>
        </aside>
    <?php endwhile; ?>
</div>
<?php
get_footer();
