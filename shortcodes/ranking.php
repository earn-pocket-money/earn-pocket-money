<?php
/**
 * Shortcode [ranking]
 */
function shortcode_ranking( $attributes ) {
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
	get_template_part( 'template-parts/ranking' );
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'ranking', 'shortcode_ranking' );
