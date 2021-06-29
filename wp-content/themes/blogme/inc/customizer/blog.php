<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * blog section
 */
$wp_customize->add_section(
	'blogme_blog',
	array(
		'title' => esc_html__( 'Blog Post', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);

$wp_customize->add_setting(
	'blogme_blog_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'More Articles', 'blogme' ),
		'transport'	=> 'postMessage',
	)
);
$wp_customize->add_control(
	'blogme_blog_title',
	array(
		'section'		=> 'blogme_blog',
		'label'			=> esc_html__( 'Section Title:', 'blogme' ),
		'active_callback' => 'blogme_if_blog_enabled'
	)
);
$wp_customize->selective_refresh->add_partial(
	'blogme_blog_title',
	array(
        'selector'            => '#inner-content-wrapper .section-title',
		'render_callback'     => 'blogme_blog_partial_title',
	)
);
$wp_customize->add_setting(
	'blogme_blog_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Load More', 'blogme' ),
		'transport'	=> 'postMessage',
	)
);
$wp_customize->add_control(
	'blogme_blog_btn_title',
	array(
		'section'		=> 'blogme_blog',
		'label'			=> esc_html__( 'Btn Title:', 'blogme' ),
		'active_callback' => 'blogme_if_blog_enabled'
	)
);
$wp_customize->selective_refresh->add_partial(
	'blogme_blog_btn_title',
	array(
        'selector'            => '#inner-content-wrapper .read-more a',
		'render_callback'     => 'blogme_blog_partial_btn_title',
	)
);
$wp_customize->add_setting(
	'blogme_blog_btn_url',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'blogme_blog_btn_url',
	array(
		'section'		=> 'blogme_blog',
		'label'			=> esc_html__( 'Btn Url:', 'blogme' ),
		'type'			=> 'url',
		'active_callback' => 'blogme_if_blog_enabled'
	)
);


$blog_num = 6;

// blog enable settings
$wp_customize->add_setting(
	'blogme_blog',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'cat',
	)
);
$wp_customize->add_control(
	'blogme_blog',
	array(
		'section'		=> 'blogme_blog',
		'label'			=> esc_html__( 'Content type:', 'blogme' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> array(
				'disable' => esc_html__( '--Disable--', 'blogme' ),
				'post' => esc_html__( 'Post', 'blogme' ),
		 	)
	)
);

for ($i=1; $i <= $blog_num ; $i++) {
	// blog post setting
	$wp_customize->add_setting(
		'blogme_blog_post_'.$i,
		array(
			'sanitize_callback' => 'blogme_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'blogme_blog_post_'.$i,
		array(
			'section'		=> 'blogme_blog',
			'label'			=> esc_html__( 'Post ', 'blogme' ).$i,
			'active_callback' => 'blogme_if_blog_post',
			'type'			=> 'select',
			'choices'		=> blogme_get_post_choices(),
		)
	);
	
}
