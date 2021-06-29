<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Blogme 
 */

// Get the content type.
$banner = get_theme_mod( 'blogme_banner', 'post' );
// Bail if the section is disabled.
if ( 'disable' === $banner ) {
	return;
}
$banner_count    = 6;

// Query if the content type is either post or page.
if (  in_array( $banner, array( 'post', 'page' ) ) ) {
	$content_id = array();
	if ( 'post' === $banner ) {
        for ( $i=1; $i <= $banner_count; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_banner_{$banner}_" . $i );
			} 
	}else {
        for ( $i=1; $i <= $banner_count; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_banner_{$banner}_" . $i );
		}
	}
	$args = array(
	    'post_type' => $banner,
	    'post__in' => (array)$content_id,   
	    'orderby'   => 'post__in',
	    'posts_per_page' => $banner_count,
	    'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'blogme_banner_cat' );
    $args = array(
        'cat' => $cat_content_id,   
        'posts_per_page' => $banner_count,
    );
}
?>

<div id="posts-banner" class="relative">
    <div class="wrapper">
        <div class="grid">
        <?php
     
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            $i = 1;
        	while ( $query->have_posts() && $i <= $banner_count ) {
        		$query->the_post();
                $banner_thumbnail = !empty( get_the_post_thumbnail_url( ) ) ? get_the_post_thumbnail_url( get_the_id(), 'medium-large' ) : get_template_directory_uri(). '/assets/img/no-featured-image.jpg';
        ?>
			<article class="grid-item ">
                <div class="featured-image" style="background-image: url(<?php echo esc_url( $banner_thumbnail ); ?>);">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
                </div>
                <div class="entry-container">
                	<span class="cat-links">
                		<?php the_category( '', '' ) ?>
                	</span>
                    
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-meta">
                        <?php blogme_posted_on() ; ?>
                    </div><!-- .entry-meta -->
                </div><!-- .entry-container -->
            </article>

        <?php $i++;	}
        	wp_reset_postdata();
        } ?>
		</div><!-- .grid-item -->
    </div><!-- .wrapper -->
</div>
