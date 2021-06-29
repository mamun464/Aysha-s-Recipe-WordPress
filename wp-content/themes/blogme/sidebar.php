<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogme 
 */

if ( is_archive() || blogme_is_latest_posts() || is_404() || is_search() ) {
	$archive_sidebar = get_theme_mod( 'blogme_archive_sidebar', 'right' ); 
	if ( 'no' === $archive_sidebar ) {
		return;
	}
} elseif ( is_single() ) {
    $blogme_post_sidebar_meta = get_post_meta( get_the_ID(), 'ostrich-blog-select-sidebar', true );
	$global_post_sidebar = get_theme_mod( 'blogme_global_post_layout', 'right' ); 

	if ( ! empty( $blogme_post_sidebar_meta ) && ( 'no' === $blogme_post_sidebar_meta ) ) {
		return;
	} elseif ( empty( $blogme_post_sidebar_meta ) && 'no' === $global_post_sidebar ) {
		return;
	}
} elseif ( blogme_is_frontpage_blog() || is_page() ) {
	if ( blogme_is_frontpage_blog() ) {
		$page_id = get_option( 'page_for_posts' );
	} else {
		$page_id = get_the_ID();
	}
	
    $blogme_page_sidebar_meta = get_post_meta( $page_id, 'ostrich-blog-select-sidebar', true );
	$global_page_sidebar = get_theme_mod( 'blogme_global_page_layout', 'right' ); 

	if ( ! empty( $blogme_page_sidebar_meta ) && ( 'no' === $blogme_page_sidebar_meta ) ) {
		return;
	} elseif ( empty( $blogme_page_sidebar_meta ) && 'no' === $global_page_sidebar ) {
		return;
	}
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
