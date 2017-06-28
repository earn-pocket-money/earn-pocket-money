<?php
global $wp_query;
if ( empty( $wp_query->max_num_pages ) || $wp_query->max_num_pages < 2 ) {
	return;
}
?>
<div class="c-pagination">
	<?php
	the_posts_pagination( array(
		'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Previous', 'earn-pocket-money' ) . '</span>',
		'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Next', 'earn-pocket-money' ) . '</span>',
	) );
	?>
</div>
