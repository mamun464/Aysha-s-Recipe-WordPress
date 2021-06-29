<?php
// Homepage sort section
$wp_customize->add_section(
	'blogme_homepage_section_sort',
	array(
		'title' => esc_html__( 'Sort sections', 'blogme' ),
		'panel' => 'blogme_home_panel',
	)
);

// Homepage sections sortable.
$wp_customize->add_setting(	
	'blogme_sort_home_sections',
	array(
		'sanitize_callback' => 'blogme_sanitize_sort',
		'default'			=> array(),

	)
);

$wp_customize->add_control( 
	new Blogme_Customize_Control_Sort_Sections( 
	$wp_customize,
	'blogme_sort_home_sections',
		array(
			'section'		=> 'blogme_homepage_section_sort',
			'label'			=> esc_html__( 'Sort sections', 'blogme' ),
			'choices'  => array(
	             
	            'featured-slider'    => array(
		            	'name' => esc_html__( 'Featured Slider', 'blogme' ),
		        ),

		        'hero-slider'    => array(
		            	'name' => esc_html__( 'Hero Slider', 'blogme' ),
		        ),
		        
		         	  
		        'popular-post'    => array(
		            	'name' => esc_html__( 'Popuar Post', 'blogme' ),
		        ),  

		        'banner'    => array(
		            	'name' => esc_html__( 'Banner', 'blogme' ),
		        ),  
     

		        'latest-post'    => array(
		            	'name' => esc_html__( 'Latest Post', 'blogme' ),
		        ),  


		        'blog'    => array(
		            	'name' => esc_html__( 'Blog', 'blogme' ),
		        ),  


		        'instagram'    => array(
		            	'name' => esc_html__( 'Instagram', 'blogme' ),
		        ), 
	        ),
		)
	)
);
