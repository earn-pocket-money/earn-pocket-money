<?php
/**
 * Image size of jetpack top posts widget
 */
function earn_pocket_money_jetpack_top_posts_widget_image_options( $get_image_options ) {
	$get_image_options['avatar_size'] = 75;
	return $get_image_options;
}
add_filter( 'jetpack_top_posts_widget_image_options', 'earn_pocket_money_jetpack_top_posts_widget_image_options' );

/**
 * Remove jetpack ogp tags
 */
remove_action( 'wp_head', 'jetpack_og_tags' );
add_filter( 'jetpack_enable_open_graph', '__return_false', 99 );

/**
 * favicon url not used photon
 */
function earn_pocket_money_photon_for_favicon( $boolean, $image_url, $args, $scheme ) {
	if ( false !== strpos( $image_url, 'cdn.image.st-hatena.com/image/favicon' ) ) {
		return $image_url;
	}
	return $boolean;
}
add_filter( 'jetpack_photon_skip_for_url', 'earn_pocket_money_photon_for_favicon', 10, 4 );
