<?php
/**
 * Shortcode [affiliate_tag]
 */
function shortcode_affiliate_tag( $attributes ) {
	$attributes = shortcode_atts( array(
		'id' => null,
	), $attributes );

	global $post;
	$post = get_post( $attributes['id'] );
	if ( ! $post ) {
		return;
	}
	setup_postdata( $post );
	ob_start();
	get_template_part( 'template-parts/affiliate-tag' );
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'affiliate_tag', 'shortcode_affiliate_tag' );
