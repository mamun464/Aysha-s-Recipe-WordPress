<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blogme 
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function blogme_font_choices() {
    $font_family_arr = array(
            'Josefin+Sans'         => esc_html__( 'Default', 'blogme' ),
            'Oxygen'   => esc_html__( 'Oxygen', 'blogme' ),
            'Titillium+Web'   => esc_html__( 'Titillium Web', 'blogme' ),
            'Itim'   => esc_html__( 'Itim', 'blogme' ),
            'Work+Sans'   => esc_html__( 'Work Sans', 'blogme' ),
    );
    return $font_family_arr;
}
function blogme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Header color scheme 
	$theme_color_scheme = get_theme_mod( 'blogme_theme_color_scheme');
	$classes[] =  esc_attr( $theme_color_scheme );

	// When  color scheme is light or dark.
	$color_scheme = get_theme_mod( 'blogme_color_scheme', 'default' );
	$classes[] = esc_attr( $color_scheme ) . '-version';
	
	// When global archive layout is checked.
	if ( is_archive() || blogme_is_latest_posts() || is_404() || is_search() ) {
		$archive_sidebar = get_theme_mod( 'blogme_archive_sidebar', 'right' ); 
		$classes[] = esc_attr( $archive_sidebar ) . '-sidebar';
	} else if ( is_single() ) { // When global post sidebar is checked.
    	$blogme_post_sidebar_meta = get_post_meta( get_the_ID(), 'ostrich-blog-select-sidebar', true );
    	if ( ! empty( $blogme_post_sidebar_meta ) ) {
			$classes[] = esc_attr( $blogme_post_sidebar_meta ) . '-sidebar';
    	} else {
			$global_post_sidebar = get_theme_mod( 'blogme_global_post_layout', 'right' ); 
			$classes[] = esc_attr( $global_post_sidebar ) . '-sidebar';
    	}
	} elseif ( blogme_is_frontpage_blog() || is_page() ) {
		if ( blogme_is_frontpage_blog() ) {
			$page_id = get_option( 'page_for_posts' );
		} else {
			$page_id = get_the_ID();
		}

    	$blogme_page_sidebar_meta = get_post_meta( $page_id, 'ostrich-blog-select-sidebar', true );
		if ( ! empty( $blogme_page_sidebar_meta ) ) {
			$classes[] = esc_attr( $blogme_page_sidebar_meta ) . '-sidebar';
		} else {
			$global_page_sidebar = get_theme_mod( 'blogme_global_page_layout', 'right' ); 
			$classes[] = esc_attr( $global_page_sidebar ) . '-sidebar';
		}
	}

    if ( get_theme_mod( 'blogme_make_menu_sticky', false ) ) {
        $classes[] = 'menu-sticky';
    }
    
	// Site layout classes
	$site_layout = get_theme_mod( 'blogme_site_layout', 'wide' );
	$classes[] = esc_attr( $site_layout ) . '-layout';


    $classes[] = 'third-design';

	return $classes;
}
add_filter( 'body_class', 'blogme_body_classes' );

function blogme_post_classes( $classes ) {
	if ( blogme_is_page_displays_posts() ) {
		// Search 'has-post-thumbnail' returned by default and remove it.
		$key = array_search( 'has-post-thumbnail', $classes );
		unset( $classes[ $key ] );
		
		$archive_img_enable = get_theme_mod( 'blogme_enable_archive_featured_img', true );

		if( has_post_thumbnail() && $archive_img_enable ) {
			$classes[] = 'has-post-thumbnail';
		} else {
			$classes[] = 'no-post-thumbnail';
		}
	}
  
	return $classes;
}
add_filter( 'post_class', 'blogme_post_classes' );

/**
 * Excerpt length
 * 
 * @since Blogme  1.0.0
 * @return Excerpt length
 */
function blogme_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}

	$length = get_theme_mod( 'blogme_archive_excerpt_length', 60 );
	return $length;
}
add_filter( 'excerpt_length', 'blogme_excerpt_length', 999 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blogme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blogme_pingback_header' );

/**
 * Get an array of post id and title.
 * 
 */
function blogme_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'blogme' ) );
	$args = array( 'numberposts' => -1, );
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$id = $post->ID;
		$title = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
    wp_reset_postdata();
}

/**
 * Get an array of cat id and title.
 * 
 */
