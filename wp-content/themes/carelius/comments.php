<?php
/**
 * Szablon komentarzy
 *
 * @package Carelius
 */

if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            printf(
                esc_html(_n('%1$s komentarz', '%1$s komentarzy', $comments_number, 'carelius')),
                number_format_i18n($comments_number)
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 60,
            ]);
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="no-comments"><?php esc_html_e('Komentarze są wyłączone.', 'carelius'); ?></p>
    <?php endif; ?>

    <?php comment_form([
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
    ]); ?>
</div>
