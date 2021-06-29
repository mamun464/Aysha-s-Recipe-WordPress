<?php
/**
 * Theme Ostrich widgets
 *
 */

/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';
require get_template_directory() . '/inc/widgets/popular-posts-widget.php';
require get_template_directory() . '/inc/widgets/social-link-widgets.php';


/**
 * Register widgets
 */
function blogme_register_widgets() {

	register_widget( 'Blogme_Latest_Post' );
	register_widget( 'Blogme_Popular_Post' );
	register_widget( 'Blogme_Social_Link' );

}
add_action( 'widgets_init', 'blogme_register_widgets' );