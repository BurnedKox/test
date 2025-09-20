<?php
/**
 * Szablon pojedynczej referencji.
 *
 * @package Carelius
 */

get_header();
?>
<div class="container single-testimonial">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('testimonial testimonial--single'); ?>>
            <?php
            $rating   = (int) get_post_meta(get_the_ID(), 'carelius_referencja_rating', true);
            $position = get_post_meta(get_the_ID(), 'carelius_referencja_position', true);
            ?>
            <header class="testimonial__header">
                <h1 class="testimonial__title"><?php the_title(); ?></h1>
                <?php if (!empty($position)) : ?>
                    <div class="author-position"><?php echo esc_html($position); ?></div>
                <?php endif; ?>
                <?php if ($rating > 0) : ?>
                    <?php $accessible_label = sprintf(esc_html__('Ocena: %1$s na %2$s', 'carelius'), $rating, 5); ?>
                    <div class="testimonial-rating" aria-label="<?php echo esc_attr($accessible_label); ?>">
                        <?php echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                <?php endif; ?>
            </header>

            <div class="testimonial__content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>
<?php
get_footer();
