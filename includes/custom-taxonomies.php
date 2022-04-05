<?php
/**
 * Custom taxonomies for use with this theme
 *
 *
 * @package theme-name
 */

function custom_taxonomies() {
    register_taxonomy(
        'resources_type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'resources',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Type', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'resources',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'custom_taxonomies');
