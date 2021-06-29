<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * Header panel
 */

$wp_customize->add_panel(
	'blogme_header_panel',
	array(
		'title' => esc_html__( 'Header', 'blogme' ),
		'priority' => 100
	)
);



// Header section
$wp_customize->add_section(
	'blogme_header_section',
	array(
		'title' => esc_html__( 'Header', 'blogme' ),
		'panel' => 'blogme_header_panel',
	)
);

// Header menu sticky enable settings
$wp_customize->add_setting(
	'blogme_make_menu_sticky',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => false
	)
);

$wp_customize->add_control(
	'blogme_make_menu_sticky',
	array(
		'section'		=> 'blogme_header_section',
		'label'			=> esc_html__( 'Make menu sticky.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

// Header menu sticky enable settings
$wp_customize->add_setting(
	'blogme_header_style',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'header-1'
	)
);

$wp_customize->add_control(
	'blogme_header_style',
	array(
		'section'		=> 'blogme_header_section',
		'label'			=> esc_html__( 'Select Header Style', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'header-1' => esc_html__( 'Header 1', 'blogme' ),
				'header-2' => esc_html__( 'Header 2', 'blogme' ),
				'header-3' => esc_html__( 'Header 3', 'blogme' ),
		 	)
	)
);


$wp_customize->add_setting(
	'blogme_header_display',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'ads',
	)
);

$wp_customize->add_control(
	'blogme_header_display',
	array(
		'section'		=> 'blogme_header_section',
		'label'			=> esc_html__( 'Header Display Option', 'blogme' ),
		'type'			=> 'select',
		'active_callback'	=> 'blogme_if_header_style',
		'choices'		=> array( 
				'social-menu' => esc_html__( 'Social Menu', 'blogme' ),
				'none' => esc_html__( 'Nothing', 'blogme' ),
				'ads' => esc_html__( 'Add Banner Image', 'blogme' ),
		 	)
	)
);

$wp_customize->add_setting(
	'blogme_nav_search',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true
	)
);

$wp_customize->add_control(
	'blogme_nav_search',
	array(
		'section'		=> 'blogme_header_section',
		'label'			=> esc_html__( 'Enable Search Form', 'blogme' ),
		'type'			=> 'checkbox',
		'active_callback'	=> 'blogme_if_header_nav_search',
	)
);

// ads image setting and control.
$wp_customize->add_setting( 'blogme_header_ads_image', array(
	'sanitize_callback' => 'blogme_sanitize_image',
	'default'			=> get_template_directory_uri() . '/assets/img/site-advertisement.jpg',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blogme_header_ads_image',
	array(
	'label'       		=> esc_html__( 'Ads Image', 'blogme' ),
	'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'blogme' ), 810, 120 ),
	'section'     		=> 'blogme_header_section',
	'active_callback'	=> 'blogme_if_header_ads',
) ) );

// ads link setting and control
$wp_customize->add_setting( 'blogme_header_ads_image_url', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'blogme_header_ads_image_url', array(
	'label'           	=> esc_html__( 'Ads Url', 'blogme' ),
	'section'        	=> 'blogme_header_section',
	'type'				=> 'url',
	'active_callback'	=> 'blogme_if_header_ads',
) );
