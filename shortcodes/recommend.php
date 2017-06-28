<?php
/**
 * Shortcode [recommend]
 */
function shortcode_recommend( $attributes ) {
	$attributes = shortcode_atts( array(
		'id' => null,
	), $attributes );

	if ( ! class_exists( 'SCF' ) ) {
		return;
	}

	global $post;
	$post = get_post( $attributes['id'] );
	if ( ! $post ) {
		return;
	}
	setup_postdata( $post );
	ob_start();
	get_template_part( 'template-parts/recommend' );
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'recommend', 'shortcode_recommend' );
