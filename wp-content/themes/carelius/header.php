<?php
/**
 * Nagłówek motywu
 *
 * @package Carelius
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container">
        <div class="branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div>
        <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
            <span class="screen-reader-text"><?php esc_html_e('Menu', 'carelius'); ?></span>
            &#9776;
        </button>
        <nav class="site-navigation" aria-label="<?php esc_attr_e('Główna nawigacja', 'carelius'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'fallback_cb'    => 'carelius_fallback_menu',
            ]);
            ?>
        </nav>
    </div>
</header>
<main class="site-main">
