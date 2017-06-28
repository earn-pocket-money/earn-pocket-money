<?php
class Earn_Pocket_Money_Breadcrumbs_Tag extends Earn_Pocket_Money_Breadcrumbs_Abstract_Breadcrumbs {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set( single_tag_title( '', false ) );
	}
}
