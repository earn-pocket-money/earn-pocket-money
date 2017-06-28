<?php
class Earn_Pocket_Money_Breadcrumbs_Search extends Earn_Pocket_Money_Breadcrumbs_Abstract_Breadcrumbs {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set(
			sprintf(
				__( '「%s」の検索結果' ),
				get_search_query()
			)
		);
	}
}
