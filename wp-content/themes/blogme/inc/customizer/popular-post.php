<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * Posts Slider section
 */

$wp_customize->add_section(
	'blogme_popular_post',
	array(
		'title' => esc_html__( 'Popular Posts', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);

$wp_customize->add_setting(
	'blogme_popular_post_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Popular Posts', 'blogme' ),
		'transport'	=> 'postMessage',
	)
);
$wp_customize->add_control(
	'blogme_popular_post_title',
	array(
		'section'		=> 'blogme_popular_post',
		'label'			=> esc_html__( 'Section Title:', 'blogme' ),
		'active_callback' => 'blogme_if_popular_post_enabled'
	)
);

$wp_customize->add_setting(
	'blogme_popular_post_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Read More', 'blogme' ),
		'transport'	=> 'postMessage',
	)
);
$wp_customize->add_control(
	'blogme_popular_post_btn_title',
	array(
		'section'		=> 'blogme_popular_post',
		'label'			=> esc_html__( 'Btn label:', 'blogme' ),
		'active_callback' => 'blogme_if_popular_post_enabled'
	)
);

$popular_post_num = 6;

// popular_post enable settings
$wp_customize->add_setting(
	'blogme_popular_post',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'post',
	)
);

$wp_customize->add_control(
	'blogme_popular_post',
	array(
		'section'		=> 'blogme_popular_post',
		'label'			=> esc_html__( 'Content type:', 'blogme' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'blogme' ),
				'post' => esc_html__( 'Post', 'blogme' ),
		 	)
	)
);

for ($i=1; $i <= $popular_post_num ; $i++) { 
	// popular_post post setting
	$wp_customize->add_setting(
		'blogme_popular_post_post_'.$i,
		array(
			'sanitize_callback' => 'blogme_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'blogme_popular_post_post_'.$i,
		array(
			'section'		=> 'blogme_popular_post',
			'label'			=> esc_html__( 'Post ', 'blogme' ).$i,
			'active_callback' => 'blogme_if_popular_post_post',
			'type'			=> 'select',
			'choices'		=> blogme_get_post_choices(),
		)
	);
}
