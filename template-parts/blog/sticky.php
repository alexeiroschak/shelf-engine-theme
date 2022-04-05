<?php
/**
 * Sticky post.
 */

$args = array(
    'posts_per_page' => 1,
    'post__in' => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
);
$sticky_query = new WP_Query( $args );

if ( is_home() && $sticky_query->have_posts() ) :
    while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
        <div class="sh-blog__sticky">
            <img src="<?php echo get_template_directory_uri() . '/img/before-sticky.png'; ?>" class="sh-blog__sticky-before" alt="">
            <img src="<?php echo get_template_directory_uri() . '/img/after-sticky.png'; ?>" class="sh-blog__sticky-after" alt="">

            <div class="container">
                <div class="sh-blog__sticky-wrapper">
                    <div class="sh-blog__sticky-img">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>

                    <div class="sh-blog__sticky-content">
                        <div class="sh-blog__sticky-info">
                            <?php if ( has_category() ) :
                                foreach ( get_the_category() as $category ) : ?>
                                    <a href="<?php echo get_category_link( $category->term_id ); ?>" class="sh-blog__sticky-category"><?php echo esc_html( $category->name ); ?></a>
                                <?php endforeach;
                            endif; ?>

                            <time class="sh-blog__sticky-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></time>
                        </div>

                        <?php the_title( '<h2 class="sh-blog__sticky-title"><a href="' . get_the_permalink() . '">', '</a></h2>' ); ?>

                        <div class="sh-blog__sticky-excerpt"><?php the_excerpt(); ?></div>

                        <span class="sh-blog__sticky-author">
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                                <?php if ( ! empty( $profile_photo = get_field('profile_photo', 'user_' . get_the_author_meta('ID'))) ): ?>
                                    <img src="<?php echo $profile_photo['sizes']['thumbnail'] ?>" alt="<?php echo get_the_author(); ?>">
                                <?php else : ?>
                                    <?php echo get_avatar( get_the_author_meta('user_email'), 48 ); ?>
                                <?php endif ?>
                                </a> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_the_author(); ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata();
endif;
