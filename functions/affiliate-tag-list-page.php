<?php
/**
 * Added column for affiliate-tag list page
 */
function earn_pocket_money_manage_posts_columns( $columns ) {
	if ( in_array( get_post_type(), array( 'affiliate-tag', 'ranking', 'recommend' ) ) ) {
		$date_column = $columns['date'];
		unset( $columns['date'] );
		$columns['shortcode'] = esc_html__( 'ショートコード', 'earn-pocket-money' );
		$columns['date']      = $date_column;
	}
	return $columns;
}
add_filter( 'manage_posts_columns', 'earn_pocket_money_manage_posts_columns' );

function earn_pocket_money_manage_posts_custom_column( $column_name, $post_id ) {
	if ( 'shortcode' === $column_name ) {
		$post_type = get_post_type( $post_id );
		if ( 'affiliate-tag' === $post_type ) {
			echo sprintf(
				'<input type="text" value="%1$s" class="widefat" readonly />',
				esc_attr( '[affiliate_tag id="' . $post_id . '"]' )
			);
		}
		if ( 'ranking' === $post_type ) {
			echo sprintf(
				'<input type="text" value="%1$s" class="widefat" readonly />',
				esc_attr( '[ranking id="' . $post_id . '"]' )
			);
		}
		if ( 'recommend' === $post_type ) {
			echo sprintf(
				'<input type="text" value="%1$s" class="widefat" readonly />',
				esc_attr( '[recommend id="' . $post_id . '"]' )
			);
		}
	}
}
add_action( 'manage_posts_custom_column', 'earn_pocket_money_manage_posts_custom_column', 10, 2 );
