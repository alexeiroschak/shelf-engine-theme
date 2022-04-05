<?php
/*
 Template Name: Landing Pages Template
 */

$landing_style = get_field('landing_style');

$landing_title = get_field('landing_title');
$landing_excerpt_description = get_field('landing_excerpt_description');
$landing_call_to_action = get_field('landing_call_to_action');
$landing_description = get_field('landing_description');

$landing_placeholder_image_or_video = get_field('landing_placeholder_image_or_video');
$landing_image = get_field('landing_image');
$landing_video = get_field('landing_video');

$landing_quote = get_field('landing_quote');
$landing_author_of_the_quote = get_field('landing_author_of_the_quote');
$landing_stores_title = get_field('landing_stores_title');
$landing_stores = get_field('landing_stores');

$landing_subtitle_description_block = get_field('landing_subtitle_description_block');
$landing_title_description_block = get_field('landing_title_description_block');
$landing_text_description_block = get_field('landing_text_description_block');
$landing_link_description_block = get_field('landing_link_description_block');

$optional_cta_text = get_field('optional_cta_text');
$optional_cta_link = get_field('optional_cta_link');

$landing_form_title = get_field('landing_form_title');
$landing_form_subheading = get_field('landing_form_subheading');
$landing_form_id = get_field('landing_form_id');

$logo = get_field('logo', 'options');

$class_wrap_start = '';
$class_wrap_end = '';

if ($landing_style === 'gated') {
    $class_wrap_start = '<div class="landing-pages-cta">';
    $class_wrap_end = '</div>';
}

get_header(); ?>