function blogme_get_post_cat_choices() {
  $choices = array( '' => esc_html__( '--Select--', 'blogme' ) );
	$cats = get_categories();

	foreach ( $cats as $cat ) {
		$id = $cat->term_id;
		$title = $cat->name;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function blogme_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function blogme_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Posts page".
 */
function blogme_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Checks to see if the current page displays any kind of post listing.
 */
function blogme_is_page_displays_posts() {
	return ( blogme_is_frontpage_blog() || is_search() || is_archive() || blogme_is_latest_posts() );
}

/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Arguments to pass to Breadcrumb_Trail.
 * @return void
 */
function blogme_breadcrumb( $args = array() ) {
	$breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

	if ( ! is_object( $breadcrumb ) )
		$breadcrumb = new Breadcrumb_Trail( $args );

	return $breadcrumb->trail();
}

/**
 * Pagination in archive/blog/search pages.
 */
function blogme_posts_pagination() { 
	$archive_pagination = get_theme_mod( 'blogme_archive_pagination_type', 'numeric' );
	if ( 'disable' === $archive_pagination ) {
		return;
	}
	if ( 'numeric' === $archive_pagination ) {
		the_posts_pagination( array(
            'prev_text'          => blogme_get_svg( array( 'icon' => 'left-arrow' ) ),
            'next_text'          => blogme_get_svg( array( 'icon' => 'left-arrow' ) ),
        ) );
	} elseif ( 'older_newer' === $archive_pagination ) {
        the_posts_navigation( array(
            'prev_text'          => blogme_get_svg( array( 'icon' => 'left' ) ) . '<span>'. esc_html__( 'Older', 'blogme' ) .'</span>',
            'next_text'          => '<span>'. esc_html__( 'Newer', 'blogme' ) .'</span>' . blogme_get_svg( array( 'icon' => 'right' ) ),
        )  );
	}
}

function blogme_get_svg_by_url( $url = false ) {
	if ( ! $url ) {
		return false;
	}

	$social_icons = blogme_social_links_icons();

	foreach ( $social_icons as $attr => $value ) {
		if ( false !== strpos( $url, $attr ) ) {
			return blogme_get_svg( array( 'icon' => esc_attr( $value ) ) );
		}
	}
}

if ( ! function_exists( 'blogme_the_excerpt' ) ) :

  /**
   * Generate excerpt.
   *
   * @since 1.0.0
   *
   * @param int     $length Excerpt length in words.
   * @param WP_Post $post_obj WP_Post instance (Optional).
   * @return string Excerpt.
   */
  function blogme_the_excerpt( $length = 0, $post_obj = null ) {

    global $post;

    if ( is_null( $post_obj ) ) {
      $post_obj = $post;
    }

    $length = absint( $length );

    if ( 0 === $length ) {
      return;
    }

    $source_content = $post_obj->post_content;

    if ( ! empty( $post_obj->post_excerpt ) ) {
      $source_content = $post_obj->post_excerpt;
    }

    $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
    $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
    return $trimmed_content;

  }

endif;

function blogme_get_section_content( $section_name, $content_type, $content_count ){

    $content = array();


    if (  in_array( $content_type, array( 'post', 'page' ) ) ) {
    $content_id = array();
    if ( 'post' === $content_type ) {
        for ( $i=1; $i <= $content_count; $i++ ) { 
            $content_id[] = get_theme_mod( "smooth_blog_pro_{$section_name}_{$content_type}_" . $i );
            } 
    }else {
        for ( $i=1; $i <= $content_count; $i++ ) { 
            $content_id[] = get_theme_mod( "smooth_blog_pro_{$section_name}_{$content_type}_" . $i );
        }
    }
    $args = array(
        'post_type' => $content_type,
        'post__in' => (array)$content_id,   
        'orderby'   => 'post__in',
        'posts_per_page' => absint( $content_count ),
        'ignore_sticky_posts' => true,
    );

    } else {
        $cat_content_id = get_theme_mod( "smooth_blog_pro_{$section_name}_{$content_type}" );
        $args = array(
            'cat' => $cat_content_id,   
            'posts_per_page' =>  absint( $content_count ),
        );
    }

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        $i = 0;
        while ( $query->have_posts() ) {
            $query->the_post();

            $content[$i]['id'] = get_the_id();
            $content[$i]['title'] = get_the_title();
            $content[$i]['url'] = get_the_permalink();
            $content[$i]['content'] = get_the_content();
            $i++;
        }
        wp_reset_postdata();
    }

    return $content;
}

// Add auto p to the palces where get_the_excerpt is being called.
add_filter( 'get_the_excerpt', 'wpautop' );


function blogme_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogme' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}


function blogme_return_social_icon( $social_link ) {
    // Get supported social icons.
    $social_icons = blogme_social_links_icons();

    // Check in the URL for the url in the array.
    foreach ( $social_icons as $attr => $value ) {
        if ( false !== strpos( $social_link, $attr ) ) {
            return blogme_get_svg( array( 'icon' => esc_attr( $value ) ) );
        }
    }
}