<?php
/**
 * Added rel="nofollow" for external links in the_content()
 */
function earn_pocket_money_add_nofollow( $content ) {
	if ( class_exists( 'SCF' ) ) {
		$nofollow = SCF::get_option_meta( 'site-option', 'nofollow' );
		if ( isset( $nofollow[0] ) && 'true' === $nofollow[0] ) {
			return preg_replace_callback(
				'/<a .+?>/',
				'earn_pocket_money_add_nofollow_callback',
				$content
			);
		}
	}
	return $content;
}
add_filter('the_content', 'earn_pocket_money_add_nofollow' );

function earn_pocket_money_add_nofollow_callback($matches) {
	$link     = $matches[0];
	$home_url = home_url();
	if (! preg_match( '{href=["\']?' . $home_url . '}i', $link ) && ! preg_match( '{href=["\']?/.*}i', $link ) ) {
		if ( false === strpos( $link, 'rel' ) ) {
			$link = str_replace( '>', 'rel="nofollow">', $link );
		} else {
			$link = preg_replace( '{rel=["\']?([^"\']*?)}', 'rel="nofollow $1', $link );
		}
	}
	return $link;
}
