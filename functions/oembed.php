<?php
/**
 * oEmbed container customization
 */
function earn_pocket_money_embed_oembed_html( $html, $url, $attr, $post_ID ) {
	if ( preg_match( '/^https?:\/\/www\.youtube\.com/', $url ) ) {
		$html = '<div class="c-responsive-container">' . $html . '</div>';
	}
	return $html;
}
add_filter( 'embed_oembed_html', 'earn_pocket_money_embed_oembed_html', 100, 4 );

/**
 * oembed に限定してしまうと普通に iframe で貼り付けたものが漏れてしまうため、
 * iframe については強制的に全てレスポンシブにする
 */
function earn_pocket_money_iframe_responsive( $content ) {
	$content = preg_replace(
		'/(<iframe [^>]*?>[^<]*?<\/iframe>)/i',
		'<div class="c-responsive-container">$1</div>',
		$content
	);
	$content = preg_replace(
		'/<div class="c-responsive-container"><div class="c-responsive-container">(.*?)<\/div><\/div>/',
		'<div class="c-responsive-container">$1</div>',
		$content
	);

	return $content;
}
add_filter( 'the_content', 'earn_pocket_money_iframe_responsive' );

/**
 * Slideshare はオフィシャルでショートコードを案内しており、そのユーザーがいる可能性も配慮して
 * 対策する
 */
function earn_pocket_money_slideshare_shortcode_responsive( $content ) {
	$content = preg_replace(
		'/(\[slideshare +[^\]]+?\])/i',
		'<div class="c-responsive-container">$1</div>',
		$content
	);
	return $content;
}
add_filter( 'the_content', 'earn_pocket_money_slideshare_shortcode_responsive' );

/**
 * oEmbed blog card
 */
new Earn_Pocket_Money_oEmbed_Blog_Card();
