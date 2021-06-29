<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * Posts Slider section
 */

$wp_customize->add_section(
	'blogme_featured_slider',
	array(
		'title' => esc_html__( 'Featured Slider', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);

$wp_customize->add_setting(
	'blogme_featured_slider_overlay',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => false
	)
);

$wp_customize->add_control(
	'blogme_featured_slider_overlay',
	array(
		'section'		=> 'blogme_featured_slider',
		'label'			=> esc_html__( 'Overlay', 'blogme' ),
		'type'			=> 'checkbox',
		'active_callback' => 'blogme_if_featured_slider_enabled'
	)
);


$wp_customize->add_setting(
	'blogme_featured_slider_btn_label',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Read More', 'blogme' ),
		'transport'	=> 'refresh',
	)
);
$wp_customize->add_control(
	'blogme_featured_slider_btn_label',
	array(
		'section'		=> 'blogme_featured_slider',
		'label'			=> esc_html__( 'Section Title:', 'blogme' ),
		'active_callback' => 'blogme_if_featured_slider_enabled'
	)
);

$featured_slider_num = 3;

// featured_slider enable settings
$wp_customize->add_setting(
	'blogme_featured_slider',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'post',
	)
);

$wp_customize->add_control(
	'blogme_featured_slider',
	array(
		'section'		=> 'blogme_featured_slider',
		'label'			=> esc_html__( 'Content type:', 'blogme' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'blogme' ),
				'post' => esc_html__( 'Post', 'blogme' ),
		 	)
	)
);

for ($i=1; $i <= $featured_slider_num ; $i++) { 
	// featured_slider post setting
	$wp_customize->add_setting(
		'blogme_featured_slider_post_'.$i,
		array(
			'sanitize_callback' => 'blogme_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'blogme_featured_slider_post_'.$i,
		array(
			'section'		=> 'blogme_featured_slider',
			'label'			=> esc_html__( 'Post ', 'blogme' ).$i,
			'active_callback' => 'blogme_if_featured_slider_post',
			'type'			=> 'select',
			'choices'		=> blogme_get_post_choices(),
		)
	);

	// featured_slider page setting
	$wp_customize->add_setting(
		'blogme_featured_slider_page_'.$i,
		array(
			'sanitize_callback' => 'blogme_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'blogme_featured_slider_page_'.$i,
		array(
			'section'		=> 'blogme_featured_slider',
			'label'			=> esc_html__( 'Page ', 'blogme' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'blogme_if_featured_slider_page'
		)
	);
}

// featured_slider category setting
$wp_customize->add_setting(
	'blogme_featured_slider_cat',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogme_featured_slider_cat',
	array(
		'section'		=> 'blogme_featured_slider',
		'label'			=> esc_html__( 'Category:', 'blogme' ),
		'active_callback' => 'blogme_if_featured_slider_cat',
		'type'			=> 'select',
		'choices'		=> blogme_get_post_cat_choices(),
	)
);