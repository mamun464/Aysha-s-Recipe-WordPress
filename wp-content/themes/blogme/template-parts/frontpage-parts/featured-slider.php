
<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Blogme 
 */

// Get the content type.
$featured_slider = get_theme_mod( 'blogme_featured_slider', 'post' );
$featured_slider_num	= 3;
// Bail if the section is disabled.
if ( 'disable' === $featured_slider ) {
	return;
}

// Query if the content type is either post or page.
if (  in_array( $featured_slider, array( 'post', 'page' ) ) ) {
	$content_id = array();
	if ( 'post' === $featured_slider ) {
        for ( $i=1; $i <= $featured_slider_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_featured_slider_{$featured_slider}_" . $i );
			} 
	}else {
        for ( $i=1; $i <= $featured_slider_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_featured_slider_{$featured_slider}_" . $i );
		}
	}
	$args = array(
	    'post_type' => $featured_slider,
	    'post__in' => (array)$content_id,   
	    'orderby'   => 'post__in',
	    'posts_per_page' => absint( $featured_slider_num ),
	    'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'blogme_featured_slider_cat' );
    $args = array(
        'cat' => $cat_content_id,   
        'posts_per_page' =>  absint( $featured_slider_num ),
    );
}
?>
	<div id="featured-slider" class="wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows": true, "autoplay": false, "draggable": true, "fade": false }'>
 <?php
       
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
        	while ( $query->have_posts() ) {
        		$query->the_post();
                $slider_thumbnail = !empty( get_the_post_thumbnail_url( ) ) ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri(). '/assets/img/no-featured-image.jpg';
        ?>
         <article style="background-image: url('<?php echo esc_url( $slider_thumbnail ) ?>');">
         	<?php if ( get_theme_mod( 'blogme_featured_slider_overlay' ) == true ): ?>
         		<div class="overlay"></div>
         	<?php endif ?>
	        <div class="wrapper">
	            <div class="featured-slider-wrapper">
	            	<div class="entry-meta">
	                    <span class="cat-links">
	                        <?php the_category( '', '' ) ?>
	                    </span><!-- .cat-links -->
	                </div>
	                <h4 class="sub-title"></h4>
	                <header class="entry-header">
	                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
	                </header>
	            <div class="entry-content">
	                <p><?php echo esc_html(wp_trim_words( get_the_content(), 10, '' )); ?></p>
	            </div><!-- .entry-content -->

	            <?php if ( get_theme_mod( 'blogme_featured_slider_btn_label', esc_html__( 'Read More', 'blogme' ) ) !== ""  ): ?>
	            	<div class="read-more">
		                <a href="<?php the_permalink(); ?>" class="btn" tabindex="-1"><?php echo esc_html( get_theme_mod( 'blogme_featured_slider_btn_label', esc_html__( 'Read More', 'blogme' ) ) ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
		            </div><!-- .read-more -->	
	            <?php endif ?>
	            
	            </div><!-- .featured-slider-wrapper -->
	        </div><!-- .wrapper -->
	    </article>
 		<?php	}
        	wp_reset_postdata();
        }
        			
        ?>

</div><!-- #featured-slider -->