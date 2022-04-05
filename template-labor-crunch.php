<?php
/*
 Template Name: Labor Crunch V1
 */

get_header(); ?>

<div class="sh-about-page">
    <?php
    $head_tag_line = get_field('head_tag_line');
    $head_title = get_field('head_title');
    $head_description = get_field('head_description');
    ?>
    <div class="sh-about-page__header">
        <div class="container" style="padding: 40px 0px 0px 0px">
            <!--<div class="sh-about-page__header-tagline"><?php echo esc_html($head_tag_line) ?></div>-->
            <h1 class="sh-about-page__header-title" style="max-width: 1000px !important"><?php echo esc_html($head_title) ?></h1>
            <div class="sh-about-page__header-description" style="max-width: 1000px !important"><?php echo wp_kses_post($head_description) ?></div>
        </div>
    </div>

    <?php
    /*$prin_tag_line = get_field('prin_tag_line');
    $prin_title = get_field('prin_title');
    $prin_description = get_field('prin_description');
    $prin_items = get_field('prin_items');
    $prin_call_to_action = get_field('prin_call_to_action');*/
    $prin_left_img = get_field('prin_left_image') ? get_field('prin_left_image') : esc_url(get_template_directory_uri() . '/img/land-bg-1.png');
    /*$prin_right_img = get_field('prin_right_image') ? get_field('prin_right_image') : esc_url(get_template_directory_uri() . '/img/about-bg-1.png');*/
    ?>
    <div class="sh-about-page__principles" style="background-color: #fff !important; padding-bottom: 1px !important;">
        <!--<div class="sh-about-page__principles-icon-rt">
            <img src="<?php echo $prin_right_img; ?>" alt="">
        </div>-->
        <div class="sh-about-page__principles-icon-lb" style="margin: 0px 0px 140px -320px !important;">
            <img src="<?php echo $prin_left_img; ?>" alt="">
        </div>

        <!--<div class="container">
            <div class="sh-about-page-row js-about-page-row">
                <div class="sh-about-page-col-8 js-about-page-item">
                    <div class="sh-about-page__principles-tagline">
                        <?php echo esc_html($prin_tag_line) ?>
                    </div>
                    <h1 class="sh-about-page__principles-title"><?php echo wp_kses_post($prin_title) ?></h1>
                    <div
                        class="sh-about-page__principles-description"><?php echo wp_kses_post($prin_description) ?></div>
                </div>

                <?php if (!empty($prin_items)):
                    $i = 1;
                    foreach ($prin_items as $item):
                        $item_class = 'sh-about-page__principles-item item-' . $i;
                        ?>
                        <div class="sh-about-page-col-4 js-about-page-item">
                            <div class="<?php echo esc_attr($item_class) ?>">
                                <div class="sh-about-page__principles-num">
                                    <?php echo esc_html('0' . $i) ?>
                                </div>
                                <h2 class="sh-about-page__principles-item-title">
                                    <?php echo wp_kses_post($item['title']) ?>
                                </h2>
                                <div class="sh-about-page__principles-desc">
                                    <?php echo wp_kses_post($item['description']) ?>
                                </div>
                            </div>
                        </div>
                        <?php $i++;
                    endforeach;
                endif; ?>
            </div>

            <div class="sh-about-page__principles-cta">
                <div class="sh-about-page__principles-cta-title">
                    <?php echo esc_html($prin_call_to_action['title']) ?>
                </div>
                <div class="sh-about-page__principles-cta-desc">
                    <?php echo wp_kses_post($prin_call_to_action['description']) ?>
                </div>
                <?php
                $target = (!empty($prin_call_to_action['link']['target']) &&
                    $prin_call_to_action['link']['target'] === '_blank') ? 'target="_blank"' : '';
                echo '<a class="sh-about-page__principles-cta-btn" href="' . esc_url($prin_call_to_action['link']['url']) . '" ' . $target . '>' . esc_html($prin_call_to_action['link']['title']) . '</a>';
                ?>
            </div>
        </div>-->
    </div>

    <?php
    $imp_title = get_field('imp_title');
    $imp_description = get_field('imp_description');
    $imp_items = get_field('imp_items');
    ?>
    <div class="sh-about-page__impact">
        <div class="container">
            <div class="sh-about-page__impact-des">
                <div class="sh-about-page__principles-cta-title">
                    <?php echo esc_html($imp_title) ?>
                </div>
                <div class="sh-about-page__impact-desc">
                    <?php echo wp_kses_post($imp_description) ?>
                </div>
            </div>

            <?php if (!empty($imp_items)): ?>
                <div class="sh-about-page-row">
                    <?php
                    $i = 1;
                    foreach ($imp_items as $item): ?>
                        <div class="sh-about-page-col-auto">
                            <div class="sh-about-page__impact-item <?php echo esc_attr('item-' . $i) ?>">
                                <div class="sh-about-page__impact-item-circle">
                                    <svg viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="49"></circle>
                                    </svg>
                                </div>

                                <div class="sh-about-page__impact-item-content">
                                    <div class="sh-about-page__impact-item-icon">
                                        <img src="<?php echo esc_url($item['icon']['url']) ?>" alt="">
                                    </div>
                                    <div class="sh-about-page__impact-item-title">
                                        <?php echo esc_html($item['title']) ?>
                                    </div>
                                    <div class="sh-about-page__impact-item-text">
                                        <?php echo wp_kses_post($item['text']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++;
                    endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!--<?php
    $sto_title = get_field('sto_title');
    $sto_description = get_field('sto_description');
    /*$sto_image_1 = get_field('sto_image_1');-->
    $sto_image_2 = get_field('sto_image_2');*/

    $sto_list_title = get_field('sto_list_title');
    $sto_list_description = get_field('sto_list_description');
    $sto_list_image = get_field('sto_list_image');
    $sto_list_story_heading = get_field('sto_list_story_heading');
    $sto_list_story = get_field('sto_list_story');
    $sto_today_link = get_field('sto_today_link');
    ?>
    <div class="sh-about-page__story">
        <div class="sh-about-page-container container">
            <div class="sh-about-page-row">
                <div class="sh-about-page-col-6 sh-about-page-order-1" style="max-width: 100% !important;">
                    <div class="sh-about-page__story-title">
                        <?php echo esc_html($sto_title) ?>
                    </div>
                    <div class="sh-about-page__story-description" style="max-width: 100% !important;">
                        <?php echo apply_filters('the_content', $sto_description) ?>
                    </div>
                </div>
                <!--<div class="sh-about-page-col-6 sh-about-page-order-0">
                    <img class="sh-about-page__story-img-1"
                         src="<?php echo esc_url($sto_image_1['sizes']['medium_large']) ?>" alt="">
                    <img class="sh-about-page__story-img-2"
                         src="<?php echo esc_url($sto_image_2['sizes']['medium_large']) ?>" alt="">
                </div>-->
            </div>


            <!--<div class="sh-about-page__story-list-title">
                <?php echo esc_html($sto_list_title) ?>
            </div>
            <div class="sh-about-page__story-list-text">
                <?php echo esc_html($sto_list_description) ?>
            </div>-->
        </div>

        <!--<div class="sh-about-page-container container">
            <div class="sh-about-page-row">
                <div class="sh-about-page-col-6 sh-about-page-order-1">
                    <div class="sh-about-page__story-title">
                        <?php echo esc_html($sto_list_story_heading) ?>
                    </div>
                    <?php foreach ($sto_list_story as $story): ?>
                        <div class="sh-about-page__story-item">
                            <div class="sh-about-page__story-item-date">
                                <?php echo esc_html($story['date']) ?>
                            </div>
                            <div class="sh-about-page__story-item-sep">—</div>
                            <div class="sh-about-page__story-item-text">
                                <?php echo apply_filters('the_content', $story['text']) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if(!empty($sto_today_link)): ?>
                        <div class="sh-about-page__story-item">
                            <div class="sh-about-page__story-item-date">
                                <?php esc_html_e('Today'); ?>
                            </div>
                            <div class="sh-about-page__story-item-sep">—</div>
                            <div class="sh-about-page__story-item-text">
                                <?php
                                $target = (!empty($sto_today_link['target']) &&
                                    $sto_today_link['target'] === '_blank') ? 'target="_blank"' : '';
                                echo '<a href="' . esc_url($sto_today_link['url']) . '" ' . $target . '>' . esc_html($sto_today_link['title']) . '</a>';
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="sh-about-page-col-6 sh-about-page-order-0">
                    <img src="<?php echo esc_url($sto_list_image['sizes']['medium_large']) ?>" alt=""
                         class="sh-about-page__story-img">
                </div>
            </div>
        </div>
    </div>
</div>-->


<?php
$j_title = get_field('j_title');
$j_description = get_field('j_description');
$j_link = get_field('j_link');
?>
<section class="sh-join">
    <div class="container">
        <div class="sh-about-page-row">
            <div class="sh-join-col">
                <div class="sh-join__title"><?php echo esc_html($j_title) ?></div>
                <div class="sh-join__description"><?php echo wp_kses_post($j_description) ?></div>
                <?php
                $target = (!empty($j_link['target']) &&
                    $j_link['target'] === '_blank') ? 'target="_blank"' : '';
                echo '<a class="sh-about-page__principles-cta-btn" href="' . esc_url($j_link['url']) . '" ' . $target . '>' . esc_html($j_link['title']) . '</a>';
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
