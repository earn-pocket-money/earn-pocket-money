<?php
class Earn_Pocket_Money_Breadcrumbs_Post_Type_Archive extends Earn_Pocket_Money_Breadcrumbs_Abstract_Breadcrumbs {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$post_type = $this->get_post_type();
		if ( $post_type && 'post' !== $post_type ) {
			$post_type_object = get_post_type_object( $post_type );
			$label = $post_type_object->label;
			$this->set( $label );
		}
	}
}
