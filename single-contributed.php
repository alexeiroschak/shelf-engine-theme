<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme-name
 */

get_header(); ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post();
        $contributed_excerpt = get_field('contributed_excerpt');
        ?>

        <div class="sh-single__info">
            <div class="container">
                <div class="sh-single__info-header">
                    <time
                        class="sh-contributed__info-date"><?php echo '<span>Press Release</span> ' . get_the_date(get_option( 'date_format' )); ?></time>
                </div>
                <?php the_title('<h2 class="sh-single__title">', '</h2>'); ?>

                <div class="sh-contributed__excerpt"><?php echo wp_kses_post($contributed_excerpt) ?></div>

            </div>
        </div>

        <div class="sh-contributed-single">
            <div class="container">

                <div class="sh-contributed__content">
                    <?php if (have_rows('contributed_blocks')) :
                        while (have_rows('contributed_blocks')) : the_row();
                            get_template_part('template-parts/blocks/' . get_row_layout());
                        endwhile;
                    endif;
                    //the_content();
                    ?>

                    <div class="sh-contributed__share">
                        <span><?php esc_html_e('Share this article:'); ?></span>

                        <ul>
                            <li>
                                <a href="#"
                                   data-share="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                                    <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.71875 9L9.15625 6.125H6.375V4.25C6.375 3.4375 6.75 2.6875 8 2.6875H9.28125V0.21875C9.28125 0.21875 8.125 0 7.03125 0C4.75 0 3.25 1.40625 3.25 3.90625V6.125H0.6875V9H3.25V16H6.375V9H8.71875Z"
                                            fill="#59C5C7"/>
                                    </svg>
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                   data-share="https://twitter.com/intent/tweet?text=<?php echo get_the_excerpt(); ?>&amp;url=<?php the_permalink(); ?>">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.3438 3.75C14.9688 3.28125 15.5312 2.71875 15.9688 2.0625C15.4062 2.3125 14.75 2.5 14.0938 2.5625C14.7812 2.15625 15.2812 1.53125 15.5312 0.75C14.9062 1.125 14.1875 1.40625 13.4688 1.5625C12.8438 0.90625 12 0.53125 11.0625 0.53125C9.25 0.53125 7.78125 2 7.78125 3.8125C7.78125 4.0625 7.8125 4.3125 7.875 4.5625C5.15625 4.40625 2.71875 3.09375 1.09375 1.125C0.8125 1.59375 0.65625 2.15625 0.65625 2.78125C0.65625 3.90625 1.21875 4.90625 2.125 5.5C1.59375 5.46875 1.0625 5.34375 0.625 5.09375V5.125C0.625 6.71875 1.75 8.03125 3.25 8.34375C3 8.40625 2.6875 8.46875 2.40625 8.46875C2.1875 8.46875 2 8.4375 1.78125 8.40625C2.1875 9.71875 3.40625 10.6562 4.84375 10.6875C3.71875 11.5625 2.3125 12.0938 0.78125 12.0938C0.5 12.0938 0.25 12.0625 0 12.0312C1.4375 12.9688 3.15625 13.5 5.03125 13.5C11.0625 13.5 14.3438 8.53125 14.3438 4.1875C14.3438 4.03125 14.3438 3.90625 14.3438 3.75Z"
                                            fill="#59C5C7"/>
                                    </svg>
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                   data-share="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.125 14V4.65625H0.21875V14H3.125ZM1.65625 3.40625C2.59375 3.40625 3.34375 2.625 3.34375 1.6875C3.34375 0.78125 2.59375 0.03125 1.65625 0.03125C0.75 0.03125 0 0.78125 0 1.6875C0 2.625 0.75 3.40625 1.65625 3.40625ZM13.9688 14H14V8.875C14 6.375 13.4375 4.4375 10.5 4.4375C9.09375 4.4375 8.15625 5.21875 7.75 5.9375H7.71875V4.65625H4.9375V14H7.84375V9.375C7.84375 8.15625 8.0625 7 9.5625 7C11.0625 7 11.0938 8.375 11.0938 9.46875V14H13.9688Z"
                                            fill="#59C5C7"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-share="mailto:?subject=<?php the_title(); ?>">
                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.5 0C14.9062 0 15.25 0.15625 15.5625 0.4375C15.8438 0.75 16 1.09375 16 1.5V10.5C16 10.9375 15.8438 11.2812 15.5625 11.5625C15.25 11.875 14.9062 12 14.5 12H1.5C1.0625 12 0.71875 11.875 0.4375 11.5625C0.125 11.2812 0 10.9375 0 10.5V1.5C0 1.09375 0.125 0.75 0.4375 0.4375C0.71875 0.15625 1.0625 0 1.5 0H14.5ZM14.5 1.5H1.5V2.78125C2.21875 3.375 3.625 4.46875 5.71875 6.09375L6 6.34375C6.40625 6.71875 6.75 6.96875 7 7.09375C7.375 7.375 7.71875 7.5 8 7.5C8.25 7.5 8.59375 7.375 9 7.09375C9.25 6.96875 9.5625 6.71875 10 6.34375L10.2812 6.09375C12.3438 4.5 13.75 3.40625 14.5 2.78125V1.5ZM1.5 10.5H14.5V4.6875L10.875 7.5625C10.3438 8 9.90625 8.3125 9.59375 8.5C9.03125 8.84375 8.5 9 8 9C7.5 9 6.9375 8.84375 6.375 8.5C6.0625 8.3125 5.625 8 5.09375 7.5625L1.5 4.6875V10.5Z"
                                            fill="#59C5C7"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="sh-single__tags"><?php echo get_the_term_list(get_the_ID(), 'contributed-tag') ?></div>
                </div>
            </div>

            <?php get_template_part('template-parts/post/mailchimp', null, array('is_post' => true)); ?>
            <?php get_template_part('template-parts/post/related'); ?>
        </div>

    <?php endwhile;
endif; ?>

<?php get_footer(); ?>
