<?php

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

get_header();

$resources_title = get_field('resources_title', 'options');
$resources_description = get_field('resources_description', 'options');

$types = get_field_object('type');


?>


<div class="sh-resources">
    <div class="sh-resources__header">
        <h1><?php echo esc_html($resources_title) ?></h1>

        <div class="sh-resources__header-description">
            <?php echo wp_kses_post($resources_description) ?>
        </div>
    </div>

    <div class="sh-resources__menu">
        <div class="sh-resources__filter js-resources-filter">
            <button class="button-group is-checked" data-filter="*"><?php esc_html_e('All', 'sh'); ?></button>
            <?php $terms = get_terms( array('taxonomy' => 'resources_type', 'hide_empty' => false) );
            foreach ($terms as $term) : ?> 
                <button class="button-group" data-filter=".<?php echo $term->slug; ?>"><?php esc_html_e($term->name, 'sh'); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="sh-resources__select sh-resources__filter-select">
            <select class="js-resources-filter-select">
                <option></option>
                <option value="*"><?php esc_html_e('All resources', 'sh'); ?></option>
                <?php foreach ($terms as $term) : ?> 
                    <option value=".<?php echo $term->slug; ?>"><?php esc_html_e($term->name, 'sh'); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="sh-resources__select">
            <select class="js-resources-sort">
                <option></option>
                <option value="popular"><?php esc_html_e('Most popular', 'sh'); ?></option>
                <option value="date"><?php esc_html_e('Newest first', 'sh'); ?></option>
                <option value="dateAscending"><?php esc_html_e('Oldest first', 'sh'); ?></option>
                <option value="resourcesTitle"><?php esc_html_e('Alphabetical', 'sh'); ?></option>
            </select>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <div class="sh-resources__items">
            <div class="sh-resources__items-row js-resources-grid">
                <?php while (have_posts()) : the_post();
                    $terms = get_the_terms(get_the_ID(), 'resources_type');
                    $type = $terms[0]->slug;
                    $label = $terms[0]->name;
                    $short_description = get_field('short_description');
                    //$link = get_field('link');
                    $class_col = 'sh-resources__items-col js-resources-item ' . $type;
                    $count = get_post_meta(get_the_ID(), 'link_click_counter', true);
                    $popular = $count === '' ? 0 : $count;
                    ?>
                    <?php if ( $terms ) : ?>
                    <div class="<?php echo esc_attr($class_col) ?>"
                         data-time="<?php the_time('Y-m-d') ?>"
                         data-post-id="<?php the_ID() ?>"
                         data-popular="<?php echo esc_attr($popular) ?>">
                        <a href="<?php echo get_permalink(); ?>" class="sh-resources__item" target="_self">
                            <div class="sh-resources__item-img">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>"
                                     alt="<?php the_title_attribute() ?>">
                            </div>

                            <div class="sh-resources__item-content">
                                <div class="sh-resources__item-type"><?php echo esc_html($label) ?></div>
                                <?php the_title('<h2 class="resources-title">', '</h2>') ?>
                                <div
                                    class="sh-resources__item-description"><?php echo wp_kses_post($short_description) ?></div>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
$img = get_field('pre_footer_image', 'options');
$img_med = $img['sizes']['medium'];
$srcset = wp_get_attachment_image_srcset( $img['ID'], 'medium' );
if(!$srcset) $srcset = $img_med;
?>
<section class="banner">
    <div class="banner__inner container">
        <div class="banner__copy-wrap js-visibility reveal-fade">
            <h2><?php the_field('pre_footer_title', 'options') ?></h2>
            <?php the_field('pre_footer_copy', 'options') ?>
            <a class="btn js-show-demo" href="#"><?php the_field('pre_footer_btn', 'options'); ?></a>

            <!-- <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="text-align: center" target="_blank"> Get Started</a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> -->
            <!-- <button class="btn js-popup"><?php the_field('pre_footer_btn', 'options') ?></button> -->
        </div>
        <div class="banner__img-wrap js-visibility reveal-fade reveal-del-1">
            <img src="<?php echo $img_med ?>" srcset="<?php echo $srcset; ?>" sizes="(max-width: 767px) 450px," alt="<?php echo $img['alt'] ?>" loading="lazy">
            <div class="dotted-circle">
                <?php get_template_part( 'templates/components/_dotted-circle' ); ?>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = 'https://www.shelfengine.com/thank-you-case-study/';
    }, false );
</script>


<?php get_footer(); ?>
