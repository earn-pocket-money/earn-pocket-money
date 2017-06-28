<?php
class Earn_Pocket_Money_OGP_Category extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$term              = get_queried_object();
		$this->title       = single_cat_title( '', false );
		$this->type        = 'blog';
		$this->url         = get_term_link( $term );
		$this->description = wp_strip_all_tags( category_description( $term->term_id ) );
	}
}
