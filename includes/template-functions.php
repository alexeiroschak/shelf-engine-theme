<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package theme-name
 */

//Exclude node_modules folder from export
add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {
  $exclude_filters[] = 'themes/'.wp_get_theme()->template.'/node_modules';
  return $exclude_filters;
});

// ACF options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// Contact Form 7 remove styles
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}

// Contact Form 7 fix markup(remove p and br)
add_filter('wpcf7_autop_or_not', '__return_false');


// changing the logo link from wordpress.org to your site
function login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'login_url' );

// changing the alt text on the logo to show your site name
function login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'login_title' );


// Clean up wp_head
function cleanHeader() {
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post
	remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
}
add_action('init', 'cleanHeader');


// Removes Comments from admin menu
add_action( 'admin_menu', 'theme_remove_admin_menus' );
function theme_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

// Removes Comments from post and pages
add_action('init', 'remove_comment_support', 100);
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

// Removes Comments from admin bar
function theme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'theme_admin_bar_render' );


// remove admin bar bump
function remove_admin_bar_bump() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_bar_bump');

/**
 * Add demo form.
 */
function shelf_add_demo_form() {
    $demo_form_title = get_field('demo_form_title', 'option');
    $demo_form_subheading = get_field('demo_form_subheading', 'option');
    $demo_form_id = get_field('demo_form_id', 'option');
    ?>

    <div class="sh-demo-overlay"></div>
    <div class="sh-demo sh-demo_all-pages" id="sh-demo">
        <span class="sh-demo__close"></span>
        <?php if ( ! empty( $demo_form_title ) ) : ?>
            <h2 class="sh-demo__title"><?php echo esc_html( $demo_form_title ); ?></h2>
        <?php endif; ?>
        <?php if ( ! empty( $demo_form_subheading) ) : ?>
            <p class="sh-demo__subheading"><?php echo esc_html( $demo_form_subheading ); ?></p>
        <?php endif; ?>

        <?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $demo_form_id ) . '" title="Get a Demo"]' ); ?>
    </div>

    <?php
}
add_action( 'shelf_after_footer_action', 'shelf_add_demo_form', 10 );

/**
 * Excerpt length.
 *
 * @param $length
 * @return int
 */
function shelf_excerpt_length( $length ) {
    return 16;
}
add_filter( 'excerpt_length', 'shelf_excerpt_length', 999 );

/**
 * Change excerpt more.
 *
 * @param $more
 * @return string
 */
function shelf_change_excerpt_more( $more ) {
    return '.';
}
add_filter( 'excerpt_more', 'shelf_change_excerpt_more' );

/**
 * Ignore sticky posts.
 *
 * @param $query
 */
function shelf_ignore_sticky_posts( $query ) {
    if ( is_home() && $query->is_main_query() ) {
        $query->set( 'post__not_in', get_option('sticky_posts') );
    }
}
add_action( 'pre_get_posts', 'shelf_ignore_sticky_posts' );

// Button shortcode
function cta_link_func( $atts ) {
	$a = shortcode_atts( array(
		'href' => '#',
		'title' => '',
		'class' => 'button',
        'target'=> ''
	), $atts );
	return '<a  href="' . $a['href'] . '" 
                    class="cta-shortcode ' . $a['class'] . '" 
                    target="' . $a['target'] . '">' . $a['title'] .'</a>';
}
add_shortcode( 'cta_link', 'cta_link_func' );

// Quote shortcode
function quote_func( $atts ) {
    $a = shortcode_atts( array(
        'heading'   => '',
        'text'      => ''
    ), $atts );
    return '<div class="quote-shortcode"><h2 class="quote-heading">' . $a['heading'] . '</h2><p class="quote-text"> ' . $a['text'] . '</p></div>';
}
add_shortcode( 'quote', 'quote_func' );

// Callout box
function callout_func ( $atts, $content = null )  {
    return '<div class="callout-box">' . $content . '</div>';
}
add_shortcode( 'callout', 'callout_func' );