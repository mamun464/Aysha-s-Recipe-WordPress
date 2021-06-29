<?php
/**
 * 
 *
 * @see blogme_custom_header_setup().
 */
function blogme_header_text_style() {
	// If we get this far, we have custom styles. Let's do this.
	$header_text_display = get_theme_mod( 'blogme_header_text_display' );
	?>
	<style type="text/css">

	<?php if ( !empty( get_theme_mod( 'blogme_h1_h6_font_option' ) ) ): ?>
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		.btn,
		.site-title,
		.post-navigation a, 
		.section-title,
		.posts-navigation a,
		.single-post-wrapper span.tags-links,
		.single-post-wrapper span.cat-links,
		.blog-posts-wrapper .cat-links a,
		.blog-posts-wrapper .cat-links,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a {
			font-family: <?php echo esc_attr(str_replace("+", " ", get_theme_mod('blogme_h1_h6_font_option'))); ?>;
		}
	<?php endif; ?>	
			
	<?php if ( !empty( get_theme_mod( 'blogme_body_font_option' ) ) ): ?>
			body,
			.cat-links a, .posted-on a,
			.main-navigation a,
			.post-categories a,
			.single-post-wrapper span.tags-links a,
			.single-post-wrapper span.cat-links a,
			.blog-posts-wrapper span.cat-links,
			.blog-posts-wrapper span.cat-links a,
			.blog-posts-wrapper span.cat-links,
			.blog-posts-wrapper span.cat-links a {
				font-family: <?php echo esc_attr(str_replace("+", " ", get_theme_mod('blogme_body_font_option'))); ?>;
		}
	<?php endif; ?>	

	.site-title a{
		color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
	}
	.site-description {
		color: <?php echo esc_attr( get_theme_mod( 'blogme_header_tagline', '#2e2e2e' ) ); ?>;
	}

	<?php if ( get_theme_mod( 'blogme_topbar_menu' ) == false ): ?>
		.main-navigation .social-menu-item:after {
		    display: none;
		}
	<?php endif ?>

	<?php if ( get_theme_mod( 'blogme_topbar_search' ) == false ): ?>
		#top-navigation .icon-wrapper span a:after {
		    display: none;
		}
	<?php endif ?>



	/*header styles*/

	<?php if ( get_theme_mod( 'blogme_header_style' ) == 'header-2' ): ?>
		.site-branding{
			width: <?php echo ( get_theme_mod( 'blogme_header_display', 'ads' ) == 'none' ) ? '100%' : '40%'; ?>;
			<?php echo ( get_theme_mod( 'blogme_header_display', 'ads' ) == 'none' ) ? "text-align:center" : ''; ?>;
		}
	
		#masthead nav {
			border-top: 2px solid #000;
			width: 100%;
		} 
		
		@media screen and (min-width: 1024px){
		.main-navigation ul.nav-menu{
				float: none;
			}
		}
		.header-2 svg.icon-facebook{
			
		}
	<?php endif ?>


	<?php if ( !is_active_sidebar( 'blog-sidebar' ) ) { ?>
		.second-design.home .archive-blog-wrapper article:nth-child(2n+1) {
		    clear: none;
		}
		.second-design.home .archive-blog-wrapper article {
    		width: 33.33%;
    	}	
	<?php } ?>	

	<?php if ( !empty(get_theme_mod( 'blogme_header_media_video_code' ) ) ): ?>
		#page-site-header {
			padding: 0px;
		}

		#page-site-header iframe{
			top: 0px;
		    left: 0px;
		    right: 0px;
		    width: 100%;
		    max-height: 600px;
		    border: none;
		    height: -webkit-fill-available;
		}

		#page-site-header .wrapper{
			top:80%;
		}
		#page-site-header .page-title{
			position: relative;
		}
		#page-site-header #breadcrumb-list{
			position: relative;
		}
	<?php endif ?>	

	<?php if ( get_theme_mod( 'blogme_banner_type' ) == 'layout-2'  ): ?>
		#page-site-header.layout-2 .wrapper{
			background-image: url( '<?php echo esc_url( get_header_image() ) ?>' );
			padding: 300px 5% 0px 5%;
			background-size: cover;
		}
		.banner-content {
		    position: relative;
		    background: #ffffffb8;
		    background-size: cover;
		    padding: 10px 0px 20px 0px;
		}

		.trail-items li {
		    font-size: 20px;
		    color: #fff;
		}
	<?php endif ?>	

	
	</style>

	<?php
}
add_action( 'wp_head', 'blogme_header_text_style' );