<?php
class Earn_Pocket_Money_Breadcrumbs_Category extends Earn_Pocket_Money_Breadcrumbs_Abstract_Breadcrumbs {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$category_name = single_cat_title( '', false );
		$category_id   = get_cat_ID( $category_name );
		$this->set_ancestors( $category_id, 'category' );
		$this->set( $category_name );
	}
}
