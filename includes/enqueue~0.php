<?php
// Adds CSS
function theme_styles() {
  wp_dequeue_style( 'wp-block-library' );
	wp_enqueue_style( 'style-1', get_stylesheet_uri() );
  wp_enqueue_style( 'select2', get_template_directory_uri() . '/css/select2.min.css','',null );
  wp_enqueue_style( 'mainCSS', get_template_directory_uri() . '/css/style.min.css','',null );
}
add_action( 'wp_enqueue_scripts', 'theme_styles');


// Add JS
function theme_js() {
  wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);
  wp_enqueue_script('jquery');

  wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.1/gsap.min.js', '', '3.3.1', true);
  wp_enqueue_script( 'gsapScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.1/ScrollTrigger.min.js', '', '3.3.1', true);
  wp_enqueue_script( 'masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', '', '', true);
  wp_enqueue_script( 'libs', get_template_directory_uri() . '/js/libs.min.js', array('jquery'), '', true);
  wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/assets/select2.full.min.js', array('jquery'), '', true);
  wp_enqueue_script( 'remodal', get_template_directory_uri() . '/js/assets/remodal.js', array('jquery'), '', true);

    if(is_post_type_archive('resources') || is_page_template('template-faq.php')) {
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/assets/isotope.pkgd.min.js', array('jquery'), '', true);
    }

  wp_enqueue_script( 'mainJS', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '6.0', true);

  wp_deregister_script('wp-mediaelement');
  wp_deregister_style('wp-mediaelement');


    $localize_script = array(
        'ajax_url' => admin_url('admin-ajax.php')
    );
    wp_localize_script('mainJS', 'seng_object', $localize_script);

}
add_action( 'wp_enqueue_scripts', 'theme_js');

// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'theme_add_gutenberg_assets' );
function theme_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'theme-gutenberg', get_template_directory_uri() . '/css/custom-editor-styles.css', false );
}

// Custom login
function my_login_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/custom-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

// Remove embed script
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );

// Remove all emoji scripts and styles from the frontend and admin
function removeEmojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action('init', 'removeEmojis');




