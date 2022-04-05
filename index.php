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

$category_obj = get_queried_object();
$show_form = false;
$show_cover = false;
$counter = 0;

$page_title = esc_html__('Fresh Items', 'shelf-engine-theme');

if (is_category() || is_tag()) {
    $current_term = get_queried_object();
    $page_title = $current_term->name;
}

get_header(); ?>

    <?php
    /**
     * Blog info.
     */

    $blog_title = get_field('blog_title', 'option');
    $blog_text = get_field('blog_text', 'option');

    $categories = get_categories( array( 'hide_empty' => 0, 'exclude' => array( 1 ) ) );
    ?>
    <div class="sh-blog__info">
        <div class="container">
            <?php if ( ! empty( $blog_title ) ) : ?>
                <h2 class="sh-blog__info-title"><?php echo esc_html( $blog_title ); ?></h2>
            <?php endif; ?>

            <?php if ( ! empty( $blog_text ) ) : ?>
                <div class="sh-blog__info-text"><?php echo wp_kses_post( $blog_text ); ?></div>
            <?php endif; ?>

            <?php if ( ! empty( $categories ) ) : ?>
                <div class="sh-blog__info-categories">
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="sh-blog__info-categories-item <?php echo is_home() ? 'active' : ''; ?>"><?php esc_html_e('Latest', ''); ?></a>

                    <?php foreach ( $categories as $cat ) : ?>
                        <a href="<?php echo get_category_link( $cat->term_id ); ?>" class="sh-blog__info-categories-item <?php echo $category_obj->term_id === $cat->term_id ? 'active' : ''; ?>"><?php echo esc_html( $cat->name ); ?></a>
                    <?php endforeach; ?>
                </div>

                <div class="sh-blog__select">
                    <select class="js-blog-cat">
                        <option></option>
                        <option value="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                            <?php selected( is_home() ) ?>>
                            <?php esc_html_e('Latest', 'sh'); ?>
                        </option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?php echo get_category_link($cat->term_id); ?>"
                                <?php selected($category_obj->term_id, $cat->term_id) ?>>
                                <?php echo esc_html($cat->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="sh-blog">
        <?php if ( have_posts() ) : ?>
            <?php get_template_part('template-parts/blog/sticky'); ?>

            <h1 class="sh-blog__heading">
                <span><?php echo $page_title; ?></span>
            </h1>

            <div class="container">
                <?php while ( have_posts() ) : the_post();
                    $counter++;

                    $show_form = $counter == 5;
                    $show_cover = $counter == 7;
                    get_template_part('template-parts/post/mailchimp', null, array( 'show_form' => $show_form ));
                    get_template_part('template-parts/blog/cover', null, array('show_cover' => $show_cover ));
                    get_template_part('template-parts/blog/content');
                endwhile; ?>
            </div>

            <div class="container">
                <div class="sh-blog__paginate">
                    <?php echo paginate_links( array( 'prev_text' => 'Prev', 'next_text' => 'Next' ) ); ?>
                </div>
            </div>
        <?php else :
            echo "No posts found.";
        endif; ?>
    </div>

<?php get_footer(); ?>
