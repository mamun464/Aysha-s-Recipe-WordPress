<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * Posts Slider section
 */

$wp_customize->add_section(
	'blogme_instagram',
	array(
		'title' => esc_html__( 'Gallery Slider ( instagram )', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);


$instagram_num = 5;

// instagram enable settings
$wp_customize->add_setting(
	'blogme_instagram',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'post',
	)
);

$wp_customize->add_control(
	'blogme_instagram',
	array(
		'section'		=> 'blogme_instagram',
		'label'			=> esc_html__( 'Content type:', 'blogme' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'blogme' ),
				'post' => esc_html__( 'Post', 'blogme' ),
		 	)
	)
);

for ($i=1; $i <= $instagram_num ; $i++) { 
	// instagram post setting
	$wp_customize->add_setting(
		'blogme_instagram_post_'.$i,
		array(
			'sanitize_callback' => 'blogme_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'blogme_instagram_post_'.$i,
		array(
			'section'		=> 'blogme_instagram',
			'label'			=> esc_html__( 'Post ', 'blogme' ).$i,
			'active_callback' => 'blogme_if_instagram_post',
			'type'			=> 'select',
			'choices'		=> blogme_get_post_choices(),
		)
	);
}
