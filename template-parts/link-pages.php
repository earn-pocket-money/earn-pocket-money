<?php
add_filter( 'wp_link_pages_link', function( $link ) {
	$link = preg_replace( '/^(\d+)$/', '<span class="page-numbers current">$1</span>', $link );
	$link = preg_replace( '/^<a([^>]+)>(\d+?)<\/a>$/', '<a class="page-numbers" $1>$2</a>', $link );
	$link .= "\n";
	return $link;
} );
wp_link_pages( array(
	'before'           => '<div class="c-pagination"><h2 class="screen-reader-text">' . esc_html__( 'Posts navigation', 'earn-pocket-money' ) . '</h2><div class="nav-links">',
	'after'            => '</div></div>',
	'link_before'      => '',
	'link_after'       => '',
	'separator'        => '',
	'nextpagelink'     => '&gt;',
	'previouspagelink' => '%lt;',
	'pagelink'         => '%',
) );
