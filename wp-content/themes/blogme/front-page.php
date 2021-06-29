<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogme 
 */

get_header(); 

// Call home.php if Homepage setting is set to latest posts.
if ( blogme_is_latest_posts() ) {

	require get_home_template();

} elseif ( blogme_is_frontpage() ) {
	
	if ( empty( get_theme_mod( 'blogme_sort_home_sections') ) ) {
		$sorted_sections = array( 'featured-slider', 'hero-slider', 'latest-post', 'banner', 'popular-post', 'blog', 'instagram' );
	}else{
		$sorted_sections = get_theme_mod( 'blogme_sort_home_sections' );
	}
	

	foreach ( $sorted_sections as $sorted_section ) {
		get_template_part( 'template-parts/frontpage-parts/' . $sorted_section ); 
	}
}

get_footer();
