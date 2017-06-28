<?php
class Earn_Pocket_Money_Breadcrumbs_Home extends Earn_Pocket_Money_Breadcrumbs_Abstract_Breadcrumbs {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );
		if ( 'page' === $show_on_front && $page_for_posts ) {
			$title = get_the_title( $page_for_posts );
			$this->set( $title );
		}
	}
}
