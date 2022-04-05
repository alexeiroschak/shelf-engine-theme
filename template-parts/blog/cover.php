<?php
/**
 * Cover blog.
 */

$show_block = ( isset( $args['show_cover'] ) && $args['show_cover'] );
$blog_cover = get_field('blog_cover', 'option');
$blog_link  = get_field('ad_blog_link', 'option');

if ( $show_block && ! empty( $blog_cover ) && ! empty( $blog_link ) ) : ?>
    <div class="sh-blog__cover">
        <div class="sh-blog__cover-svg dotted-circle">

            <svg viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="49"></circle>
            </svg>

        </div>

        <a href="<?php echo esc_url( $blog_link ) ?>">
        	<img src="<?php echo esc_url( $blog_cover ); ?>" class="sh-blog__cover-img" alt="">
        </a>
    </div>
<?php endif;
