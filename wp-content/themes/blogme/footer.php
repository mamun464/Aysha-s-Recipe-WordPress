<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogme 
 */

$default = blogme_get_default_mods();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- supports col-1, col-2, col-3 and col-4 -->
		<!-- supports unequal-width and equal-width -->
		<?php  
		$count = 0;
		for ( $i=1; $i <=4 ; $i++ ) { 
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$count++;
			}
		}
		
		if ( 0 !== $count ) : ?>
			<div class="footer-widgets-area page-section col-<?php echo esc_attr( $count );?>">
			    <div class="wrapper">
					<?php 
					for ( $j=1; $j <=4; $j++ ) { 
						if ( is_active_sidebar( 'footer-' . $j ) ) {
			    			echo '<div class="hentry">';
							dynamic_sidebar( 'footer-' . $j ); 
			    			echo '</div>';
						}
					}
					?>
				</div><!-- .wrapper -->
			</div><!-- .footer-widget-area -->

		<?php endif;
		 $blogme_search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $copyright = str_replace( $blogme_search, $replace, get_theme_mod( 'blogme_copyright_txt', $default['blogme_copyright_txt'] ) );

			?>
		<?php if ( get_theme_mod( 'blogme_enable_footer_text', true ) ): ?>
			<div class="site-info">
				<!-- supports col-1 and col-2 -->
				<?php 

				?>
				<div class="wrapper">
					    <div class="site-info-wrapper">
					        <?php echo wp_kses_post(  $copyright ); ?>
					        <?php echo wp_kses_post(  get_theme_mod( 'blogme_power_by_txt', $default['blogme_power_by_txt'] ) ); ?>
					    </div><!-- .footer-copyright -->				    
				</div><!-- .wrapper -->    
				
			</div><!-- .site-info -->
		<?php endif ?>
			
	</footer><!-- #colophon -->
	
	<?php  
	$backtop = get_theme_mod( 'blogme_back_to_top_enable', true );
	if ( $backtop ) { ?>
		<div class="backtotop"><?php echo blogme_get_svg( array( 'icon' => 'up-arrow' ) ); ?></div>
	<?php }	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
