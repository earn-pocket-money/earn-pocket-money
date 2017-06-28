<?php
/**
 * Inits the TinyMCE
 */
if ( ! function_exists( 'earn_pocket_money_tiny_mce_before_init' ) ) {
	function earn_pocket_money_tiny_mce_before_init( $init ) {
		$init['body_class'] = 'c-entry__content';
		return $init;
	}
}
add_filter( 'tiny_mce_before_init', 'earn_pocket_money_tiny_mce_before_init' );
