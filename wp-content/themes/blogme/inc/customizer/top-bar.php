<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * topbar
 */

$wp_customize->add_section(
	'blogme_topbar',
	array(
		'title' => esc_html__( 'Top bar', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);

// topbar enable settings
$wp_customize->add_setting(
	'blogme_topbar',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => false,
	)
);

$wp_customize->add_control(
	'blogme_topbar',
	array(
		'section'		=> 'blogme_topbar',
		'label'			=> esc_html__( 'Enable Topbar', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

$wp_customize->add_setting(
	'blogme_topbar_social_menu',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => false,
	)
);

$wp_customize->add_control(
	'blogme_topbar_social_menu',
	array(
		'section'		=> 'blogme_topbar',
		'label'			=> esc_html__( 'Enable Social Menu', 'blogme' ),
		'type'			=> 'checkbox',
	)
);


$wp_customize->add_setting(
	'blogme_topbar_search',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => false,
	)
);

$wp_customize->add_control(
	'blogme_topbar_search',
	array(
		'section'		=> 'blogme_topbar',
		'label'			=> esc_html__( 'Enable Search From', 'blogme' ),
		'type'			=> 'checkbox',
	)
);
