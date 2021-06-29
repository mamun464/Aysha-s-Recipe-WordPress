<?php
// Check if avatar is available
$email = get_the_author_meta( 'user_email' );
if (get_avatar( $email, 80 ) != '') {
	$author_avatar = asalah_filter_lazyload_images(get_avatar( $email, 80));
}
$author_profile_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
 ?>
<div class="author_box author-info<?php if (isset($author_avatar)) { echo ' has_avatar';}?>">

	<?php if (isset($author_avatar)) { ?>
		<div class="author-avatar">
			<a class="author-link" href="<?php echo esc_url($author_profile_url); ?>" rel="author">
			<?php
				echo $author_avatar;
			?>
			</a>
		</div><!-- .author-avatar -->
	<?php } ?>

	<div class="author-description author_text">

		<h3 class="author-title">
			<a class="author-link" href="<?php echo esc_url($author_profile_url); ?>" rel="author">
			<?php echo get_the_author(); ?>
			</a>
		</h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->

			<?php
				$social_icons_list = '';

				// Website
				if ($url_link = get_the_author_meta('url')) {
					$social_icons_list .= '<a rel="nofollow noreferrer" href="'. esc_url($url_link) .'" target="_blank" class="social_icon social_url social_icon_url" ><i class="fa fa-globe"></i></a>';
				}

				// Facebook
				if ($facebook_link = get_the_author_meta('facebook')) {

					if (!strrpos($facebook_link, 'facebook.com') && !strrpos($facebook_link, 'fb.com')) {
						$facebook = "https://facebook.com/". $facebook_link;
					} else {
						$facebook = $facebook_link;
					}

					$social_icons_list .= '<a target="_blank" rel="nofollow noreferrer" href="'. esc_url($facebook) .'" class="social_icon social_facebook social_icon_facebook" ><i class="fa fa-facebook"></i></a>';
				}

				// Twitter
				if ($twitter_link = get_the_author_meta('twitter')) {
					if (!strrpos($twitter_link, 'twitter.com') && !strrpos($twitter_link, 'twt.com')) {

						if (strpos($twitter_link, '@')) {
							$twitter = str_replace('@', '', $twitter_link);
						} else {
							$twitter = $twitter_link;
						}
						$twitter = 'https://twitter.com/'.$twitter;

					} else {
						$twitter = $twitter_link;
					}

					$social_icons_list .= '<a rel="nofollow noreferrer" href="'. esc_url($twitter) .'" target="_blank" class="social_icon social_twitter social_icon_twitter"><i class="fa fa-twitter"></i></a>';
				}

				// Google+
				if (get_the_author_meta('gplus') != "") {
					$social_icons_list .= '<a rel="nofollow noreferrer" href="'. esc_url(get_the_author_meta('gplus')) .'" target="_blank" class="social_icon social_gplus social_icon_gplus"><i class="fa fa-google-plus"></i></a>';
				}

				// Linkedin
				if (get_the_author_meta('linkedin') != "") {
					$social_icons_list .= '<a rel="nofollow noreferrer" href="'. esc_url(get_the_author_meta('linkedin')) .'" target="_blank" class="social_icon social_linkedin social_icon_linkdin"><i class="fa fa-linkedin"></i></a>';
				}

				// Pinterest
				if (get_the_author_meta('pinterest') != "") {
					$social_icons_list .= '<a rel="nofollow noreferrer" href="'. esc_url(get_the_author_meta('pinterest')) .'" class="social_icon social_pinterest social_icon_pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
				}

				// Social Icons List if any exists
				if ($social_icons_list != '') {
					echo '<div class="social_icons_list">'.$social_icons_list.'</div>';
				}
			?>
	</div><!-- .author-description -->
</div><!-- .author-info -->