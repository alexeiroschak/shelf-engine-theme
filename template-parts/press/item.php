<?php 

$press_mentions_link = get_field('press_mentions_link');
$press_mentions_link_title = get_field('press_mentions_link_title');

$item_class = isset( $args['is_ajax'] ) && $args['is_ajax'] ? '' : 'js-visibility reveal-fade';

if ($args['post_year'] != $args['press_mentions_years']) : ?>
    <div class="sh-press-mentions__year"><span><?php echo $args['post_year'] ?></span></div>
    <?php
endif; ?>

<div class="sh-press-mentions__item <?php echo esc_attr( $item_class ); ?>">
    <div class="sh-press-mentions__item-thumb" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>)">
        <a href="<?php echo esc_url($press_mentions_link) ?>" target="_blank"></a>    
    </div>
    <div class="sh-press-mentions__item-content">
        <div class="sh-press-mentions__item-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></div>
        <a href="<?php echo esc_url($press_mentions_link) ?>" target="_blank">
            <?php the_title('<div class="sh-press-mentions__item-title">', '</div>') ?>
        </a>
        <div class="sh-press-mentions__item-link">
            <?php echo esc_html($press_mentions_link_title) ?>
        </div>
    </div>
</div>