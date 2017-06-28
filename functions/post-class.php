<?php
/**
 * Sets the post classes
 */
if ( ! function_exists( 'earn_pocket_money_post_class' ) ) {
	function earn_pocket_money_post_class( $classes ) {
		if ( in_array( 'hentry', $classes ) ) {
			unset( $classes[ array_search( 'hentry', $classes ) ] );
		}
		$classes['c-entry'] = 'c-entry';
		return $classes;
	}
}
add_filter( 'post_class', 'earn_pocket_money_post_class' );
