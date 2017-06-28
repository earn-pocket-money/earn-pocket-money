<?php
class Earn_Pocket_Money_Breadcrumbs_Not_Found extends Earn_Pocket_Money_Breadcrumbs_Abstract_Breadcrumbs {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set( __( 'ページが見つかりませんでした' ) );
	}
}
