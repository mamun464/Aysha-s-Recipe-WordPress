
<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Blogme 
 */

// Get the content type.
$hero_slider = get_theme_mod( 'blogme_hero_slider', 'post' );
$hero_slider_num    = 3;
// Bail if the section is disabled.
if ( 'disable' === $hero_slider ) {
    return;
}

// Query if the content type is either post or page.
if (  in_array( $hero_slider, array( 'post', 'page' ) ) ) {
    $content_id = array();
    if ( 'post' === $hero_slider ) {
        for ( $i=1; $i <= $hero_slider_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_hero_slider_{$hero_slider}_" . $i );
            } 
    }else {
        for ( $i=1; $i <= $hero_slider_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_hero_slider_{$hero_slider}_" . $i );
        }
    }
    $args = array(
        'post_type' => $hero_slider,
        'post__in' => (array)$content_id,   
        'orderby'   => 'post__in',
        'posts_per_page' => absint( $hero_slider_num ),
        'ignore_sticky_posts' => true,
    );

} else {
    $cat_content_id = get_theme_mod( 'blogme_hero_slider_cat' );
    $args = array(
        'cat' => $cat_content_id,   
        'posts_per_page' =>  absint( $hero_slider_num ),
    );
}
?>
   <div id="hero-slider" class="wrapper page-section" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>
    <?php for ($i=1; $i <= $hero_slider_num ; $i++) { 
        $category = get_cat_name( get_theme_mod( 'blogme_hero_slider_cat_'.$i ) );
        $category_link = get_category_link( get_theme_mod( 'blogme_hero_slider_cat_'.$i ) );
        $category_image = get_theme_mod( 'blogme_category_image_'.$i );
    ?>

         <article style="background-image: url('<?php echo esc_url( $category_image ) ?>');">
            <?php if ( get_theme_mod( 'blogme_hero_slider_overlay' ) == true ): ?>
                <div class="overlay"></div>
            <?php endif ?>
            <div class="wrapper">
                <div class="hero-slider-wrapper">
                    <h4 class="sub-title"> <?php echo count( get_posts( array('category' => get_theme_mod( 'blogme_hero_slider_cat_'.$i )) ) ) ?> <?php echo esc_html__( 'Posts', 'blogme' ) ?></h4>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php echo esc_url( $category_link ); ?>"> <?php echo esc_html( $category ); ?> </a></h2>
                    </header>

               
                </div><!-- .hero-slider-wrapper -->
            </div><!-- .wrapper -->
        </article>
        <?php   }    ?>

</div><!-- #hero-slider -->