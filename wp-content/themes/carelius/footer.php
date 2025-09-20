<?php
/**
 * Stopka motywu
 *
 * @package Carelius
 */

$contact = carelius_get_contact_data();
?>
</main>
<footer class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php endif; ?>

            <section class="widget">
                <h2 class="widget-title"><?php esc_html_e('Kontakt', 'carelius'); ?></h2>
                <ul>
                    <li><strong><?php esc_html_e('Telefon:', 'carelius'); ?></strong> <a href="tel:<?php echo esc_attr($contact['phone']); ?>"><?php echo esc_html($contact['phone']); ?></a></li>
                    <li><strong><?php esc_html_e('E-mail:', 'carelius'); ?></strong> <a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a></li>
                    <li><strong><?php esc_html_e('Adres:', 'carelius'); ?></strong> <?php echo esc_html($contact['address']); ?></li>
                </ul>
            </section>
        </div>
        <div class="site-info">
            <span>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Wszelkie prawa zastrzeżone.', 'carelius'); ?></span>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
                'container'      => 'nav',
                'fallback_cb'    => false,
            ]);
            ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
