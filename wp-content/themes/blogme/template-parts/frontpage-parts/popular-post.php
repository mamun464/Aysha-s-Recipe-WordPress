<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Blogme 
 */

// Get the content type.
$popular_post = get_theme_mod( 'blogme_popular_post', 'post' );
$popular_post_num	= 6;
// Bail if the section is disabled.
if ( 'disable' === $popular_post ) {
	return;
}

// Query if the content type is either post or page.
if (  in_array( $popular_post, array( 'post', 'page' ) ) ) {
	$content_id = array();
	if ( 'post' === $popular_post ) {
        for ( $i=1; $i <= $popular_post_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_popular_post_{$popular_post}_" . $i );
			} 
	}else {
        for ( $i=1; $i <= $popular_post_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_popular_post_{$popular_post}_" . $i );
		}
	}
	$args = array(
	    'post_type' => $popular_post,
	    'post__in' => (array)$content_id,   
	    'orderby'   => 'post__in',
	    'posts_per_page' => absint( $popular_post_num ),
	    'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'blogme_popular_post_cat' );
    $args = array(
        'cat' => $cat_content_id,   
        'posts_per_page' =>  absint( $popular_post_num ),
    );
}
?>
<div id="blog-popular-posts" class="relative page-section same-background">
    <div class="wrapper">
       <div class="section-header">
           <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'blogme_popular_post_title', __('Popular Posts', 'blogme') ) ); ?></h2>
        </div><!-- .section-header -->

        <div class="col-2 clear">
            <?php
       
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $banner_thumbnail = !empty( get_the_post_thumbnail_url( ) ) ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri(). '/assets/img/no-featured-image.jpg';
            ?>
            <article>
                <div class="popular-post-item">
                    <div class="blog-featured-image">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $banner_thumbnail ); ?>"></a>
                    </div><!-- .blog-featured-image -->

                    <div class="entry-container">
                        <span class="cat-links">
                            <?php the_category( '', '' ) ?>                             
                        </span><!-- .cat-links -->

                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>

                        <?php blogme_posted_on(); ?>

                        <div class="entry-content">
                            <p><?php echo esc_html( wp_trim_words( get_the_content(), 30 ) ) ?></p>
                        </div>

                        <?php if ( !empty(get_theme_mod( 'blogme_popular_post_btn_title', __('Read More', 'blogme') )) ): ?>
                        <div class="read-more">
                            <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html( get_theme_mod( 'blogme_popular_post_btn_title', __('Read More', 'blogme') ) ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- .read-more  -->    
                    <?php endif ?>
                    </div><!-- .entry-container -->
                </div><!-- .popular-post-item -->
            </article>
            <?php }
                wp_reset_postdata();
            }
                        
            ?>
        </div><!-- .blog-section-content -->
    </div><!-- .wrapper -->
</div><!-- #blog-popular-posts -->

