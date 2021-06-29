<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Blogme 
 */

// Get the content type.
$latest_post = get_theme_mod( 'blogme_latest_post', 'post' );
$latest_post_num    = 6;
// Bail if the section is disabled.
if ( 'disable' === $latest_post ) {
    return;
}

// Query if the content type is either post or page.
if (  in_array( $latest_post, array( 'post', 'page' ) ) ) {
    $content_id = array();
    if ( 'post' === $latest_post ) {
        for ( $i=1; $i <= $latest_post_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_latest_post_{$latest_post}_" . $i );
            } 
    }else {
        for ( $i=1; $i <= $latest_post_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_latest_post_{$latest_post}_" . $i );
        }
    }
    $args = array(
        'post_type' => $latest_post,
        'post__in' => (array)$content_id,   
        'orderby'   => 'post__in',
        'posts_per_page' => absint( $latest_post_num ),
        'ignore_sticky_posts' => true,
    );

} else {
    $cat_content_id = get_theme_mod( 'blogme_latest_post_cat' );
    $args = array(
        'cat' => $cat_content_id,   
        'posts_per_page' =>  absint( $latest_post_num ),
    );
}
?>
<div id="blog-latest-posts" class="relative page-section">
    <div class="wrapper">
        <div class="section-header">
           <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'blogme_latest_post_title', __('Latest Posts', 'blogme') ) ); ?></h2>
        </div><!-- .section-header -->

        <div class="section-content clear col-3">
            <?php $query = new WP_Query( $args );
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $thumbnail = !empty( get_the_post_thumbnail_url( ) ) ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri(). '/assets/img/no-featured-image.jpg';
            ?>
            <article>
                <div class="blog-post-wrapper">
                    <span class="cat-links">
                       <?php the_category( '', '' ) ?>                            
                    </span><!-- .cat-links -->

                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>

                    <span class="posted-on">
                        <?php blogme_posted_on(); ?>
                    </span>

                    <div class="featured-image">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $thumbnail ) ; ?>"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-content">
                        <p><?php echo esc_html( wp_trim_words( get_the_content(), 30 ) ) ?></p>
                    </div><!-- .entry-content -->

                    <?php if ( !empty(get_theme_mod( 'blogme_latest_post_btn_title', __('Read More', 'blogme') )) ): ?>
                        <div class="read-more">
                            <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html( get_theme_mod( 'blogme_latest_post_btn_title', __('Read More', 'blogme') ) ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- .read-more  -->    
                    <?php endif ?>
                    
                </div><!-- .blog-post-wrapper -->
            </article>
            <?php   }
                wp_reset_postdata();
            }
                        
            ?>
        </div><!-- .section-content -->
    </div><!-- .wrapper -->
</div><!-- #bog-latest-posts -->
