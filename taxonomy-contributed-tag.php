<?php

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

get_header();

$press_page_title = get_field('press_page_title', 'options');
$press_page_banner = get_field('press_page_banner', 'options');
$press_mentions_icon = get_field('press_mentions_icon', 'options');
$contributed_icon = get_field('contributed_icon', 'options');
?>


<div class="sh-press-page">
    <div class="sh-press-page__wrap">
        <div class="sh-press-page__header">
            <h1><?php single_term_title();  //echo esc_html($press_page_title) ?></h1>

            <div class="sh-press-page__menu">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))) ?>">Press releases</a>
                <a href="<?php echo get_post_type_archive_link('contributed') ?>" class="active">Contributed
                    articles</a>
                <a href="<?php echo get_post_type_archive_link('press') ?>">Press mentions</a>
            </div>
        </div>


        <div class="sh-contributed">
            <div class="sh-contributed__icon sh-contributed__icon-right-top">
                <img src="<?php echo esc_url($press_mentions_icon['right_top']['url']) ?>" alt="">
            </div>
            <div class="sh-contributed__icon sh-contributed__icon-left-center">
                <img src="<?php echo esc_url($press_mentions_icon['left_center']['url']) ?>" alt="">
            </div>

            <?php if (have_posts()) : ?>
                <div class="container">
                    <?php while (have_posts()) : the_post();
                        $post_year = get_the_time('Y');
                        $contributed_excerpt = get_field('contributed_excerpt');
                        if ($post_year != $press_mentions_years) : ?>
                            <div class="sh-press-mentions__year"><span><?php echo $post_year ?></span></div>
                            <?php
                            $press_mentions_years = $post_year;
                        endif; ?>

                        <div class="sh-contributed__item js-visibility reveal-fade">
                            <a href="<?php the_permalink(); ?>">
                                <span class="sh-contributed__item-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></span>
                                <?php the_title('<span class="sh-contributed__item-title">', '</span>') ?>
                                <span class="sh-contributed__item-excerpt"><?php echo wp_kses_post($contributed_excerpt) ?></span>
                            </a>
                        </div>

                    <?php endwhile; ?>

                    <div class="sh-contributed__paginate">
                        <?php echo shelfengine_contributed_paginate_links() ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <section class="sh-press-page-banner v3-profit">
        <div class="v3-profit__inner container">
            <div class="v3-profit__text-wrap">
                <h1 class="js-visibility reveal-fade"><?php echo $press_page_banner['header'] ?></h1>
                <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $press_page_banner['tag_line'] ?></p>
                <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5"
                   data-mode="popup" style="" target="_blank"><?php echo $press_page_banner['button'] ?></a>
                <script> (function () {
                        var qs, js, q, s, d = document, gi = d.getElementById, ce = d.createElement,
                            gt = d.getElementsByTagName, id = "typef_orm_share", b = "https://embed.typeform.com/";
                        if (!gi.call(d, id)) {
                            js = ce.call(d, "script");
                            js.id = id;
                            js.src = b + "embed.js";
                            q = gt.call(d, "script")[0];
                            q.parentNode.insertBefore(js, q)
                        }
                    })() </script>
            </div>
        </div>
        <div class="v3-profit__bg">


            <!-- <div class="features__dotted-v3-footer dotted-circle">
      <?php get_template_part('templates/components/_dotted-circle'); ?>
    </div>  -->
            <img src="<?php echo $press_page_banner['background_image']['sizes']['large'] ?>" alt="">

        </div>
        <div class="features_dotted-footer ">
            <svg viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="49"></circle>
            </svg>
        </div>

    </section>
</div>


<?php get_footer(); ?>
