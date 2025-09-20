<?php
/**
 * Funkcje motywu Carelius Ubezpieczenia
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Podstawowa konfiguracja motywu.
 */
function carelius_setup(): void
{
    load_theme_textdomain('carelius', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-background', [
        'default-color' => 'f7f9fc',
    ]);

    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    add_theme_support('editor-color-palette', [
        [
            'name'  => __('Granat Carelius', 'carelius'),
            'slug'  => 'carelius-navy',
            'color' => '#103654',
        ],
        [
            'name'  => __('Błękit Carelius', 'carelius'),
            'slug'  => 'carelius-blue',
            'color' => '#0f88c6',
        ],
        [
            'name'  => __('Ciepły piaskowy', 'carelius'),
            'slug'  => 'carelius-sand',
            'color' => '#f4d19b',
        ],
        [
            'name'  => __('Neutralna biel', 'carelius'),
            'slug'  => 'carelius-white',
            'color' => '#ffffff',
        ],
    ]);

    add_theme_support('editor-font-sizes', [
        [
            'name' => __('Mały', 'carelius'),
            'size' => 14,
            'slug' => 'small',
        ],
        [
            'name' => __('Bazowy', 'carelius'),
            'size' => 18,
            'slug' => 'normal',
        ],
        [
            'name' => __('Średni', 'carelius'),
            'size' => 22,
            'slug' => 'medium',
        ],
        [
            'name' => __('Duży', 'carelius'),
            'size' => 28,
            'slug' => 'large',
        ],
    ]);

    add_theme_support('customize-selective-refresh-widgets');

    add_image_size('carelius-offer', 640, 420, true);

    register_nav_menus([
        'primary' => __('Menu główne', 'carelius'),
        'footer'  => __('Menu w stopce', 'carelius'),
    ]);
}
add_action('after_setup_theme', 'carelius_setup');

/**
 * Rejestracja widgetów.
 */
