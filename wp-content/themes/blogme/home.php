<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogme 
 */

get_header(); 
$banner = get_theme_mod( 'blogme_banner_type', 'layout-1' );
?>
 <div id="page-site-header" class="relative  <?php echo $banner; ?>" >
    <div class="wrapper">
 	    <img src="<?php echo esc_url( header_image() ); ?>">
        <?php if (  $banner !== 'layout-1' ): ?>
            <div class="banner-content">
        <?php endif ?>
            <header class="page-header">
                <h2 class="page-title">
                    <?php 
                    if ( blogme_is_latest_posts() ) {
                        echo esc_html( get_theme_mod( 'blogme_your_latest_posts_title', esc_html__( 'Blogs', 'blogme' ) ) ); 
                    } elseif( blogme_is_frontpage_blog() ) {
                        single_post_title();
                    } 
                    ?>
                </h2>
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
 <div id="inner-content-wrapper" class="page-section">
        <div class="wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
              
                    <div id="ostrich-blog-infinite-scroll" class="archive-blog-wrapper list-layout clear">

                        <?php
                        if ( have_posts() ) :

                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_format() );

                            endwhile;

                            wp_reset_postdata();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>
                    </div><!-- .posts-wrapper -->
                    <?php blogme_posts_pagination(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->
            
            <?php get_sidebar(); ?>

        </div>
    </div>

<?php
get_footer();
