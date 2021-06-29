<?php
/**
 * Theme Ostrich 
 *
 * @package Blogme 
 * partial refresh
 * 
 */
/**
 * Selective refresh for recent title.
 */
function blogme_recent_partial_title() {
	return esc_html( get_theme_mod( 'blogme_recent_title' ) );
}

/**
 * Selective refresh for lifestyle title.
 */
function blogme_lifestyle_partial_title() {
	return esc_html( get_theme_mod( 'blogme_lifestyle_title' ) );
}

/**
 * Selective refresh for fashion title.
 */
function blogme_fashion_partial_title() {
	return esc_html( get_theme_mod( 'blogme_fashion_title' ) );
}

/**
 * Selective refresh for blog title.
 */
function blogme_blog_partial_title() {
	return esc_html( get_theme_mod( 'blogme_blog_title' ) );
}

/**
 * Selective refresh for blog btn title.
 */
function blogme_blog_partial_btn_title() {
	return esc_html( get_theme_mod( 'blogme_blog_btn_title' ) );
}

/**
 * Selective refresh for blog btn title.
 */
function blogme_editor_partial_title() {
	return esc_html( get_theme_mod( 'blogme_editor_title' ) );
}

/**
 * Selective refresh for blog btn title.
 */
function blogme_subscribe_partial_title() {
	return esc_html( get_theme_mod( 'blogme_suscribe_title' ) );
}

/**
 * Selective refresh for blog btn title.
 */
function blogme_subscribe_partial_sub_title() {
	return esc_html( get_theme_mod( 'blogme_suscribe_sub_title' ) );
}