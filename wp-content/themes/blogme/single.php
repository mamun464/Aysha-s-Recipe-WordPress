<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		            <?php
					if ( is_singular() ) :
						the_title( '<h1 class="page-title">', '</h1>' );
					else :
						the_title( '<h2 class="page-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif; ?>
		        </header>
		        <?php  
		        $breadcrumb_enable = get_theme_mod( 'blogme_breadcrumb_enable', true );
		        if ( $breadcrumb_enable ) : 
		            ?>
		            <div id="breadcrumb-list">
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
					<?php while ( have_posts() ) : the_post(); ?>
                		<div class="single-wrapper">
							<?php get_template_part( 'template-parts/content', 'single' ); ?>
						</div>
						
						<?php
						$post_pagination_enable = get_theme_mod( 'blogme_enable_single_pagination', true );
						if ( $post_pagination_enable ) {
							the_post_navigation( array(
									'prev_text'          => blogme_get_svg( array( 'icon' => 'left' ) ) . '<span>%title</span>',
									'next_text'          => '<span>%title</span>' . blogme_get_svg( array( 'icon' => 'right' ) ),
								) );
						}
						$single_comment_enable = get_theme_mod( 'blogme_enable_single_comment', true );
						if ( $single_comment_enable ) {
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						}

					endwhile; // End of the loop.
					?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

    </div><!-- #inner-content-wrapper-->
<?php
get_footer();
