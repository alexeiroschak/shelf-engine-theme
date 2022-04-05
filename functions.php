<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-name
*/

//* Base Functions
require_once('includes/helpers.php');

//* Functions which enhance the theme by hooking into WordPress.
require_once('includes/template-functions.php');

//* CPT
require_once('includes/custom-posts.php');

//* Custom Taxonomies
require_once('includes/custom-taxonomies.php');

//* Gutenberg blocks
require_once('includes/blocks.php');

//* Enqueue/dequeue your files
require_once('includes/enqueue.php');

//* Custom menu walker
require_once('includes/menu-walker.php');

//* After Setup
add_action('after_setup_theme', 'theme_after_setup_theme');

function theme_after_setup_theme()
{

    add_theme_support('html5');

    add_theme_support('editor_style');
    add_editor_style('css/custom-editor-styles.css');

    add_post_type_support('page', 'excerpt');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('menus');

    add_theme_support('post-thumbnails');

    register_nav_menus(array(
    'header-menu' => esc_html__('Header Menu'),
    'footer-menu1' => esc_html__('Footer Menu 1'),
    'footer-menu2' => esc_html__('Footer Menu 2'),
    'footer-menu3' => esc_html__('Footer Menu 3')
    ));

    remove_image_size('1536x1536');
    remove_image_size('2048x2048');
    update_option('medium_size_w', 768);
    update_option('medium_size_h', 2500);
    update_option('large_size_w', 1280);
    update_option('large_size_h', 5000);
    add_image_size('extra-large', 1536);
    add_image_size('mega-large', 1920);
}

function pardotAssetName()
{
    $asset_name = get_field("asset_name", get_the_ID());
    return !empty($asset_name) ? $asset_name : 'Not Available';
}

function pardotAssetUrl()
{
    $link = get_field("link", get_the_ID());
    return !empty($link) ? $link : 'Not Available';
}

function pardotAssetType()
{
    $type = get_the_category( get_the_ID() );
    return !empty($type) ? $type[0] : 'Not Available';
}


// Set pardot handler url in free demo form
add_filter('wpcf7_form_action_url', 'wpcf7_custom_form_action_url');
function wpcf7_custom_form_action_url()
{
    $wpcf7 = WPCF7_ContactForm::get_current();
    $wpcf7_id = $wpcf7->id();

    if ($wpcf7_id == PARDOT_FREE_DEMO_F7_ID) {
        return PARDOT_FREE_DEMO;
    }

    if ($wpcf7_id == PARDOT_NEWSLETTER_FORM_F7_ID) {
        return PARDOT_NEWSLETTER_FORM;
    }

    if ($wpcf7_id == PARDOT_LANDING_FORM_F7_ID) {
        add_shortcode('PARDOT_Asset_Name', 'pardotAssetName');
        add_shortcode('PARDOT_Asset_URL', 'pardotAssetUrl');
        add_shortcode('PARDOT_Asset_Type', 'pardotAssetType');
        return PARDOT_LANDING_FORM;
    }
}

add_shortcode('gateddata', 'landingThankYou');

function landingThankYou($content)
{

     global $post;
    if ($post->post_name == 'thank-you' && $_SERVER['HTTP_ORIGIN'] == 'https://go.shelfengine.com') {
        $asset_url = sanitize_text_field($_REQUEST['Asset_URL']);
        $asset_name = str_replace('\\', '', $_REQUEST['Asset_Name']);
        $asset_type = sanitize_text_field($_REQUEST['Asset_Type']);
        if (!empty($asset_url)) {
            $asset_url = '<h2 class="resource-asset" style="text-align: center;"><a href="'.$asset_url.'" target="_blank">'.$asset_name.'</a></h2>';
        }
    }

     return $asset_url;
}
