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
// $show_form = false;
// $show_cover = false;
// $counter = 0;

$page_title = esc_html__('Fresh Items', 'shelf-engine-theme');


$curauth = $wp_query->get_queried_object();



$profile_photo = get_field('profile_photo', 'user_' . $curauth->ID);
$linkedin = get_user_meta($curauth->ID, 'linkedin', true);
$twitter = get_user_meta($curauth->ID, 'twitter', true);
// print_r($linkedin);
get_header();


?>
<div class="sh-blog__info author-page">
    <div class="container">

            <?php if ( ! empty( $profile_photo ) ): ?>
                <img src="<?php echo $profile_photo['sizes']['thumbnail'] ?>" alt="<?php echo $curauth->display_name; ?>">
            <?php endif ?>

            <h1 class="sh-blog__info-title"><?php echo $curauth->display_name; ?></h1>

            <div class="sh-blog__info-text"><?php echo $curauth->description; ?></div>

            <div class="sh-blog__info-socials">
                <?php if ( ! empty( $linkedin ) ): ?>
                    <a href="<?php echo esc_url( $linkedin ) ?>" rel="nofollow" target="_blank">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.51562 16V5.48828H0.246094V16H3.51562ZM1.86328 4.08203C2.91797 4.08203 3.76172 3.20312 3.76172 2.14844C3.76172 1.12891 2.91797 0.285156 1.86328 0.285156C0.84375 0.285156 0 1.12891 0 2.14844C0 3.20312 0.84375 4.08203 1.86328 4.08203ZM15.7148 16H15.75V10.2344C15.75 7.42188 15.1172 5.24219 11.8125 5.24219C10.2305 5.24219 9.17578 6.12109 8.71875 6.92969H8.68359V5.48828H5.55469V16H8.82422V10.7969C8.82422 9.42578 9.07031 8.125 10.7578 8.125C12.4453 8.125 12.4805 9.67188 12.4805 10.9023V16H15.7148Z" fill="#153343"/>
                        </svg>
                    </a>
                <?php endif ?>
                <?php if ( ! empty( $twitter ) ): ?>
                    <a href="<?php echo esc_url( 'https://twitter.com/' . $twitter ) ?>" rel="nofollow" target="_blank">
                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1367 4.59375C16.8398 4.06641 17.4727 3.43359 17.9648 2.69531C17.332 2.97656 16.5938 3.1875 15.8555 3.25781C16.6289 2.80078 17.1914 2.09766 17.4727 1.21875C16.7695 1.64062 15.9609 1.95703 15.1523 2.13281C14.4492 1.39453 13.5 0.972656 12.4453 0.972656C10.4062 0.972656 8.75391 2.625 8.75391 4.66406C8.75391 4.94531 8.78906 5.22656 8.85938 5.50781C5.80078 5.33203 3.05859 3.85547 1.23047 1.64062C0.914062 2.16797 0.738281 2.80078 0.738281 3.50391C0.738281 4.76953 1.37109 5.89453 2.39062 6.5625C1.79297 6.52734 1.19531 6.38672 0.703125 6.10547V6.14062C0.703125 7.93359 1.96875 9.41016 3.65625 9.76172C3.375 9.83203 3.02344 9.90234 2.70703 9.90234C2.46094 9.90234 2.25 9.86719 2.00391 9.83203C2.46094 11.3086 3.83203 12.3633 5.44922 12.3984C4.18359 13.3828 2.60156 13.9805 0.878906 13.9805C0.5625 13.9805 0.28125 13.9453 0 13.9102C1.61719 14.9648 3.55078 15.5625 5.66016 15.5625C12.4453 15.5625 16.1367 9.97266 16.1367 5.08594C16.1367 4.91016 16.1367 4.76953 16.1367 4.59375Z" fill="#153343"/>
                        </svg>
                    </a>
                <?php endif ?>
            </div>
    </div>
</div>

<div class="sh-blog">
    <?php if ( have_posts() ) : ?>

        <div class="container">
            <?php while ( have_posts() ) : the_post();
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
