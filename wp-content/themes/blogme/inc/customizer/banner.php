<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * banner section
 */

$wp_customize->add_section(
	'blogme_banner',
	array(
		'title' => esc_html__( 'Banner', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);

$banner_count = 6;


// banner enable settings
$wp_customize->add_setting(
	'blogme_banner',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'cat'
	)
);

$wp_customize->add_control(
	'blogme_banner',
	array(
		'section'		=> 'blogme_banner',
		'label'			=> esc_html__( 'Content type:', 'blogme' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'blogme' ),
				'post' => esc_html__( 'Post', 'blogme' ),
		 	)
	)
);


for ($i=1; $i <= $banner_count ; $i++) { 
	// banner post setting
	$wp_customize->add_setting(
		'blogme_banner_post_'.$i,
		array(
			'sanitize_callback' => 'blogme_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'blogme_banner_post_'.$i,
		array(
			'section'		=> 'blogme_banner',
			'label'			=> esc_html__( 'Post ', 'blogme' ).$i,
			'active_callback' => 'blogme_if_banner_post',
			'type'			=> 'select',
			'choices'		=> blogme_get_post_choices(),
		)
	);

}