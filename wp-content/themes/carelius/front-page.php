<?php
/**
 * Szablon strony głównej
 *
 * @package Carelius
 */

get_header();

$contact = carelius_get_contact_data();
?>
<section class="hero">
    <div class="container">
        <div>
            <h1><?php echo esc_html__('Zadbamy o Twoją przyszłość finansową', 'carelius'); ?></h1>
            <p><?php echo esc_html__('Carelius Ubezpieczenia to zaufany partner w kompleksowej ochronie życia, zdrowia i majątku. Oferujemy indywidualne podejście, analizę potrzeb i dedykowanego opiekuna.', 'carelius'); ?></p>
            <div class="hero-cta">
                <a class="btn btn-primary" href="<?php echo esc_url(home_url('/kontakt')); ?>"><?php echo esc_html__('Umów konsultację', 'carelius'); ?></a>
                <a class="btn btn-secondary" href="tel:<?php echo esc_attr($contact['phone']); ?>"><?php echo esc_html(sprintf(__('Zadzwoń: %s', 'carelius'), $contact['phone'])); ?></a>
            </div>
        </div>
        <div class="contact-section">
            <h2><?php echo esc_html__('Twój spokój to nasza misja', 'carelius'); ?></h2>
            <p><?php echo esc_html__('Dopasujemy polisę do Twojego stylu życia i budżetu. Działamy szybko, transparentnie i z empatią.', 'carelius'); ?></p>
            <div class="contact-details">
                <span><?php echo esc_html($contact['cta']); ?></span>
                <a class="btn btn-primary" href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a>
            </div>
        </div>
        <div class="section-footer">
            <a class="btn btn-primary" href="<?php echo esc_url(home_url('/oferty')); ?>"><?php esc_html_e('Zobacz wszystkie oferty', 'carelius'); ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html__('Nasze kluczowe obszary ochrony', 'carelius'); ?></h2>
            <p><?php echo esc_html__('Budujemy długofalowe relacje, dlatego proponujemy rozwiązania, które rosną razem z Twoimi potrzebami.', 'carelius'); ?></p>
        </div>
        <div class="card-grid">
            <?php
            $services_query = new WP_Query([
                'post_type'      => 'oferta',
                'posts_per_page' => 6,
            ]);

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) :
                    $services_query->the_post();
                    $highlight = get_post_meta(get_the_ID(), 'carelius_oferta_highlight', true);
                    ?>
                    <article class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card-image"><?php the_post_thumbnail('carelius-offer'); ?></div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <?php if (!empty($highlight)) : ?>
                            <p class="card-highlight"><?php echo esc_html($highlight); ?></p>
                        <?php endif; ?>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <a class="btn btn-secondary" href="<?php the_permalink(); ?>"><?php esc_html_e('Poznaj szczegóły', 'carelius'); ?></a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <article class="card">
                    <h3><?php esc_html_e('Ubezpieczenia na życie', 'carelius'); ?></h3>
                    <p><?php esc_html_e('Stworzymy polisę chroniącą Ciebie i Twoją rodzinę, uwzględniając ważne etapy życia.', 'carelius'); ?></p>
                </article>
                <article class="card">
                    <h3><?php esc_html_e('Ubezpieczenia majątkowe', 'carelius'); ?></h3>
                    <p><?php esc_html_e('Zapewniamy spokój dzięki szerokiemu wachlarzowi ochrony domu, mieszkania i firmy.', 'carelius'); ?></p>
                </article>
                <article class="card">
                    <h3><?php esc_html_e('Plany inwestycyjne', 'carelius'); ?></h3>
                    <p><?php esc_html_e('Łączymy bezpieczeństwo z możliwością pomnażania kapitału w dopasowanych programach finansowych.', 'carelius'); ?></p>
                </article>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Referencje klientów', 'carelius'); ?></h2>
            <p><?php esc_html_e('Zaufały nam setki rodzin oraz przedsiębiorców, którzy cenią rzetelność i opiekę Carelius.', 'carelius'); ?></p>
        </div>
        <div class="card-grid">
            <?php
            $testimonials_query = new WP_Query([
                'post_type'      => 'referencja',
                'posts_per_page' => 3,
            ]);

            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) :
                    $testimonials_query->the_post();
                    $rating   = (int) get_post_meta(get_the_ID(), 'carelius_referencja_rating', true);
                    $position = get_post_meta(get_the_ID(), 'carelius_referencja_position', true);
                    ?>
                    <article class="testimonial">
                        <?php if ($rating > 0) : ?>
                            <?php $accessible_label = sprintf(esc_html__('Ocena: %1$s na %2$s', 'carelius'), $rating, 5); ?>
                            <div class="testimonial-rating" aria-label="<?php echo esc_attr($accessible_label); ?>">
                                <?php echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        <?php endif; ?>
                        <p>“<?php echo esc_html(wp_strip_all_tags(get_the_content())); ?>”</p>
                        <div class="author-group">
                            <div class="author"><?php the_title(); ?></div>
                            <?php if (!empty($position)) : ?>
                                <div class="author-position"><?php echo esc_html($position); ?></div>
                            <?php endif; ?>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <article class="testimonial">
                    <div class="testimonial-rating" aria-hidden="true">★★★★★</div>
                    <p>“<?php esc_html_e('Profesjonalne podejście i świetna komunikacja. Dzięki Carelius mam pewność, że moja rodzina jest zabezpieczona.', 'carelius'); ?>”</p>
                    <div class="author-group">
                        <div class="author"><?php esc_html_e('Anna, Warszawa', 'carelius'); ?></div>
                        <div class="author-position"><?php esc_html_e('Mama dwójki dzieci', 'carelius'); ?></div>
                    </div>
                </article>
                <article class="testimonial">
                    <div class="testimonial-rating" aria-hidden="true">★★★★★</div>
                    <p>“<?php esc_html_e('Doradca pomógł mi dobrać polisę dla firmy i zadbał o każdy szczegół. Polecam z całego serca.', 'carelius'); ?>”</p>
                    <div class="author-group">
                        <div class="author"><?php esc_html_e('Marek, właściciel firmy budowlanej', 'carelius'); ?></div>
                        <div class="author-position"><?php esc_html_e('Przedsiębiorca', 'carelius'); ?></div>
                    </div>
                </article>
                <article class="testimonial">
                    <div class="testimonial-rating" aria-hidden="true">★★★★☆</div>
                    <p>“<?php esc_html_e('Szybka reakcja przy szkodzie i realne wsparcie w formalnościach. To partner, na którym można polegać.', 'carelius'); ?>”</p>
                    <div class="author-group">
                        <div class="author"><?php esc_html_e('Joanna, Kraków', 'carelius'); ?></div>
                        <div class="author-position"><?php esc_html_e('Właścicielka małej firmy', 'carelius'); ?></div>
                    </div>
                </article>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-section">
            <h2><?php esc_html_e('Umów bezpłatną analizę potrzeb', 'carelius'); ?></h2>
            <p><?php esc_html_e('Przygotujemy dla Ciebie indywidualną strategię ochrony i inwestycji. Zadzwoń lub napisz – odpowiemy tego samego dnia roboczego.', 'carelius'); ?></p>
            <div class="contact-details">
                <span><?php echo esc_html($contact['phone']); ?></span>
                <span><?php echo esc_html($contact['email']); ?></span>
                <span><?php echo esc_html($contact['address']); ?></span>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'page');
            endwhile;
        endif;
        ?>
    </div>
</section>
<?php
get_footer();
