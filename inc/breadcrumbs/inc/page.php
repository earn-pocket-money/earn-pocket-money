<?php
class Earn_Pocket_Money_Breadcrumbs_Page extends Earn_Pocket_Money_Breadcrumbs_Abstract_Breadcrumbs {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set_ancestors( get_the_ID(), 'page' );
		$this->set( get_the_title() );
	}
}
