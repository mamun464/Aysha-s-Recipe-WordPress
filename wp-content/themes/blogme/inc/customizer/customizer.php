<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Blogme 
 */

/**
 * Get all the default values of the theme mods.
 */
function blogme_get_default_mods() {
	$blogme_default_mods = array(
		// Footer copyright
		'blogme_copyright_txt' => esc_html__( 'Copyright &copy; [the-year] [site-link]  |  ', 'blogme' ),
		'blogme_power_by_txt'	=> sprintf( esc_html__( 'Theme: %1$s by %2$s.', 'blogme' ), 'Blogme', '<a href="' . esc_url( 'http://themeostrich.com/' ) . '">Theme Ostrichs</a>' ),
	);

	return apply_filters( 'blogme_default_mods', $blogme_default_mods );
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogme_customize_register( $wp_customize ) {

	// Custom Controller
	require get_parent_theme_file_path( '/inc/customizer/custom-controller.php' );

	$default = blogme_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blogme_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blogme_customize_partial_blogdescription',
		) );
	}

	//Color Panel

	// Header tagline color setting
	$wp_customize->add_setting(	
		'blogme_header_tagline',
		array(
			'sanitize_callback' => 'blogme_sanitize_hex_color',
			'default' => '#929292',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'blogme_header_tagline',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site tagline Color:', 'blogme' ),
			)
		)
	);

	// Header tagline color setting
	$wp_customize->add_setting(	
		'blogme_theme_color_scheme',
		array(
			'sanitize_callback' => 'blogme_sanitize_select',
			'default' => 'lite-version',
		)
	);

	$wp_customize->add_control( 'blogme_theme_color_scheme',
		array(
			'section'		=> 'colors',
			'type'			=> 'radio',
			'label'			=> esc_html__( 'Theme color scheme:', 'blogme' ),
			'choices'			=> array( 
				'lite-version' => esc_html__( 'Lite', 'blogme' ), 
				'dark-version' => esc_html__( 'Dark', 'blogme' ), 
			),
		)
	);

	// Color scheme setting
	$wp_customize->add_setting(	
		'blogme_color_scheme',
		array(
			'sanitize_callback' => 'blogme_sanitize_select',
			'default'	=> 'default',
		)
	);

	$wp_customize->add_control( 
		new Blogme_Customize_Control_Radio_Color( 
		$wp_customize,
		'blogme_color_scheme',
		array(
			'section'		=> 'colors',
			'type'			=> 'radio-color',
			'label'			=> esc_html__( 'Color scheme:', 'blogme' ),
			'choices'		=> array( 
				'default' => array( 
					'color' => '#0563D8'
				),
				'red' => array( 
					'color' => '#fb3c3c'
				),
				'green' => array( 
					'color' => '#0cc652'
				),
				'yellow' => array( 
					'color' => '#f5d246'
				),
			),
		)
	)
	);


	// Header text display setting
	$wp_customize->add_setting(	
		'blogme_header_text_display',
		array(
			'sanitize_callback' => 'blogme_sanitize_checkbox',
			'default' => true,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'blogme_header_text_display',
		array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Site Title and Tagline', 'blogme' ),
		)
	);

	// Your latest posts title setting
	$wp_customize->add_setting(	
		'blogme_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Blogs', 'blogme' ),
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'blogme_your_latest_posts_title',
		array(
			'section'		=> 'static_front_page',
			'label'			=> esc_html__( 'Title:', 'blogme' ),
			'active_callback' => 'blogme_is_latest_posts'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'blogme_your_latest_posts_title', 
		array(
	        'selector'            => '.home.blog #page-header .page-title',
			'render_callback'     => 'blogme_your_latest_posts_partial_title',
    	) 
    );


    $wp_customize->add_setting( 'blogme_header_media_seperator', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );


	/**
	 * 
	 * Front Section
	 * 
	 */ 

	// Home sections panel
	$wp_customize->add_panel(
		'blogme_home_panel',
		array(
			'title' => esc_html__( 'Homepage Options', 'blogme' ),
			'priority' => 105
		)
	);

    //top-bar
    require get_parent_theme_file_path( '/inc/customizer/sortable.php' );

    require get_parent_theme_file_path( '/inc/customizer/top-bar.php' );

    //slider
    require get_parent_theme_file_path( '/inc/customizer/featured-slider.php' );
    
    //hero-slider
    require get_parent_theme_file_path( '/inc/customizer/hero-slider.php' );

    //latest post
    require get_parent_theme_file_path( '/inc/customizer/latest-post.php' );

    //banner
    require get_parent_theme_file_path( '/inc/customizer/banner.php' );

    //slider
    require get_parent_theme_file_path( '/inc/customizer/popular-post.php' );

    //blog
    require get_parent_theme_file_path( '/inc/customizer/blog.php' );

    //instagram
    require get_parent_theme_file_path( '/inc/customizer/instagram.php' );

	// Theme Options
	require get_parent_theme_file_path( '/inc/customizer/theme-option.php' );
}
add_action( 'customize_register', 'blogme_customize_register' );


// Sanitize Callback
require get_parent_theme_file_path( '/inc/customizer/sanitize-callback.php' );

// active Callback
require get_parent_theme_file_path( '/inc/customizer/active-callback.php' );

// Partial Refresh
require get_parent_theme_file_path( '/inc/customizer/partial-refresh.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogme_customize_preview_js() {
	wp_enqueue_script( 'ostrich-blog-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogme_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function blogme_customize_control_js() {


	wp_enqueue_style( 'ostrich-blog-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );

	wp_enqueue_script( 'ostrich-blog-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg' => esc_html__( 'Refresh the page after Save and Publish.', 'blogme' ),
		'reset_msg' => esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'blogme' ),
	);

	wp_localize_script( 'ostrich-blog-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'blogme_customize_control_js' );
