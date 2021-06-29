<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blogme 
 */

get_header(); 
$banner = get_theme_mod( 'blogme_banner_type', 'layout-1' );
?>
		
	<div id="page-site-header" class="relative <?php echo $banner; ?>">	
		    <div class="wrapper">
				<?php if (  $banner == 'layout-1' ): ?>
	        		<img src="<?php echo esc_url( header_image() ); ?>">
	        	<?php endif ?>
	        	<?php if (  $banner !== 'layout-1' ): ?>
	                <div class="banner-content">
	            <?php endif ?>
	            	<header class="page-header">
			            <h1 class="page-title"><?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'blogme' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
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