function carelius_widgets_init(): void
{
    register_sidebar([
        'name'          => __('Panel boczny', 'carelius'),
        'id'            => 'sidebar-1',
        'description'   => __('Widżety wyświetlane na stronach wpisów i statycznych.', 'carelius'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);

    register_sidebar([
        'name'          => __('Stopka 1', 'carelius'),
        'id'            => 'footer-1',
        'description'   => __('Pierwsza kolumna stopki.', 'carelius'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);

    register_sidebar([
        'name'          => __('Stopka 2', 'carelius'),
        'id'            => 'footer-2',
        'description'   => __('Druga kolumna stopki.', 'carelius'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'carelius_widgets_init');

/**
 * Kolejka styli i skryptów.
 */
function carelius_enqueue_assets(): void
{
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'carelius-google-fonts',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'carelius-style',
        get_stylesheet_uri(),
        ['carelius-google-fonts'],
        $theme_version
    );

    wp_enqueue_script(
        'carelius-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $theme_version,
        true
    );

    wp_localize_script('carelius-main', 'careliusTheme', [
        'menuToggleLabel' => __('Otwórz/zamknij nawigację', 'carelius'),
    ]);
}
add_action('wp_enqueue_scripts', 'carelius_enqueue_assets');

/**
 * Rejestracja typów wpisów dla oferty i referencji.
 */
function carelius_register_custom_post_types(): void
{
    register_post_type('oferta', [
        'labels' => [
            'name'               => __('Oferty', 'carelius'),
            'singular_name'      => __('Oferta', 'carelius'),
            'add_new'            => __('Dodaj ofertę', 'carelius'),
            'add_new_item'       => __('Dodaj nową ofertę', 'carelius'),
            'edit_item'          => __('Edytuj ofertę', 'carelius'),
            'new_item'           => __('Nowa oferta', 'carelius'),
            'view_item'          => __('Zobacz ofertę', 'carelius'),
            'view_items'         => __('Zobacz oferty', 'carelius'),
            'search_items'       => __('Szukaj w ofertach', 'carelius'),
            'not_found'          => __('Nie znaleziono ofert', 'carelius'),
            'not_found_in_trash' => __('Brak ofert w koszu', 'carelius'),
        ],
        'public'             => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-shield-alt',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'has_archive'        => true,
        'rewrite'            => [
            'slug'       => 'oferty',
            'with_front' => false,
        ],
    ]);

    register_post_type('referencja', [
        'labels' => [
            'name'               => __('Referencje', 'carelius'),
            'singular_name'      => __('Referencja', 'carelius'),
            'add_new'            => __('Dodaj referencję', 'carelius'),
            'add_new_item'       => __('Dodaj nową referencję', 'carelius'),
            'edit_item'          => __('Edytuj referencję', 'carelius'),
            'new_item'           => __('Nowa referencja', 'carelius'),
            'view_item'          => __('Zobacz referencję', 'carelius'),
            'view_items'         => __('Zobacz referencje', 'carelius'),
            'search_items'       => __('Szukaj w referencjach', 'carelius'),
            'not_found'          => __('Nie znaleziono referencji', 'carelius'),
            'not_found_in_trash' => __('Brak referencji w koszu', 'carelius'),
        ],
        'public'             => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-testimonial',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'has_archive'        => true,
        'rewrite'            => [
            'slug'       => 'referencje',
            'with_front' => false,
        ],
    ]);
}
add_action('init', 'carelius_register_custom_post_types');

/**
 * Rejestracja pól meta dostępnych w edytorze blokowym.
 */
function carelius_register_post_meta(): void
{
    register_post_meta('oferta', 'carelius_oferta_highlight', [
        'type'              => 'string',
        'single'            => true,
        'show_in_rest'      => true,
        'sanitize_callback' => 'sanitize_text_field',
        'auth_callback'     => static function () {
            return current_user_can('edit_posts');
        },
    ]);

    register_post_meta('referencja', 'carelius_referencja_position', [
        'type'              => 'string',
        'single'            => true,
        'show_in_rest'      => true,
        'sanitize_callback' => 'sanitize_text_field',
        'auth_callback'     => static function () {
            return current_user_can('edit_posts');
        },
    ]);

    register_post_meta('referencja', 'carelius_referencja_rating', [
        'type'              => 'number',
        'single'            => true,
        'show_in_rest'      => true,
        'sanitize_callback' => static function ($value) {
            $value = is_numeric($value) ? (int) $value : 0;

            return max(0, min(5, $value));
        },
        'auth_callback'     => static function () {
            return current_user_can('edit_posts');
        },
    ]);
}
add_action('init', 'carelius_register_post_meta');

/**
 * Ustawienia w Personalizatorze.
 */
function carelius_customize_register($wp_customize): void
{
    $wp_customize->add_section('carelius_contact', [
        'title'       => __('Dane kontaktowe', 'carelius'),
        'description' => __('Ustawienia widoczne w sekcji kontaktowej na stronie głównej oraz w stopce.', 'carelius'),
        'priority'    => 30,
    ]);

    $wp_customize->add_setting('carelius_phone', [
        'default'           => '+48 500 600 700',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carelius_phone', [
        'label'   => __('Telefon', 'carelius'),
        'section' => 'carelius_contact',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('carelius_email', [
        'default'           => 'kontakt@carelius.pl',
        'sanitize_callback' => 'sanitize_email',
    ]);

    $wp_customize->add_control('carelius_email', [
        'label'   => __('Adres e-mail', 'carelius'),
        'section' => 'carelius_contact',
        'type'    => 'email',
    ]);

    $wp_customize->add_setting('carelius_address', [
        'default'           => 'ul. Przyjazna 10, 00-000 Warszawa',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carelius_address', [
        'label'   => __('Adres biura', 'carelius'),
        'section' => 'carelius_contact',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('carelius_cta_text', [
        'default'           => __('Porozmawiajmy o Twoim bezpieczeństwie finansowym', 'carelius'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carelius_cta_text', [
        'label'   => __('Tekst wezwania do działania', 'carelius'),
        'section' => 'carelius_contact',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'carelius_customize_register');

/**
 * Funkcja pomocnicza pobierająca dane kontaktowe z ustawieniami domyślnymi.
 */
function carelius_get_contact_data(): array
{
    return [
        'phone'   => get_theme_mod('carelius_phone', '+48 500 600 700'),
        'email'   => get_theme_mod('carelius_email', 'kontakt@carelius.pl'),
        'address' => get_theme_mod('carelius_address', 'ul. Przyjazna 10, 00-000 Warszawa'),
        'cta'     => get_theme_mod('carelius_cta_text', __('Porozmawiajmy o Twoim bezpieczeństwie finansowym', 'carelius')),
    ];
}

/**
 * Zmiana długości zajawki wpisu.
 */
function carelius_custom_excerpt_length(int $length): int
{
    return 24;
}
add_filter('excerpt_length', 'carelius_custom_excerpt_length', 999);

/**
 * Dodanie klasy do linków w paginacji.
 */
function carelius_posts_link_attributes(string $attributes): string
{
    if (strpos($attributes, 'class=') !== false) {
        return preg_replace('/class="([^"]*)"/', 'class="$1 page-numbers"', $attributes);
    }

    return trim($attributes) . ' class="page-numbers"';
}
add_filter('next_posts_link_attributes', 'carelius_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'carelius_posts_link_attributes');


/**
 * Fallback menu w przypadku braku przypisanego menu.
 */
function carelius_fallback_menu(): void
{
    echo '<ul class="menu">';
    printf('<li><a href="%1$s">%2$s</a></li>', esc_url(home_url('/')), esc_html__('Strona główna', 'carelius'));

    if (get_page_by_path('oferta') || get_page_by_path('oferty')) {
        printf('<li><a href="%1$s">%2$s</a></li>', esc_url(home_url('/oferty')), esc_html__('Oferta', 'carelius'));
    }

    printf('<li><a href="%1$s">%2$s</a></li>', esc_url(home_url('/kontakt')), esc_html__('Kontakt', 'carelius'));
    echo '</ul>';
}

/**
 * Odświeżenie reguł przepisywania adresów po aktywowaniu motywu.
 */
function carelius_flush_rewrite_on_switch(): void
{
    carelius_register_custom_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'carelius_flush_rewrite_on_switch');
