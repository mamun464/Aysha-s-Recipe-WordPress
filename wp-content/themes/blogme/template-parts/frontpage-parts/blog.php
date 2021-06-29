<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Blogme 
 */
// Get the content type.
$blog = get_theme_mod( 'blogme_blog', 'post' );
$blog_num = 6;
// Bail if the section is disabled.
if ( 'disable' === $blog ) {
    return;
}
if ( $blog !== 'recent' ) {
    // Query if the content type is either post or page.
    if (  in_array( $blog, array( 'post', 'page' ) ) ) {
        $content_id = array();
        if ( 'post' === $blog ) {
            for ( $i=1; $i <= $blog_num; $i++ ) {
                $content_id[] = get_theme_mod( "blogme_blog_{$blog}_" . $i );
                }
        }else {
            for ( $i=1; $i <= $blog_num; $i++ ) {
                $content_id[] = get_theme_mod( "blogme_blog_{$blog}_" . $i );
            }
        }
        $args = array(
            'post_type' => $blog,
            'post__in' => (array)$content_id,
            'orderby'   => 'post__in',
            'posts_per_page' => absint( $blog_num ),
            'ignore_sticky_posts' => true,
        );
    } else {
        $cat_content_id = get_theme_mod( 'blogme_blog_cat' );
        $args = array(
            'cat' => $cat_content_id,
            'posts_per_page' =>  absint( $blog_num ),
        );
    }
}
?>

<div id="inner-content-wrapper" class="page-section">
    <div class="wrapper">
        <div class="section-header">
           <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'blogme_blog_title', __('More Articles', 'blogme') ) ); ?></h2>
        </div><!-- .section-header -->
        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
            <div id="primary" class="content-area">
        <?php } ?>
            <main id="main" class="site-main" role="main">
                <div class="archive-blog-wrapper clear">
                <?php
                if ( $blog == 'recent' ) {
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' =>  absint( $blog_num ),
                    );
                }
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                         $banner_thumbnail = !empty( get_the_post_thumbnail_url( ) ) ? get_the_post_thumbnail_url( get_the_id(), 'medium-large' ) : get_template_directory_uri(). '/assets/img/no-featured-image.jpg';
                    ?>
                    <article class="has-post-thumbnail">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $banner_thumbnail ) ; ?>');">
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
                        </div><!-- .featured-image -->
                        <div class="entry-container">
                            <span class="cat-links">
                                <?php the_category( '', '' ); ?>
                            </span>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <div class="entry-content">
                                <p>
                                    <?php echo esc_html(wp_trim_words( get_the_content(), 60, '  ...' )); ?>
                                </p>
                            </div><!-- .entry-content -->
                            <div class="entry-meta">
                                <?php blogme_posted_on() ; ?>
                            </div><!-- .entry-meta -->
                        </div><!-- .entry-container -->
                    </article>
                    <?php
                    }
                }
                wp_reset_postdata();
                ?>
                </div><!-- .archive-blog-wrapper -->
                <?php if ( get_theme_mod( 'blogme_blog_btn_url', '' ) !== '' ): ?>
                    <div class="read-more">
                        <a href="<?php echo esc_url( get_theme_mod( 'blogme_blog_btn_url' ) ) ;?>" class="btn">
                            <?php echo esc_html( get_theme_mod( 'blogme_blog_btn_title', __('Load More', 'blogme') ) ); ?>
                        </a>
                    </div>
                <?php endif ?>
            </main><!-- #main -->
            <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
                </div><!-- #primary -->
            <?php } ?>
        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
        <aside id="secondary" class="widget-area" role="complementary">
            <?php
                dynamic_sidebar( 'blog-sidebar' );
            ?>
        </aside><!-- #secondary -->
    <?php } ?>
    </div><!-- .wrapper -->
</div><!-- #inner-content-wrapper-->
