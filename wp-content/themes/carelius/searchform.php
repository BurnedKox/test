<?php
/**
 * Formularz wyszukiwania
 *
 * @package Carelius
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php esc_html_e('Szukaj:', 'carelius'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr__('Wpisz szukaną frazę…', 'carelius'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="btn btn-primary">
        <?php esc_html_e('Szukaj', 'carelius'); ?>
    </button>
</form>
