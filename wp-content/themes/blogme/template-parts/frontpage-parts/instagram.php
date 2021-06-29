<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Blogme 
 */

// Get the content type.
$instagram = get_theme_mod( 'blogme_instagram', 'post' );
$instagram_num  = 5;
// Bail if the section is disabled.
if ( 'disable' === $instagram ) {
  return;
}

// Query if the content type is either post or page.
if (  in_array( $instagram, array( 'post', 'page' ) ) ) {
  $content_id = array();
  if ( 'post' === $instagram ) {
        for ( $i=1; $i <= $instagram_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_instagram_{$instagram}_" . $i );
      } 
  }else {
        for ( $i=1; $i <= $instagram_num; $i++ ) { 
            $content_id[] = get_theme_mod( "blogme_instagram_{$instagram}_" . $i );
    }
  }
  $args = array(
      'post_type' => $instagram,
      'post__in' => (array)$content_id,   
      'orderby'   => 'post__in',
      'posts_per_page' => absint( $instagram_num ),
      'ignore_sticky_posts' => true,
  );

} else {
  $cat_content_id = get_theme_mod( 'blogme_instagram_cat' );
    $args = array(
        'cat' => $cat_content_id,   
        'posts_per_page' =>  absint( $instagram_num ),
    );
}
?>
<div id="insta-slider" >
   <div class="section-content gallery-popup" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }'>
        <?php
       
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
                $thumbnail = !empty( get_the_post_thumbnail_url( ) ) ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri(). '/assets/img/no-featured-image.jpg';
        ?>
 
            <article>
               <div class="featured-image">
                    <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'full' ) ) ; ?>">
                    <div class="gallery-border"></div>
                    <div class="overlay"></div>
                    <a class="popup" href="<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'full' ) ) ; ?>"><i class="fa fa-search-plus"></i></a>
                    <a class="popup" href="<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'full' ) ) ; ?>"></a>
                </div><!-- .featured-image -->
            </article> 
        <?php  }
          wp_reset_postdata();
        }
              
        ?>

   </div><!-- .col-6 -->  
</div>