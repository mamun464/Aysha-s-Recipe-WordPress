<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 *
 * advance setting
 */

$wp_customize->add_panel(
	'blogme_general_panel',
	array(
		'title' => esc_html__( 'Theme Options', 'blogme' ),
		'priority' => 107
	)
);

// Header section
$wp_customize->add_section(
	'blogme_header_section',
	array(
		'title' => esc_html__( 'Header', 'blogme' ),
		'panel' => 'blogme_general_panel',
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

/**
 * Font section
 */
// Font section
$wp_customize->add_section(
	'blogme_font',
	array(
		'title' => esc_html__( 'Font options', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);

// Font enable setting
$wp_customize->add_setting(
	'blogme_h1_h6_font_option',
	array(
		'default' => '',
		'sanitize_callback' => 'blogme_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogme_h1_h6_font_option',
	array(
		'section'		=> 'blogme_font',
		'label'			=> sprintf( esc_html__( 'H1 to H6 font family:', 'blogme' ) ),
		'type'			=> 'select',
		'choices'		=> blogme_font_choices(),
	)
);

// Body font setting
$wp_customize->add_setting(
	'blogme_body_font_option',
	array(
		'default' => '',
		'sanitize_callback' => 'blogme_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogme_body_font_option',
	array(
		'section'		=> 'blogme_font',
		'label'			=> esc_html__( 'Body font family:', 'blogme' ),
		'type'			=> 'select',
		'choices'		=> blogme_font_choices(),
	)
);

/**
 * General settings
 */
// General settings
$wp_customize->add_section(
	'blogme_general_section',
	array(
		'title' => esc_html__( 'General', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'blogme_breadcrumb_enable',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_breadcrumb_enable',
	array(
		'section'		=> 'blogme_general_section',
		'label'			=> esc_html__( 'Enable breadcrumb.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);


// Backtop enable setting
$wp_customize->add_setting(
	'blogme_back_to_top_enable',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_back_to_top_enable',
	array(
		'section'		=> 'blogme_general_section',
		'label'			=> esc_html__( 'Enable Scroll up.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

/**
 * Global Layout
 */
// Global Layout
$wp_customize->add_section(
	'blogme_global_layout',
	array(
		'title' => esc_html__( 'Global Layout', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);

// Global site layout setting
$wp_customize->add_setting(
	'blogme_site_layout',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'wide',
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'blogme_site_layout',
	array(
		'section'		=> 'blogme_global_layout',
		'label'			=> esc_html__( 'Site layout', 'blogme' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'wide' => esc_html__( 'Wide', 'blogme' ), 
			'frame' => esc_html__( 'Frame', 'blogme' ), 
		),
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'blogme_archive_sidebar',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'blogme_archive_sidebar',
	array(
		'section'		=> 'blogme_global_layout',
		'label'			=> esc_html__( 'Archive Sidebar', 'blogme' ),
		'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category, "Your latest posts" and so on.', 'blogme' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'blogme' ), 
			'no' => esc_html__( 'No Sidebar', 'blogme' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'blogme_global_page_layout',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'blogme_global_page_layout',
	array(
		'section'		=> 'blogme_global_layout',
		'label'			=> esc_html__( 'Global page sidebar', 'blogme' ),
		'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'blogme' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'blogme' ), 
			'no' => esc_html__( 'No Sidebar', 'blogme' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'blogme_global_post_layout',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'blogme_global_post_layout',
	array(
		'section'		=> 'blogme_global_layout',
		'label'			=> esc_html__( 'Global post sidebar', 'blogme' ),
		'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'blogme' ),
		'type'			=> 'radio',
		'choices'		=> array(  
			'right' => esc_html__( 'Right', 'blogme' ), 
			'no' => esc_html__( 'No Sidebar', 'blogme' ), 
		),
	)
);

/**
 * Single setting section 
 */
// Single setting section 
$wp_customize->add_section(
	'blogme_single_settings',
	array(
		'title' => esc_html__( 'Single Posts', 'blogme' ),
		'description' => esc_html__( 'Settings for all single posts.', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);

// Date enable setting
$wp_customize->add_setting(
	'blogme_enable_single_date',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_date',
	array(
		'section'		=> 'blogme_single_settings',
		'label'			=> esc_html__( 'Enable date.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

// Category enable setting
$wp_customize->add_setting(
	'blogme_enable_single_cat',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_cat',
	array(
		'section'		=> 'blogme_single_settings',
		'label'			=> esc_html__( 'Enable category.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

// Tag enable setting
$wp_customize->add_setting(
	'blogme_enable_single_tag',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_tag',
	array(
		'section'		=> 'blogme_single_settings',
		'label'			=> esc_html__( 'Enable tags.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

// Comment enable setting
$wp_customize->add_setting(
	'blogme_enable_single_comment',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_comment',
	array(
		'section'		=> 'blogme_single_settings',
		'label'			=> esc_html__( 'Enable comment.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);


// Author enable setting
$wp_customize->add_setting(
	'blogme_enable_single_author',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_author',
	array(
		'section'		=> 'blogme_single_settings',
		'label'			=> esc_html__( 'Enable author.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);



// Featured image enable setting
$wp_customize->add_setting(
	'blogme_enable_single_featured_img',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_featured_img',
	array(
		'section'		=> 'blogme_single_settings',
		'label'			=> esc_html__( 'Enable featured image.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

// Pagination enable setting
$wp_customize->add_setting(
	'blogme_enable_single_pagination',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_pagination',
	array(
		'section'		=> 'blogme_single_settings',
		'label'			=> esc_html__( 'Enable pagination.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

/**
 * Single pages setting section 
 */
// Single pages setting section 
$wp_customize->add_section(
	'blogme_single_page_settings',
	array(
		'title' => esc_html__( 'Single Pages', 'blogme' ),
		'description' => esc_html__( 'Settings for all single pages.', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);

// Featured image enable setting
$wp_customize->add_setting(
	'blogme_enable_single_page_featured_img',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_single_page_featured_img',
	array(
		'section'		=> 'blogme_single_page_settings',
		'label'			=> esc_html__( 'Enable featured image.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);


/**
 * Blog/Archive section 
 */
// Blog/Archive section 
$wp_customize->add_section(
	'blogme_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);


// Pagination type setting
$wp_customize->add_setting(
	'blogme_archive_pagination_type',
	array(
		'sanitize_callback' => 'blogme_sanitize_select',
		'default' => 'numeric',
	)
);

$archive_pagination_description = '';
$archive_pagination_choices = array( 
			'disable' => esc_html__( '--Disable--', 'blogme' ),
			'numeric' => esc_html__( 'Numeric', 'blogme' ),
			'older_newer' => esc_html__( 'Older / Newer', 'blogme' ),
		);

$wp_customize->add_control(
	'blogme_archive_pagination_type',
	array(
		'section'		=> 'blogme_archive_settings',
		'label'			=> esc_html__( 'Pagination type:', 'blogme' ),
		'description'			=>  $archive_pagination_description,
		'type'			=> 'select',
		'choices'		=> $archive_pagination_choices,
	)
);

/**
 *
 *
 * Footer copyright
 *
 *
 */
// Footer copyright
$wp_customize->add_section(
	'blogme_footer_section',
	array(
		'title' => esc_html__( 'Footer', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);


// Footer text enable setting
$wp_customize->add_setting(
	'blogme_enable_footer_text',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'blogme_enable_footer_text',
	array(
		'section'		=> 'blogme_footer_section',
		'label'			=> esc_html__( 'Enable footer text.', 'blogme' ),
		'type'			=> 'checkbox',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'blogme_copyright_txt',
	array(
		'sanitize_callback' => 'blogme_sanitize_html',
		'default' => $default['blogme_copyright_txt'],
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'blogme_copyright_txt',
	array(
		'section'		=> 'blogme_footer_section',
		'label'			=> esc_html__( 'Copyright text:', 'blogme' ),
		'type'			=> 'textarea',
		'active_callback' => 'blogme_if_footer_text_enable',
	)
);

/**
 * Reset all settings
 */
// Reset settings section
$wp_customize->add_section(
	'blogme_reset_sections',
	array(
		'title' => esc_html__( 'Reset all', 'blogme' ),
		'description' => esc_html__( 'Reset all settings to default.', 'blogme' ),
		'panel' => 'blogme_general_panel',
	)
);

// Reset sortable order setting
$wp_customize->add_setting(
	'blogme_reset_settings',
	array(
		'sanitize_callback' => 'blogme_sanitize_checkbox',
		'default' => false,
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'blogme_reset_settings',
	array(
		'section'		=> 'blogme_reset_sections',
		'label'			=> esc_html__( 'Reset all settings?', 'blogme' ),
		'type'			=> 'checkbox',
	)
);