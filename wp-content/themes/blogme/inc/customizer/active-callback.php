<?php
/**
 * Theme Ostrich 
 *
 * @package Blogme 
 * active callbacks.
 * 
 */

function blogme_if_header_style( $control ) {
	return 'header-2' == $control->manager->get_setting( 'blogme_header_style' )->value();
}

function blogme_if_header_nav_search( $control ) {
	return 'header-1' != $control->manager->get_setting( 'blogme_header_style' )->value();
}

function blogme_if_header_ads( $control ) {
	return 'ads' == $control->manager->get_setting( 'blogme_header_display' )->value() && 'header-2' == $control->manager->get_setting( 'blogme_header_style' )->value() ;
}


/**
 * Check if the banner is enabled
 */
function blogme_if_banner_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_banner' )->value();
}

/**
 * Check if the banner is custom
 */
function blogme_if_banner_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_banner' )->value();
}

/**
 * Check if the banner is page
 */
function blogme_if_banner_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_banner' )->value();
}

/**
 * Check if the banner is post
 */
function blogme_if_banner_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_banner' )->value();
}


/**
 * Check if the popular_post is enabled
 */
function blogme_if_popular_post_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_popular_post' )->value();
}

/**
 * Check if the popular_post is custom
 */
function blogme_if_popular_post_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_popular_post' )->value();
}

/**
 * Check if the popular_post is page
 */
function blogme_if_popular_post_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_popular_post' )->value();
}

/**
 * Check if the recent is post
 */
function blogme_if_popular_post_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_popular_post' )->value();
}


/**
 * Check if the hero_slider is enabled
 */
function blogme_if_hero_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_hero_slider' )->value();
}

/**
 * Check if the hero_slider is custom
 */
function blogme_if_hero_slider_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_hero_slider' )->value();
}

/**
 * Check if the hero_slider is page
 */
function blogme_if_hero_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_hero_slider' )->value();
}

/**
 * Check if the recent is post
 */
function blogme_if_hero_slider_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_hero_slider' )->value();
}

/**
 * Check if the popular_post is enabled
 */
function blogme_if_featured_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_featured_slider' )->value();
}

/**
 * Check if the featured_slider is custom
 */
function blogme_if_featured_slider_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_featured_slider' )->value();
}

/**
 * Check if the featured_slider is page
 */
function blogme_if_featured_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_featured_slider' )->value();
}

/**
 * Check if the recent is post
 */
function blogme_if_featured_slider_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_featured_slider' )->value();
}


/**
 * Check if the popular_post is enabled
 */
function blogme_if_latest_post_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_latest_post' )->value();
}

/**
 * Check if the client is custom
 */
function blogme_if_latest_post_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_latest_post' )->value();
}

/**
 * Check if the client is page
 */
function blogme_if_latest_post_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_latest_post' )->value();
}

/**
 * Check if the recent is post
 */
function blogme_if_latest_post_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_latest_post' )->value();
}


function blogme_if_instagram_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_instagram' )->value();
}

/**
 * Check if the instagram is custom
 */
function blogme_if_instagram_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_instagram' )->value();
}

/**
 * Check if the instagram is page
 */
function blogme_if_instagram_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_instagram' )->value();
}

/**
 * Check if the recent is post
 */
function blogme_if_instagram_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_instagram' )->value();
}


/**
 * Check if the recent is enabled
 */
function blogme_if_recent_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_recent' )->value();
}

/**
 * Check if the recent is custom
 */
function blogme_if_recent_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_recent' )->value();
}

/**
 * Check if the recent is page
 */
function blogme_if_recent_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_recent' )->value();
}

/**
 * Check if the recent is post
 */
function blogme_if_recent_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_recent' )->value();
}

/**
 * Check if the lifestyle is enabled
 */
function blogme_if_lifestyle_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_lifestyle' )->value();
}

/**
 * Check if the lifestyle is custom
 */
function blogme_if_lifestyle_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_lifestyle' )->value();
}

/**
 * Check if the lifestyle is page
 */
function blogme_if_lifestyle_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_lifestyle' )->value();
}

/**
 * Check if the lifestyle is post
 */
function blogme_if_lifestyle_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_lifestyle' )->value();
}

/**
 * Check if the fashion is enabled
 */
function blogme_if_fashion_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_fashion' )->value();
}

/**
 * Check if the fashion is custom
 */
function blogme_if_fashion_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_fashion' )->value();
}

/**
 * Check if the fashion is page
 */
function blogme_if_fashion_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_fashion' )->value();
}

/**
 * Check if the fashion is post
 */
function blogme_if_fashion_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_fashion' )->value();
}


/**
 * Check if the featured is enabled
 */
function blogme_if_featured_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_featured' )->value();
}

/**
 * Check if the featured is page
 */
function blogme_if_featured_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_featured' )->value();
}

/**
 * Check if the featured is post
 */
function blogme_if_featured_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_featured' )->value();
}

/**
 * Check if the featured is cat
 */
function blogme_if_featured_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_featured' )->value();
}


/**
 * Check if the blog is enabled
 */
function blogme_if_blog_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogme_blog' )->value();
}

/**
 * Check if the blog is custom
 */
function blogme_if_blog_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'blogme_blog' )->value();
}

/**
 * Check if the blog is page
 */
function blogme_if_blog_page( $control ) {
	return 'page' === $control->manager->get_setting( 'blogme_blog' )->value();
}

/**
 * Check if the blog is post
 */
function blogme_if_blog_post( $control ) {
	return 'post' === $control->manager->get_setting( 'blogme_blog' )->value();
}


/**
 * Check if the footer text is enabled
 */
function blogme_if_footer_text_enable( $control ) {
	return $control->manager->get_setting( 'blogme_enable_footer_text' )->value();
}

/**
 * Check if custom color scheme is enabled
 */
function blogme_if_custom_color_scheme( $control ) {
	return 'custom' === $control->manager->get_setting( 'blogme_color_scheme' )->value();
}
