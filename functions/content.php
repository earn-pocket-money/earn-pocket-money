<?php
function earn_pocket_money_add_link_pages( $content ) {
	ob_start();
	get_template_part( 'template-parts/link-pages' );
	$link_pages = ob_get_clean();

	return $content . str_replace( array( "\n", "\r" ), '', $link_pages );
}
add_filter( 'the_content', 'earn_pocket_money_add_link_pages', 9 );
