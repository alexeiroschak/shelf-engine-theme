<?php

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
  exit('Direct script access denied.');
}

get_header();

$press_page_title = get_field('press_page_title', 'options');
$press_page_banner = get_field('press_page_banner', 'options');
$press_mentions_icon = get_field('press_mentions_icon', 'options');

$terms = get_terms( 'press-cat' );
$term_id = '';

if (is_tax()) {
    $current_term = get_queried_object();
    $term_id = $current_term->term_id;
}

?>


    <div class="sh-press-page">
        <div class="sh-press-page__wrap">
            <div class="sh-press-page__header">
                <h1><?php echo esc_html($press_page_title) ?></h1>

                <div class="sh-press-page__menu">
                    <a href="<?php echo get_post_type_archive_link('contributed') ?>">Press releases</a>
                    <?php if ( ! empty( $terms ) ): ?>
                        <?php foreach ($terms as $term):
                            $class = $term_id == $term->term_id ? 'class="active"' : ''; ?>
                            <a href="<?php echo get_term_link($term) ?>" <?php echo $class; ?>><?php echo $term->name; ?></a>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>


            <div class="sh-press-mentions">
                <div class="sh-press-mentions__icon sh-press-mentions__icon-right-top">
                    <img src="<?php echo esc_url($press_mentions_icon['right_top']['url']) ?>" alt="">
                </div>
                <div class="sh-press-mentions__icon sh-press-mentions__icon-left-center">
                    <img src="<?php echo esc_url($press_mentions_icon['left_center']['url']) ?>" alt="">
                </div>
                <div class="sh-press-mentions__icon sh-press-mentions__icon-right-bottom">
                    <img src="<?php echo esc_url($press_mentions_icon['right_bottom']['url']) ?>" alt="">
                </div>

                <div class="container js-press-mentions">
                    <?php
                    $press_mentions = new WP_Query(array(
                        'posts_per_page' => 9,
                        'post_type' => 'press'
                    ));

                    if ($press_mentions->have_posts()) :
                        $press_mentions_years = '';

                        while ($press_mentions->have_posts()) :
                            $press_mentions->the_post();
                            $post_year = get_the_time('Y');

                            $args = array(
                                'post_year' => $post_year,
                                'press_mentions_years' => $press_mentions_years
                            );

                            get_template_part( 'template-parts/press/item', null, $args );

                            if ($post_year != $press_mentions_years) {
                                $press_mentions_years = $post_year;
                            }
                            ?>

                        <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>

                <button class="sh-press-page__btn js-press-page-btn"
                        data-category=""
                        data-year="<?php echo esc_attr($press_mentions_years) ?>"
                        data-max-pages="<?php echo esc_attr($press_mentions->max_num_pages) ?>">Load more</button>
            </div>
        </div>


        <section class="sh-press-page-banner v3-profit">
            <div class="v3-profit__inner container">
                <div class="v3-profit__text-wrap">
                    <h1 class="js-visibility reveal-fade"><?php echo $press_page_banner['header'] ?></h1>
                    <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $press_page_banner['tag_line'] ?></p>
                    
                    <a class="btn btn--dark_bg js-show-demo" href="#"><?php echo $press_page_banner['button'] ?></a>
                    <!-- <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="" target="_blank"><?php echo $press_page_banner['button'] ?></a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> -->
                </div>
            </div>
            <div class="v3-profit__bg">

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
