<?php
/**
 * blog post content template.
 */

$get_category = get_the_category();
$id = get_the_ID();
$thumbnail = get_field('thumbnail', $id);
?>
<div class="sh-blog__item">
    <?php if ( has_post_thumbnail() || $thumbnail) : ?>
        <div class="sh-blog__item-img">
            <a href="<?php echo get_the_permalink() ?>">
                <?php if ($thumbnail) : ?>
                    <img src="<?php echo $thumbnail['sizes']['medium']; ?>" alt="<?php echo $thumbnail['alt']; ?>" >
                <?php else : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="sh-blog__item-content">
        <div class="sh-blog__item-info">
            <?php if ( has_category() ) :
                foreach ( $get_category as $category ) : ?>
                    <a href="<?php echo get_category_link( $category->term_id ); ?>" class="sh-blog__item-category"><?php echo esc_html( $category->name ); ?></a>
                <?php endforeach;
            endif; ?>

            <time class="sh-blog__item-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></time>
        </div>

        <?php the_title( '<h2 class="sh-blog__item-title"><a href="' . get_the_permalink() . '">', '</a></h2>' ); ?>
        <span class="sh-blog__item-author">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_the_author(); ?></a></span>
    </div>
</div>
