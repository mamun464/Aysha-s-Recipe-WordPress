<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogme 
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
 
<body <?php body_class('align-logo-center'); ?>>

<?php do_action( 'wp_body_open' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogme' ); ?></a>
    
    <div class="menu-overlay"></div>
    <?php if ( get_theme_mod( 'blogme_topbar' ) == true ): ?>
        <div id="top-navigation" class="relative">
            <div class="wrapper">
                <button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false">
                    <svg viewBox="0 0 40 40" class="icon-menu">
                        <rect y="7" width="40" height="2"></rect>
                        <rect y="19" width="40" height="2"></rect>
                        <rect y="31" width="40" height="2"></rect>
                    </svg>
                    <svg viewBox="0 0 612 612" class="icon-close">
                        <polygon points="612,36.004 576.521,0.603 306,270.608 35.478,0.603 0,36.004 270.522,306.011 0,575.997 35.478,611.397 
                        306,341.411 576.521,611.397 612,575.997 341.459,306.011"></polygon>
                    </svg>
                    <span class="menu-label"><?php esc_html_e( 'Top Menu', 'blogme' ); ?></span>
                </button><!-- .menu-toggle -->

                <nav id="secondary-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
                   
                    <ul id="secondary-menu" class="menu nav-menu" aria-expanded="false">
                        <?php if (  has_nav_menu('social') ): ?>
                            <?php if ( get_theme_mod( 'blogme_topbar_social_menu' ) == true ): ?>
                                <li class="social-menu-item">
                                    <?php 
                                        wp_nav_menu( array(
                                            'theme_location'  => 'social',
                                            'menu_class'      => 'social-icons',
                                            'container_class' => 'social-menu',
                                            'depth'           => 1,
                                            'link_before'     => '<span class="screen-reader-text">',
                                            'link_after'      => '</span>' . blogme_get_svg( array( 'icon' => 'chain' ) ),
                                        ) );
                                    ?>
                                </li>

                            <?php endif ?>
                            <?php elseif( current_user_can( 'edit_theme_options' ) ): ?>
                                <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php echo esc_html__( 'Add a menu', 'blogme' );?></a></li>

                        <?php endif ?>
                        
                    </ul>
                    
        
                    <div class="icon-wrapper">
                        <?php if ( get_theme_mod( 'blogme_topbar_search' ) == true ): ?>
                            <?php get_search_form( $echo = true ); ?>  
                        <?php endif ?>
                                          
                    </div><!-- .icon-wrapper -->
                </nav><!-- .main-navigation-->
            </div><!-- .wrapper -->
        </div><!-- #top-navigation -->

    <?php endif ?>

    <?php get_template_part( 'template-parts/header' );  ?>
    
	<div id="content" class="site-content">
