<?php
/**
 * Treść dla referencji
 *
 * @package Carelius
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('testimonial'); ?>>
    <div class="entry-content">
        <?php
        $rating   = (int) get_post_meta(get_the_ID(), 'carelius_referencja_rating', true);
        $position = get_post_meta(get_the_ID(), 'carelius_referencja_position', true);

        if ($rating > 0) :
            $accessible_label = sprintf(esc_html__('Ocena: %1$s na %2$s', 'carelius'), $rating, 5);
            ?>
            <div class="testimonial-rating" aria-label="<?php echo esc_attr($accessible_label); ?>">
                <?php echo str_repeat('★', (int) $rating) . str_repeat('☆', 5 - (int) $rating); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        <?php endif; ?>

        <p>“<?php echo esc_html(wp_strip_all_tags(get_the_content())); ?>”</p>

        <div class="author-group">
            <div class="author"><?php the_title(); ?></div>
            <?php if (!empty($position)) : ?>
                <div class="author-position"><?php echo esc_html($position); ?></div>
            <?php endif; ?>
        </div>
    </div>
</article>