<?php echo $class_wrap_start ?>
<div class="sh-landing-pages">
    <div class="sh-landing-pages__wrap">
        <div class="sh-landing-pages__banner">
            <div class="sh-landing-pages__banner-decor-1">
                <?php
                $left_img = get_field('background_image_left') ? get_field('background_image_left') : get_template_directory_uri() . '/img/land-bg-1.png'; ?>
                <img src="<?php echo $left_img;  ?>" alt="">
            </div>
            <div class="sh-landing-pages__banner-decor-2">
                <?php
                $right_img = get_field('background_image_right') ? get_field('background_image_right') : get_template_directory_uri() . '/img/land-bg-2.png'; ?> 
                <img src="<?php echo $right_img; ?>" alt="">
            </div>

            <div class="container js-landing-container">
                <?php if ($landing_style === 'gated'): ?>
                    <div class="sh-landing-pages__banner-header">
                        <a class="sh-landing-pages__banner-logo" title="Shelf Engine logo"
                           href="<?php echo home_url('/') ?>">
                            <img src="<?php echo $logo['url'] ?>" class="sh-landing-pages__banner-logo"
                                 alt="<?php echo $logo['alt'] ?>">
                        </a>

                        <button class="sh-landing-pages__btn js-landing-cta">
                            <?php echo ($h_cta_text = get_field('header_cta_text')) ? $h_cta_text : get_field('gated_form_cta', 'options'); ?>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ($landing_placeholder_image_or_video === 'image'): ?>
                    <img src="<?php echo esc_url($landing_image['sizes']['large']) ?>" alt=""
                         class="sh-landing-pages__banner-image sh-landing-pages-show">
                <?php elseif ($landing_placeholder_image_or_video === 'video'): ?>
                    <div class="sh-landing-pages__banner-video sh-landing-pages-show">
                        <?php echo $landing_video ?>
                    </div>
                <?php endif; ?>

                <h1 class="sh-landing-pages__banner-title js-landing-item">
                    <?php echo wp_kses_post($landing_title) ?>
                </h1>
                <?php if ($landing_style === 'default'): ?>
                    <div class="sh-landing-pages__banner-desc js-landing-item">
                        <?php echo wp_kses_post($landing_excerpt_description) ?>
                    </div>
                <?php endif; ?>

                <?php if ($landing_style === 'gated'): ?>
                    <button class="sh-landing-pages__btn sh-landing-pages__btn_title js-landing-cta">
                        <?php echo $h_cta_text ? $h_cta_text : get_field('gated_form_cta', 'options'); ?>
                    </button>

                    <div class="sh-landing-pages__banner-full-desc">
                        <?php echo wp_kses_post($landing_description) ?>
                    </div>
                <?php endif; ?>


                <?php if ($landing_style === 'default' && ! empty( $landing_call_to_action ) ) {
                    $target = (!empty($landing_call_to_action['target']) &&
                        $landing_call_to_action['target'] === '_blank') ? 'target="_blank"' : '';
                    echo '<a class="sh-landing-pages__btn" href="' . esc_url($landing_call_to_action['url']) . '" ' . $target . '>' . esc_html($landing_call_to_action['title']) . '</a>';
                } ?>


                <?php if ($landing_placeholder_image_or_video === 'image' && ! empty( $landing_image['sizes']['large'] ) ): ?>
                    <img src="<?php echo esc_url($landing_image['sizes']['large']) ?>" alt=""
                         class="sh-landing-pages__banner-image sh-landing-pages-hide">
                <?php elseif ($landing_placeholder_image_or_video === 'video'): ?>
                    <div class="sh-landing-pages__banner-video sh-landing-pages-hide">
                        <?php echo $landing_video ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( ! empty( $landing_stores_title ) || ! empty( $landing_author_of_the_quote ) || ! empty( $landing_quote ) ): ?>
            <div class="sh-landing-pages__manages">
                <div class="container">
                    <blockquote>
                    <?php if ( ! empty($landing_quote)): ?>
                        <h2 class="sh-landing-pages__quote">
                            <?php echo wp_kses_post($landing_quote) ?>
                        </h2>
                    <?php endif ?>

                    <?php if ( ! empty($landing_stores_title)): ?>
                        <p class="sh-landing-pages__author-quote">
                            <?php echo esc_html($landing_author_of_the_quote) ?>
                        </p>
                    <?php endif ?>
                    </blockquote>
                    <?php if ( ! empty($landing_stores_title)): ?>
                        <div class="sh-landing-pages__stores-title">
                            <span><?php echo esc_html($landing_stores_title) ?></span>
                        </div>
                    <?php endif ?>

                    <?php if (!empty($landing_stores)): ?>
                        <div class="sh-landing-pages__stores">
                            <?php foreach ($landing_stores as $landing_store): ?>
                                <img src="<?php echo esc_url($landing_store['url']) ?>" alt="">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif ?>

        <div class="sh-landing-pages__description-block">
            <div class="sh-landing-pages__description-block-decor">
                <img src="<?php echo get_template_directory_uri() . '/img/land-bg-3.png' ?>" alt="">
            </div>

            <div class="container js-landing-container">
                <div class="sh-landing-pages__description-block-wrap">
                    <div class="sh-landing-pages__description-block-subtitle">
                        <?php echo esc_html($landing_subtitle_description_block) ?>
                    </div>
                    <div class="sh-landing-pages__description-block-title">
                        <?php echo esc_html($landing_title_description_block) ?>
                    </div>
                    <div class="sh-landing-pages__description-block-text">
                        <?php echo wp_kses_post($landing_text_description_block) ?>
                    </div>

                    <?php
                    if ( ! empty( $landing_link_description_block ) ) {
                        $target = (!empty($landing_link_description_block['target'] ) &&
                            $landing_link_description_block['target'] === '_blank') ? 'target="_blank"' : '';
                        echo '<a class="sh-landing-pages__btn-light" href="' . esc_url($landing_link_description_block['url']) . '" ' . $target . '>' . esc_html($landing_link_description_block['title']) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php if ($landing_style === 'default' && ( ! empty($optional_cta_text ) || ! empty( $optional_cta_link ))): ?>
            <div class="sh-landing-pages__optional-cta">
                <div class="container">
                    <?php if ( ! empty( $optional_cta_text ) ): ?>
                        <div class="sh-landing-pages__optional-cta-text">
                            <?php echo wp_kses_post($optional_cta_text) ?>
                        </div>
                    <?php endif ?>

                    <?php
                    if ( ! empty( $optional_cta_link ) ) {
                        $target = (!empty($optional_cta_link['target']) &&
                            $optional_cta_link['target'] === '_blank') ? 'target="_blank"' : '';
                        echo '<a class="sh-landing-pages__btn" href="' . esc_url($optional_cta_link['url']) . '" ' . $target . '>' . esc_html($optional_cta_link['title']) . '</a>';
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($landing_style === 'gated'): ?>
            <div class="sh-landing-pages__footer">
                <div class="container">
                    <a class="sh-landing-pages__footer-logo" title="Shelf Engine logo"
                       href="<?php echo home_url('/') ?>">
                        <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
                    </a>
                    <?php the_field('footer_address', 'options'); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php if ($landing_style === 'gated') : ?>
<div class="sh-demo sh-demo_landing">
    <span class="sh-demo__close"></span>
    <?php if (!empty($landing_form_title)) : ?>
        <h2 class="sh-demo__title"><?php echo esc_html($landing_form_title); ?></h2>
    <?php endif; ?>
    <?php if (!empty($landing_form_subheading)) : ?>
        <p class="sh-demo__subheading"><?php echo esc_html($landing_form_subheading); ?></p>
    <?php endif; ?>

    <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($landing_form_id) . '"]'); ?>
</div>
<style>
    .page-header,
    .page-footer {
        display: none !important;
    }
</style>
<?php endif; ?>
<?php echo $class_wrap_end ?>

<?php get_footer(); ?>
