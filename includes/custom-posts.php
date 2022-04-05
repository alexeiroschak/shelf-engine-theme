<?php
/**
 * Custom posts for use with this theme
 *
 *
 * @package effection-theme
 */

 // Register Custom Post Type
function employee_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Employees', 'Post Type General Name', 'effection-theme' ),
		'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'effection-theme' ),
		'menu_name'             => __( 'Employees', 'effection-theme' ),
		'name_admin_bar'        => __( 'Employee', 'effection-theme' ),
		'archives'              => __( 'Employee Archives', 'effection-theme' ),
		'attributes'            => __( 'Employees Attributes', 'effection-theme' ),
		'parent_item_colon'     => __( 'Parent Employee:', 'effection-theme' ),
		'all_items'             => __( 'All Employees', 'effection-theme' ),
		'add_new_item'          => __( 'Add New Employee', 'effection-theme' ),
		'add_new'               => __( 'Add New', 'effection-theme' ),
		'new_item'              => __( 'New Employee', 'effection-theme' ),
		'edit_item'             => __( 'Edit Employee', 'effection-theme' ),
		'update_item'           => __( 'Update Employee', 'effection-theme' ),
		'view_item'             => __( 'View Employee', 'effection-theme' ),
		'view_items'            => __( 'View Employee', 'effection-theme' ),
		'search_items'          => __( 'Search Employee', 'effection-theme' ),
		'not_found'             => __( 'Not found', 'effection-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'effection-theme' ),
		'featured_image'        => __( 'Featured Image', 'effection-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'effection-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'effection-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'effection-theme' ),
		'insert_into_item'      => __( 'Insert into Project', 'effection-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'effection-theme' ),
		'items_list'            => __( 'Employees list', 'effection-theme' ),
		'items_list_navigation' => __( 'Employees list navigation', 'effection-theme' ),
		'filter_items_list'     => __( 'Filter Employees list', 'effection-theme' ),
	);
	$args = array(
		'label'                 => __( 'Employee', 'effection-theme' ),
		'description'           => __( 'Employee Post Type', 'effection-theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-index-card',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);

	register_post_type( 'employees', $args );

}
add_action( 'init', 'employee_custom_post_type', 0 );



function shelfengine_register_post_type() {

    $labels = array(
        'name'                  => 'Resources',
        'singular_name'         => 'Resource',
        'add_new'               => __( 'Add New Resource' ),
        'add_new_item'          => __( 'Add New Resource' ),
        'edit_item'             => __( 'Edit Resource' ),
        'new_item'              => __( 'New Resource' ),
        'all_items'             => __( 'All Resources' ),
        'view_item'             => __( 'View Resource' ),
        'search_items'          => __( 'Search Resources' ),
        'not_found'             => __( 'No Resources found'),
        'not_found_in_trash'    => __( 'No Resources found in Trash'),
        'parent_item_colon'     => '',
        'menu_name'             => 'Resources'
    );

    // Same principle as the labels. We set some awaas and overwrite them with the given arguments.
    $args = array(
        'label'                 => 'Resources',
        'labels'                => $labels,
        'public'                => true,
        'show_ui'               => true,
        'supports'              => array( 'title', 'thumbnail' ),
        'show_in_nav_menus'     => true,
        '_builtin'              => false,
        'has_archive'           => true,
        'rewrite'             => array( 'slug' => 'resources', 'with_front' => false ),
    );

    // Register the post type
    register_post_type( 'resources', $args );
}

add_action('init', 'shelfengine_register_post_type');



// Register Press mentions articles
function shelfengine_post_press() {

    $labels = array(
        'name'                => _x( 'Press', 'Post Type General Name', 'effection-theme' ),
        'singular_name'       => _x( 'Press', 'Post Type Singular Name', 'effection-theme' ),
        'menu_name'           => __( 'Press', 'effection-theme' ),
        'name_admin_bar'      => __( 'Press', 'effection-theme' )
    );
    $args = array(
        'label'               => __( 'Press', 'effection-theme' ),
        'description'         => __( 'Press', 'effection-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug'=>'press-mentions', 'with_front' => false ),
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'press', $args );

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'effection-theme' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'effection-theme' ),
        'menu_name'                  => __( 'Categories', 'effection-theme' )
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite' => array(     
            'with_front' => false,      
            'hierarchical' => true,
            'slug' => 'press'    
        )
    );

    register_taxonomy( 'press-cat', array( 'press' ), $args );

}
add_action( 'init', 'shelfengine_post_press' );
// add_action('template_redirect', 'press_redirect');

// function press_redirect()
// {
//     if (is_singular('press')) {
//         wp_redirect(home_url('/press/mentions'), 301);
//         exit;
//     }
// }


// Register Contributed articles
function shelfengine_post_contributed() {

    $labels = array(
        'name'                => _x( 'News', 'Post Type General Name', 'effection-theme' ),
        'singular_name'       => _x( 'News', 'Post Type Singular Name', 'effection-theme' ),
        'menu_name'           => __( 'News', 'effection-theme' ),
        'name_admin_bar'      => __( 'News', 'effection-theme' )
    );
    $args = array(
        'label'               => __( 'News', 'effection-theme' ),
        'description'         => __( 'News', 'effection-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => array('contributed-tag'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite'             => array( 'slug' => 'news', 'with_front'=> false )
    );

    register_post_type( 'contributed', $args );

    // Tags
    $labels = array(
        'name'                       => _x( 'Tags', 'Taxonomy General Name', 'effection-theme' ),
        'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'effection-theme' ),
        'menu_name'                  => __( 'Tags', 'effection-theme' )
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite' => array(     
            'with_front' => false,      
            'hierarchical' => true      
        )
    );

    register_taxonomy( 'contributed-tag', array( 'contributed' ), $args );


    // Categories
    // $labels = array(
    //     'name'                       => _x( 'Categories', 'Taxonomy General Name', 'effection-theme' ),
    //     'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'effection-theme' ),
    //     'menu_name'                  => __( 'Categories', 'effection-theme' )
    // );
    // $args = array(
    //     'labels'                     => $labels,
    //     'hierarchical'               => false,
    //     'public'                     => true,
    //     'show_ui'                    => true,
    //     'show_admin_column'          => true,
    //     'show_in_nav_menus'          => true,
    //     'show_tagcloud'              => true,
    // );

    // register_taxonomy( 'contributed-cat', array( 'contributed' ), $args );
}
add_action( 'init', 'shelfengine_post_contributed' );
// add_action('template_redirect', 'contributed_redirect');

// function contributed_redirect()
// {
//     if (is_singular('contributed')) {
//         wp_redirect(home_url('/press/articles'), 301);
//         exit;
//     }
// }

