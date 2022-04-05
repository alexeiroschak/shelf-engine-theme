<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package theme-name
 */

get_header(); ?>

<div class="four-o-four" style="margin-top: 150px !important; margin-bottom: 50px !important;">
  <h1>Uh-oh! This page doesn't exist.</h1>
	<p>Nothing here...but some sweet watermelon tunes!</p>
	<br>
	<iframe width="560" height="315" src="https://www.youtube.com/embed/RPf28jaiU90" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<br>
  <a href="<?php echo home_url(); ?>">Go Back</a>

</div>


<?php get_footer(); ?>
