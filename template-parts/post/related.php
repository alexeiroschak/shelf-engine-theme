<?php
/**
 * Recent posts.
 */

$tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'post__not_in' => array( get_the_ID() ),
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'terms'    => $tags
        )
    )
);

$recent_posts = new WP_Query( $args );

if ( ! $recent_posts->have_posts() ) {
    $category = wp_get_post_terms( get_queried_object_id(), 'category', ['fields' => 'ids'] );

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'post__not_in' => array( get_the_ID() ),
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'terms'    => $tags
            ),

        )
    );

    $recent_posts = new WP_Query( $args );
}

if ( ! $recent_posts->have_posts() ) {

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'post__not_in' => array( get_the_ID() ),
    );

    $recent_posts = new WP_Query( $args );
}

if ( $recent_posts->have_posts() ) : ?>
    <div class="sh-single__related">
        
        <h2 class="sh-single__related-heading"><?php esc_html_e('End Caps', 'shelfengine'); ?></h2>
        <div class="sh-single__related-inner">
            <img src="<?php echo get_template_directory_uri() . '/img/related-bg.png'; ?>" class="sh-single__related-cover" alt="">
            <div class="container">
                <div class="sh-single__related-list">
                    <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                        $author_name = ! empty( get_the_author_meta('first_name') ) && get_the_author_meta('last_name') ? get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name') : get_the_author();
                        ?>
                        <div class="sh-single__related-item">
                            <div class="sh-single__related-content">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="sh-single__related-img">
                                        <a href="<?php echo get_the_permalink( ); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="sh-single__related-header">
                                    <?php if ( has_category() ) :
                                        foreach ( get_the_category() as $category ) : ?>
                                            <a href="<?php echo get_category_link( $category->term_id ); ?>" class="sh-single__related-category"><?php echo esc_html( $category->name ); ?></a>
                                        <?php endforeach;
                                    endif; ?>
                                    <br/>
                                    <time class="sh-single__related-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></time>
                                </div>

                                <?php the_title( '<h4 class="sh-single__related-title"><a href="' . get_the_permalink() . '">', '</a></h4>' ); ?>

                                <span class="sh-single__related-author">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_the_author(); ?></a></span>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
