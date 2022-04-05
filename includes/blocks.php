<?php
/**
 * Register custom gutenberg blocks
 */

 function theme_acf_block_render_callback( $block ) {
  // convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/block" folder
  if( file_exists( get_theme_file_path("/templates/blocks/{$slug}.php") ) ) {
    include( get_theme_file_path("/templates/blocks/{$slug}.php") );
  }
}

function theme_acf_blocks_init() {

	// check function exists
	if( function_exists('acf_register_block_type') ) {

		// ******************* Process Block *******************************
		acf_register_block_type(array(
			'name'				=> 'process',
			'title'				=> __('Process Block'),
			'description'		=> __('Process block'),
      'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'editor-insertmore',
			'keywords'			=> array( 'process', 'start' ),
      'mode' 	=> 'edit',
		));

		// ******************* Features Block *******************************
		acf_register_block_type(array(
			'name'				=> 'features',
			'title'				=> __('Features Block'),
			'description'		=> __('Features block'),
      'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'networking',
			'keywords'			=> array( 'features', 'copy' ),
      'mode' 	=> 'edit',
		));

		// ******************* Chart Block *******************************
		acf_register_block_type(array(
			'name'				=> 'chart',
			'title'				=> __('Chart Block'),
			'description'		=> __('Chart block'),
      'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'chart-bar',
			'keywords'			=> array( 'chart', 'copy' ),
      'mode' 	=> 'edit',
		));

		// ******************* Hero Block *******************************
		acf_register_block_type(array(
			'name'				=> 'hero',
			'title'				=> __('Hero Block'),
			'description'		=> __('Hero block'),
      'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'slides',
			'keywords'			=> array( 'carousel', 'slider', 'hero' ),
      'mode' 	=> 'edit',
		));

		// ******************* Video Block *******************************
		acf_register_block_type(array(
			'name'				=> 'video-block',
			'title'				=> __('Video Block'),
			'description'		=> __('Video block'),
      'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'format-video',
			'keywords'			=> array( 'video', 'copy' ),
      'mode' 	=> 'edit',
		));

		// ******************* Copy Block *******************************
		acf_register_block_type(array(
			'name'				=> 'copy',
			'title'				=> __('Copy Block'),
			'description'		=> __('Copy block'),
      'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'editor-justify',
			'keywords'			=> array( 'copy', 'text', 'legal' ),
      'mode' 	=> 'edit',
		));
		// ******************* Quote Block *******************************
		acf_register_block_type(array(
			'name'				=> 'quote',
			'title'				=> __('Quote Block'),
			'description'		=> __('Quote block'),
      		'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'format-quote',
			'keywords'			=> array( 'quote', 'text', 'legal' ),
      		'mode' 	=> 'edit',
		));
		// ******************* Callout Block *******************************
		acf_register_block_type(array(
			'name'				=> 'callout',
			'title'				=> __('Callout Block'),
			'description'		=> __('Callout block'),
      		'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'admin-links',
			'keywords'			=> array( 'callout', 'text', 'legal' ),
      		'mode' 	=> 'edit',
		));
		// ******************* Banner Block *******************************
		acf_register_block_type(array(
			'name'				=> 'banner',
			'title'				=> __('Banner Block'),
			'description'		=> __('Banner block'),
      		'render_callback'	=> 'theme_acf_block_render_callback',
			'icon'				=> 'cover-image',
			'keywords'			=> array( 'banner', 'text', 'legal' ),
      		'mode' 	=> 'edit',
		));
  }
}
add_action('acf/init', 'theme_acf_blocks_init');

// Remove the default gutenberg block
// https://rudrastyh.com/gutenberg/remove-default-blocks.html
function theme_allowed_block_types($allowed_blocks, $post) {
  return array(
    'acf/process',
    'acf/hero',
    'acf/features',
    'acf/video-block',
    'acf/chart',
    'acf/copy',
	'acf/quote',
	'acf/callout',
	'acf/banner'
  );
}
add_filter('allowed_block_types', 'theme_allowed_block_types', 10, 2);
