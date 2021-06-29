<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blogme 
 */

get_header(); 
$banner = get_theme_mod( 'blogme_banner_type', 'layout-1' );

?>
     <div id="page-site-header" class="relative <?php echo $banner; ?>" >
        <div class="wrapper">
            <?php if (  $banner == 'layout-1' ): ?>
                <img src="<?php echo esc_url( header_image() ); ?>">
            <?php endif ?>
            <?php if (  $banner !== 'layout-1' ): ?>
                <div class="banner-content">
            <?php endif ?>
                <header class="page-header ">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blogme' ); ?></h1>
                </header>
                <?php  
                $breadcrumb_enable = get_theme_mod( 'blogme_breadcrumb_enable', true );
                if ( $breadcrumb_enable ) : 
                    ?>
                    <div id="breadcrumb-list" >
                            <?php echo blogme_breadcrumb( array( 'show_on_front'   => false, 'show_browse' => false ) ); ?>
                    </div><!-- #breadcrumb-list -->
                <?php endif; ?>
            <?php if (  $banner !== 'layout-1' ): ?>
                </div>
            <?php endif ?>
            
        </div><!-- .wrapper -->
    </div><!-- #page-site-header -->

	<div id="inner-content-wrapper" class="wrapper page-section">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="single-wrapper">

					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'blogme' ); ?></p>

					<?php get_search_form(); ?>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
        
    </div><!-- #inner-content-wrapper-->

<?php
get_footer();
