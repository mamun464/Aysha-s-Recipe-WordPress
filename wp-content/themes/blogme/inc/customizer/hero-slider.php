<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * Posts Slider section
 */

$wp_customize->add_section(
	'blogme_hero_slider',
	array(
		'title' => esc_html__( 'Hero Slider', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);

$wp_customize->add_setting(
	'blogme_hero_slider_overlay',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => false
	)
);

$wp_customize->add_control(
	'blogme_hero_slider_overlay',
	array(
		'section'		=> 'blogme_hero_slider',
		'label'			=> esc_html__( 'Overlay', 'blogme' ),
		'type'			=> 'checkbox',
		'active_callback' => 'blogme_if_hero_slider_enabled'
	)
);


$hero_slider_num = 3;

// hero_slider enable settings
$wp_customize->add_setting(
	'blogme_hero_slider',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'cat',
	)
);

$wp_customize->add_control(
	'blogme_hero_slider',
	array(
		'section'		=> 'blogme_hero_slider',
		'label'			=> esc_html__( 'Content type:', 'blogme' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'blogme' ),
				'cat' => esc_html__( 'Category', 'blogme' ),
		 	)
	)
);

for ($i=1; $i <= $hero_slider_num ; $i++) { 


	// hero_slider category setting
$wp_customize->add_setting(
	'blogme_hero_slider_cat_'.$i,
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogme_hero_slider_cat_'.$i,
	array(
		'section'		=> 'blogme_hero_slider',
		'label'			=> esc_html__( 'Category ', 'blogme' ).$i,
		'active_callback' => 'blogme_if_hero_slider_cat',
		'type'			=> 'select',
		'choices'		=> blogme_get_post_cat_choices(),
	)
);

$wp_customize->add_setting( 'blogme_category_image_'.$i, array(
	'sanitize_callback' => 'blogme_sanitize_image',
	'default'			=> get_template_directory_uri() . '/assets/img/site-advertisement.jpg',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blogme_category_image_'.$i,
	array(
	'label'       		=> esc_html__( 'Category Image ', 'blogme' ).$i,
	'section'     		=> 'blogme_hero_slider',
	'active_callback'	=> 'blogme_if_hero_slider_cat',
) ) );
}
