<?php /* Template Name: FAQ Template*/ ?>


<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme-name
 */


$tabs = get_field('tabs');
$faq_page_banner = get_field('faq_page_banner');

get_header(); ?>

<div class="sh-faq-page">
    <div class="sh-faq-page__header">
        <div class="container">
            <?php the_title('<h1>', '</h1>') ?>
        </div>
    </div>

    <?php if (!empty($tabs)): ?>
        <div class="sh-faq-page__menu">
            <div class="sh-faq-page__filter js-faq-page-filter">
                <button class="button-group is-checked" data-filter="*"><?php esc_html_e('All', 'sh'); ?></button>
                <?php foreach ($tabs as $tab): ?>
                    <button class="button-group"
                            data-filter="<?php echo esc_attr('.' . sanitize_title($tab['category'])) ?>">
                        <?php echo esc_html($tab['category']); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="sh-faq-page__select sh-faq-page__filter-select">
                <select class="js-faq-page-filter-select">
                    <option></option>
                    <option value="*"><?php esc_html_e('All', 'sh'); ?></option>
                    <?php foreach ($tabs as $tab): ?>
                        <option value="<?php echo esc_attr('.' . sanitize_title($tab['category'])) ?>">
                            <?php echo esc_html($tab['category']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="sh-faq-page__items js-faq-page-grid">
            <?php foreach ($tabs as $tab):
                $item_class = esc_attr('sh-faq-page__item js-faq-page-item ' . sanitize_title($tab['category']));
                foreach ($tab['tab'] as $item): ?>
                    <div class="<?php echo $item_class ?>">
                        <div class="sh-faq-page__item-header">
                            <?php echo $item['title'] ?>
                            <span></span>
                        </div>
                        <div class="sh-faq-page__item-content">
                            <?php echo apply_filters('the_content', $item['content']) ?>
                        </div>
                    </div>
                <?php endforeach;
            endforeach; ?>
        </div>
    <?php endif; ?>
</div>


<section class="sh-press-page-banner v3-profit">
    <div class="v3-profit__inner container">
        <div class="v3-profit__text-wrap">
            <h1 class="js-visibility reveal-fade"><?php echo $faq_page_banner['header'] ?></h1>
            <p class="js-visibility reveal-fade  reveal-del-1"><?php echo $faq_page_banner['tag_line'] ?></p>
            <a class="btn btn--dark_bg js-show-demo" href="#"><?php echo $faq_page_banner['button'] ?></a>

            <!-- <a id="typeform-shelf" class="typeform-share button btn" href="https://form.typeform.com/to/zcsViRF5"
               data-mode="popup" style="" target="_blank"><?php echo $faq_page_banner['button'] ?></a>
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
                })() </script> -->
        </div>
    </div>
    <div class="v3-profit__bg">


        <!-- <div class="features__dotted-v3-footer dotted-circle">
      <?php get_template_part('templates/components/_dotted-circle'); ?>
    </div>  -->
        <img src="<?php echo $faq_page_banner['background_image']['sizes']['large'] ?>" alt="">

    </div>
    <div class="features_dotted-footer ">
        <svg viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="49"></circle>
        </svg>
    </div>

</section>


<?php get_footer(); ?>
